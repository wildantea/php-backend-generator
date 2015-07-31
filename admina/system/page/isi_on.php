<?php
include "../../inc/config.php";
$table = $db->fetch_custom("show columns from ".$_GET['tb']);
$tabs = $db->fetch_custom("show columns from ".$_GET['tb']);
$col = $_GET['col'];
?>
 on Name <select name="on_name[<?=$col?>]" id="on_name[<?=$col->Field;?>]" class="form-control">
  <?php foreach ($table as $tab) {
    echo "<option value='".$_GET['tb'].".$tab->Field'>".$_GET['tb'].".$tab->Field</option>";
  }
  ?>

</select>
  on Value <select name="on_value[<?=$col;?>]" class="form-control">
  <?php foreach ($tabs as $tab) {
    echo "<option value='".$_GET['tb'].".$tab->Field'>".$_GET['tb'].".$tab->Field</option>";
  }
  ?>

</select>
