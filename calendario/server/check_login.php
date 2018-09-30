<?php
	require('conexion.php');
	$con = new Conexion();
	$response['conexion'] = $con->initConexion($con->database);
	if ($response['conexion']== 'OK') {
		$resultado_consulta = $con->consultar(['usuario'],['usu_mail','usu_password','usu_id'], 'WHERE usu_mail="'.$_POST['username'].'"');
		$fila = $resultado_consulta->fetch_assoc();
		if (password_verify($_POST['password'],$fila['usu_password'])) {
					$response['msg'] = 'OK';
					$response['acceso'] = 'Autorizado';
					$_SESSION['email'] = $fila['usu_mail'];
					$_SESSION['id'] = $fila['usu_id'];
		}else{
					$response['msg'] = 'No Valido';
					$response['acceso'] = 'acceso denegado';
		}
			

	}
		
	echo json_encode($response);
	$con->cerrarConexion();

 ?>
