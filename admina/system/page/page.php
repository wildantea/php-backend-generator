<?php
session_check_adm();
switch ($path_act) {
	case 'tambah':
		include "page_add.php";
		break;
	case 'edit':
		$data_edit = $db->fetch_single_row('sys_menu','id',$path_id);
		include "page_edit.php";
		break;
	case 'icon':
		include "icon.php";
		break;
	default:
		include "page_view.php";
		break;
}

?>