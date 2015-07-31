<?php
session_check_adm();
switch ($path_act) {
	case "tambah":
          include "group_user_add.php";
		break;
	case "edit":
		$data_edit = $db->fetch_single_row("sys_group_users","id",$path_id);
		          include "group_user_edit.php";

		break;
      case "detail":
    $data_edit = $db->fetch_single_row("sys_group_users","id",$path_id);
    include "group_user_detail.php";
    break;
	default:
		include "group_user_view.php";
		break;
}

?>