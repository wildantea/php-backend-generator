<?php
include "../../inc/config.php";
$tables = $db->fetch_custom("show columns from ".$_GET['table']);
$tabled = $db->fetch_custom("show columns from ".$_GET['table']);
$table = $db->fetch_custom("show columns from ".$_GET['table']);
$foreign = $db->fetch_custom("show columns from ".$_GET['table']);

?>



Primary Key <select name="foreign_album_primary" class="form-control">
  <?php foreach ($tables as $tab) {
  	if ($tab->Key=='PRI') {
    	echo "<option readonly selected='selected' value='$tab->Field'>".$_GET['table'].".$tab->Field</option>";
 	 }
    
  }
  ?>

</select>

 Field untuk file Foto <select name="foreign_album_nama" class="form-control">
  <?php foreach ($tabled as $tab) {
    if ($tab->Key!='PRI') {
    echo "<option value='$tab->Field'>".$_GET['table'].".$tab->Field</option>";
  }
}
  ?>

</select>


 Field Deskripsi Foto <select name="foreign_album_desc" class="form-control">
  <?php foreach ($table as $tab) {
    if ($tab->Key!='PRI') {
    echo "<option value='$tab->Field'>".$_GET['table'].".$tab->Field</option>";
      }
    }
  ?>

</select>

 Foreign Key Album <select name="foreign_album_id" class="form-control">
  <?php foreach ($foreign as $tab) {
     if ($tab->Key!='PRI') {
    echo "<option value='$tab->Field'>".$_GET['table'].".$tab->Field</option>";
    }
  }
  ?>

</select>

