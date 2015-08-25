
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Gallery
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>gallery">Gallery</a></li>
                        <li class="active">Tambah Gallery</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah Gallery</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/gallery/gallery_action.php?act=in">
                      
                      
<form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/gallery/gallery_action.php?act=in">
                      <div class="form-group">
                        <label for="Nama Album" class="control-label col-lg-2">Nama Album</label>
                        <div class="col-lg-10">
                          <input type="text" name="judul_album" placeholder="Nama Album" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label for="Nama Album" class="control-label col-lg-2">Deskripsi Album</label>
                        <div class="col-lg-10">
                          <input type="text" name="deskripsi_album" placeholder="Deskripsi Album" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label class="control-label col-lg-2">Foto</label>
                        <div class="col-lg-10">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                              <img data-src="holder.js/100%x100%" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> 
                                <input type="file" name="foto_banyak[]" accept="image/*">
                              </span> 
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                            </div>
                          </div>
                            <span id="add_next">
                  </span>
                             <span class="btn btn-primary btn-flat" onClick="add_multi()"><i class="fa fa-plus"></i> Tambah Foto</span>
               
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="submit">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
 <a href="<?=base_index();?>gallery" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            