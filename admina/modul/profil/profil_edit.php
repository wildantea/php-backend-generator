<?php $data_edit=$db->fetch_single_row('sys_users','id',$_SESSION['id_user']);?>
 
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Edit Profil
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>profil">Profil</a></li>
                        <li class="active">Edit Profil</li>
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
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/profil/profil_action.php?act=up">
                      <div class="form-group">
                        <label for="First Name" class="control-label col-lg-2">First Name</label>
                        <div class="col-lg-10">
                          <input type="text" id="first_name" name="first_name" value="<?=$data_edit->first_name;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Last Name" class="control-label col-lg-2">Last Name</label>
                        <div class="col-lg-10">
                          <input type="text" id="last_name" name="last_name" value="<?=$data_edit->last_name;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Email" class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                          <input type="text" id="email" name="email" value="<?=$data_edit->email;?>" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
                     
     <div class="form-group">
                        <label for="nama_foto" class="control-label col-lg-2">Foto</label>
                        <div class="col-lg-10">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px;">
                             <img src="../../../upload/back_profil_foto/<?=$data_edit->foto_user?>">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> 
                                <input type="file" name="foto_user" accept="image/*">
                              </span> 
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                            </div>
                          </div>
                        </div>
                      </div><!-- /.form-group -->
                     

                      <input type="hidden" name="id" value="<?=$data_edit->id;?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary" value="submit">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
                    
                    <a href="<?=base_index();?>profil" class="btn btn-success">Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 