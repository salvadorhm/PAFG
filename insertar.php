<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN http://w3.org/TR/REC-html40/strict.dtd">
<html>
    <head>
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
        <?php include 'libreria/conexion.php'; ?>
        <?php include 'libreria/configuracion.php'; ?>
        <title><?php echo $tituloPagina; ?></title>
    </head>
    <body>

        <div id="page">
            <center><h1>Insertar registros en la tabla:
                <?php
                $tabla = trim(htmlspecialchars(addslashes($_GET['tabla'])));
                echo $tabla;
                $campos;
                ?>
                </h1></center>
            <center>
                <form name="formInsertar" action="insertar.php" method="GET">
                    <?php
                        $result = mysql_query("SHOW COLUMNS FROM " . $tabla);
                        echo "<input type='hidden' name='tabla' value=" . $tabla . ">";
                        echo "<table>";
                        echo "<tr>";
                        echo "<th>Campo";
                        echo "<th>Valor";
                        echo "</tr>";
                        $campos="";
                        while ($fila = mysql_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>$fila[0]";
                            echo "<td><input type='text' name='valores[]'>";
                            $campos.="$fila[0],";
                            echo "</tr>";
                        }
                        echo "</table>";
                    ?>
                    <input type='hidden' name='campos' value='$campos' />
                    <input type='submit' value='Guardar' />
                    <input type='reset' value='Limpiar'/>
                    <input type="button" value="Cancelar" onclick="window.location='mostrar.php?tabla=<?php echo $tabla."'" ?>"/>
                </form>
            </center>

        </div>
    </body>
</html>
<?php
    if (isset($_GET['valores'])){
        $campos = trim($campos, ',');
        $valor = array();
        $datos="";
        foreach ($_GET['valores'] as $v) {
            array_push($valor, trim(htmlspecialchars(addslashes($v))));
        }

        for ($p = 0; $p < count($valor); $p++) {
            $datos.="'" . $valor[$p] . "',";
        }
        $datos = trim($datos, ',');

        $sql = "INSERT INTO $tabla ($campos) VALUES ($datos)";

        $result = mysql_query($sql, $conexion) or die("No se puede ejecutar la consulta: " . mysql_error());

        if (!$result) {
            die("Fallo al insertar el registro en la Base de Datos: " . mysql_error());
        }
        echo "
            <script languaje=javascript>
                alert ('Registro guardado');
            </script>
             ";
        mysql_close($conexion);
        $campos = "";
        $valor = "";
    }
?>