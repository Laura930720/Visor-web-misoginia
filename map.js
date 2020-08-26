
// creo mi variable map que contendrá las capas y el mapa base
var map = L.map('map', {
      center: [22.239540, -101.771036],
      zoom: 5,
      fullscreenControl: true,	
      layers: []// estas son las capas activas
      });

// detectar cuando está en pantalla completa
		map.on('enterFullscreen', function(){
			if(window.console) window.console.log('enterFullscreen');
		});
		map.on('exitFullscreen', function(){
			if(window.console) window.console.log('exitFullscreen');
		});

//MAPAS BASE DE OSM Y DE CARTO
var OSM = L.tileLayer('http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>' });


var carto= L.tileLayer('https://{s}.basemaps.cartocdn.com/rastertiles/voyager/{z}/{x}/{y}{r}.png', {
 attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors &copy; <a href="https://carto.com/attributions">CARTO</a>',
 subdomains: 'abcd',
 maxZoom: 19
  }).addTo(map);

//AGREGANDO MINIMAPA EN LA PARTE INFERIOR DE LA PANTALLA

//CAPAS BASE DEL MINIMAPA
var osmUrl='http://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png';
var osmAttrib='Map data &copy; OpenStreetMap contributors';

//CARGANDO EL MINIMAPA
var osm2 = new L.TileLayer(osmUrl, {minZoom: 2, maxZoom: 13, attribution: osmAttrib });
var miniMap = new L.Control.MiniMap(osm2, { toggleDisplay: true }).addTo(map);


//CAPA 1 TASAS DE TUITS MISOGINOS
var tasas_misotuits = L.geoJson(datos_violencia, {style: style, onEachFeature: popup_miso});
//ESTILOS PARA MISOTUITS
function style(feature) { 
      return { 
      fillColor: getColor(feature.properties.tasa_misot), 
      weight: 1, 
      opacity: 1.5, 
      color: 'white', 
      fillOpacity: .80
      }; 
}
//COLORES PARA MISOTUITS
function getColor(d) {
  return  d >= 8 && d <= 9.9 ? '#FCC0D7' : 
          d >= 9.9 && d < 11.3   ? '#F992BA' : 
          d >=11.3  && d < 12.9 ? '#DE6192' : 
          d >= 12.9 && d <= 16.2  ? '#DC3E7C' : 
          d >= 16.2  ? '#DA0458' : 
          '#FFFFFF'; 
          }
// POPUP DE MISOTUITS
    function popup_miso(feature, layer) { 
      if (feature.properties && feature.properties.entidad) 
      { 
      layer.bindPopup('<div style="text-align:center;"><h6>Entidad: '+feature.properties.entidad+'</h6></div>'+
      	'</br><div style=""><strong>% de tweets misóginos: </strong>'+feature.properties.tasa_misot+
      	'</div>'
       ); 
      } 
    }


//FIN DE CAPA 1 MISOTUITS


//CAPA DE GINI

var indi_gini = L.geoJson(gini, {style:styleg, onEachFeature: popup_gini});
//ESTILOS PARA GINI
function styleg(feature) { 
      return { 
      fillColor: getColor_g(feature.properties.gini), 
      weight: 1, 
      opacity: 1.5,  
      color:'white',
      fillOpacity: .80
      }; 
}

//COLORES PARA GINI
function getColor_g(d) {
  return  d >= 0.42 && d <= 0.4330 ? '#FDA69F' : 
          d >= 0.4330 && d < 0.47   ? '#EE776D' : 
          d >= 0.47  && d < 0.4890 ? '#C96158' : 
          d >= 0.4890 && d <= 0.5210  ? '#C11506' : 
          d >= 0.5210  ? '#A20E01' : 
          '#FFFFFF'; 
          }
//POPUP DE GINI
    function popup_gini(feature, layer) { 
      if (feature.properties && feature.properties.entidad) 
      { 
      layer.bindPopup('<div style="text-align:center;"><h6>Entidad: '+feature.properties.entidad+'</h6></div>'+
        '</br><div style=""><strong>Coeficiente de Gini 2010: </strong>'+feature.properties.gini+
        '</div>'
       ); 
      } 
    }
