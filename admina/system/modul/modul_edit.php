
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Edit Modul
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>modul">Modul</a></li>
                        <li class="active">Edit Modul</li>
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
                          <form id="update" class="form-horizontal" action="<?=base_admin();?>system/modul/modul_action.php?act=up">
                      <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Nama Modul</label>
                        <div class="col-lg-10">
                          <input type="text" id="text1" name="modul_name" value="<?=$data_edit->modul_name;?>" required placeholder="modul name" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
                           <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Urutan Menu</label>
                        <div class="col-lg-10">
                          <input type="text" id="text1" name="urutan" value="<?=$data_edit->urutan;?>" required placeholder="modul name" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label for="Insert" class="control-label col-lg-2">Tampil</label>
                        <div class="col-lg-10">
                          <?php if ($data_edit->tampil=="Y") {
      ?>
      <input name="tampil" class="make-switch" type="checkbox" checked>
      <?php
    } else {
      ?>
      <input name="tampil" class="make-switch" type="checkbox">
      <?php
    }?>
                        </div>
                      </div><!-- /.form-group -->
                       <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Icon</label>
                        <div class="col-lg-10">
                          <input type="text" id="text1" name="icon" value="<?=$data_edit->icon;?>" required placeholder="modul name" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
                      <input type="hidden" name="id" value="<?=$data_edit->id;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
<a href="<?=base_index();?>modul" class="btn btn-success"><i class="fa fa-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        

 

