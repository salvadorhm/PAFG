<?php

    $con = mysql_connect("localhost", "root", "") or die("Connection Error: " . mysql_error());
    mysql_select_db("pafg") or die("Error al seleccionar la base de datos:".mysql_error());
    @mysql_query("SET NAMES 'utf8'");
    
    $query1 = "SELECT host,db,user,pass FROM bases ORDER BY id DESC LIMIT 1;";
     $result3 = mysql_query($query1);
    while ($fila = mysql_fetch_array($result3)) {
        $dbhost = $fila[0];
        $dbname = $fila[1];
        $dbuser = $fila[2];
        $dbpassword = $fila[3];
    }
    
    $conexion = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error());
    mysql_select_db($dbname) or die("Error al seleccionar la base de datos:".mysql_error());
    @mysql_query("SET NAMES 'utf8'");
?>