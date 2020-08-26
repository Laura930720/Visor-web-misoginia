<!DOCTYPE html>
<html>
<head>
	<title></title>
	<script src="https://www.amcharts.com/lib/4/core.js"></script>
	<script src="https://www.amcharts.com/lib/4/maps.js"></script>
	<script src="https://www.amcharts.com/lib/4/geodata/franceLow.js"></script>
	<script src="https://www.amcharts.com/lib/4/geodata/mexicoHigh.js"></script>

	<!-- PARA LA GRAFICA DE MUJER -->

<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>


<!--PARA LA LINEA DEL TIEMPO-->
	<script src="https://www.amcharts.com/lib/4/charts.js"></script>
	<script src="https://www.amcharts.com/lib/4/plugins/timeline.js"></script>
	<script src="https://www.amcharts.com/lib/4/plugins/bullets.js"></script>
	<script src="https://www.amcharts.com/lib/4/themes/animated.js"></script>
	<meta charset="utf-8">
	
	<style type="text/css">
		body {
	  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol";
	}
	#chartdiv {
	float:left;
	width: 98%;
	 height: 250px
	}

	#chartdiv_m {
	  width: 100%;
	  height: 250px;
	}	

	#chartdiv2 {
	float:left;
	width: 100%;
	height: 550px
	}

	</style>
</head>
<body>
<div class="container">
	<div class="row">
    <div class="col-sm-5">
      <div class="card">
        <div class="card-header">
          <h5>Feminicidios prensa 2020</h5>
        </div>
        <div class="card-block">
          <p class="card-text">Los datos corresponden a los meses de enero y febrero del 2020</p>
          <p id="chartdiv"></p>
          
        </div>
      </div>
    </div>

    <div class="col-sm-7">
      <div class="card">
        <div class="card-header">
          <h5>Modalidad del delito de feminicidio</h5>
        </div>
        <div class="card-block">
          <p class="card-text">Los datos corresponden a los meses de enero a julio del presente año</p>
         <p id="chartdiv_m"></p>
        </div>
        
      </div>
    </div>
  </div>
</div>

<br>

<div class="card" style="width:100%">
  
  <div class="card-body">
    <h4 class="card-title">Línea del tiempo: Feminicidios publicados en prensa</h4>
    <p class="card-text">Los datos corresponden a los meses de enero y febrero del presente año</p>
    <p id="chartdiv2"></p>
  </div>
</div>

	
	<?php include 'datosP_nacional.php';
		  include 'datosPrensa.php';
		  include "cons_asesorias.php"; ?>

</body>
<script type="text/javascript">
//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*SCRIPT PARA EL MAPA*/
// High detail map
var chart = am4core.create("chartdiv", am4maps.MapChart);
chart.geodata = am4geodata_mexicoHigh;
chart.projection = new am4maps.projections.Mercator();
var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());
polygonSeries.useGeodata = true;
polygonSeries.mapPolygons.template.events.on("hit", function(ev) {
  chart.zoomToMapObject(ev.target);
});
var label = chart.chartContainer.createChild(am4core.Label);
//label.text = "Feminicidios por entidad 2020";



// Create map polygon series
var polygonSeries = chart.series.push(new am4maps.MapPolygonSeries());

// Make map load polygon (like country names) data from GeoJSON
polygonSeries.useGeodata = true;

// Configure series
var polygonTemplate = polygonSeries.mapPolygons.template;
polygonTemplate.tooltipText = "{name}:{value}";
//polygonTemplate.fill = am4core.color("#74B266");

// Create hover state and set alternative fill color
var hs = polygonTemplate.states.create("hover");
hs.properties.fill = am4core.color("#F50296");
;

// Add heat rule
polygonSeries.heatRules.push({
  "property": "fill",
  "target": polygonSeries.mapPolygons.template,
  "min": am4core.color("#EC9DD9"),
  "max": am4core.color("#740659")
});


// Add heat legend
var heatLegend = chart.createChild(am4maps.HeatLegend);
heatLegend.series = polygonSeries;
heatLegend.width = am4core.percent(100);
heatLegend.orientation = "vertical";
heatLegend.align = "left";
heatLegend.valign = "bottom";

polygonSeries.mapPolygons.template.events.on("over", function(ev) {
  if (!isNaN(ev.target.dataItem.value)) {
    heatLegend.valueAxis.showTooltipAt(ev.target.dataItem.value)
  }
  else {
    heatLegend.valueAxis.hideTooltip();
  }
});

polygonSeries.mapPolygons.template.events.on("out", function(ev) {
  heatLegend.valueAxis.hideTooltip();
});

//datos que vienen del json de la base
var dataNac_from_php = <?php echo $json_cadenasN; ?>;
//alert(dataNac_from_php);

polygonSeries.data = dataNac_from_php;

