<?php 
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $dbname = "login_system";

    $conn = new mysqli($dbhost,$dbuser,$dbpass,$dbname);
    if($conn -> connect_error){
        die("No se pudo conectar a la base de datos".$conn->connect_error);
    }
    //echo 'Completado';