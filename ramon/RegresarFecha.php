<?php
$con = mysqli_connect("juandebarco.com", "juandeba_ramon", "r344a345m6567o676n", "juandeba_ramon");
//$con = mysqli_connect("localhost", "root", "", "camaron");
    
$id_siembra = $_POST["id_siembra"];
$statamente = mysqli_query($con, "SELECT DATEDIFF(CURDATE(), sie_fecha_inicio) FROM siembra WHERE id_siembra=$id_siembra");
$result = mysqli_fetch_array($statamente);
$fechaantigua = $result[0];
$now = date("Y-m-d");
$response["dias"] = $fechaantigua;
echo json_encode( $response);
/*echo "<br>";
echo $now;
echo "<br>";
//echo strtotime($now);
//echo "<br>";
$nueva= date("Y-m-d", strtotime($fechaantigua));
//$diferenciafecha = $now - $result[0];
//$fecha1 = strtotime($now) - strtotime($fechaantigua); 
//echo round($fecha1 / 86400);
//echo $now - $fechaantigua;
//echo date_diff($nueva, $now);*/
?>