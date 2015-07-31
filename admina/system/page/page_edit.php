
           
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
                        <label for="Menu" class="control-label col-lg-2">Modul</label>
                        <div class="col-lg-4">
                            <select name="modul_id" id="id_po_select" data-placeholder="Pilih User" class="form-control chzn-select" tabindex="2">
                        <option value=""></option>
                          <?php 

foreach ($db->fetch_custom("select * from sys_modul") as $isi) {

                  if ($isi->id==$data_edit->modul_id) {
                     echo "<option value='$isi->id' selected>$isi->modul_name</option>";
                  } else {
                     echo "<option value='$isi->id'>$isi->modul_name</option>";
                  }
                 
               } ?>

                  
                  </select>
                        </div>
                      </div><!-- /.form-group -->

                      <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Nama Page</label>
                        <div class="col-lg-10">
                          <input type="text" id="text1" name="page_name" value="<?=$data_edit->page_name;?>" required placeholder="modul name" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
                           <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Urutan Menu</label>
                        <div class="col-lg-10">
                          <input type="text" id="text1" name="urutan" value="<?=$data_edit->urutan_menu;?>" required placeholder="modul name" class="form-control">
                        </div>
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
        

 

