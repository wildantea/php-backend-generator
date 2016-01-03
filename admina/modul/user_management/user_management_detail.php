

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     User Management
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>user-management">User Management</a></li>
                        <li class="active">Detail User Management</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail User Management</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
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
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                    <img src="../../../../upload/back_profil_foto/<?=$data_edit->foto_user?>"></div>
                  </div>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="Group User" class="control-label col-lg-2">Group User</label>
                        <div class="col-lg-10">
                          <?php foreach ($db->fetch_all("sys_group_users") as $isi) {
               		if ($data_edit->id_group==$isi->id) {

               			echo "<input disabled class='form-control' type='text' value='$isi->level'>";
               		}
               } ?>

                        </div>
                      </div><!-- /.form-group -->


                    </form>
                    <a href="<?=base_index();?>user-management" class="btn btn-success">Kembali</a>

                  </div>
                  </div>
              </div>
</div>

                </section><!-- /.content -->

