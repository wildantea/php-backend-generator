<?php
include "../../inc/config.php";
switch ($_GET["act"]) {
	case "in"://add new album & upload foto
	$data = array("judul_album"=>$_POST["judul_album"],"deskripsi_album"=>$_POST["deskripsi_album"]);
		$in = $db->insert("tb_album",$data);
	$id_akhir=$db->get_last_id();
	if (!is_dir("../../../upload/foto_tb_album")) {
	mkdir("../../../upload/foto_tb_album");
	}
	for ($i=0; $i <count($_FILES["foto_banyak"]["name"]) ; $i++) { 
 		 if (!preg_match("/.(jpg|png|jpeg|gif|bmp)$/i", $_FILES["foto_banyak"]["name"][$i]) ) {
							echo "pastikan file yang anda pilih jpg|png|jpeg|gif|bmp";
							exit();
						} else {
$filename = $_FILES["foto_banyak"]["name"][$i];
$filename = preg_replace("#[^a-z.0-9]#i", "", $filename); 
$ex = explode(".", $filename); // split filename
$fileExt = end($ex); // ekstensi akhir
 $filename = time().rand().".".$fileExt;//rename nama file
move_uploaded_file($_FILES["foto_banyak"]["tmp_name"][$i], "../../../upload/foto_tb_album/".$filename);
$db->insert("tb_foto",array("file_foto"=>$filename,"id_album"=>$id_akhir));
						}
 	}
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break; //delete album
	case "hapus_album":
		foreach ($db->fetch_custom("select * from tb_foto where id=?",array("id"=>$_GET["id"])) as $key) {
			$db->deleteDirectory("../../../upload/foto_tb_album/".$key->file_foto);
		}
		$db->delete("tb_album","id",$_GET["id"]);
		break;
		//update desc foto
	case "up_desc":
		$up=$db->update("tb_foto",array("deskripsi_foto"=>$_POST["deskripsi_foto"]),"id",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false;
		}
		break;
		//up album name & desc
	case "up_name":
		$data = array("judul_album"=>$_POST["judul_album"],"deskripsi_album"=>$_POST["deskripsi_album"],);
		$up = $db->update("tb_album",$data,"id",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	//upload tambahan foto di album
	case "up":
$images = array();
	for ($i=0; $i <count($_FILES["foto_banyak"]["name"]) ; $i++) { 
 		 if (!preg_match("/.(jpg|png|jpeg|gif|bmp)$/i", $_FILES["foto_banyak"]["name"][$i]) ) {
$images = array("error"=>"pastikan file yang anda pilih jpg|png|jpeg|gif|bmp");
						} else {
$filename = $_FILES["foto_banyak"]["name"][$i];
$filename = preg_replace("#[^a-z.0-9]#i", "", $filename); 
$ex = explode(".", $filename); // split filename
$fileExt = end($ex); // ekstensi akhir
 $filename = time().rand().".".$fileExt;//rename nama file		
move_uploaded_file($_FILES["foto_banyak"]["tmp_name"][$i], "../../../upload/foto_tb_album/".$filename);
$db->insert("tb_foto",array("file_foto"=>$filename,"id_album"=>$_POST["id"]));
$images[] = "../../../../upload/foto_tb_album/".$filename;
						}
 	}
?>
<script type="text/javascript">
  window.parent.Uploader.done('<?php echo json_encode($images); ?>');
  </script>
<?php
		break;
case "hapus_foto":
	$db->deleteDirectory("../../../upload/foto_tb_album/".$db->fetch_single_row("tb_foto","id",$_GET["id"])->file_foto);
		$db->delete("tb_foto","id",$_GET["id"]);
	break;
	default:
		# code...
		break;
}
?>