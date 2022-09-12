<?php
    $con = mysqli_connect("juandebarco.com", "juandeba_ramon", "r344a345m6567o676n", "juandeba_ramon");

    $nomCompleto = $_POST["nomCompleto"];
    $genero = $_POST["genero"];
    $nombreUsu = $_POST["nombreusu"];
    $contrasenaUsu = $_POST["contrasenausu"];
    $tipoUsuraio = $_POST["tipodeusuario"];

    
    $statament = mysqli_prepare($con, "CALL spInsertUsuario(?,?,?,?,?)");
    mysqli_stmt_bind_param($statament, "sssss", $nombreCompleto, $genero, $nombreUsu, $contrasenaUsu, $tipoUsuraio);
    mysqli_stmt_execute($statament);

    $response["success"] = true;
    echo json_encode($response);
   
?>