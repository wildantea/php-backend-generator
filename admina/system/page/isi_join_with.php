<?php
include "../../inc/config.php";
$prev_table = $_GET['prev_tb'];

$table = $db->fetch_custom("show table status where Name!=?",array('Name'=>$prev_table));

$prev = $db->fetch_custom("show columns from $prev_table");

 ?>
  <div class="body">
                      <div class="row form-group">
                          <div class="col-lg-1" style="width:110px;margin-left:0;padding-left:0">
                          <select class="form-control" name="join_cond[]" >
                            <option value="inner">INNER</option>
                            <option value="left">LEFT</option>
                            <option value="right">RIGHT</option>
                          </select>
                        </div><!-- /.col-lg-6 -->
                        <label class="control-label" style="float:left;width:20px;margin-left:-10px">JOIN</label>
                        <div class="col-lg-3">
                          <select class="form-control" onchange="isi_kanan(this.value,'<?=$prev_table;?>')" name="join_with[]" >
                          <?php 
                          echo "<option>Pilih Table</option>";
                          
                          foreach ($table as $tab) {
                            echo "<option value='$tab->Name'>$tab->Name</option>";
                          }?>
                          </select>
                        </div><!-- /.col-lg-6 -->
                        <label class="control-label" style="float:left;width:15px;margin-left:-10px">ON</label>
<div class="col-lg-3">
      <select class="form-control" name="join_on_first[]" >
                              <?php foreach ($prev as $cols) {
                            echo "<option value='$prev_table.$cols->Field'>$prev_table.$cols->Field</option>";
                          }
                          ?>
                          </select>
                        </div><!-- /.col-lg-6 -->
                   
                        <div id="isi_kanan_join"></div>
                      </div><!-- /.row -->
</div>
