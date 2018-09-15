<?php

    function unico_array($array, $clave) {
        $array1 = array();      
        for($i=0;$i<count($array);$i++){
              $array1[$i]=$array[$i][$clave];
        }
        return array_unique($array1); 
    }
    
    
    function Unicos($data,$Clave){
              return unico_array($data,$Clave);
    }
     
    $data = file_get_contents("../data-1.json");
    $data2 = json_decode($data, true);
    
    $Ciudades=Unicos($data2,"Ciudad");
    $Tipo=Unicos($data2,"Tipo");
   
    $Respuesta['Ciudades']=$Ciudades;
    $Respuesta['Tipo']=$Tipo;
    echo json_encode($Respuesta);



