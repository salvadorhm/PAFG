<?php
    $dbhost = "localhost";
    $dbname = "pafg";
    $dbuser = "root";
    $dbpassword = "";
    $dbtable = "bases";

    $conexion = mysql_connect($dbhost, $dbuser, $dbpassword) or die("Connection Error: " . mysql_error());
    mysql_select_db($dbname) or die("Error al seleccionar la base de datos:".mysql_error());
    @mysql_query("SET NAMES 'utf8'");
?>