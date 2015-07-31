<?php
include "../../inc/config.php";
$tables = $db->fetch_custom("show columns from ".$_GET['table']);
$tabled = $db->fetch_custom("show columns from ".$_GET['table']);
$table = $db->fetch_custom("show columns from ".$_GET['table']);
?>
 Primary Key <select name="isi_remote_primary" class="form-control">
  <?php foreach ($tables as $tab) {
    echo "<option value='$tab->Field'>".$_GET['table'].".$tab->Field</option>";
  }
  ?>

</select>

 Field File Name <select name="isi_remote_name" class="form-control">
  <?php foreach ($tabled as $tab) {
    echo "<option value='$tab->Field'>".$_GET['table'].".$tab->Field</option>";
  }
  ?>

</select>


 Foreign Key <select name="isi_remote_key" class="form-control">
  <?php foreach ($table as $tab) {
    echo "<option value='$tab->Field'>".$_GET['table'].".$tab->Field</option>";
  }
  ?>

</select>

