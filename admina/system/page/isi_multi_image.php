<?php
include "../../inc/config.php";
$table = $db->fetch_custom("show table status where Name!=?",array('Name'=>$_GET['prev_tb']));
?>

Remote Table <select onChange="change_key(this.value)" name="remote_key" class="form-control">
  <option>Pilih Table</option>
  <?php foreach ($table as $tab) {
    echo "<option value='$tab->Name'>$tab->Name</option>";
  }
  ?>
</select>
<div id="isi_remote_key"></div>
