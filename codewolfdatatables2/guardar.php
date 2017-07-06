<?php

	include ("conexion.php");

	$opcion = $_POST["opcion"];
	$idusuario = $_POST["idusuario"];
	$nombre = utf8_decode($_POST["nombre"]);
	$apellidos = utf8_decode($_POST["apellidos"]);
	$dni = $_POST["dni"];	
	
	if( $opcion == "" )	$opcion = "registrar";

	if( $nombre == "" || $apellidos == "" || $dni == "" )
		echo 4; //llenar todos los campos de texto.
	else{

		switch ( $opcion ) {
			case 'registrar':
					$existe = existe_usuario($nombre, $apellidos, $dni, $conexion);
					if( $existe > 0 )
						echo 3;//usuario, ya existe
					else	
						registrar($nombre, $apellidos, $dni, $conexion);				
				break;
			
			case 'modificar':
					modificar($idusuario, $nombre, $apellidos, $dni, $conexion);
				break;
		}
	}

	/*=========================== FUNCIONES ==============================*/		

	function existe_usuario($nombre, $apellidos, $dni, $conexion){
		$query = "SELECT idusuario FROM usuario WHERE dni = '$dni';";
		$resultado = mysqli_query($conexion, $query);
		$existe_usuario = mysqli_num_rows( $resultado );
		return $existe_usuario;
	}

	function registrar($nombre, $apellidos, $dni, $conexion){
		$query = "INSERT INTO usuario VALUES(0, '$nombre', '$apellidos', '$dni', true);";
		$resultado = mysqli_query($conexion, $query);		
		verificar_resultado($resultado);
		cerrar($conexion);
	}

	function modificar($idusuario, $nombre, $apellidos, $dni, $conexion){
		$query = "UPDATE usuario SET nombre = '$nombre', apellidos = '$apellidos', dni = '$dni' WHERE idusuario = $idusuario; ";
		$resultado = mysqli_query($conexion, $query);		
		verificar_resultado($resultado);
		cerrar($conexion);
	}

	function verificar_resultado($resultado){
		if( !$resultado )
			echo 2;//error
		else
			echo 1;//bien
	}

	function cerrar( $conexion){		
		mysqli_close( $conexion );
	}