//FIN DE GINI 

//CAPA DE ESCLARIDAD

var escolar = L.geoJson(gini, {style:styleE, onEachFeature: popup_esco});
//ESTILOS PARA ESCOLARIDAD
function styleE(feature) { 
      return { 
      fillColor: getColor_e(feature.properties.grado_esco), 
      weight: 1, 
      opacity: 1.5,  
      color:'white',
      fillOpacity: .90
      }; 
}

//COLORES PARA ESCOLARIDAD
function getColor_e(d) {
  return  d >= 6.90 && d <= 7.60 ? '#A4F997' : 
          d >= 7.60 && d < 8.60   ? '#72E261' : 
          d >= 8.60  && d < 9.40 ? '#4FB540' : 
          d >= 9.40 && d <= 10.10  ? '#267C19' : 
          d >= 10.10 && d<= 10.80  ? '#0C4D02' : 
          '#FFFFFF'; 
          }
//POPUP DE ESCOLARIDAD
    function popup_esco(feature, layer) { 
      if (feature.properties && feature.properties.entidad) 
      { 
      layer.bindPopup('<div style="text-align:center;"><h6>Entidad: '+feature.properties.entidad+'</h6></div>'+
        '</br><div style=""><strong>Grado promedio de escolaridad: </strong>'+feature.properties.grado_esco+
        '</div>'
       ); 
      } 
    }
//FIN DE ESCOLARIDAD 


//CAPA DE ATR

var atr = L.geoJson(gini, {style:styleatr, onEachFeature: popup_atr});
//ESTILOS PARA ATR
function styleatr(feature) { 
      return { 
      fillColor: getColor_atr(feature.properties.atr), 
      weight: 1, 
      opacity: 1.5,  
      color:'white',
      fillOpacity: .90
      }; 
}

//COLORES PARA ATR
function getColor_atr(d) {
  return  d >= 0.20 && d <= 0.3705 ? '#A5A1F6' : 
          d > 0.371 && d < 0.44   ? '#6C67CB' : 
          d >= 0.44  && d < 0.52 ? '#433F98' : 
          d >= 0.52 && d <= 0.64  ? '#1A1681' : 
          d >= 0.64 && d<= 0.78  ? '#060352' : 
          '#FFFFFF'; 
          }
//POPUP DE ATR
    function popup_atr(feature, layer) { 
      if (feature.properties && feature.properties.entidad) 
      { 
      layer.bindPopup('<div style="text-align:center;"><h6>Entidad: '+feature.properties.entidad+'</h6></div>'+
        '</br><div style=""><strong>Tasa de mujeres con ATR : </strong>'+feature.properties.atr+
        '</div>'
       ); 
      } 
    }
//FIN DE ATR 


//CAPA TASAS DE FEMINICIDIOS (PUNTOS)
geojsonLayer = L.geoJson(datos_puntos, {
    style: function(feature) {
        return {
        	
        	radius: getRadValue(feature.properties.tasa_fem_c),
        	color: "purple",
        	fillOpacity:0.6
        };
    },
    pointToLayer: function(feature, latlng) {
        return new L.CircleMarker(latlng, {
        	radius: 10, 
        	fillOpacity: 0.85
        });
    },
    onEachFeature: function (feature, layer) {
        if (feature.properties && feature.properties.entidad) 
      { 
      layer.bindPopup('<div style="text-align:center;"><h6>Entidad: '+feature.properties.entidad+'</h6></div>'+
      	'</br><div style=""><strong>Tasa feminicidios SESNSP (sep 17 - sep18): </strong>'+feature.properties.tasa_fem_c+
      	'</br><div style=""><strong>Total feminicidios x entidad (sep 17 - sep18): </strong>'+feature.properties.femin_secr+
      	'</br><div style=""><strong>Población femenina 2015: </strong>'+feature.properties.pob_fem15+
      	'</div>'
       ); 
      } 
    }
});
/*por si quiero cambiarle el color a los circulos en función de una variable
function getColor(d) {
  return  d <= 8 && d <= 9.9 ? '#fef0d9' : 
          d >= 10 && d < 11.3   ? '#fdcc8a' : 
          d >=11.4  && d < 12.9 ? '#fc8d59' : 
          d >= 13 && d <= 16.2  ? '#d7301f' : 
          d >= 16.3  ? '#d7301f' : 
          '#FFFFFF'; 
          }*/
