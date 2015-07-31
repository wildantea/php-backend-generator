  <?php
  include "../../inc/config.php";
$tb=$_GET['tb'];


$prev_tb = $_GET['prev'];

$on = $db->fetch_custom("show columns from $tb");

  ?>
<div id="kanan_<?=$tb;?>">

                            <label class="control-label" style="float:left;width:5px;margin-left:-10px">=</label>
                       
                         <div class="col-lg-3" style="margin-right:-20px">

                

                          <select class="form-control" style="margin-left:-10px" name="join_on_next[]">
                          <?php foreach ($on as $col) {
                            echo "<option value='$tb.$col->Field'>$tb.$col->Field</option>";
                          }
                          ?>

                          </select>
                        </div><!-- /.col-lg-6 -->
                        
                        <div style="padding-left:0;margin-left:-20px"><span class="btn btn-success btn-flat" onclick="add_join_with('<?=$tb;?>')">Join With</span> <span onclick="del_join('<?=$tb;?>')" class="btn btn-danger btn-flat" ><i class='fa fa-trash-o'></i></span>
                        </div>
</div>