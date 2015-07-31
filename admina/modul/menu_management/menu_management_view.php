                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Menu Management
            </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>menu-management">Menu Management</a></li>
                        <li class="active">Menu Management List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">List Menu Management</h3>
                                </div><!-- /.box-header -->

<form method="get" class="form-horizontal" action="">
                      <div class="form-group">
                        <label for="Menu" class="control-label col-lg-2">Group Users</label>
                        <div class="col-lg-4">
                            <select name="user" id="id_po_select" data-placeholder="Pilih User" class="form-control chzn-select" tabindex="2">
                        <option value=""></option>
                          <?php 

foreach ($db->fetch_custom("select sys_group_users.id, sys_group_users.level from sys_users inner join sys_group_users 
on sys_users.id_group=sys_group_users.id
group by sys_group_users.id") as $isi) {

                  if ($_GET['user']==$isi->id) {
                     echo "<option value='$isi->id' selected>$isi->level</option>";
                  } else {
                     echo "<option value='$isi->id'>$isi->level</option>";
                  }
                 
               } ?>

                  
                  </select>
                        </div>
                      </div><!-- /.form-group -->
<div class="form-group">
                        <label for="User" class="control-label col-lg-2">Main Menu</label>
                        <div class="col-lg-4">
              
                           <select name="menu" data-placeholder="Pilih Main Menu" class="form-control chzn-select col-lg-5" tabindex="2">
                          <option value="1"></option>
                        <?php foreach ($db->fetch_all('sys_modul') as $isi) {
                           if ($_GET['menu']==$isi->id) {
                     echo "<option value='$isi->id' selected>$isi->modul_name</option>";
                  } else {
                     echo "<option value='$isi->id'>$isi->modul_name</option>";
                  }
                        } ?>
                      
                  
                  </select>
                        </div>
                      </div><!-- /.form-group -->
 <label for="Menu" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
<button style="margin-top:10px;margin-bottom:10px" class="btn btn-primary">Show Menu</button>
</div>
</form>

                                <div class="box-body table-responsive">
          
<?php if (isset($_GET['user'])) {
  
?>       
<h3>Checklist Untuk memberikan Hak Akses</h3>
<table id="dtb" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                        <th style="width:20px">No</th>
                          <th>Menu </th>
                          <th>Group User</th>
                          <th>Read</th>
                           <th>Input</th>
                            <th>Edit</th>
                             <th>Delete</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
      $dtb=$db->fetch_custom("select sys_menu_role.read_act,sys_menu_role.insert_act,sys_menu_role.update_act,sys_menu_role.delete_act, sys_menu.page_name,sys_menu.urutan_menu,sys_group_users.level,sys_menu_role.id from sys_menu_role  inner join sys_menu on sys_menu_role.id_menu=sys_menu.id inner join sys_group_users on sys_menu_role.group_id=sys_group_users.id where sys_menu.modul_id=? and sys_group_users.id=?",array('sys_menu.modul_id'=>$_GET['menu'],'sys_group_users.id'=>$_GET
        ['user']));
      $i=1;
      foreach ($dtb as $isi) {
        ?><tr id="line_<?=$isi->id;?>">
        <td>
        <?=$i;?></td>
        <td><?=$isi->page_name;?></td>
        <td><?=$isi->level;?></td>
        <td><div class="checkbox">
                            <label>
                              <input class="uniform" type="checkbox" value="option1" onclick="read_act(<?=$isi->id;?>,this)" <?=($isi->read_act=='Y')?'checked=""':'';?>>
                            </label>
                          </div>
        </td>
          <td>
          <div class="checkbox">
                            <label>
                              <input class="uniform" type="checkbox" value="option1" onclick="insert_act(<?=$isi->id;?>,this)" <?=($isi->insert_act=='Y')?'checked=""':'';?>>
                            </label>
                          </div>
      </td>
            <td>   <div class="checkbox">
                            <label>
                              <input class="uniform" type="checkbox" value="option1" onclick="update_act(<?=$isi->id;?>,this)" <?=($isi->update_act=='Y')?'checked=""':'';?>>
                            </label>
                          </div></td>
              <td>   <div class="checkbox">
                            <label>
                              <input class="uniform" type="checkbox" value="option1" onclick="delete_act(<?=$isi->id;?>,this)" <?=($isi->delete_act=='Y')?'checked=""':'';?>>
                            </label>
                          </div></td>
        </tr>
        <?php
        $i++;
      }
      ?>
                   </tbody>
                    </table>
<?php 

}  

?>

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
                </section><!-- /.content -->
  



<script type="text/javascript">
  
function read_act(id,cb) {
  check_act = '';
  if (cb.checked) {
     check_act = 'Y';
  } else {
    check_act = 'N';

  }
  $.ajax({

        type: "post",
        url: "<?=base_admin();?>modul/menu_management/menu_management_action.php?act=change_read",
        data: "role_id="+id+"&data_act="+check_act,
     //  enctype:  'multipart/form-data'
      success: function(data){

        console.log(data);
    }

  });
}

function insert_act(id,cb) {
  check_act = '';
  if (cb.checked) {
     check_act = 'Y';
  } else {
    check_act = 'N';

  }
  $.ajax({

        type: "post",
        url: "<?=base_admin();?>modul/menu_management/menu_management_action.php?act=change_insert",
        data: "role_id="+id+"&data_act="+check_act,
     //  enctype:  'multipart/form-data'
      success: function(data){

        console.log(data);
    }

  });
}

function update_act(id,cb) {
  check_act = '';
  if (cb.checked) {
     check_act = 'Y';
  } else {
    check_act = 'N';

  }
  $.ajax({

        type: "post",
        url: "<?=base_admin();?>modul/menu_management/menu_management_action.php?act=change_update",
        data: "role_id="+id+"&data_act="+check_act,
     //  enctype:  'multipart/form-data'
      success: function(data){

        console.log(data);
    }

  });
}

function delete_act(id,cb) {
  check_act = '';
  if (cb.checked) {
     check_act = 'Y';
  } else {
    check_act = 'N';

  }
  $.ajax({

        type: "post",
        url: "<?=base_admin();?>modul/menu_management/menu_management_action.php?act=change_delete",
        data: "role_id="+id+"&data_act="+check_act,
     //  enctype:  'multipart/form-data'
      success: function(data){

        console.log(data);
    }

  });
}


  </script>




