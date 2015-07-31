<?php $data_edit=$db->fetch_single_row('sys_users','id',$_SESSION['id_user']);?>
 
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Change Password
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>profil">Profil</a></li>
                        <li class="active">Change Password</li>
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
                   <div class="alert alert-danger pass_salah" style="display:none">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Password Lama Anda Salah</strong> 
        </div>
                    <form id="pass_up" method="post" class="form-horizontal" action="<?=base_admin();?>modul/change_password/change_password_action.php?act=up">
                        <div class="form-group">
                        <label for="Password Baru" class="control-label col-lg-2">Password Lama</label>
                        <div class="col-lg-10">
                          <input type="password" id="password" name="password" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label for="Password Baru" class="control-label col-lg-2">Password Baru</label>
                        <div class="col-lg-10">
                          <input type="password" id="password_baru" name="password_baru"  class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->
                       <div class="form-group">
                        <label for="Password Baru" class="control-label col-lg-2">Ulangi Password Baru</label>
                        <div class="col-lg-10">
                          <input type="password" id="password_confirm" name="password_confirm" class="form-control" > 
                        </div>
                      </div><!-- /.form-group -->

                      <input type="hidden" name="id" value="<?=$_SESSION['id_user'];?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary" value="Change Password">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
                    <a href="<?=base_index();?>profil" class="btn btn-success">Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 