<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN http://w3.org/TR/REC-html40/strict.dtd">
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
        <?php include 'libreria/conexion.php'; ?>
        <?php include 'libreria/configuracion.php'; ?>
        <title><?php echo $tituloPagina; ?></title>
    </head>
    <body>

        <div id="page">
            <h1>Modificar registro</h1>
            <center>
                <?php
                    $tabla=trim(htmlspecialchars(addslashes($_GET['tabla'])));
                    $id=trim(htmlspecialchars(addslashes($_GET['id'])));
                    $val=trim(htmlspecialchars(addslashes($_GET['val'])));

                    $result = mysql_query("SHOW COLUMNS FROM " . $tabla);
                    $valores = mysql_query("SELECT * FROM ".$tabla." WHERE ".$id."='".$val."'");
                    $valcam=mysql_fetch_array($valores);

                    echo "<form action='guardarMod.php' method='POST'>";
                    echo "<table>";
                    echo "<tr>";
                    echo "<th>Campo";
                    echo "<th>Valor";
                    echo "</tr>";
                    $pos=0;
                    $campos="";
                    while ($fila = mysql_fetch_array($result)) {
                        echo "<tr>";
                        echo "<td>$fila[0]";
                        echo "<input type='hidden' name='tabla' value='".$tabla."'>";
                        echo "<input type='hidden' name=campo[] value='$fila[0]'>";

                        echo "<td><input type='text' name=valor[] value='$valcam[$pos]'>";
                        $pos++;
                        $campos.="$fila[0],";
                        echo "</tr>";
                    }
                    echo "<tr colspan=2>";
                    echo "<input type='hidden' name='tabla' value='" . $tabla. "'>";
                    echo "<td><input type='submit' value='Guardar'>";
                    echo "<td>";
                ?>
                <input type="button" value="Cancelar" onclick="window.location='mostrar.php?tabla=<?php echo $tabla."'" ?>"/>
                <?php
                    echo "</tr>";
                    echo "</table>";
                    echo "</form>";
                ?>
            </center>
        </div>
    </body>
</html>