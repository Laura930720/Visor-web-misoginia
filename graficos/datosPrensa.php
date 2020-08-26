<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8">
    
</head>
<body>

<?php

include("Conexion.php");

// Create connection
$conn = mysqli_connect($servidor, $usuario, $pass, $db);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM feminicidiosp20 order by Fecha";
mysqli_set_charset($conn,"UTF8");

if(!$result = mysqli_query($conn, $sql)) die();

$femPrensa = array(); //creamos un array
$cuenta = 0;
while($row = mysqli_fetch_array($result)) 
{ 
	$cuenta += 1;

    $fecha=$row['Fecha'];
    $fecha2 = explode(" ",$fecha);
	$anio = $fecha2[0];
    $resum= "[bold]".$anio."[/]"."\n".$row['Resumen'];
  
   
    if ($cuenta%2==0){
    $center = "top";
		}else{
    $center = "bottom";
		}
    

    $femPrensa[] = array('x'=> "$cuenta",'y' => 1 ,'year'=> $anio, 'text'=> $resum, 'center' => $center);

}
    //print_r($femPrensa);
//desconectamos la base de datos
$close = mysqli_close($conn) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_cadena = json_encode($femPrensa, JSON_UNESCAPED_UNICODE); //Técnologia
$json_cadenas = $json_cadena.';';
//echo $json_cadenas;

?>


	
</body>



</html>