function getRadValue(x) {
    return x >= 0 && x <= 0.6 ? 2 :
           x >= 0.7 && x <=1.1 ? 5 :
           x >= 1.2 && x <=2.0 ? 8 :
           x >= 2.1 && x <=2.8 ? 11 :
           x >= 2.9 ? 14 :
           2;
}

//CAPA TASAS DE FEMINICIDIOS DE PRENSA (PUNTOS)
femprensa = L.geoJson(datos_puntos, {
    style: function(feature) {
        return {
        	
        	radius: getRadValue(feature.properties.tasa_femp_),
        	color: "orange"
        	//fillOpacity:0.6
        };
    },
    pointToLayer: function(feature, latlng) {
        return new L.CircleMarker(latlng, {
        	radius: 10
        	//fillOpacity: 0.85
        });
    },
    onEachFeature: function (feature, layer) {
        if (feature.properties && feature.properties.entidad) 
      { 
      layer.bindPopup('<div style="text-align:center;"><h6>Entidad: '+feature.properties.entidad+'</h6></div>'+
      	'</br><div style=""><strong>Tasa feminicidios prensa (sep 17 - sep18): </strong>'+feature.properties.tasa_femp_+
      	'</br><div style=""><strong>Feminicidios prensa x entidad (sep 17 - sep18): </strong>'+feature.properties.feminicidi+
      	'</br><div style=""><strong>Población femenina 2015: </strong>'+feature.properties.pob_fem15+
      	'</div>'
       ); 
      } 
    }
});

function getRadValue(x) {
    return x >= 0.3 && x <= 0.4 ? 2 :
           x >= 0.4 && x <=1.5 ? 5 :
           x >= 1.5 && x <=2.5 ? 8 :
           x >= 2.5 && x <=5.1 ? 11 :
           x >= 5.1 ? 14 :
           2;
}



//CAPA INSTITUTOS DE LA MUJER

var insti_mujer = L.markerClusterGroup();

var edi_mujer = L.icon({
            iconUrl: 'img/icons/edificio_m.svg',
            iconSize:[34,34],
            iconAnchor:[22,32],
            popupAnchor:[0,-24]
       }); 


institutos_m = L.geoJson(institutos, {
    style: function(feature) {
        return {
        	
        	radius: 5,
        	color: "green"
        	//fillOpacity:0.6
        };
    },
    pointToLayer: function(feature, latlng) {
        return new L.marker(latlng, {
        	icon: edi_mujer
        	//fillOpacity: 0.85
        });
    },
    onEachFeature: function (feature, layer) {
        if (feature.properties && feature.properties.Name) 
      { 
      layer.bindPopup('<div style="text-align:center;"><h6>'+feature.properties.Name+'</h6></div>'+
      	'</br><div style=""><strong>Dirección: </strong>'+feature.properties.snippet+
      	'</br><div style=""><strong>Web: </strong>'+feature.properties.web+
      	"</br>"+feature.properties.imagen,{maxWidth: "auto"}); 
      } 
    }
});


  insti_mujer.addLayer(institutos_m);



/*CLUSTER MAP PARA LOS FEMINICIDIOS DE 2020*/
var markers = L.markerClusterGroup();

var iconos = L.icon({
            iconUrl: 'img/icons/violencia-fisica.svg',
            iconSize:[34,34],
            iconAnchor:[22,32],
            popupAnchor:[0,-24]
       });

for (var i = 0; i < addressPoints.length; i++) {
  var a = addressPoints[i];
  var title ='</br><div style=""><h6>Lugar: '+ a[1]+'</h6>'+
  			 '</br><div style=""><strong>Fecha: </strong>'+ a[0]+
  			 '</br><div style=""><strong>Hechos: </strong>'+ a[4];
  var marker = L.marker(new L.LatLng(a[2], a[3]), {
    title: title,
    icon: iconos
  });
  marker.bindPopup(title);
  markers.addLayer(marker);
}



//map.addLayer(markers);

