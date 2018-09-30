<?php
    require('./conexion.php');
    $con = new Conexion();
    $response['conexion'] = $con->initConexion($con->database);
    $data['eve_titulo'] = '"'.$_POST['titulo'].'"';
    $data['eve_fechaini'] = '"'.$_POST['start_date'].'"';
    $data['eve_horaini'] = '"'.$_POST['start_hour'].':00"';
    $data['eve_fechater'] = '"'.$_POST['end_date'].'"';
    $data['eve_horater'] = '"'.$_POST['end_hour'].':00"'; 
    $data['eve_dia'] = $_POST['allDay'];
    $data['eve_usu_id'] = '"'.$_SESSION['id'].'"';
    if($con->Insert('evento', $data)){ 
        $resultado = $con->consultar(['evento'],['max(eve_id)']); 
        while($fila = $resultado->fetch_assoc()){
          $response['id']=$fila['MAX(eve_id)']; 
        }
        $response['msg'] = 'OK';
    }else{
        $response['msg'] = "Error insertar";
    }
    echo json_encode($response);


 ?>
