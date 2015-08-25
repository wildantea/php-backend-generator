<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "in":
  
  
  
	$data = array("page_name"=>$_POST["page_name"],"icon"=>$_POST["icon"],"urutan_menu"=>$_POST["urutan_menu"],"parent"=>$_POST["parent"],);
  
  
  
   if(isset($_POST["tampil"])=="on")
		{
			$tampil = array("tampil"=>"Y");
			$data=array_merge($data,$tampil);
		} else { 
			$tampil = array("tampil"=>"N");
			$data=array_merge($data,$tampil);
		}
		$in = $db->insert("sys_menu",$data);
    
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
    
    
    
		$db->delete("sys_menu","id",$_GET["id"]);
		break;
	case "up":
	 $data = array("page_name"=>$_POST["page_name"],"icon"=>$_POST["icon"],"urutan_menu"=>$_POST["urutan_menu"],"parent"=>$_POST["parent"],);
   
   
   

    if(isset($_POST["tampil"])=="on")
		{
			$tampil = array("tampil"=>"Y");
			$data=array_merge($data,$tampil);
		} else { 
			$tampil = array("tampil"=>"N");
			$data=array_merge($data,$tampil);
		}
		$up = $db->update("sys_menu",$data,"id",$_POST["id"]);
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