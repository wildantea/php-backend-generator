<?php
session_start();
include "../../inc/config.php";
session_check_adm();
switch ($_GET["act"]) {
	case "in":
	$data = array("level"=>$_POST["level"],"deskripsi"=>$_POST["deskripsi"],);

		$in = $db->insert("sys_group_users",$data);

	  $last_id= $db->get_last_id();  

		$db->fetch_custom("insert into sys_menu_role(id_menu,group_id,read_act,insert_act,update_act,delete_act)
select sys_menu.id,".$last_id.",'N','N','N','N' from sys_menu");
		
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case "delete":
		$db->delete("sys_group_users","id",$_GET["id"]);
		$db->delete("sys_menu_role",'group_id',$_GET['id']);
		break;
	case "up":
	 $data = array("level"=>$_POST["level"],"deskripsi"=>$_POST["deskripsi"],);
   
   
   

    
		$up = $db->update("sys_group_users",$data,"id",$_POST["id"]);
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