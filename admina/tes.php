<?php

echo __FILE__;
include "inc/config.php";

$data=array('id_jur'=>14,'nama_siswa'=>'wildan','id'=>1);
$db->fetch_custom("update siswa set id_jur=?,nama_siswa=? where id=?",$data);

?>