
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Page
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Page</a></li>
                        <li class="active">Page List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                  <table id="example1" class="table table-bordered table-condensed table-hover table-striped">
                      <thead>
                        <tr>
                          <th>Page</th>
                          <th>Modul</th>
                          <th>Urutan Menu </th>
                          <th>Action</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                        <?php foreach ($db->fetch_custom('select sys_menu.id,sys_menu.page_name,sys_modul.modul_name,sys_menu.urutan_menu
from sys_menu inner join sys_modul on sys_menu.modul_id=sys_modul.id
 order by sys_menu.id desc') as $isi) {
                          ?>
<tr id="line_<?=$isi->id;?>"><td><?=$isi->page_name;?></td><td><?=$isi->modul_name;?></td><td><?=$isi->urutan_menu;?></td><td><a href="<?=base_index();?>page/edit/<?=$isi->id;?>" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></a> <span class="btn btn-danger btn-flat hapus" data-uri="<?=base_admin();?>system/page/page_action.php"  data-id="<?=$isi->id;?>"><i class="fa fa-trash-o"></i></span></td></tr>
                        <?php
                        } ?>
                   </tbody>
                    </table>
                

                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
         <a href="<?=base_index();?>page/tambah" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</a>
          
                </section><!-- /.content -->
  