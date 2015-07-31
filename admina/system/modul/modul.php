<?php
session_check_adm();
switch ($path_act) {
	case 'tambah':
		include "modul_add.php";
		break;
	case 'edit':
		$data_edit = $db->fetch_single_row('sys_modul','id',$path_id);
		include "modul_edit.php";
		break;
	case 'detail':
		$data_edit = $db->fetch_single_row('sys_modul','id',$path_id);
		include "modul_detail.php";
		break;
	case 'icon':
		include "modul_icon.php";
		break;
	default:
		include "modul_view.php";
		break;
}

?>