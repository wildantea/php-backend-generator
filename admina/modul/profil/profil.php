
<?php
switch ($path_act) {
	case "tambah":
          foreach ($db->fetch_all("sys_menu") as $isi) {
             if ($_SESSION["level"]!=1) {
                      if ($path_url==$isi->url&&$path_act=="tambah") {
                          if ($role_act["insert_act"]=="Y") {
                             include "edit_profil_add.php";
                          } else {
                            echo "permission denied";
                          }
                       } 
              } else {
                include "edit_profil_add.php";
              }

      }
		break;
  case 'change-password':
    include "change_pass.php";
    break;
	case "edit":
    include "profil_edit.php";
              
		break;
      case "detail":
    $data_edit = $db->fetch_single_row("sys_users","id",$path_id);
    include "edit_profil_detail.php";
    break;
	default:
		include "profil_view.php";
		break;
}

?>