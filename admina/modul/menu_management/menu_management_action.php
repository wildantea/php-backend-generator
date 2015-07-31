<?php
session_start();
include "../../inc/config.php";
session_check_adm();
switch ($_GET["act"]) {
	
	case 'change_read':
		$db->update('sys_menu_role',array('read_act'=>$_POST['data_act']),'id',$_POST['role_id']);
		break;

	case 'change_insert':
		$db->update('sys_menu_role',array('insert_act'=>$_POST['data_act']),'id',$_POST['role_id']);
		break;

	case 'change_update':
		$db->update('sys_menu_role',array('update_act'=>$_POST['data_act']),'id',$_POST['role_id']);
		break;

	case 'change_delete':
		$db->update('sys_menu_role',array('delete_act'=>$_POST['data_act']),'id',$_POST['role_id']);
		break;

	case "delete":
		$db->delete("sys_menu_role","id",$_GET["id"]);
		break;
		
	default:
		# code...
		break;
}

?>