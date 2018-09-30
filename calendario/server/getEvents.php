<?php
require('./conexion.php');
$con = new Conexion();
$response['msg'] = $con->initConexion($con->database);
if ($response['msg']=='OK') {
  $resultado = $con->consultar(['evento'],['*'], "WHERE eve_usu_id ='".$_SESSION['id']."'",'');
  $i = 0;
  while($fila = $resultado->fetch_assoc()){
    $response['eventos'][$i]['id']=$fila['eve_id'];
    $response['eventos'][$i]['title']=$fila['eve_titulo'];
    if ($fila['usu_dia'] == 0){ 
      $allDay = false;
      $response['eventos'][$i]['start']=$fila['eve_fechaini'].'T'.$fila['eve_horaini'];
      $response['eventos'][$i]['end']=$fila['eve_fechater'].'T'.$fila['eve_horater'];
    }else{
      $allDay= true;
      $response['eventos'][$i]['start']=$fila['eve_fechaini'];
      $response['eventos'][$i]['end']="";
    }
    $response['eventos'][$i]['allDay']=$allDay;
    $i++;
  }
 $response['getData'] = "OK";
}
echo json_encode($response);


 ?>
