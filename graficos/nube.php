<!-- Styles -->
<style>
#chartdiv_n {
  width: 100%;
  height: 600px;
}
</style>

<!-- Resources -->
<script src="https://cdn.amcharts.com/lib/4/core.js"></script>
<script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
<script src="https://cdn.amcharts.com/lib/4/plugins/wordCloud.js"></script>
<script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>

<!-- Chart code -->
<script>
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

var hoverState = series.labels.template.states.create("hover");
hoverState.properties.fill = am4core.color("#F0F00A");

var subtitle = chart.titles.create();

var title = chart.titles.create();
title.fontSize = 20;
title.fontWeight = "800";

}); // end am4core.ready()
</script>

<!-- HTML -->
<div id="chartdiv_n"></div>