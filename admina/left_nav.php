 
   <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="<?=base_url();?>upload/back_profil_foto/<?=$db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->foto_user?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?=ucwords($db->fetch_single_row('sys_users','id',$_SESSION['id_user'])->username)?></p>

              <a href="<?=base_index();?>profil"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
          </div>
         <!--  search form
         <form action="#" method="get" class="sidebar-form">
           <div class="input-group">
             <input type="text" name="q" class="form-control" placeholder="Search..."/>
             <span class="input-group-btn">
               <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
             </span>
           </div>
         </form>
         /.search form -->
          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">MAIN NAVIGATION</li>
             <li class="<?=($path_url=='')?'active':'';?>">
                            <a href="<?=base_index();?>">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
              <?php 
              //show only if user is admin 
              if ($_SESSION['level']==1) {
                ?>
             
              <li class="treeview <?=($path_url=='install'||$path_url=='user-management'||$path_url=='page'||$path_url=='menu-management'||$path_url=='group-user')?'active':'';?>">
                        <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>System Setting</span>
                        <i class="fa fa-angle-left pull-right"></i>
                        </a>
                        <ul class="treeview-menu">

                          <li class="<?=($path_url=='install')?'active':'';?>">
                            <a href="<?=base_index();?>install">
                                <i class="fa fa-circle-o"></i> <span>Install</span>
                            </a>
                        </li>
                   
                         <li class="<?=($path_url=='page')?'active':'';?>">
                            <a href="<?=base_index();?>page">
                                <i class="fa fa-circle-o"></i> <span>Page / Menu</span>
                            </a>
                        </li>
                           <li class="<?=($path_url=='menu-management')?'active':'';?>">
                            <a href="<?=base_index();?>menu-management">
                                <i class="fa fa-circle-o"></i> <span>Menu Management</span>
                            </a>
                        </li>
                        <li class="<?=($path_url=='group-user')?'active':'';?>">
                            <a href="<?=base_index();?>group-user">
                                <i class="fa fa-circle-o"></i> <span>Group User</span>
                            </a>
                        </li>
                          <li class="<?=($path_url=='user-management')?'active':'';?>">
                            <a href="<?=base_index();?>user-management">
                                <i class="fa fa-circle-o"></i> <span>User Management</span>
                            </a>
                        </li>
                        </ul>
                        </li>
                        
          
<?php

                  }
// Select all entries from the menu table
$result=$db->fetch_custom("select sys_menu.*,sys_menu_role.read_act,sys_menu_role.insert_act,sys_menu_role.update_act,sys_menu_role.delete_act,sys_menu_role.group_id from sys_menu
left join sys_menu_role on sys_menu.id=sys_menu_role.id_menu
where sys_menu_role.group_id=? and sys_menu_role.read_act=? ORDER BY parent, urutan_menu",array('sys_menu_role.group_id'=>$_SESSION['level'],'sys_menu_role.read_act'=>'Y'));


// Create a multidimensional array to list items and parents
$menu = array(
    'items' => array(),
    'parents' => array()
);
// Builds the array lists with data from the menu table
foreach ($result as $items) {

  $items = toArray($items);

      // Creates entry into items array with current menu item id ie. 
    $menu['items'][$items['id']] = $items;
    // Creates entry into parents array. Parents array contains a list of all items with children
    $menu['parents'][$items['parent']][] = $items['id'];
}


echo $db->buildMenu($path_url,0, $menu);
?> 

           </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
  <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">


