<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editorggg.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
                <link href='css/bootstrap/css/bootstrap-theme.css' rel="stylesheet" type="text/css" />
        <link href='css/bootstrap/css/bootstrap.css' rel="stylesheet" type="text/css" />
        <link href='css/registroEntrada.css' rel="stylesheet" type="text/css" />

        <title>Entrada - Korott</title>
    </head>
    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 align_center"><a href="index.php"><img src="img/logo.png" class="img_logo"></a></div>
            </div>
        </div>
        
        <ul class="nav nav-tabs col-md-8 align_left col-md-offset-3" role="tablist">
            <li role="presentation" class="active"><a href="#nuevaentrada" aria-controls="nuevaentrada" role="tab" data-toggle="tab">Nueva entrada</a></li>
            <li role="presentation"><a href="#frecuentes" aria-controls="frecuentes" role="tab" data-toggle="tab">Frecuentes</a></li>
            <li role="presentation"><a href="#newvalens" aria-controls="newvalens" role="tab" data-toggle="tab">New Valens</a></li>
        </ul>
        
         <!-- Tab panes -->
        <div class="tab-content">
            <div role="tabpanel" class="tab-pane " id="frecuentes">
                <div class="col-md-8 align_left col-md-offset-3  margin_top_15">Frecuentes</div>
                    <div class="col-md-8 align_left col-md-offset-3 margin_top_15">
                        <form action="registroEntradaFrecuente.php" method="POST">
                            <input type="text" class="hidden" name="iddni" id="dnioculto" value="2"></input>
                        <!--SELECT COUNT(*) as oc, nombre, apellidos FROM `registroentradasalida` GROUP BY dni  ORDER BY oc DESC-->
                                    <?php
                                    $db_host="10.31.3.98";
                                    $db_user="registroES";
                                    $db_password="registroES";
                                    $db_name="registro";
                                    $db_table_name="registroentradasalida";
                                    $db_connection = mysql_connect($db_host, $db_user, $db_password);
                                    $link = mysql_connect($db_host,$db_user, $db_password);
                                    mysql_select_db($db_name, $link);
                                    $query="SELECT COUNT(*) as oc, nombre, apellidos, dni, procedencia FROM ".$db_table_name." GROUP BY dni  ORDER BY oc DESC LIMIT 15 ";
                                    $resultado = mysql_query($query);
                                    if ($resultado)
                                    while($renglon = mysql_fetch_array($resultado))
                                    {
                                    $valor=$renglon['nombre']." ".$renglon['apellidos']." (".$renglon['dni']." - " . $renglon['procedencia'].")";
                                    echo '<button type="submit" class="btn btn-primary btn-xs registro" data-id='.$renglon['dni'].'>Registrar</button> <span class="glyphicon glyphicon-user margin_top_15" aria-hidden="true"></span> '.utf8_encode($valor) .'  <br>' ;
                                    }

                                    mysql_close($link);
                                    ?>
                        
                        </form>
                    </div>
            </div>
            <div role="tabpanel" class="tab-pane " id="newvalens">
                <div class="col-md-8 align_left col-md-offset-3  margin_top_15">New Valens</div>
                    <div class="col-md-8 align_left col-md-offset-3 margin_top_15">
                        <form action="registroEntradaFrecuente.php" method="POST">
                            <input type="text" class="hidden" name="iddni" id="dniocultonewvalens" value="2"></input>
                        <!--SELECT COUNT(*) as oc, nombre, apellidos FROM `registroentradasalida` GROUP BY dni  ORDER BY oc DESC-->
                                    <?php
                                    $db_host="10.31.3.98";
                                    $db_user="registroES";
                                    $db_password="registroES";
                                    $db_name="registro";
                                    $db_table_name="registroentradasalida";
                                    $db_connection = mysql_connect($db_host, $db_user, $db_password);
                                    $link = mysql_connect($db_host,$db_user, $db_password);
                                    mysql_select_db($db_name, $link);
                                   // $query="SELECT COUNT(*) as oc, nombre, apellidos, dni, procedencia FROM ".$db_table_name." GROUP BY dni  ORDER BY oc DESC LIMIT 15 ";
                                    $query="SELECT nombre, apellidos, dni, procedencia FROM ".$db_table_name." WHERE destino = 8 GROUP BY dni  ORDER BY procedencia ASC ";
                                    $empresa = "";
                                    $resultado = mysql_query($query);
                                    if ($resultado)
                                    while($renglon = mysql_fetch_array($resultado))
                                    {
                                        if($empresa != $renglon['procedencia'])
                                        {
                                            echo('</br><b>'.$renglon['procedencia'].'</b></br>');
                                            $empresa = $renglon['procedencia'];
                                        }
                                    $valor=$renglon['nombre']." ".$renglon['apellidos']." (".$renglon['dni']." - " . $renglon['procedencia'].")";
                                    echo '<button type="submit" class="btn btn-primary btn-xs registronewvalens" data-id='.$renglon['dni'].'>Registrar</button> <span class="glyphicon glyphicon-user margin_top_15" aria-hidden="true"></span> '.utf8_encode($valor) .'  <br>' ;
                                    }

                                    mysql_close($link);
                                    ?>
                        
                        </form>
                    </div>
            </div>
            <div role="tabpanel" class="tab-pane active" id="nuevaentrada">
                <div class="">
                    <div class="">
                        <div class="col-xs-12 align_center margin_top_15">Por favor, rellene la siguiente información</div>
                        <div class="col-md-8 align_center col-md-offset-3 margin_top_15">
                            <form class="form-horizontal" action="registroEntrada.php" method="post">
                            <div class="form-group">
                                <label for="nombre" class="control-label col-md-2 col-xs-12 align_left">Nombre</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre">
                                </div>
                            </div>
                           <div class="form-group">
                                <label for="nombre" class="control-label col-md-2 col-xs-12 align_left">Apellidos</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="apellidos">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="dni" class="control-label col-md-2 col-xs-12 align_left">DNI</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="dni" name="dni" placeholder="dni">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="procedencia" class="control-label col-md-2 col-xs-12 align_left">Empresa o lugar de procedencia</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="procedencia" name="procedencia" placeholder="procedencia">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="" class="control-label col-md-4 col-xs-12 align_left">Móvil de contacto (emergencias)</label>
                                <div class="col-md-3">
                                    <input type="text" class="form-control" id="movil" name="movil" placeholder="movil">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="contactodestino" class="control-label col-xs-12 align_left col-md-2 col-xs-12 align_left">Persona a quien visita</label>
                                <div class="col-md-6">
                                    <input type="text" class="form-control" id="contactodestino" name="contactodestino" placeholder="contactodestino">
                                </div>
                            </div>
                            <div class="col-md-8 col-md-offset-1 col-xs-12 align_left">
                                <label for="" class="control-label ">Destino de la visita</label>
                                <select name="centroDestino" multiple  class="form-control"> 
                                    <option value="0">Oficinas</option>
                                    <option value="8">Centro New Valens</option> 
                                    <option value="1">Korott 1 - Valens Laboratorio</option> 
                                    <option value="2">Korott 2 - Inkor</option> 
                                    <option value="3">Korott 3 - Comp. Nutricionales</option> 
                                    <option value="4">Korott 4 - Texkor</option> 
                                    <option value="5">Ferrallas - Almacen</option> 
                                    <option value="6">Todos los centros</option> 
				    <option value="7">Nave Alquilada</option>
                                 </select>
                            </div>
                              <div class="col-md-10 col-md-offset-1 margin_top_15 col-xs-12 margin_bottom_30">
                                    <a href="index.php" class="btn btn-raised pull-left">Volver</a>
                                    <button type="submit" class="btn btn-primary">Registrar Entrada</button>
                             </div>
                                <input type="hidden" class="form-control hidden" id="ip" name="ip" placeholder="ip">
                        </form>    

                        </div>
                        </div>
                </div>
            </div>
        </div>
        
        
        
        
        <?php
        
        ?>
        <script src="js/jquery.js" type="text/javascript" ></script>
        <script src="css/bootstrap/js/bootstrap.js" type="text/javascript" ></script>
        <script src="css/bootstrap/js/npm.js" type="text/javascript" ></script>
        <script>
        $('#myTabs a').click(function (e) {
            e.preventDefault()
            $(this).tab('show')
          })
        
        $('.registro').click(function(){
            $('#dnioculto').val($(this).data('id'));
            console.log($('#dnioculto').val());
        });
        
        $('.registronewvalens').click(function(){
            $('#dniocultonewvalens').val($(this).data('id'));
            console.log($('#dnioculto').val());
        });
        
        </script>
