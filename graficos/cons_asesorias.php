<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
	<title></title>

</head>
<body>

<?php
include("Conexion.php");

// Create connection
$conn = new mysqli($servidor, $usuario, $pass, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT sum(A_jurT) as juridicas, sum(A_psicT) as psic, sum(A_socT) as soc FROM denuncias_mex";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    	$juridicas = $row["juridicas"];
    	$psicologicas = $row["psic"];
    	$tr_social = $row["soc"];
        
    
} else {
    echo "0 results";
}


$sql = "SELECT sum(p15ym_se_f) as sinEscolaridad, sum(p15pri_inf) as primariaIn, sum(p15pri_cof) as primariaCom, sum(p15sec_inf) as secIn, sum(p15sec_cof) as secCom, sum(p18ym_pb_f) as posb FROM eduwork_mex";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    	$sinesc = $row["sinEscolaridad"];
    	$sinprim = $row["primariaIn"];
    	$conprim = $row["primariaCom"];
    	$sinsec= $row["secIn"];
    	$consec= $row["secCom"];
    	$posbas= $row["posb"];

    	$totales = $sinesc+$sinprim+$conprim+$sinsec+$consec+$posbas;
    	$sinEsc = round(($sinesc*100)/$totales);
    	//$sinPrim= ($sinprim*100)/$totales;
    	$Prim = round((($conprim+$sinprim)*100)/$totales);
    	//$sinSec= ($sinsec*100)/$totales;
    	$Secu = round((($consec+$sinsec)*100)/$totales);
    	$posBas = round(($posbas*100)/$totales);
        
    
} else {
    echo "0 results";
}

$sql = "SELECT sum(p15ym_se_f) as sinEscolaridad, sum(p15pri_inf) as primariaIn, sum(p15pri_cof) as primariaCom, sum(p15sec_inf) as secIn, sum(p15sec_cof) as secCom, sum(p18ym_pb_f) as posb FROM eduwork_cd";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    	$sinesc_cd = $row["sinEscolaridad"];
    	$sinprim_cd= $row["primariaIn"];
    	$conprim_cd= $row["primariaCom"];
    	$sinsec_cd= $row["secIn"];
    	$consec_cd= $row["secCom"];
    	$posbas_cd= $row["posb"];

    	$totales = $sinesc+$sinprim+$conprim+$sinsec+$consec+$posbas;
    	$sinEsc = round(($sinesc*100)/$totales);
    	//$sinPrim= ($sinprim*100)/$totales;
    	$Prim = round((($conprim+$sinprim)*100)/$totales);
    	//$sinSec= ($sinsec*100)/$totales;
    	$Secu = round((($consec+$sinsec)*100)/$totales);
    	$posBas = round(($posbas*100)/$totales);
        
    
} else {
    echo "0 results";
}


$sql = "SELECT sum(vio_11) as vio11, sum(vio_12) as vio12, sum(vio_13) as vio13, sum(vio_14) as vio14, sum(vio_15) as vio15, sum(vio_16) as vio16, sum(vio_17) as vio17, sum(vio_18) as vio18, sum(den_vio11) as denvio11, sum(den_vio12) as denvio12, sum(den_vio13) as denvio13, sum(den_vio14) as denvio14, sum(den_vio15) as denvio15, sum(den_vio16) as denvio16, sum(den_vio17) as denvio17, sum(den_vio18) as denvio18 FROM denuncias_mex";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    	for ($x = 11; $x <=18 ; $x++) {
    		
    		$casosVio = "vio".$x;
    		$violencia = $row[$casosVio];
		   $casosViol[] = $violencia;

		   $denuncia = "denvio".$x;
		   $denuncias = $row[$denuncia];
		   $totDen[] = $denuncias;
		}
    	
       // print_r($array);
    
} else {
    echo "0 results";
}


$sql = "SELECT sum(femin_16) as femin16, sum(femin_17) as femin17, sum(femin_18) as femin18, sum(femin_19) as femin19, sum(fem_p16) as femp16, sum(fem_p17) as femp17, sum(fem_p18) as femp18, sum(fem_p19) as femp19  FROM denuncias_mex";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    	for ($x = 16; $x <=19 ; $x++) {
    		
    		$feminicidiosOf = "femin".$x;
    		$femOficiales = $row[$feminicidiosOf];
		   $femOfi[] = $femOficiales;

		   $feminicidiosPre = "femp".$x;
		   $feminicPrensa = $row[$feminicidiosPre];
		   $femPrensa[] = $feminicPrensa;
		}
    	
       // print_r($array);
    
} else {
    echo "0 results";
}


$sql = "SELECT sum(atr_f) as atr FROM eduwork_mex";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $row = $result->fetch_assoc();
    	$accesoTR = $row["atr"];

    	$TrabajoRemunerado = $accesoTR/125;
    	//echo round($TrabajoRemunerado,2);
        
    
} else {
    echo "0 results";
}


$sql = "SELECT * FROM feminicidiosp20";
//mysqli_set_charset($conn, "utf8"); //formato de datos utf8
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
  // output data of each row
  while($row = mysqli_fetch_array($result)) {
    $fecha=$row['Fecha'];
    $resum=$row['Resumen'];
    
    $datos[] = array('fecha'=> $fecha, 'resumen'=> $resum);

  }

//print_r($datos);


} else {
  echo "0 results";
}

mysqli_close($conn);

echo json_encode($datos);
 ?>

</body>
</html>