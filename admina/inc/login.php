<?php
session_start();
include "config.php";
	$data = array(
		'username'=>$_POST['username'],
		'password'=>md5($_POST['password'])
		);
		$dt=$db->fetch_single_row('sys_users','username',$_POST['username']);
		$check = $db->check_exist('sys_users',$data);
		if ($check==true) {
			$_SESSION['level']=$dt->id_group;
			$_SESSION['id_user']=$dt->id;
			$_SESSION['login']=1;
			echo "good";
		}	
?>