
<?php

include "../../inc/config.php";


$tes=$dtable->get("sys_users", "sys_users.id", array('sys_users.username','sys_users.password',"sys_users.id"),"");


?>