<?php
	require_once('conexionMySQLI.php');
	$cedula = $_POST['cedula'] ;
	//$cedula= 18621537;
	$sqlConsultaPersona = "SELECT * FROM electores_nacional WHERE cedula = $cedula";
	$resultadoConsultaPersona = $mysqli->query($sqlConsultaPersona);
	$persona=$resultadoConsultaPersona->fetch_object();
	echo json_encode($persona);

?>