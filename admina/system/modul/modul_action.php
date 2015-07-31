<?php
session_start();
include "../../inc/config.php";
session_check_adm();
switch ($_GET['act']) {
	case 'in':
	 if(isset($_POST["tampil"])=="on")
		{
			$tampil = "Y";
		} else { 
			$tampil = "N";
		}
	$data = array('modul_name'=>$_POST['modul_name'],'urutan'=>$_POST['urutan'],'tampil'=>$tampil,'icon'=>$_POST['icon']);
		$in = $db->insert('sys_modul',$data);
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	case 'delete':
		$db->delete('sys_modul','id',$_GET['id']);
		break;
	case 'up':

   if(isset($_POST["tampil"])=="on")
		{
			$tampil = "Y";
		} else { 
			$tampil = "N";
		}
		$data = array('modul_name'=>$_POST['modul_name'],'urutan'=>$_POST['urutan'],'tampil'=>$tampil,'icon'=>$_POST['icon']);
		$up = $db->update('sys_modul',$data,'id',$_POST['id']);
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