/*MAPAS BASE Y CAPAS*/
var baseMaps = {
        "Mapa base OSM": OSM,
        "Mapa base CARTO": carto
      }

var visita = {
    "Tasa feminicidios p/c 100 mil mujeres SESNSP": geojsonLayer,
    "Tasa de feminicidios prensa p/c 100 mil mujeres:":femprensa,
    "% de tweets misóginos por entidad": tasas_misotuits,
    "Feminicidios reportados en prensa 2020": markers,
    "Institutos de la mujer":insti_mujer,
    "Indice de GINI":indi_gini,
    "Grado promedio de escolaridad":escolar,
    "Tasa de mujeres con acceso a trabajo remunerado": atr
    /*"Pueblos Mágicos": pueblos*/
  }


L.control.layers(baseMaps, visita, {position: 'bottomright', collapsed:true}).addTo(map);


L.easyButton( '<span class="star">&starf;</span>', function(){
	sidebar.toggle();
}).addTo(map);


//SIDEBAR (ÍCONO DE ESTRELLA)
var sidebar = L.control.sidebar('sidebar', {
            closeButton: true,
            position: 'left'
        });
        map.addControl(sidebar);

        setTimeout(function () {
            sidebar.show();
        }, 500);

		map.on('click', function () {
            sidebar.hide();
        })

        sidebar.on('show', function () {
            console.log('Sidebar will be visible.');
        });

        sidebar.on('shown', function () {
            console.log('Sidebar is visible.');
        });

        sidebar.on('hide', function () {
            console.log('Sidebar will be hidden.');
        });

        sidebar.on('hidden', function () {
            console.log('Sidebar is hidden.');
        });


//LEYENDA

