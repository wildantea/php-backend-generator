<?php
session_start();
include "../../inc/config.php";
switch ($_GET["act"]) {
		case "up_prof":
	 $data = array("first_name"=>$_POST["first_name"],"last_name"=>$_POST["last_name"],"username"=>$_POST["username"],"email"=>$_POST["email"],);
   
   
                         if(isset($_FILES["foto_user"]["name"])) {
                        if (!preg_match("/.(png|jpg|jpeg|gif|bmp)$/i", $_FILES["foto_user"]["name"]) ) {

							echo "pastikan file yang anda pilih gambar";
							exit();

						} else {
                       $db->compressImage($_FILES["foto_user"]["type"],$_FILES["foto_user"]["tmp_name"],"../../../upload/user/",$_FILES["foto_user"]["name"],200);
						if (file_exists("../../../upload/user/".$db->fetch_single_row("sys_users","id",$_POST["id"])->foto_user)) {
							$db->deleteDirectory("../../../upload/user/".$db->fetch_single_row("sys_users","id",$_POST["id"])->foto_user);
						}
							
						$foto_user = array("foto_user"=>$_FILES["foto_user"]["name"]);
							$data = array_merge($data,$foto_user);
						}

                         }
   

    
		$up = $db->update("sys_users",$data,"id",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false; 
		}
		break;
	case "delete":
		$db->delete("sys_users","id",$_GET["id"]);
		break;
	case "up":
	$data = array('id'=>$_SESSION['id_user'],'password'=>md5($_POST['password']));
	$check = $db->check_exist('sys_users',$data);
		if ($check==true) {
			 $data = array("password"=>md5($_POST["password_baru"]));
			$up = $db->update("sys_users",$data,"id",$_POST["id"]);
			session_destroy();
		} else {
			echo "false";
		}

		break;
	default:
		# code...
		break;
}

?>