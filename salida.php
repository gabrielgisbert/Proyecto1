<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href='css/bootstrap/css/bootstrap-theme.css' rel="stylesheet" type="text/css" />
        <link href='css/bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css" />
        <link href='css/registroEntrada.css' rel="stylesheet" type="text/css" />

        <title>Salida - Korott</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 align_center"><a href="index.php"><img src="img/logo.png" class="img_logo"></a></div>
            </div>
        </div>
        <div class="col-xs-12 align_center">
                <div class="col-xs-12 align_center margin_top_15">Por favor, seleccione la persona que desea registrar su salida</div>
                    <form class="form-horizontal" action="registroSalida.php" method="post">
                    <div class="col-md-4 col-md-offset-3 col-xs-12  margin_top_60 align_left">
                        <label for="" class="control-label ">Visitas en este momento Korott</label>
                        <br>
                        <select name="id" class="col-xs-8 col-xs-offset-4 margin_top_15">
                            <?php
                            $db_host="10.31.3.98";
                            $db_user="registroES";
                            $db_password="registroES";
                            $db_name="registro";
                            $db_table_name="registroentradasalida";
                            $db_connection = mysql_connect($db_host, $db_user, $db_password);
                            $link = mysql_connect($db_host,$db_user, $db_password);
                            mysql_select_db($db_name, $link);
                            $query="SELECT * FROM ".$db_table_name." WHERE salida IS NULL ORDER BY nombre ";
                            $resultado = mysql_query($query);
                            if ($resultado)
                            while($renglon = mysql_fetch_array($resultado))
                            {
                            $valor=$renglon['nombre']." ".$renglon['apellidos']." (".$renglon['procedencia'].")";
                            $id = $renglon['id'];
                            echo "<option value=".$id.">".utf8_encode($valor)."</option>\n";
                            }

                            mysql_close($link);
                            ?>
                       </select>
                    </div>
                      <div class="col-md-4 col-md-offset-4 col-xs-12 margin_top_60 align_center">
                            <a href="index.php" class="btn btn-raised pull-left">Volver</a>
                            <button type="submit" class="btn btn-primary">Registrar Salida</button>
                     </div>
                </form>    

                </div>

        <script src="js/jquery.js" type="text/javascript" ></script>
        <script src="bootstrap/js/bootstrap.js" type="text/javascript" ></script>
        <script src="bootstrap/js/npm.js" type="text/javascript" ></script>
    </body>
    
</html>