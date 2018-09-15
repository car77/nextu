<?php

$data = file_get_contents("../data-1.json");
$data = json_decode($data, true);


    $data2=array();
    $j=0;

         for($i=0;$i<count($data);$i++){
        
           $ciudad1=$_REQUEST["selectCiudad"];
           $tipo1=$_REQUEST["selectTipo"];
           $rangoprecio1=$_REQUEST["rangoPrecio"];
           $rangoprecio2= explode(";", $rangoprecio1);
           $precio1=str_replace("$","",$data[$i]["Precio"]);
           $precio1=str_replace(",","",$precio1);

           if(($data[$i]["Ciudad"]==$ciudad1) and ($data[$i]["Tipo"]==$tipo1) and ($rangoprecio2[0]<=$precio1 and $rangoprecio2[1]>=$precio1) ) {
               $data2[$j]=$data[$i];
               $j++;
            }
           if(($data[$i]["Ciudad"]==$ciudad1) and ($tipo1=='')  and ($rangoprecio2[0]<=$precio1 and $rangoprecio2[1]>=$precio1)) {
               $data2[$j]=$data[$i];
               $j++;
            }  
           if(($ciudad1=='') and ($data[$i]["Tipo"]==$tipo1)  and ($rangoprecio2[0]<=$precio1 and $rangoprecio2[1]>=$precio1)) {
               $data2[$j]=$data[$i];
               $j++;
            }  
           if($ciudad1=='' and  $tipo1=='' and ($rangoprecio2[0]<=$precio1 and $rangoprecio2[1]>=$precio1)) {
               $data2[$j]=$data[$i];
               $j++;
            }                                               
         }
       
   


echo json_encode($data2);

?>