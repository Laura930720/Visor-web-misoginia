<!DOCTYPE html>
<html>
<head>
  <title></title>

  <!-- Styles -->
<style>
#chartdiv {
  width: 100%;
  height: 500px;
}

  #chartdiv_m {
    width: 100%;
    height: 250px;
  } 
  #chartdiv_n {
  width: 100%;
  height: 380px;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>
<script src="https://cdn.amcharts.com/lib/4/plugins/wordCloud.js"></script>



</head>
<body>

  <div class="container">
  <div class="row">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-header">
          <h5>Misoginia en tweeter a nivel Nacional</h5>
        </div>
        <div class="card-block">
          <p class="card-text">Los datos corresponden al periodo de septiembre 2017 a septiembre 2018</p>
          <p id="chartdiv_m"></p>
          
        </div>
      </div>
    </div>

      <div class="col-sm-7">
        <div class="card">
          <div class="card-header">
            <h5>Palabras usadas en tweets misóginos</h5>
          </div>
          <div class="card-block">
            <p class="card-text">Las palabras fueron recogidas de los tweets de septiembre 2017 a septiembre2018</p>
           <p id="chartdiv_n"></p>
          </div>
          
        </div>
      </div>
  </div>
  </div>
  <br>

  <div class="card" style="width:100%">
  <div class="card-body">
      <h4 class="card-title">Tasas de feminicidios p/c 100 mil mujeres y % tweets misóginos por entidad</h4>
      <p class="card-text">Las tasas de feminicidios se obtuvieron del Secretariado Ejecutivo del Sistema Nacional de Seguridad Pública</p>
      <p id="chartdiv"></p>
    </div>
  </div>



</body>
<!-- Chart code -->
<script>
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

// Create chart instance
var chart = am4core.create("chartdiv", am4charts.XYChart);

// Export
chart.exporting.menu = new am4core.ExportMenu();

// Data for both series
var data = [{"entidad":"Aguascalientes","feminicidios":0.45,"misotuits":10.67},
{"entidad":"Baja California","feminicidios":1.38,"misotuits":9.58},
{"entidad":"Baja California Sur","feminicidios":0.00,"misotuits":11.88},
{"entidad":"Campeche","feminicidios":0.87,"misotuits":13.69},
{"entidad":"Coahuila de Zaragoza","feminicidios":0.47,"misotuits":13.28},
{"entidad":"Colima","feminicidios":2.77,"misotuits":14.93},
{"entidad":"Chiapas","feminicidios":0.90,"misotuits":12.00},
{"entidad":"Chihuahua","feminicidios":2.60,"misotuits":13.55},
{"entidad":"Ciudad de México","feminicidios":0.87,"misotuits":8.84},
{"entidad":"Durango","feminicidios":0.56,"misotuits":12.41},
{"entidad":"Guanajuato","feminicidios":0.50,"misotuits":12.77},
{"entidad":"Guerrero","feminicidios":1.85,"misotuits":11.08},
{"entidad":"Hidalgo","feminicidios":1.81,"misotuits":13.55},
{"entidad":"Jalisco","feminicidios":0.95,"misotuits":11.87},
{"entidad":"México","feminicidios":1.09,"misotuits":11.25},
{"entidad":"Michoacán de Ocampo","feminicidios":0.97,"misotuits":12.78},
{"entidad":"Morelos","feminicidios":1.92,"misotuits":9.95},
{"entidad":"Nayarit","feminicidios":1.01,"misotuits":12.37},
{"entidad":"Nuevo León","feminicidios":3.18,"misotuits":15.09},
{"entidad":"Oaxaca","feminicidios":1.73,"misotuits":9.00},
{"entidad":"Puebla","feminicidios":0.68,"misotuits":12.08},
{"entidad":"Querétaro","feminicidios":0.29,"misotuits":12.39},
{"entidad":"Quintana Roo","feminicidios":0.93,"misotuits":10.96},
{"entidad":"San Luis Potosí","feminicidios":2.00,"misotuits":12.38},
{"entidad":"Sinaloa","feminicidios":3.86,"misotuits":16.21},
{"entidad":"Sonora","feminicidios":1.88,"misotuits":14.94},
{"entidad":"Tabasco","feminicidios":3.19,"misotuits":12.93},
{"entidad":"Tamaulipas","feminicidios":0.69,"misotuits":18.06},
{"entidad":"Tlaxcala","feminicidios":0.46,"misotuits":12.05},
{"entidad":"Veracruz de Ignacio de la Llave","feminicidios":2.55,"misotuits":13.71},
{"entidad":"Yucatán","feminicidios":0.56,"misotuits":12.46},
{"entidad":"Zacatecas","feminicidios":2.47,"misotuits":9.45} ];

