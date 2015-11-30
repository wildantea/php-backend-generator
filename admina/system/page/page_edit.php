

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Edit Page
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>modul">Page</a></li>
                        <li class="active">Edit Page</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
                                <div class="box-header">
                                </div><!-- /.box-header -->

                  <div class="box-body">
                          <form id="update" class="form-horizontal" action="<?=base_admin();?>system/page/page_action.php?act=up">
      <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Page / Menu Name</label>
                        <div class="col-lg-10">
                          <input type="text" id="text1" name="page_name" value="<?=$data_edit->page_name;?>" required placeholder="Page name" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
                           <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Icon</label>
                        <div class="col-lg-7">
                          <input type="text" id="text1" value="<?=$data_edit->icon;?>" name="icon" placeholder="fa-camera-retro" class="form-control">
                        <a target="_blank" href="<?=base_index();?>modul/icon">Referensi Icon (new window)</a>
                        </div>
                      </div><!-- /.form-group -->
                             <div class="form-group">
                 <label class="control-label col-lg-2">Type Menu</label>
                 <div class="col-lg-10">
                   <select data-placeholder="Pilih Modul" name="type_menu" onChange="type_of_menu(this.value)" class="form-control chzn-select" tabindex="2">
                         <?php
        echo "<option value='$data_edit->type_menu' selected>$data_edit->type_menu</option>";


                ?>
                   </select>
                 </div>
               </div>

                         <div class="form-group">
                        <label class="control-label col-lg-2">Parent</label>
                        <div class="col-lg-10">
                          <select data-placeholder="Pilih Modul" name="parent" class="form-control chzn-select" tabindex="2">
              <?php
               if ($data_edit->parent==0) {
                    echo "<option value='0' selected>None</option>";
                  } else {
                    $get_parent = $db->fetch_single_row('sys_menu','id',$data_edit->parent);
                     echo "<option value='$get_parent->id' selected>$get_parent->page_name</option>";
                  }


$data = $db->fetch_custom("select * from sys_menu where type_menu='main' and id!=?",array('id'=>$data_edit->parent));
foreach ($data as $isi) {
                     echo "<option value='$isi->id'>$isi->page_name</option>";
                  }

                ?>
                          </select>
                        </div>
                      </div>
                           <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Urutan Menu</label>
                        <div class="col-lg-4">
                          <input type="text" id="text1" name="urutan_menu" value="<?=$data_edit->urutan_menu;?>" required placeholder="Urutan Menu" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
                         <div class="form-group">
                        <label for="Update" class="control-label col-lg-2">Tampil</label>
                        <div class="col-lg-10">
                       <?php if ($data_edit->tampil=="Y") {
      ?>
      <input name="tampil" class="make-switch" type="checkbox" checked>
      <?php
    } else {
      ?>
      <input name="tampil" class="make-switch" type="checkbox">
      <?php
    }?>  </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$data_edit->id;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
<a href="<?=base_index();?>page" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>

                  </div>
                  </div>
              </div>
</div>

                </section><!-- /.content -->




