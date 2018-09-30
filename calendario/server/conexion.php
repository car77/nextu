<?php 
session_start();

class Conexion{
		private $host = 'localhost';
		private $user = 'root';
		private $pass = '';
		public $database = 'agenda';
		public $conexion;
		
	function verifyConexion() { 
	    $init = @$this->conexion = new mysqli($this->host, $this->user, $this->pass); 
	    if( ! $this->conexion ){ 
	      $conexion['msg'] = "<h3>Error base de datos conexion 1.</h3>";
	    }
	   		 echo json_encode($conexion); 
	  }

	function initConexion($nombre_db){
	  	$this->conexion = new mysqli($this->host, $this->user, $this->password, $nombre_db);
	  	if ($this->conexion->connect_error) {
	  		return $this->conexión->connect_errno;
	  	}else{
	  		return "OK";
	  	}
	}

	function userSession(){
	  	if (isset($_SESSION['email'])) {
	  		$response['msg'] = $_SESSION['email'];
	  	}else{
	  		$response['msg'] = '';
	  	}
	  	return json_encode($response);
	}
/*
	function Existe(){
	  	$sql = 'SELECT COUNT(email) FROM usuarios';
	  	$totalUsers = $this->ejecutarQuery($sql);
	  	$row = $totalUsers->fetch_assoc();
  		return $row['COUNT(email)'];
	  	
	}
*/
	function getConexion(){
	  	return $this->conexion;
	}
	function ejecutarquery($query){
	  	return $this->conexion->query($query);
	}
	function cerrarConexion(){
	  	$this->conexion->close();
	}

	
  function Insert($tabla, $data){
     $sql = 'INSERT INTO '.$tabla.' (';
     $i = 1;
     foreach ($data as $key => $value) {
       $sql .= $key;
       if ($i<count($data)) {
          $sql .= ', ';
       }else $sql .= ')';
       $i++;
      }
     $sql .= ' VALUES (';
     $i = 1;
     foreach ($data as $key => $value) {
       $sql .= $value;
       if ($i<count($data)) {
         $sql .= ', ';
       }else $sql .= ');';
       $i++;
     }
     return $this->ejecutarQuery($sql);
}

 
  function actualizarRegistro($tabla, $data, $condicion){
    $sql = 'UPDATE '.$tabla.' SET ';
    $i=1;
    foreach ($data as $key => $value) {
      $sql .= $key.'='.$value;
      if ($i<sizeof($data)) {
        $sql .= ', ';
      }else $sql .= ' WHERE '.$condicion.';';
      $i++;
    }
  
    return $this->ejecutarQuery($sql);
  }

  
  function Delete($tabla, $condicion){
    $sql = "DELETE FROM ".$tabla." WHERE ".$condicion.";";
    return $this->ejecutarQuery($sql);
  }

  
  function consultar($tablas, $campos, $condicion = ""){
    $sql = "SELECT ";
    $result = array_keys($campos);
    $ultima_key = end($result);
    foreach ($campos as $key => $value) {
      $sql .= $value;
      if ($key!=$ultima_key) {
        $sql.=", ";
      }else $sql .=" FROM ";
    }

    $result = array_keys($tablas);
    $ultima_key = end($result);
    foreach ($tablas as $key => $value) {
      $sql .= $value;
      if ($key!=$ultima_key) {
        $sql.=", ";
      }else $sql .= " ";
    }

    if ($condicion == "") {
      $sql .= ";";
    }else {
      $sql .= $condicion.";";
    }
    //echo $sql;
    return $this->ejecutarQuery($sql);
  }
 

}



 ?>