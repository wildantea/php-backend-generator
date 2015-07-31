<?php

switch ($path_act) {
	case 'tambah':
		include "modul_add.php";
		break;
	case 'edit':
		$data_edit = $db->fetch_single_row('sys_modul','id',$path_id);
		include "modul_edit.php";
		break;
	default:
		include "install_view.php";
		break;
}

?>