function getColor(d) {
  return  d >= 8 && d <= 9.9 ? '#FCC0D7' : 
          d >= 9.9 && d < 11.3   ? '#F992BA' : 
          d >=11.3  && d < 12.9 ? '#DE6192' : 
          d >= 12.9 && d <= 16.2  ? '#DC3E7C' : 
          d >= 16.2  ? '#DA0458' : 
          '#FFFFFF'; 
          }
 var htmlLegend1and2 = L.control.htmllegend({
        position: 'bottomright',
        legends: [{
            name: '% de tweets misóginos',
            layer: tasas_misotuits,
            elements: [{
                label: '16.2 % - 18.1 %',
                html: '',
                style: {
                    'background-color': '#DA0458',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: '16.2 % - 12.9 %',
                html: '',
                style: {
                    'background-color': '#DC3E7C',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: '12.9 % - 11.3 %',
                html: '',
                style: {
                    'background-color': '#DE6192',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: '11.3 % - 9.9 %',
                html: '',
                style: {
                    'background-color': '#F992BA',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: '9.9 % - 8 %',
                html: '',
                style: {
                    'background-color': '#FCC0D7',
                    'width': '10px',
                    'height': '10px'
                }
            }]
        }],
        collapseSimple: true,
        detectStretched: true,
        collapsedOnInit: true,
        defaultOpacity: 0.9,
        visibleIcon: 'icon icon-eye',
        hiddenIcon: 'icon icon-eye-slash'
    })
    map.addControl(htmlLegend1and2)


   var htmlLegend3 = L.control.htmllegend({
        position: 'bottomright',
        legends: [{
            name: 'Tasa de feminicidios p/c 100 mil mujeres SESNSP',
            layer: geojsonLayer,
            elements: [{
                label: ' 3.9 - 2.8 ',

                html: document.querySelector('#circle1').innerHTML
            }, {
                label: '2.8 - 2.1',

                html: document.querySelector('#circle2').innerHTML
            }, {
                label: '2.1 - 1.2',

                html: document.querySelector('#circle3').innerHTML
            }, {
                label: '1.2 - 0.6',

                html: document.querySelector('#circle4').innerHTML
            }, {
                label: '0.6 - 0',

                html: document.querySelector('#circle5').innerHTML
            }]
        }],
        collapseSimple: true,
        detectStretched: true,
        visibleIcon: 'icon icon-eye',
        hiddenIcon: 'icon icon-eye-slash'
    })

    map.addControl(htmlLegend3)

    var htmlLegend4 = L.control.htmllegend({
        position: 'bottomright',
        legends: [{
            name: 'Tasa de feminicidios publicados en prensa p/c 100 mil mujeres',
            layer: femprensa,
            elements: [{
                label: ' 5.1 - 7.1 ',

                html: document.querySelector('#circle1p').innerHTML
            }, {
                label: '2.5 - 5.1',

                html: document.querySelector('#circle2p').innerHTML
            }, {
                label: '1.5 - 2.5',

                html: document.querySelector('#circle3p').innerHTML
            }, {
                label: '0.4 - 1.5',

                html: document.querySelector('#circle4p').innerHTML
            }, {
                label: '0.3 - 0.4',

                html: document.querySelector('#circle5p').innerHTML
            }]
        }],
        collapseSimple: true,
        detectStretched: true,
        visibleIcon: 'icon icon-eye',
        hiddenIcon: 'icon icon-eye-slash'
    })

    map.addControl(htmlLegend4)



var htmlLegend5 = L.control.htmllegend({
        position: 'bottomright',
        legends: [{
            name: 'Coeficiente de Gini',
            layer: indi_gini,
            elements: [{
                label: '0.5210 - 0.5410',
                html: '',
                style: {
                    'background-color': '#A20E01',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: '0.5210 - 0.4890',
                html: '',
                style: {
                    'background-color': '#C11506',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: '0.4890 - 0.4700',
                html: '',
                style: {
                    'background-color': '#C96158',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: '0.4700 - 0.4330',
                html: '',
                style: {
                    'background-color': '#EE776D',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: '0.4330 - 0.4200',
                html: '',
                style: {
                    'background-color': '#FDA69F',
                    'width': '10px',
                    'height': '10px'
                }
            }]
        }],
        collapseSimple: true,
        detectStretched: true,
        collapsedOnInit: true,
        defaultOpacity: 0.9,
        visibleIcon: 'icon icon-eye',
        hiddenIcon: 'icon icon-eye-slash'
    })
    map.addControl(htmlLegend5)




var htmlLegend6 = L.control.htmllegend({
        position: 'bottomright',
        legends: [{
            name: 'Grado promedio de escolaridad',
            layer: escolar,
            elements: [{
                label: 'Segundo de prepa',
                html: '',
                style: {
                    'background-color': '#0C4D02',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: 'Primero de prepa',
                html: '',
                style: {
                    'background-color': '#267C19',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: 'Secundaria completa',
                html: '',
                style: {
                    'background-color': '#4FB540',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: 'Primero y segundo de secundaria',
                html: '',
                style: {
                    'background-color': '#72E261',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: 'Primaria conluida',
                html: '',
                style: {
                    'background-color': '#A4F997',
                    'width': '10px',
                    'height': '10px'
                }
            }]
        }],
        collapseSimple: true,
        detectStretched: true,
        collapsedOnInit: true,
        defaultOpacity: 0.9,
        visibleIcon: 'icon icon-eye',
        hiddenIcon: 'icon icon-eye-slash'
    })
    map.addControl(htmlLegend6)

  var htmlLegend7 = L.control.htmllegend({
        position: 'bottomright',
        legends: [{
            name: 'Tasa de mujeres con acceso a trabajo remunerado',
            layer: atr,
            elements: [{
                label: '0.64 - 0.78',
                html: '',
                style: {
                    'background-color': '#060352',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: '0.52 - 0.64',
                html: '',
                style: {
                    'background-color': '#1A1681',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: '0.44 - 0.52',
                html: '',
                style: {
                    'background-color': '#433F98',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: '0.37 - 0.44',
                html: '',
                style: {
                    'background-color': '#6C67CB',
                    'width': '10px',
                    'height': '10px'
                }
            }, {
                label: '0.28 - 0.37',
                html: '',
                style: {
                    'background-color': '#A5A1F6',
                    'width': '10px',
                    'height': '10px'
                }
            }]
        }],
        collapseSimple: true,
        detectStretched: true,
        collapsedOnInit: true,
        defaultOpacity: 0.9,
        visibleIcon: 'icon icon-eye',
        hiddenIcon: 'icon icon-eye-slash'
    })
    map.addControl(htmlLegend7)