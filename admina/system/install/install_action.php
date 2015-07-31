<?php
include "../../inc/config.php";
switch ($_GET['act']) {
    case 'in':
        $dbs = file_get_contents('../../../db.sql');
                
        $sql = '';
        
        foreach (explode(";\n", $dbs) as $query) {
            $sql = trim($query);
            
            if($sql) {
                $db->fetch_custom($sql);
            } 
        }
        echo "good";
        break;
    case 'del':
        $db->fetch_custom("drop table sys_menu_role;drop table sys_users;drop table sys_menu;drop table sys_modul;drop table sys_group_users");
        break;
}


?>