//////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*SCRIP PARA LA GRÁFICA DE MUÑECA*/
am4core.ready(function() {

// Themes begin
am4core.useTheme(am4themes_animated);
// Themes end
var iconPath_m = "M292.6,69.2c0-20.6-16.4-37.3-36.6-37.3c-20.2,0-36.6,16.7-36.6,37.3c0,20.6,16.4,37.3,36.6,37.3   C276.2,106.5,292.6,89.8,292.6,69.2zM190.4,148.6L161,252.9c-6.3,22.8,20.7,31.7,27.3,10.3l26.3-96.2h7.4l-45.2,169H219v127c0,23,32,23,32,0V336h10v127   c0,23,31,23,31,0V336h43.4l-46.2-169h8.4l26.3,96.2c6.5,21.9,33.3,12.5,27.3-10.2l-29.4-104.4c-4-11.8-18.2-32.6-42-33.6h-47.3   C207.9,116,193.8,136.6,190.4,148.6z"

/*var iconPath_m = "M30,6.708C28.895,7.199,27.244,7.851,26,8c1.273-0.762,2.539-2.561,3-4c-0.971,0.577-2.087,1.355-3.227,1.773    L25,5c-1.121-1.197-2.23-2-4-2c-3.398,0-6,2.602-6,6c0,0.399,0.047,0.7,0.11,0.956L15,10C9,10,5.034,8.724,2,5    C1.469,5.908,1,6.872,1,8c0,2.136,1.348,3.894,3,5c-1.009-0.033-2.171-0.542-3-1c0,2.98,4.186,6.432,7,7c-1,1-4.623,0.074-5,0    c0.784,2.447,3.309,3.949,6,4c-2.105,1.648-4.647,2.51-7.531,2.51c-0.498,0-0.987-0.029-1.469-0.084C2.723,27.17,6.523,28,10,28    c11.322,0,17-8.867,17-17c0-0.268,0.008-0.736,0-1C28.201,9.132,29.172,7.942,30,6.708z"*/

var chart = am4core.create("chartdiv_m", am4charts.SlicedChart);
chart.hiddenState.properties.opacity = 0; // this makes initial fade in effect


chart.data = [{
    "name": "Arma blanca",
    "value": 113
}, {
    "name": "Arma fuego",
    "value": 120
}, {
    "name": "Otro elemento",
    "value": 283
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
///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
/*SCRIPT PARA LA LÍNEA DEL TIEMPO*/

// Themes
am4core.useTheme(am4themes_animated);
// Create chart instance
var chart = am4core.create("chartdiv2", am4charts.XYChart);
//var feminicidios20 = '<?php// echo $json_cadenas; ?>'; con comillas los json no se leen en e chart
var data_from_php = <?php echo $json_cadenas; ?>;
//alert(data_from_php);
chart.data = data_from_php;
chart.dateFormatter.inputDateFormat = "yyyy-MM-dd";
chart.fontSize = 11;
chart.tooltipContainer.fontSize = 11;
// Create axes
var xAxis = chart.xAxes.push(new am4charts.CategoryAxis());
xAxis.dataFields.category = "x";
xAxis.renderer.grid.template.disabled = true;
xAxis.renderer.labels.template.disabled = true;
xAxis.tooltip.disabled = true;

var yAxis = chart.yAxes.push(new am4charts.ValueAxis());
yAxis.min = 0;
yAxis.max = 2;
yAxis.strictMinMax = true;
yAxis.renderer.grid.template.disabled = true;
yAxis.renderer.labels.template.disabled = true;
yAxis.renderer.baseGrid.disabled = true;
yAxis.tooltip.disabled = true;


// Create series
var series = chart.series.push(new am4charts.LineSeries());
series.dataFields.categoryX = "x";
series.dataFields.valueY = "y";//1 si quiero que todo quede en una linea;
series.strokeWidth = 4;
series.sequencedInterpolation = true;
series.tensionX = 0.7;


var bullet = series.bullets.push(new am4charts.CircleBullet());
//bullet.circle.radius = 10;
bullet.setStateOnChildren = true;
bullet.states.create("hover");
bullet.circle.states.create("hover").properties.radius = 15;


//scrollbar
chart.scrollbarX = new am4core.Scrollbar();
chart.scrollbarX.align = "center"
chart.scrollbarX.width = am4core.percent(75);
chart.scrollbarX.opacity = 0.5;

// Pre-zoom the chart, para cargar desde el principio solo los primeros datos
//xAxis.start = 1;
xAxis.end = 0.07;
xAxis.keepSelection = true;


var labelBullet = series.bullets.push(new am4charts.LabelBullet());
labelBullet.label.text = "{text}";
labelBullet.label.maxWidth = 200;
labelBullet.label.wrap = true;
labelBullet.label.truncate = false;
labelBullet.label.textAlign = "middle";
labelBullet.label.padding(20, 20, 20, 20)//////
//labelBullet.label.verticalCenter = "top";
labelBullet.label.propertyFields.verticalCenter = "center";
//labelBullet.label.paddingTop = 20;
//labelBullet.label.paddingBottom = 20;
labelBullet.label.fill = am4core.color("#999");
labelBullet.setStateOnChildren = true;
labelBullet.states.create("hover").properties.scale = 1.2;
labelBullet.label.states.create("hover").properties.fill = am4core.color("#000");


chart.cursor = new am4charts.XYCursor();
chart.cursor.lineX.disabled = true;
chart.cursor.lineY.disabled = true;

series.sequencedInterpolation = true;
</script>
</html>