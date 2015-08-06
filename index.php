<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0//EN http://w3.org/TR/REC-html40/strict.dtd">
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <link rel="stylesheet" type="text/css" href="css/estilo.css">
        <META HTTP-EQUIV="PRAGMA" CONTENT="NO-CACHE">
        <meta http-equiv="expires" content="-1" >
        <?php include 'libreria/conexion.php' ?>
        <?php include 'libreria/configuracion.php' ?>
        <meta charset='utf-8'>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/styles.css">
        <script src="css/jquery-latest.min.js" type="text/javascript"></script>
        <script src="css/script.js"></script>


        <script language="Javascript">
            <!-- 
            document.write('<style type="text/css">div.cp_oculta{display: none;}</style>');
            function MostrarOcultar(capa1)
            {
                if (document.getElementById)
                {
                    var aux = document.getElementById(capa1).style;
                    aux.display = aux.display ? "" : "block";
                   }
                
            }

            //--> 
        </script> 


        <title><?php echo $tituloPagina; ?></title>
    </head>
    <body>
        <div id="cabecera">
            <center>
                <h1><?php echo $tituloPagina; ?>
                    <br>
                    <input type="button" value="Configurar" onclick="window.location = 'config/index.php'"/>
                </h1>
            </center>
        </div>

        <div id='cssmenu'>
            <ul>
                <li><a class="texto" href="javascript:MostrarOcultar('texto1');">Tablas</a></li>
                <li><a class="texto" href="javascript:MostrarOcultar('texto2');">Vistas</a></li>
            </ul>
        </div>


        <div class="cp_oculta" id="texto1">
            <?php
                echo '<table>';
                echo '<th>Lista de Tablas disponibles</th>';
                echo '<th>Ver</th>';
                $result = mysql_query("SHOW TABLE STATUS FROM $dbname;");
                while ($array = mysql_fetch_array($result)) {
                    if ($array['Engine'] != null) {
                        echo "<tr>";
                        echo "<td>$array[Name]</td>";
                        echo "<td><a href='mostrar.php?tabla=$array[Name]'>Ver</a></td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
            ?>
        </div>

        <div class="cp_oculta" id="texto2"> 
            <?php
                echo '<table>';
                echo '<th>Lista de Vistas disponibles</th>';
                echo '<th>Ver</th>';

                $result = mysql_query("SHOW TABLE STATUS FROM $dbname;");
                while ($array = mysql_fetch_array($result)) {
                    if (is_null($array['Engine'])) {
                        echo "<tr>";
                        echo "<td>$array[Name]</td>";
                        echo "<td><a href='mostrarVistas.php?vista=$array[Name]'>Ver</a></td>";
                        echo "</tr>";
                    }
                }
                echo "</table>";
            ?>
        </div>
    </center>
</body>
</html>
