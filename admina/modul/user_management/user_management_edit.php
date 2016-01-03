

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      User Management
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>user-management">User Management</a></li>
                        <li class="active">Edit User Management</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Edit User Management</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/user_management/user_management_action.php?act=up">
                      <div class="form-group">
                        <label for="First Name" class="control-label col-lg-2">First Name</label>
                        <div class="col-lg-10">
                          <input type="text" id="first_name" name="first_name" value="<?=$data_edit->first_name;?>" class="form-control" required>
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
                          <input type="text" id="email" data-rule-email="true" name="email" value="<?=$data_edit->email;?>" class="form-control" >
                        </div>
                      </div><!-- /.form-group -->

<div class="form-group">
                        <label for="Foto" class="control-label col-lg-2">Foto</label>
                        <div class="col-lg-10">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                    <img src="../../../../upload/back_profil_foto/<?=$data_edit->foto_user?>"></div>
                    <div>
                      <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span>
                        <input type="file" name="foto_user" accept="image/*">
                      </span>
                      <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a>
                    </div>
                  </div>

                        </div>
                      </div><!-- /.form-group -->

<div class="form-group">
                        <label for="Group User" class="control-label col-lg-2">Group User</label>
                        <div class="col-lg-10">
                          <select name="id_group" data-placeholder="Pilih Group User..." class="form-control chzn-select" tabindex="2" >
               <option value=""></option>
             <?php foreach ($db->fetch_custom("select * from sys_group_users ") as $isi) {

               		if ($data_edit->id_group==$isi->id) {
               			echo "<option value='$isi->id' selected>$isi->level</option>";
               		} else {
               		echo "<option value='$isi->id'>$isi->level</option>";
               			}
               } ?>
              </select>
                        </div>
                      </div><!-- /.form-group -->
       <div class="form-group">
                        <label for="aktif" class="control-label col-lg-2">aktif</label>
                        <div class="col-lg-10">
                          <?php if ($data_edit->aktif=="Y") {
      ?>
      <input name="aktif" class="make-switch" type="checkbox" checked>
      <?php
    } else {
      ?>
      <input name="aktif" class="make-switch" type="checkbox">
      <?php
    }?>
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
                    <a href="<?=base_index();?>user-management" class="btn btn-success">Kembali</a>

                  </div>
                  </div>
              </div>
</div>

                </section><!-- /.content -->


