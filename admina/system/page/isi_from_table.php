<?php
include "../../inc/config.php";
$table = $db->fetch_custom("show table status");
$col = $_GET['col'];
?>

  From <select onChange="from_table(this.value,'<?=$col;?>')" name="from[<?=$col?>]" id="from[<?=$col;?>]" class="form-control">
  <option>Pilih Table</option>
  <?php foreach ($table as $tab) {
    echo "<option value='$tab->Name'>$tab->Name</option>";
  }
  ?>
</select>
<div id="isi_on_<?=$col;?>"></div>
