                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      Reset Password
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>profil">Profil</a></li>
                        <li class="active">Reset Password</li>
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
                  
                    <form id="pass_reset" method="post" class="form-horizontal" action="<?=base_admin();?>modul/user_management/user_management_action.php?act=reset">
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

                      <input type="hidden" name="id" value="<?=$data_edit->id?>">
                      <input type="hidden" id="redirect" value="<?=base_index();?>user-management">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary" value="Change Password">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
                    <a href="<?=base_index();?>user-management" class="btn btn-success">Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 