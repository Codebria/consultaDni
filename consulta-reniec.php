<?php
/*
*By: Edsn  http://codebria.com
*/
$ruta = "...";
$token = "...";
$consultadni = $_POST["dni"];
//$consultadni = '45899134';
$data = array(
	"token" => $token,
	"dni" => $consultadni
);

$data_json = json_encode($data);

//invocamos el servicio de reniec
//sirve para realizar acciones sobre archivos que hay en URLs de Internet
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $ruta);
curl_setopt(
	$ch, CURLOPT_HTTPHEADER, array(
		'Content-Type: application/json',
	)
);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_json);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$respuesta  = curl_exec($ch);
curl_close($ch);

$respuesta_c = json_decode($respuesta, true);
if (isset($respuesta_c["errors"])) {
	echo $respuesta_c["errors"];
}else{
	print_r($respuesta);
}
