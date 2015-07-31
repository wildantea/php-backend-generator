
 <div class="row">
              <div class="col-lg-12">
                <div class="box dark">
                  <header>
                    <div class="icons">
                      <i class="fa fa-edit"></i>
                    </div>
                    <h5>Edit Password</h5>

                    <!-- .toolbar -->
                    <div class="toolbar">
                      <nav style="padding: 8px;">
                        <a href="javascript:;" class="btn btn-default btn-xs collapse-box">
                          <i class="fa fa-minus"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-default btn-xs full-box">
                          <i class="fa fa-expand"></i>
                        </a> 
                        <a href="javascript:;" class="btn btn-danger btn-xs close-box">
                          <i class="fa fa-times"></i>
                        </a> 
                      </nav>
                    </div><!-- /.toolbar -->
                  </header>
                  <div class="body">
                   <div class="alert alert-danger pass_salah" style="display:none">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <strong>Password Lama Anda Salah</strong> 
        </div>
                    <form id="pass_up" method="post" class="form-horizontal" action="<?=base_url();?>modul/change_password/change_password_action.php?act=up">
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
                    
                  </div>
                </div>
              </div>


              <!--END SELECT-->
            </div><!-- /.row -->
