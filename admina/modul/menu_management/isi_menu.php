<?php
include "../../inc/config.php";
?>
<table id="dataTable" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                        <th style="width:20px">No</th>
                          <th>Menu </th><th>Group User</th>
                          <th>Action</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php 
      $dtb=$db->fetch_custom("select sys_menu.page_name,sys_menu.urutan_menu,sys_group_users.level,sys_menu_role.id from sys_menu_role  inner join sys_menu on sys_menu_role.id_menu=sys_menu.id inner join sys_group_users on sys_menu_role.group_id=sys_group_users.id");
      $i=1;
      foreach ($dtb as $isi) {
        ?><tr id="line_<?=$isi->id;?>"><td><?=$i;?></td><td><?=$isi->page_name;?></td><td><?=$isi->level;?></td><td><a href="<?=base_index();?>menu-management/detail/<?=$isi->id;?>" class="btn btn-success"><i class="fa fa-eye"></i></a> <?=($role_act["up_act"]=="Y")?'<a href="'.base_index().'menu-management/edit/'.$isi->id.'" class="btn btn-primary"><i class="fa fa-pencil"></i></a>':"";?>  <?=($role_act["del_act"]=="Y")?'<button class="btn btn-danger" onClick="hapus(\''.base_admin().'modul/menu_management/menu_management_action.php\',\''.$isi->id.'\')"><i class="fa fa-trash-o"></i></button>':"";?></td></tr>
        <?php
        $i++;
      }
      ?>
                   </tbody>
                    </table>