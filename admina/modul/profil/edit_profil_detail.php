
 <div class="row">
              <div class="col-lg-12">
                <div class="box dark">
                  <header>
                    <div class="icons">
                      <i class="fa fa-edit"></i>
                    </div>
                    <h5>Detail Edit Profil</h5>

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
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="First Name" class="control-label col-lg-2">First Name</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->first_name;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Last Name" class="control-label col-lg-2">Last Name</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->last_name;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Username" class="control-label col-lg-2">Username</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->username;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Email" class="control-label col-lg-2">Email</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->email;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Foto" class="control-label col-lg-2">Foto</label>
                        <div class="col-lg-10">
                          <input type="text" disabled="" value="<?=$data_edit->foto_user;?>" class="form-control">
                        </div>
                      </div><!-- /.form-group -->

                   
                    </form>
                    <a href="<?=base_index();?>edit-profil" class="btn btn-success">Kembali</a>
                  </div>
                </div>
              </div>


              <!--END SELECT-->
            </div><!-- /.row -->
