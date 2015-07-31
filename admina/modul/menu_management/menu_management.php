<?php
session_check_adm();
switch ($path_act) {
	default:
		include "menu_management_view.php";
		break;
}

?>