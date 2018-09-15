<?php

$data = file_get_contents("../data-1.json");
$data = json_decode($data, true);



$tabla="";

        for($i=0;$i<count($data);$i++){
          //  $data2=$data[$i];
          //  echo $data2[3]."<-";
            $tabla.="<div class='thumbnail height=100'><table><tr><td><img src='img/home.jpg'  width='100' height='72' /></td><td>ID:".$data[$i]["Id"]."</td><td>Dirccion: ".$data[$i]["Direccion"]."</td><td>Ciudad:".$data[$i]["Ciudad"]."</td><td>Telefono:".$data[$i]["Telefono"]."</td><td>Cod.Postal: ".$data[$i]["Codigo_Postal"]."</td><td>Direccion:".$data[$i]["Direccion"]."</td><td>Tipo:".$data[$i]["Tipo"]."</td><td>".$data[$i]["Precio"]."</td></tr></table></div>";
        }




echo $tabla;        

?>