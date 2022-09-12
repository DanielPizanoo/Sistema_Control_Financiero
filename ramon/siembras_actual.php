<?php
    //$con = mysqli_connect("juandebarco.com", "juandeba_ramon", "r344a345m6567o676n", "juandeba_ramon");
    

    $servername = "juandebarco.com";
    $username = "juandeba_ramon";
    $password = "r344a345m6567o676n";
    $dbname = "juandeba_ramon";

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "SELECT * FROM siembras_actual";
    $sth = mysqli_query($conn,$sql);
    $rows = array();
    while($r = mysqli_fetch_assoc($sth)) {
        $rows[] = $r;
    }
    print json_encode($rows);

    

    $conn->close();


?>