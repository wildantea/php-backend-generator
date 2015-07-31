<?php
function session_check()
{
  if (empty($_SESSION['login'])) {
  exit();
  }
}
//for admin only
function session_check_adm()
{
  if ($_SESSION['level']!=1) {
  exit();
  }
}
//redirection 
function redirect($var)
{
  header("location:".$var);
}

//base url adalah root directory dari web
function base_url()
{
	$root='';
	$root = "http://".$_SERVER['HTTP_HOST'];
  $root .= "/".DIR_MAIN;
	return $root;
}

//base admin adalah url sampai folder admin, ex:http://localhost/backend/admina
function base_admin()
{
  $root='';
  $root = "http://".$_SERVER['HTTP_HOST'];
  $root .= "/".DIR_ADMIN;
  return $root;
}
//base admin adalah url sampai folder admin, ex:http://localhost/backend/admina
function base_index()
{
	$root='';
	$root = "http://".$_SERVER['HTTP_HOST'];
	$root .= str_replace(basename($_SERVER['SCRIPT_NAME']),"",$_SERVER['SCRIPT_NAME']);
	$root .='index.php/';
	return $root;
}

?>