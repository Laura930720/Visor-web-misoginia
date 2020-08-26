<!DOCTYPE html>
<html>
<head>
	<!-- Bootstrap 4 CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

	<title>Primer mapa leaflet</title>
  	<meta charset="utf-8">
 
	<!--leaflet-->
	<script src="lib/leaflet/leaflet.js" ></script>
	<link rel="stylesheet" href="lib/leaflet/leaflet.css" />

  <!--CLUSTERS DE LEAFLET PARA EL MAPA DE PUNTOS DE FEMINICIDIOS (PARA QUE SE AGRUPEN LOS DATOS)-->
   <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.css" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet.markercluster@1.3.0/dist/MarkerCluster.Default.css" />
    <script src="https://unpkg.com/leaflet.markercluster@1.3.0/dist/leaflet.markercluster.js"></script>

	<!--estilos del mapa-->
	<link rel="stylesheet" type="text/css" href="map.css"/>

  <!-- CAPAS JSON -->
  <!--Datos de violencia-->
  <script type="text/javascript" src="src/datos_violencia.js"></script>
  <script type="text/javascript" src="src/datos_puntos.js"></script>
  <!-- GINI-->
   <script type="text/javascript" src="src/gini.js"></script>
  <!--FEMINICIDIOS DE 2020 -->
   <script type="text/javascript" src="src/fem_prensa_ok.js"></script>
   <!--INSTITUTOS -->
   <script type="text/javascript" src="src/institutos.js"></script>

   <!--para el fullscreen-->
   <script src="src/Control.FullScreen.js"></script>

   <!--PARA EL MINIMAP -->
   <link rel="stylesheet" href="src/Control_MiniMap.css" />
   <script src="src/Control_MiniMap.js" type="text/javascript"></script>

   <!--LIBRERIA PARA AGERGAR BOTON A LEAFLET-->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.css">
   <script src="https://cdn.jsdelivr.net/npm/leaflet-easybutton@2/src/easy-button.js"></script>

   <!--AGREGAR SIDEBAR -->
   <link rel="stylesheet" href="src/L.Control.Sidebar.css" />
   <script src="src/L.Control.Sidebar.js" type="text/javascript"></script>

   <!--LEYENDA-->
  <link rel="stylesheet" href="dist/L.Control.HtmlLegend.css" />
  <script src="dist/L.Control.HtmlLegend.js"></script>

  <!-- TIPO DE LETRA-->
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Heebo&display=swap" rel="stylesheet">
</head>

<!-- barra de navegación de bootstrap -->
<?php 
include 'navbar.php';
include 'icons.php';
?>

<body>


		<div  id="map" ></div>

    <div id="sidebar">
        <h2 style="text-align: center;">Métrica de la violencia</h2>

        <p>Un mapa que representa las tasas de feminicidios reportadas por el 
          <a href="https://www.gob.mx/sesnsp" target="_blank">Secretariado Ejecutivo del Sistema Nacional de Seguridad Pública</a>, así como las tasas de feminicidios que aparecen en la prensa, cortesía de <a href="https://twitter.com/msalguerb?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor" target="_blank">María Salguero</a>, además de los porcentajes de
        tweets misóginos por entidad federtiva obtenidos del equipo de <a href="http://mid.geoint.mx/site/proyecto/id/11.html" target="_blank">Geointeligencia Computaciona de CentroGeo.</a></p>

        <h6 style="color: darkblue">¿Por qué analizar la violencia contra las mujeres?</h6>

        <p>Según el Diagnóstico de la Comisión Nacional de los Derechos Humanos (CNDH, 2017), de 12 feminicidios al día en América Latina, 7 ocurren en México. Por su parte, el Instituto Nacional de Estadística y Geografía (INEGI) reporta que en los últimos diez años (2007- 2017) fueron asesinadas 22 mil 482 mujeres en las 32 entidades del país; es decir, en promedio, cada cuatro horas ocurrió la muerte violenta de una niña o mujer en México.</p>

        <div class="col-md-12">
                <div class="st-member">
                  <div class="st-member-img">
                    <img style="padding-left: 25%" width="68%" src="img/mujer333.png" alt="" class="img-responsive">
                  </div>
                  <div class="st-member-info">
                    <strong class="st-member-name">A nivel nacional</strong>
                    
                    <div class="skills">
                      <div class="skill">
                        <strong>Mujeres de 15 años y más que han sufrido algún tipo de violencia:</strong>
                        <span>63 de cada 100</span>
                        <div class="progress">
                          <div class="progress-bar progress-bar-sept" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 63%;">
                            
                          </div>
                        </div>
                      </div>
                      <div class="skill">
                        <strong>Mujeres de 15 años y más que han sido agredidas por su pareja: </strong>
                        <span>47 de cada 100</span>
                        <div class="progress">
                          <div class="progress-bar progress-bar-sept" role="progressbar" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100" style="width: 47%;">
                          </div>
                        </div>
                      </div>

                      <div class="skill">
                        <strong>Mujeres entre 15 y 17 años que no asisten a la escuela:</strong>
                        <span>17.1%</span>
                        <div class="progress">
                          <div class="progress-bar progress-bar-sept" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 17.1%;">
                            
                          </div>
                        </div>
                      </div>

                      <div class="skill">
                        <strong>Mujeres entre 15 y 17 años que no asisten a la escuela:</strong>
                        <span>17.1%</span>
                        <div class="progress">
                          <div class="progress-bar progress-bar-sept" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 17.1%;">
                            
                          </div>
                        </div>
                      </div>

                      <div class="skill">
                        <strong>Mujeres entre 18 y 19 años que nunca ha asistido a la escuela:</strong>
                        <span>1.8%</span>
                        <div class="progress">
                          <div class="progress-bar progress-bar-sept" role="progressbar" aria-valuenow="90" aria-valuemin="0" aria-valuemax="100" style="width: 1.8%;">
                            
                          </div>
                        </div>
                      </div>
                      
                    </div>
                    
                  </div>
                </div>
              </div>
              <div>
              </div>


              <h6>A partir de la observación de la información utilizando la cartografía pudimos darnos cuenta de que:</h6>
              <div class="list-group">
                
                <a href="#" class="list-group-item list-group-item-action list-group-item-success">Los mayores grados de escolaridad están en las entidades del norte, pero son estas también en las que se publica más contenido misógino en Tweeter</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-secondary">El mayor % de tweets misóginos se publica en el norte del país y el menor % en el centro y sureste de México</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-info">Las mujeres de las entidades de Veracruz, Oaxaca,Tabasco y Chiapas son las que tienen menos acceso al trabajo remunerado y al menos en tres de esas entidades las tasas de feminicidios son medias y altas</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-warning">Las tasas de feminicidios obtenidas con la información del secretariado y con la información de prensa son equiparables y la mayoría de las entidades se encuentran en intervalos similares, sin embargo hay que observar que los asesinatos de mujeres publicados por la prensa superan a los datos oficiales y eso se observa en el rango máximo de la tasa de feminicidios de prensa que es superior a 7; mientras que la del secretariado es de 3.9</a>
                <a href="#" class="list-group-item list-group-item-action list-group-item-danger">Que hay mayor desigualdad en la zona sur y sureste del país y es ahí donde las mujeres tienen menor acceso al trabajo remunerado y una alta tasa de feminicidios</a>
              </div>
    </div>



	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
	
	<!--js del mapa-->
	<script src="map.js"></script>
</html>