<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
  case "in":
  
  
  
  $data = array("nama_kegiatan"=>$_POST["nama_kegiatan"],"tanggal"=>$_POST["tanggal"],);
  
  
  
   
    $in = $db->insert("kegiaatan",$data);
    
    if ($in=true) {
      echo "good";
    } else {
      return false;
    }
    break;
  case "delete":
    
    
    
    $db->delete("kegiaatan","id",$_GET["id"]);
    break;
  case "up":
   $data = array("nama_kegiatan"=>$_POST["nama_kegiatan"],"tanggal"=>$_POST["tanggal"],);
   
   
   

    
    $up = $db->update("kegiaatan",$data,"id",$_POST["id"]);
    if ($up=true) {
      echo "good";
    } else {
      return false; 
    }
    break;
  default:
    # code...
    break;
}

?>