/* Create axes */
var categoryAxis = chart.xAxes.push(new am4charts.CategoryAxis());
categoryAxis.dataFields.category = "entidad";
categoryAxis.renderer.minGridDistance = 30;
categoryAxis.renderer.labels.template.rotation = 90;

/* Create value axis */
var valueAxis = chart.yAxes.push(new am4charts.ValueAxis());

/* Create series */
var columnSeries = chart.series.push(new am4charts.ColumnSeries());
columnSeries.name = "misotuits";
columnSeries.dataFields.valueY = "misotuits";
columnSeries.dataFields.categoryX = "entidad";

columnSeries.columns.template.tooltipText = "[#fff font-size: 15px]% tweets misóginos en {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
columnSeries.columns.template.propertyFields.fillOpacity = "fillOpacity";
columnSeries.columns.template.propertyFields.stroke = "stroke";
columnSeries.columns.template.propertyFields.strokeWidth = "strokeWidth";
columnSeries.columns.template.propertyFields.strokeDasharray = "columnDash";
columnSeries.tooltip.label.textAlign = "middle";

var lineSeries = chart.series.push(new am4charts.LineSeries());
lineSeries.name = "feminicidios";
lineSeries.dataFields.valueY = "feminicidios";
lineSeries.dataFields.categoryX = "entidad";

lineSeries.stroke = am4core.color("#fdd400");
lineSeries.strokeWidth = 3;
lineSeries.propertyFields.strokeDasharray = "lineDash";
lineSeries.tooltip.label.textAlign = "middle";

var bullet = lineSeries.bullets.push(new am4charts.Bullet());
bullet.fill = am4core.color("#fdd400"); // tooltips grab fill from parent by default
bullet.tooltipText = "[#fff font-size: 15px]Feminicidios en {categoryX}:\n[/][#fff font-size: 20px]{valueY}[/] [#fff]{additional}[/]"
var circle = bullet.createChild(am4core.Circle);
circle.radius = 4;
circle.fill = am4core.color("#fff");
circle.strokeWidth = 3;

chart.data = data;

}); // end am4core.ready()

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*SCRIP PARA LA GRÁFICA DE TWEETER*/
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var iconPath_m = "M30,6.708C28.895,7.199,27.244,7.851,26,8c1.273-0.762,2.539-2.561,3-4c-0.971,0.577-2.087,1.355-3.227,1.773    L25,5c-1.121-1.197-2.23-2-4-2c-3.398,0-6,2.602-6,6c0,0.399,0.047,0.7,0.11,0.956L15,10C9,10,5.034,8.724,2,5    C1.469,5.908,1,6.872,1,8c0,2.136,1.348,3.894,3,5c-1.009-0.033-2.171-0.542-3-1c0,2.98,4.186,6.432,7,7c-1,1-4.623,0.074-5,0    c0.784,2.447,3.309,3.949,6,4c-2.105,1.648-4.647,2.51-7.531,2.51c-0.498,0-0.987-0.029-1.469-0.084C2.723,27.17,6.523,28,10,28    c11.322,0,17-8.867,17-17c0-0.268,0.008-0.736,0-1C28.201,9.132,29.172,7.942,30,6.708z";

var chart = am4core.create("chartdiv_m", am4charts.SlicedChart);
chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect


chart.data = [{
    "name": "Tweets misóginos",
    "value": 17666
},{
    "name": "Tweets no misóginos",
    "value": 128802
}];

var series = chart.series.push(new am4charts.PictorialStackedSeries());
series.dataFields.value = "value";
series.dataFields.category = "name";
series.alignLabels = true;

