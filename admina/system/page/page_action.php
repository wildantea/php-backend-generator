<?php
session_start();
include "../../inc/config.php";
session_check_adm();
switch ($_GET['act']) {
	case 'in':
		$nav_act = strtolower(str_replace(" ", "_", $_POST['page_name']));
		$data = array(
			'page_name'=>$_POST['page_name'],
			'nav_act'=>$nav_act,
			'modul_id'=>$_POST['modul_id']
			);
		$in = $db->insert('sys_menu',$data);
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case 'delete':
	$db->deleteDirectory("../../modul/".$db->fetch_single_row('sys_menu','id',$_GET['id'])->nav_act);
	$db->deleteDirectory("../../../upload/".$db->fetch_single_row('sys_menu','id',$_GET['id'])->nav_act);
		$db->delete('sys_menu_role','id_menu',$_GET['id']);
		$db->delete('sys_menu','id',$_GET['id']);

		break;
	case 'up':
		$data = array(
			'page_name'=>$_POST['page_name'],
			'urutan_menu'=>$_POST['urutan'],
			'modul_id'=>$_POST['modul_id']
			);
		$up = $db->update('sys_menu',$data,'id',$_POST['id']);
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