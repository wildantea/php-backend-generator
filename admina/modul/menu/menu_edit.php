

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Menu
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>menu">Menu</a></li>
                        <li class="active">Edit Menu</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Edit Menu</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/menu/menu_action.php?act=up">
                      <div class="form-group">
                        <label for="Nama Menu" class="control-label col-lg-2">Nama Menu</label>
                        <div class="col-lg-10">
                          <input type="text" name="page_name" value="<?=$data_edit->page_name;?>" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Icon" class="control-label col-lg-2">Icon</label>
                        <div class="col-lg-10">
                          <input type="text" name="icon" value="<?=$data_edit->icon;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Urutan Menu" class="control-label col-lg-2">Urutan Menu</label>
                        <div class="col-lg-10">
                          <input type="text" name="urutan_menu" value="<?=$data_edit->urutan_menu;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Parent Menu" class="control-label col-lg-2">Parent Menu</label>
                        <div class="col-lg-10">
                          <input type="text" name="parent" value="<?=$data_edit->parent;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Tampil" class="control-label col-lg-2">Tampil</label>
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

                      <input type="hidden" name="id" value="<?=$data_edit->id;?>">
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
        
 