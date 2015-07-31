<?php
include "../../inc/config.php";
$column = $db->fetch_custom("show columns from ".$_GET['tb']);
?>
   <div class="col-lg-12">
   	<h4>Checklist Kolom Yang akan dijadikan Crud</h4>
   	<h3>Input Page</h3>
                <div class="box">
                  <div id="defaultTable" class="body collapse in">
                    <table class="table responsive-table">
                      <thead>

                        <tr>
                          <th></th>
                          <th>Column</th>
                          <th>Label</th>
                          <th>Type</th>
                          <th>Required</th>
                        </tr>
                      </thead>
<?php
foreach ($column as $col) {

  if ($col->Key=='PRI') {
    echo "<input type='hidden' name='primary_key' value='$col->Field'>";
  }
	?>

                      <tbody>
                        <tr>
<td>
<?php
  if ($col->Key=='PRI') {

                            } else {?>
<input type="checkbox" name="dipilih[<?=$col->Field;?>]" onClick="copy_to('<?=$_GET['tb']?>','<?=$col->Field?>')">
<?php }
                         ?></td>
      
                          <td><?=$col->Field;?></td>
                          <td>
                          <?php   if ($col->Key=='PRI') {

                            } else {?>
                            <input type="text" class="form-control" id="label_<?=$_GET['tb'].'_'.$col->Field;?>" name="label[<?=$col->Field;?>]"></td>
                         <?php }
                         ?>
                          <td>
                              <?php   if ($col->Key=='PRI') {
                              echo "PRIMARY";
                            } else {?>
                          	<select onChange="tipe(this.value,'<?=$col->Field;?>')" name="type[<?=$col->Field;?>]" class="form-control">
                          		<option value="text">Text</option>
                                  <option value="number">Number</option>
                          		<option value="date">Date</option>
                              <option value="email">Email</option>
                          		<option value="textarea">Textarea</option>
                              <option value="boolean">Boolean</option>
                          		<option value="select">Select</option>
                          		<option value="ufile">Upload File</option>
                          		<option value="uimager">Upload Image Resize</option>
                          		<option value="uimagef">Upload Image Full</option>
                          	 </select>
                              <?php }
                         ?>
                          	 <div id="type_content_<?=$col->Field;?>">
                          	
                          	 </div>

                          </td>
                          <td>
                               <?php   if ($col->Key=='PRI') {
                              
                            } else {?>
                          <input type="checkbox" name="required[<?=$col->Field;?>]" id="required">
                          <?php }
                         ?>
                         </td>
                        </tr>
                      </tbody>
          
	<?php
}

?>

 </table>


                  </div>
                </div>
<!--   <span class='btn btn-primary btn-flat' onClick="add_multi_image()">Add Multiple Image Upload</span> <span onclick="hapus_multi()" class="btn btn-danger btn-flat" ><i class='fa fa-trash-o'></i></span>       
<div style="margin-bottom:20px" id="isi_remote"></div> -->
                 <div id="isi_join"></div>
  <span class='btn btn-primary btn-flat' onClick="add_join()"><i class='fa  fa-plus-square'></i> Add Join</span>       

              </div><!-- /.col-lg-6 -->