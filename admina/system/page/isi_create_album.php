<?php
include "../../inc/config.php";
$tables = $db->fetch_custom("show columns from ".$_GET['table']);
$tabled = $db->fetch_custom("show columns from ".$_GET['table']);
$table = $db->fetch_custom("show columns from ".$_GET['table']);
?>

<div class="form-group">
<label class="control-label col-lg-2">&nbsp;</label>
<div class="col-lg-10">


 Primary Key <select name="album_primary" class="form-control">
  <?php foreach ($tables as $tab) {
  	if ($tab->Key=='PRI') {
    echo "<option value='$tab->Field'>".$_GET['table'].".$tab->Field</option>";
	}	
  }
  ?>

</select>

 Field Nama Album <select name="album_name" class="form-control">
  <?php foreach ($tabled as $tab) {
  	 if ($tab->Key!='PRI') {
    echo "<option value='$tab->Field'>".$_GET['table'].".$tab->Field</option>";
  }
}
  ?>

</select>


 Field Deskripsi Album <select name="deskripsi_album" class="form-control">
  <?php foreach ($table as $tab) {
  	 if ($tab->Key!='PRI') {
    echo "<option value='$tab->Field'>".$_GET['table'].".$tab->Field</option>";
  }
}
  ?>

</select>
</div>
</div>



<div class="form-group">
<label class="control-label col-lg-2">Foreign Table / List Foto</label>
<div class="col-lg-10">
        <select id="foreign_album" data-placeholder="Pilih Table" onChange="get_foreign_album(this.value)" name="foreign_album" class="form-control chzn-select" tabindex="2">
        <?php
$table = $db->fetch_custom("show table status where Name!=?",array('Name'=>$_GET['table']));
         foreach ($table as $tb) {
          echo "<option value='$tb->Name'>$tb->Name</option>";
        }
        ?>
      </select>

    <div style="margin-bottom:20px" id="isi_foreign"></div>
                   
</div>
</div>

<div class="form-group">
<label class="control-label col-lg-2">Rename Uploaded Foto</label>
<div class="col-lg-10">
 <input name="rename_foto" class="make-switch" data-on-text="Yes" data-off-text="No" type="checkbox" data-on-color="info" data-off-color="danger">
</div>
</div>

<script>
$(function(){
	 //chosen select
    $(".chzn-select").chosen();
    $(".chzn-select-deselect").chosen({
        allow_single_deselect: true
    });

                   $.each($('.make-switch'), function () {
        $(this).bootstrapSwitch({
            onText: $(this).data('onText'),
            offText: $(this).data('offText'),
            onColor: $(this).data('onColor'),
            offColor: $(this).data('offColor'),
            size: $(this).data('size'),
            labelText: $(this).data('labelText')
        });
    });
});
  

</script>