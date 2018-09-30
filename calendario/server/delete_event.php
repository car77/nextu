<?php
	require('conexion.php');
	$con = new Conexion();
	$response['conexion'] = $con->initConexion($con->database);
	if ($con->Delete('evento', 'eve_id='.$_POST['id'])) {
			$response['msg'] = 'OK';
	}else{
			$response['msg'] = 'No se a podido eliminar el registro';
	}
	
	echo json_encode($response)


 ?>
