<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
	case "delete":
		$db->delete("sys_users","id",$_GET["id"]);
		break;
	case "up":
	
	 $data = array("first_name"=>$_POST["first_name"],"last_name"=>$_POST["last_name"],"email"=>$_POST["email"]);
   
   
                         if(isset($_FILES["foto_user"]["name"])) {
                        if (!preg_match("/.(png|jpg|jpeg|gif|bmp)$/i", $_FILES["foto_user"]["name"]) ) {

							echo "pastikan file yang anda pilih gambar";
							exit();

						} else {

$filename = $_FILES["foto_user"]["name"];
$filename = preg_replace("#[^a-z.0-9]#i", "", $filename); 
$ex = explode(".", $filename); // split filename
$fileExt = end($ex); // ekstensi akhir
 $filename = time().rand().".".$fileExt;//rename nama file';
$db->compressImage($_FILES["foto_user"]["type"],$_FILES["foto_user"]["tmp_name"],"../../../upload/back_profil_foto/",$filename,200);
$db->deleteDirectory("../../../../upload/back_profil_foto/".$db->fetch_single_row("sys_users","id",$_POST["id"])->foto_user);
							$foto_user = array("foto_user"=>$filename);
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
	default:
		# code...
		break;
}

?>