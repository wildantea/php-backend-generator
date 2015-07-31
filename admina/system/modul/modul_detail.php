<!-- Content Header (Page header) -->
                 <section class="content-header">
                    <h1>
                       Detail Modul
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>modul">Modul</a></li>
                        <li class="active">Detail Modul</li>
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
                          <form class="form-horizontal">
                     <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Nama Modul</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->modul_name;?>" class="form-control">
                        
                        </div>
                      </div><!-- /.form-group -->
                        <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Urutan Menu</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->urutan;?>" class="form-control">
                        
                        </div>
                        </div>
                      <div class="form-group">
                        <label for="Insert" class="control-label col-lg-2">Tampil</label>
                        <div class="col-lg-10">
                          <?php if ($data_edit->tampil=="Y") {
      ?>
      <input name="tampil" disabled="" class="make-switch" type="checkbox" checked>
      <?php
    } else {
      ?>
      <input name="tampil" disabled="" class="make-switch" type="checkbox">
      <?php
    }?>
                        </div>
                      </div><!-- /.form-group -->
             
                    </form>
<a href="<?=base_index();?>modul" class="btn btn-success"><i class="fa fa-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        

 
