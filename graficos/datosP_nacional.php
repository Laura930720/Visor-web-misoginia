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

$sql = "SELECT * FROM femp_nacional";
mysqli_set_charset($conn,"UTF8");

if(!$result = mysqli_query($conn, $sql)) die();

$femPrensa = array(); //creamos un array
$cuenta = 0;
while($row = mysqli_fetch_array($result)) 
{ 
	

    $entidad=$row['nom_ent'];
    $id = $row['iden'];
	$femp20 = $row['femp20'];
   
  
   

    $femPrensaNac[] = array('id'=> $id,'entidad' => $entidad ,'value'=> $femp20);

}
    //print_r($femPrensa);
//desconectamos la base de datos
$close = mysqli_close($conn) 
or die("Ha sucedido un error inexperado en la desconexion de la base de datos");
  

//Creamos el JSON
$json_cadenaN = json_encode($femPrensaNac, JSON_UNESCAPED_UNICODE); //Técnologia
$json_cadenasN = $json_cadenaN.';';
//echo $json_cadenasN;

?>


	
</body>



</html>