<!--        <script>
            // NOTE: window.RTCPeerConnection is "not a constructor" in FF22/23
            var RTCPeerConnection = /*window.RTCPeerConnection ||*/ window.webkitRTCPeerConnection || window.mozRTCPeerConnection;

            if (RTCPeerConnection) (function () {
                var rtc = new RTCPeerConnection({iceServers:[]});
                if (1 || window.mozRTCPeerConnection) {      // FF [and now Chrome!] needs a channel/stream to proceed
                    rtc.createDataChannel('', {reliable:false});
                };

                rtc.onicecandidate = function (evt) {
                    // convert the candidate to SDP so we can run it through our general parser
                    // see https://twitter.com/lancestout/status/525796175425720320 for details
                    if (evt.candidate) grepSDP("a="+evt.candidate.candidate);
                };
                rtc.createOffer(function (offerDesc) {
                    grepSDP(offerDesc.sdp);
                    rtc.setLocalDescription(offerDesc);
                }, function (e) { console.warn("offer failed", e); });


                var addrs = Object.create(null);
                addrs["0.0.0.0"] = false;
                function updateDisplay(newAddr) {
                    if (newAddr in addrs) return;
                    else addrs[newAddr] = true;
                    var displayAddrs = Object.keys(addrs).filter(function (k) { return addrs[k]; });
                    document.getElementById('ip').textContent = displayAddrs.join(" or perhaps ") || "n/a";
                }

                function grepSDP(sdp) {
                    var hosts = [];
                    sdp.split('\r\n').forEach(function (line) { // c.f. http://tools.ietf.org/html/rfc4566#page-39
                        if (~line.indexOf("a=candidate")) {     // http://tools.ietf.org/html/rfc4566#section-5.13
                            var parts = line.split(' '),        // http://tools.ietf.org/html/rfc5245#section-15.1
                                addr = parts[4],
                                type = parts[7];
                            if (type === 'host') updateDisplay(addr);
                        } else if (~line.indexOf("c=")) {       // http://tools.ietf.org/html/rfc4566#section-5.7
                            var parts = line.split(' '),
                                addr = parts[2];
                            updateDisplay(addr);
                        }
                    });
                }
            })(); else {
                document.getElementById('list').innerHTML = "<code>ifconfig | grep inet | grep -v inet6 | cut -d\" \" -f2 | tail -n1</code>";
                document.getElementById('list').nextSibling.textContent = "In Chrome and Firefox your IP should display automatically, by the power of WebRTCskull.";
            }

            </script>-->

    </body>
    
</html>