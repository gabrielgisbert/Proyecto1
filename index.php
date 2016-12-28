
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href='css/bootstrap/css/bootstrap-theme.css' rel="stylesheet" type="text/css" />
        <link href='css/bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css" />
        <link href='css/registroEntrada.css' rel="stylesheet" type="text/css" />

        <title>Registro de Entrada/Salida de Korott</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 align_center"><a href="index.php"><img src="img/logo.png" class="img_logo"></a></div>
                <div class="col-xs-12 align_center margin_top_15"><h3>Bienvenido a Korott</h3></div>
            </div>
        </div>
        <div class="">
            <div class="">
                <div class="col-xs-12 align_center margin_top_15">Seleccione una de las dos opciones</div>
                <div class="col-md-4 align_center col-md-offset-2 margin_top_60"><a class="btn btn-default button_shadow btn-entrada" href="entrada.php" role="button"><h1>Entrada en Korott</h1></a></div>
                <div class="col-md-4 align_center  margin_top_60"><a class="btn btn-default button_shadow btn-entrada" href="salida.php" role="button"><h1>Salida de Korott</h1></a></div>
            </div>
        </div>
        <div class="">
            <div class="col-md-4 col-md-offset-3 align_center margin_top_60">
                    <label for="" class="control-label ">Visitas en este momento Korott</label>
                    <br>
                    <div class="col-xs-12 col-md-offset-4 align_left">
                   
                        <?php
                        $db_host="10.31.3.98";
                        $db_user="registroES";
                        $db_password="registroES";
                        $db_name="registro";
                        $db_table_name="registroentradasalida";
                        $db_connection = mysql_connect($db_host, $db_user, $db_password);
                        $link = mysql_connect($db_host,$db_user, $db_password);
                        mysql_select_db($db_name, $link);
                        $query="SELECT * FROM ".$db_table_name." WHERE salida IS NULL ORDER BY destino ASC ";
                        $resultado = mysql_query($query);
                        $centroid = '-10';
                        if ($resultado)
                        while($renglon = mysql_fetch_array($resultado))
                        {
                        $valor=$renglon['nombre']." ".$renglon['apellidos']." (".$renglon['procedencia'].")";
                        $centro = '';
                        
                        if(strcmp($centroid,$renglon['destino']) != 0)
                        {
                            echo("<HR width=50% align='center' style='color: black !Important; margin: 5px !Important;'>");
                            switch($renglon['destino'])
                                {
                                    case 0:
                                        $centro = "Oficinas";
                                        break;
                                    case 8:
                                        $centro = "Centro New Valens";
                                        break;
                                    case 1:
                                        $centro = "Korott 1 - Valens Laboratorio";
                                        break;
                                    case 2:
                                        $centro = "Korott 2 - Inkor";
                                        break;
                                    case 3:
                                        $centro = "Korott 3 - Comp. Nutricionales";
                                        break;
                                    case 4:
                                        $centro = "Korott 4 - Texkor";
                                        break;
                                    case 5:
                                        $centro = "Ferrallas - Almacen";
                                        break;
                                    case 6:
                                        $centro = "Todos los centros";
                                        break;
                                    case 7:
                                        $centro = "Nave Alquilada";
                                        break;


                                }
                                echo("<b>".$centro."</b> <br>");
                            
                        }
                        $centroid = $renglon['destino'];
                       
                        
                        
                        $contacto = $renglon['contactodestino'];
                        echo utf8_encode('<span class="glyphicon glyphicon-user" aria-hidden="true"></span> '.$valor . ' visita a ' .$contacto.' <br>');
                        }

                        mysql_close($link);
                        ?>
                        </div>
                </div>
        </div>
        <?php
        
        ?>
        <script src="js/jquery.js" type="text/javascript" ></script>
        <script src="bootstrap/js/bootstrap.js" type="text/javascript" ></script>
        <script src="bootstrap/js/npm.js" type="text/javascript" ></script>
    </body>
    
</html>
