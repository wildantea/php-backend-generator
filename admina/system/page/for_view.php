<?php
include "../../inc/config.php";
$column = $db->fetch_custom("show columns from ".$_GET['tb']);
?>

   <div class="col-lg-12">
    <h3>List Table</h3>
                <div class="box">
                <h4>Table <?=$_GET['tb'];?></h4>
                  <div id="defaultTable" class="body collapse in">

                    <table class="table responsive-table">
                      <thead>

                        <tr>
                          <th></th>
                          <th>Column</th>
                          <th>Label</th>
                        </tr>
                      </thead>
<?php
foreach ($column as $col) {
	?>

                      <tbody>
                        <tr>
<td>
<?php
if ($col->Key=='PRI') {
  echo "PRIMARY";
} else {?>
<input type="checkbox" name="dipilih1[<?=$_GET['tb'];?>.<?=$col->Field;?>]" onClick="copy_to1('<?=$_GET['tb']?>','<?=$col->Field?>')">
<?php } ?></td>
                          <td>
<?=$col->Field;?>

</td>
                          <td>
<?php
if ($col->Key=='PRI') {
} else {?>
                          <input type="text" class="form-control" id="label1_<?=$_GET['tb'].'_'.$col->Field;?>" name="label1[<?=$_GET['tb'];?>.<?=$col->Field;?>]">
                          <?php } ?></td>
                        </tr>
                      </tbody>
                   

           
	<?php
}

?>
 </table>
                  </div>
                </div>
                <div id="embed"></div>
              </div><!-- /.col-lg-6 -->