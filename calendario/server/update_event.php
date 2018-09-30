<?php
 	require('./conexion.php');
	$con = new Conexion();
	$response['conexion'] = $con->initConexion($con->database);
	if($response['conexion'] == 'OK'){
				$data['eve_id'] = '"'.$_POST['id'].'"';
			    $data['eve_fechaini'] = '"'.$_POST['start_date'].'"';
			    $data['eve_horaini'] = '"'.$_POST['start_hour'].'"';
			    $data['eve_fechater'] = '"'.$_POST['end_date'].'"';
			    $data['eve_horater'] = '"'.$_POST['end_hour'].'"';

					if($data['id'] != 'undefined'){
						$resultado = $con->actualizarRegistro('evento', $data, 'eve_id ='.$data['eve_id']); 
						$response['msg'] = 'OK';
					}else{
						$response['msg'] = "Ha ocurrido un error al actualizar el evento";
					}
	}else{
		    $response['msg'] = "Error en la comunicacion con la base de datos";
	}
	echo json_encode($response);
	$con->cerrarConexion()


 ?>
