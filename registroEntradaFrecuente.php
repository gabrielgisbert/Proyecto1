<?php
$db_host="10.31.3.98";
$db_user="registroES";
$db_password="registroES";
$db_name="registro";
$db_table_name="registroentradasalida";
$db_connection = mysql_connect($db_host, $db_user, $db_password);

$link = mysql_connect($db_host,$db_user, $db_password);
mysql_select_db($db_name, $link);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}

$id = $_POST['iddni'];

$query="SELECT * FROM ".$db_table_name." WHERE dni LIKE '".$id."' ORDER BY id DESC LIMIT 1";

$resultado = mysql_query($query);
if ($resultado)
while($renglon = mysql_fetch_array($resultado))
{

        $subs_name = utf8_decode($renglon['nombre']);
        $subs_apellidos = utf8_decode($renglon['apellidos']);
        $subs_dni = utf8_decode($renglon['dni']);
        $subs_procedencia = utf8_decode($renglon['procedencia']);
        $subs_movil = utf8_decode($renglon['movil']);
        $subs_centroDestino = utf8_decode($renglon['destino']);
        $subs_contact = utf8_decode($renglon['contactodestino']);
}




if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
    $ip = $_SERVER['HTTP_CLIENT_IP'];
} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
    $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
} else {
    $ip = $_SERVER['REMOTE_ADDR'];
}
$subs_ip = $ip;
$time = new \DateTime();
$time = date("Y-m-d H:i:s");


if ($resultado)
{
    $insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nombre` ,`apellidos`, `ipentrada`, `contactodestino` , `dni` , `procedencia`, `movil`, `destino`, `entrada`) VALUES ("' . $subs_name . '" ,"'. $subs_apellidos.'" , "' . $subs_ip.'", "'. $subs_contact. '", "' . $subs_dni . '", "' . $subs_procedencia . '" , " ' . $subs_movil .'","' .$subs_centroDestino . '" , "'. $time.'")';
    mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);
}




if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
header('Location: index.php');


mysql_close($db_connection);
		
?>