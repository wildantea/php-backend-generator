<?php
session_check_adm();
switch ($path_act) {
	case "tambah":
         include "user_management_add.php";
		break;
  case 'reset':
    $data_edit = $db->fetch_single_row("sys_users","id",$path_id);
        include "user_reset.php";
    break;
	case "edit":
		$data_edit = $db->fetch_single_row("sys_users","id",$path_id);
		   include "user_management_edit.php";
		break;
      case "detail":
    $data_edit = $db->fetch_single_row("sys_users","id",$path_id);
    include "user_management_detail.php";
    break;
	default:
		include "user_management_view.php";
		break;
}

?>