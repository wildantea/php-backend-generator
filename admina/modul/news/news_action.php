<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("username"=>$_POST["username"],"judul"=>$_POST["judul"],);
  
  
  
   
		$in = $db->insert("berita",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("berita","id",$_GET["id"]);
		break;
	case "up":
	 $data = array("username"=>$_POST["username"],"judul"=>$_POST["judul"],);
   
   
   

    
		$up = $db->update("berita",$data,"id",$_POST["id"]);
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