series.maskSprite.path = iconPath_m;
series.ticks.template.locationX = 1;
series.ticks.template.locationY = 1;

series.labelsContainer.width = 250;



});  

////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
//SCRIPT PARA EL GRÁFICO DE NUBE
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end

var chart = am4core.create("chartdiv_n", am4plugins_wordCloud.WordCloud);
chart.fontFamily = "Courier New";
var series = chart.series.push(new am4plugins_wordCloud.WordCloudSeries());
series.randomness = 0.1;
series.rotationThreshold = 0.5;

series.data = [ {"tag":"amargada", "cuenta":51.00},
{"tag":"amiguita", "cuenta":"43.00"},
{"tag":"apretada", "cuenta":"14.00"},
{"tag":"arrabalera", "cuenta":"1.00"},
{"tag":"atascada", "cuenta":"8.00"},
{"tag":"aventura", "cuenta":"81.00"},
{"tag":"babosa", "cuenta":"53.00"},
{"tag":"barata", "cuenta":"55.00"},
{"tag":"bruja", "cuenta":"55.00"},
{"tag":"buchona", "cuenta":"35.00"},
{"tag":"buscona", "cuenta":"1.00"},
{"tag":"cabrona", "cuenta":"350.00"},
{"tag":"cagada", "cuenta":"122.00"},
{"tag":"caliente", "cuenta":"410.00"},
{"tag":"callejera", "cuenta":"4.00"},
{"tag":"cerda", "cuenta":"58.00"},
{"tag":"chacha", "cuenta":"15.00"},
{"tag":"cualquiera", "cuenta":"288.00"},
{"tag":"culera", "cuenta":"492.00"},
{"tag":"enferma", "cuenta":"75.00"},
{"tag":"estupida", "cuenta":"361.00"},
{"tag":"feminazi", "cuenta":"36.00"},
{"tag":"gata", "cuenta":"15.00"},
{"tag":"histerica", "cuenta":"13.00"},
{"tag":"hormonal", "cuenta":"30.00"},
{"tag":"india", "cuenta":"13.00"},
{"tag":"jodida", "cuenta":"31.00"},
{"tag":"lagartona", "cuenta":"3.00"},
{"tag":"loca", "cuenta":"1971.00"},
{"tag":"machorra", "cuenta":"6.00"},
{"tag":"malcogida", "cuenta":"2.00"},
{"tag":"malparida", "cuenta":"9.00"},
{"tag":"menopausica", "cuenta":"2.00"},
{"tag":"mosca muerta", "cuenta":"48.00"},
{"tag":"mujer al volante", "cuenta":"6.00"},
{"tag":"mujerzuela", "cuenta":"10.00"},
{"tag":"nalga pronta", "cuenta":"5.00"},
{"tag":"ofrecida", "cuenta":"9.00"},
{"tag":"pendeja", "cuenta":"4306.00"},
{"tag":"perra", "cuenta":"3287.00"},
{"tag":"piruja", "cuenta":"14.00"},
{"tag":"puta", "cuenta":"1351.00"},
{"tag":"ruca", "cuenta":"40.00"},
{"tag":"se hacen pendejas", "cuenta":"26.00"},
{"tag":"solterona", "cuenta":"9.00"},
{"tag":"tonta", "cuenta":"163.00"},
{"tag":"tortilla", "cuenta":"24.00"},
{"tag":"vieja", "cuenta":"1635.00"},
{"tag":"zorra", "cuenta":"667.00"},
 ];

series.dataFields.word = "tag";
series.dataFields.value = "cuenta";

series.heatRules.push({
 "target": series.labels.template,
 "property": "fill",
 "min": am4core.color("#0000CC"),
 "max": am4core.color("#CC00CC"),
 "dataField": "value"
});

series.labels.template.url = "https://stackoverflow.com/questions/tagged/{word}";
series.labels.template.urlTarget = "_blank";
series.labels.template.tooltipText = "{word}: {value}";

series.minFontSize = am4core.percent(3);

var hoverState = series.labels.template.states.create("hover");
hoverState.properties.fill = am4core.color("#F0F00A");




}); // end am4core.ready()
</script>
</script>
</html>


