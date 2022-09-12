<?php
    $con = mysqli_connect("juandebarco.com", "juandeba_ramon", "r344a345m6567o676n", "juandeba_ramon");
    
    $usu_clave = $_POST["usu_clave"];
    $usu_pass = $_POST["usu_pass"];
    
    $statement = mysqli_prepare($con, "SELECT * FROM usuario WHERE usu_clave = ? AND usu_pass = ?");
    mysqli_stmt_bind_param($statement, "ss", $usu_clave, $usu_pass);
    mysqli_stmt_execute($statement);
    
    mysqli_stmt_store_result($statement);
    mysqli_stmt_bind_result(
        $statement, 
        $id_usuario, 
        $usu_clave, 
        $usu_pass,
        $usu_created, 
        $usu_erased,
        $usu_id_persona,
        $usu_id_tipo_usuario);
    
    $response = array();
    $response["success"] = false;  
    
    while(mysqli_stmt_fetch($statement)){
    	$response["usu_id"] = $id_usuario;
        $response["usu_clave"] = $usu_clave;
        $response["tipo"] = $usu_id_tipo_usuario;

        $response["success"] = true; 
    }
    
    echo json_encode($response);
?>