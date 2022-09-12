<?php
//session_start();
require('fpdf/fpdf.php');
/*
    $conexion = new mysqli("localhost", "root", "", "sittec");
    if ($conexion->connect_errno) {
        echo "Fallo al conectar a MySQL: (" . $conexion->connect_errno . ") " . $conexion->connect_error;
    }

    $sql="SELECT * from carreras";
    $sql2="SELECT * from tsolicitudes";

    $usuario = $_POST['ncontrol'];
    $objetivo = $_POST['obje'];
    $carrera = $_POST['carrera'];

    $todo="SELECT * FROM solicitud WHERE num_control = $usuario AND objetivo = '$objetivo' AND carrera = '$carrera' ";

    $result = $conexion->query($sql);
    $result2 = $conexion->query($sql2);

    $resultado = $conexion -> query($todo);
    $row3 = $resultado->fetch_assoc();

    if ($result->num_rows > 0) 
    {
        $combobit="";
        while ($row = $result->fetch_array(MYSQLI_ASSOC)) 
        {
            $combobit .=" <option value=\"{$row['ncarrera']}\">{$row['ncarrera']}</option>"; 
        }
    }
    else
    {
        echo "No hubo resultados";
    }

    if ($result2->num_rows > 0)
    {
        $combobit2="";
        while ($row = $result2->fetch_array(MYSQLI_ASSOC))
        {
            $combobit2 .=" <option value\"{$row['id']}\">{$row['nsolicitud']}</option>";
        }
    }
    else {
        echo "No hubo resultados";
    }
*/
class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Salto de línea
    $this->Ln(15);

    $this->SetFont('Arial','B',16);
	$this->Cell(40);
	$this->Cell(110,10, utf8_decode('Reporte Registro'),0,0,'C');
	$this->Ln(10);

}
}


$pdf = new PDF();
$pdf->AddPage();
//while ($row = $resultado->fetch_assoc()) {
       /* while ($row = mysqli_fetch_array($resultado)) {
        $query2 = "SELECT * FROM rcomite WHERE id=". $row['id'];
        $persona= $conexion->query($query2);
        $persona = $persona->fetch_assoc();*/
$pdf->Ln(7);
$pdf->SetFont('Arial','B',10);
$pdf->Cell(15);
$pdf->Cell(20,10, utf8_decode('Id'),0,0,'C');  
// $resultado = $conexion -> query($nombre);
//                             if ($row = $resultado->fetch_assoc()) {
//                                 $row['suscribe'];
//                             } else {
//                                 "0";
//                             }
$pdf->Cell(40,10, utf8_decode('Nombre'),0,0,'C');

$pdf->Cell(30,10, utf8_decode('Marca'),0,0,'C');
// $resultado = $conexion -> query($sem);
//                             if ($row = $resultado->fetch_assoc()) {
//                                 $row['semestre'];
//                             } else {
//                                 "0";
//                             }
$pdf->Cell(40,10, 'Tipo Producto',0,0,'C');

$pdf->Cell(15,10, utf8_decode('Cantidad'),0,0,'C');
// $resultado = $conexion -> query($carrera);
//                             if ($row = $resultado->fetch_assoc()) {
//                                 $row['carrera'];
//                             } else {
//                                 "0";
//                             }

//}
//}
$pdf->Output();
?>