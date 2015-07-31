<?php
session_start();
include "inc/config.php";
require_once "inc/fungsi.php";
if (isset($_SESSION['login'])) {

//call header file
include  "header.php";
//switch for static menu 
switch ($path_url) {
	case '':
		include "modul/home/home.php";
		break;
	//begin case system menu
		//show only if user is admin 
	case 'modul':
		include "system/modul/modul.php";
		break;
	case 'install':
		include "system/install/install.php";
		break;
	case 'page':
		include "system/page/page.php";
		break;
	case 'menu-management':
		include "modul/menu_management/menu_management.php";
	break;
	case 'group-user':
		include "modul/group_user/group_user.php";
		break;
	case 'user-management':
		include "modul/user_management/user_management.php";
		break;
	//end case system menu
	case 'change-password':
		include "modul/change_password/change_pass.php";
		break;
	case 'profil':
		include "modul/profil/profil.php";
		break;
	
	/*default:
		include "modul/home/home.php";
		break;*/
}

     //dynamic menu sesuai dengan role user 
	//jika url yang di dipanggil ada di role user, include page  
	foreach ($db->fetch_all('sys_menu') as $isi) {
		if (in_array($isi->url, $role_user)) {
               		if ($path_url==$isi->url) {
               		
					include "modul/".$isi->nav_act."/".$isi->nav_act.".php";
					} 
               } 
	}
	

include "footer.php";

} else {
	redirect(base_admin()."login.php");
}
?>
