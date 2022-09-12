<?php
    $con = mysqli_connect("juandebarco.com", "juandeba_ramon", "r344a345m6567o676n", "juandeba_ramon");
    
    $tipoevento = $_POST["tipoEvent"];
    $json = $_POST["arrayevent"];
/*
    
    $tipoevento = 1;
    $array = array(
        array(12.56,"kg",$tipoevento,1)
    );

    var_dump($array);

    
    $tipoevento = 1;
    $array = array(
        array(12,"g",$tipoevento,1),
        array(13,"g",$tipoevento,1),
        array(14,"g",$tipoevento,1)
    );

    //echo "valor de array: ".$array[1][1];

    echo $array;
*/

//Decode JSON
$data = json_decode($json, true);
//Parse the employee name
    $bandera = 0;
    $contador = 1;
    $id_evento = 0;

    foreach($data['Params'] as $emp){
        if ($bandera == 0)
        {
            $statament = mysqli_prepare($con, "CALL spInsertEvento(?,?,?,?)");
            mysqli_stmt_bind_param($statament, "ssss", $emp['Cantidad'],$emp['Medida'],$emp['Tipo'],$emp['Estanque']);
            mysqli_stmt_execute($statament);
            $resultado = mysqli_query($con,"SELECT LAST_INSERT_ID()");
            $fila = mysqli_fetch_row($resultado);
            $id_evento = $fila[0];
            $response["success"] = true;

            if ($tipoevento < 3)
            {
                // Sintaxis NySQL para traer el último ID registrado por la base de datos
                // SELECT LAST_INSERT_ID() as id;
                $statament = mysqli_prepare($con, "CALL spInsertDetEvento(?,?,?)");
                mysqli_stmt_bind_param($statament, "sss", $id_evento, $emp['Cantidad'], $contador);
                mysqli_stmt_execute($statament);
                $contador++;
                $response["success"] = true;
            }
            $bandera = 1;
        }
        else
        {
            $statament = mysqli_prepare($con, "CALL spInsertDetEvento(?,?,?)");
            mysqli_stmt_bind_param($statament, "sss", $id_evento, $emp['Cantidad'], $contador);
            mysqli_stmt_execute($statament);
            $contador++;
            $response["success"] = true;
        }
        
    }
    echo json_encode($response);
?>