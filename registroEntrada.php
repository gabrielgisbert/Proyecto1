<?php
$db_host="10.31.3.98";
$db_user="registroES";
$db_password="registroES";
$db_name="registro";
$db_table_name="registroentradasalida";
$db_connection = mysql_connect($db_host, $db_user, $db_password);

if (!$db_connection) {
	die('No se ha podido conectar a la base de datos');
}

$subs_name = utf8_decode($_POST['nombre']);
$subs_apellidos = utf8_decode($_POST['apellidos']);
$subs_dni = utf8_decode($_POST['dni']);
$subs_procedencia = utf8_decode($_POST['procedencia']);
$subs_movil = utf8_decode($_POST['movil']);
$subs_centroDestino = utf8_decode($_POST['centroDestino']);
$subs_contact = utf8_decode($_POST['contactodestino']);
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
echo($time);

$insert_value = 'INSERT INTO `' . $db_name . '`.`'.$db_table_name.'` (`nombre` ,`apellidos`, `ipentrada`, `contactodestino` , `dni` , `procedencia`, `movil`, `destino`, `entrada`) VALUES ("' . $subs_name . '" ,"'. $subs_apellidos.'" , "' . $subs_ip.'", "'. $subs_contact. '", "' . $subs_dni . '", "' . $subs_procedencia . '" , " ' . $subs_movil .'","' .$subs_centroDestino . '" , "'. $time.'")';


mysql_select_db($db_name, $db_connection);
$retry_value = mysql_query($insert_value, $db_connection);

if (!$retry_value) {
   die('Error: ' . mysql_error());
}
	
header('Location: index.php');


mysql_close($db_connection);
		
?>