
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Menu
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>menu">Menu</a></li>
                        <li class="active">Tambah Menu</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Menu</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/menu/menu_action.php?act=in">
                      <div class="form-group">
                        <label for="Nama Menu" class="control-label col-lg-2">Nama Menu</label>
                        <div class="col-lg-10">
                          <input type="text" name="page_name" placeholder="Nama Menu" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Icon" class="control-label col-lg-2">Icon</label>
                        <div class="col-lg-10">
                          <input type="text" name="icon" placeholder="Icon" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Urutan Menu" class="control-label col-lg-2">Urutan Menu</label>
                        <div class="col-lg-10">
                          <input type="text" name="urutan_menu" placeholder="Urutan Menu" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Parent Menu" class="control-label col-lg-2">Parent Menu</label>
                        <div class="col-lg-10">
                          <input type="text" name="parent" placeholder="Parent Menu" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tampil" class="control-label col-lg-2">Tampil</label>
                        <div class="col-lg-10">
                          <input name="tampil" class="make-switch" type="checkbox" checked>
                        </div>
                      </div><!-- /.form-group -->

                      
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="submit">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
 <a href="<?=base_index();?>menu" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            