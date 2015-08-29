<?php
$gallery_detail = $gallery_detail_top.'
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Album Gallery
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">Album Gallery</a></li>
                        <li class="active">Detail '.ucwords($_POST['page_name']).'</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Album Gallery</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

'.$button_gallery_detail.'

  <button onclick="Uploader.upload();" class="btn btn-primary">
    <i class=\'fa fa-plus\'></i> Upload Foto
  </button>
  <div id="wait" class="hide">
    <img src="<?=base_admin();?>assets/dist/img/upload-indicator.gif" alt="">
  </div>

<div>
  <iframe name="hidden_iframe" id="hidden_iframe" class="hide">
  </iframe>
</div>
 
<div id="uploaded_images" align="center">
 
</div>
                  <div class="page-header text-center">

             '.$album_title.'
            var data = JSON.parse(data);
            if (typeof (data[\'error\']) != "undefined") {
                jQuery(\'#uploaded_images\').html(data[\'error\']);
                jQuery(\'#upload_files\').val("");
                jQuery("#wait").addClass(\'hide\');
                return;
            }
            var divs = [];
            jQuery(\'#uploaded_images\').html(divs.join(""));
            jQuery(\'#upload_files\').val("");
            jQuery("#wait").addClass(\'hide\');
        }

        return {
            upload: fnUpload,
            done: fnDone
        }

    }());
</script>';

$list_gallery = '
<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage '.ucwords($_POST['page_name']).'
                    </h1>
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">'.ucwords($_POST['page_name']).' List</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                     <h3 class="box-title">List '.ucwords($_POST['page_name']).'</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                  <div class="box-body">
                  <div class="album-top">
<div class="col-md-2 ">
                                                    <?php
       foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url) {
                          if ($role_act["insert_act"]=="Y") {
                    ?>
          <a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'/tambah" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Album</a>
                          <?php
                          } 
                       } 
}
?>
</div>  
<div class="col-md-10">
<form action="" method="get" class="form_cari">
                <div class="input-group col-lg-8">
         <span class="input-group-btn">
<button class="btn btn-default" type="button">Pencarian !</button>
</span>
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                        <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
</form>
</div>
</div>
                     <div class="row">
'.$query_album_on_list.'
                </div>
                <div class="row">
                          <div class="col-xs-6" style="margin-top:10px">
    Showing <?=$count;?> to <?=$no-1;?> of <?=$pg->total_record;?> entries
                        
                        </div>

                        <div class="col-xs-6">
                                    <?php
                                  if (isset($_GET[\'q\'])) {
$pg->url=base_index()."'.$modul_name.'?q=".$_GET[\'q\']."&page=";
                                  }
                                    $pg->setParameter(array(
                                      \'range\'=>$limit,
                                      ));
                                      ?>

                                    <div class="dataTables_paginate paging_bootstrap">
                                    <ul class="pagination">
                                    <?=$pg->create();?>
                                    </ul>
                                    </div>
                        </div>
                </div>
                  </div>
                  </div>
              </div>
</div>
                </section><!-- /.content -->';

$list_table ='
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage '.ucwords($_POST['page_name']).'
                    </h1>
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">'.ucwords($_POST['page_name']).' List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                <h3 class="box-title">List '.ucwords($_POST['page_name']).'</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="dtb_'.$modul_name.'" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>

                          '.$table_header.'
                          <th>Action</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
        <?php
       foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url) {
                          if ($role_act["insert_act"]=="Y") {
                    ?>
          <a href="<?=base_index();?>'.str_replace("_", "-", $modul_name).'/tambah" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
      
  foreach ($db->fetch_all("sys_menu") as $isi) {

  //jika url = url dari table menu
  if ($path_url==$isi->url) {
    //check edit permission
  if ($role_act["up_act"]=="Y") {
  $edit = \'<a href="\'.base_index()."'.strtolower(str_replace(" ", "-", $_POST['page_name']))."/edit/'+aData[indek]+'"."\".'\" class=\"btn btn-primary btn-flat\"><i class=\"fa fa-pencil\"></i></a>\';
  } else {".'
    $edit ="";
  }
  if ($role_act[\'del_act\']==\'Y\') {
   $del = "<span data-id=\'+aData[indek]+\' data-uri=".base_admin()."modul/'.strtolower(str_replace(" ", "_", $_POST['page_name'])).'/'.strtolower(str_replace(" ", "_", $_POST['page_name'])).'_action.php".\' class="btn btn-danger hapus btn-flat"><i class="fa fa-trash"></i></span>\';
  } else {
    $del="";
  }
                   } 
  }
  
?>  
                </section><!-- /.content -->
        <script type="text/javascript">
var dataTable = $("#dtb_'.$modul_name.'").dataTable({
           "fnCreatedRow": function( nRow, aData, iDataIndex ) {
            var indek = aData.length-1;'."           
     $('td:eq('+indek+')', nRow).html(' <a href=\"<?=base_index();?>".strtolower(str_replace(" ", "-", $_POST['page_name']))."/detail/'+aData[indek]+'\" class=\"btn btn-success btn-flat\"><i class=\"fa fa-eye\"></i></a> ".'<?=$edit;?> <?=$del;?>'."');
       $(nRow).attr('id', 'line_'+aData[indek]);
   },
           'bProcessing': true,
            'bServerSide': true,
        'sAjaxSource': '<?=base_admin();?>modul/".strtolower(str_replace(" ", "_", $_POST['page_name']))."/".strtolower(str_replace(" ", "_", $_POST['page_name']))."_data.php',
         /*     'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [0]
            }]*/
        });</script>  
            ";
$list_table_off ='
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage '.ucwords($_POST['page_name']).'
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">'.ucwords($_POST['page_name']).' List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">List '.ucwords($_POST['page_name']).'</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          '.$table_header.'
                          <th>Action</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         '.$select_table.'
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
        <?php
       foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url) {
                          if ($role_act["insert_act"]=="Y") {
                    ?>
          <a href="<?=base_index();?>'.str_replace("_", "-", $modul_name).'/tambah" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
?>  
                </section><!-- /.content -->
        
';
$list_table_manual ='
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage '.ucwords($_POST['page_name']).'
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">'.ucwords($_POST['page_name']).' List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                 <div class="box-header">
                                
                                       <form action="" method="get" class="form_cari">
                        <div class="input-group col-lg-6">
                 <span class="input-group-btn">
        <button class="btn btn-default" type="button">Pencarian !</button>
      </span>
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table  class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          '.$table_header.'
                          <th>Action</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         '.$select_table.'
                                        </tbody>
                                    </table>
                                    '.$bottom_pagination.'
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
        <?php
       foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url) {
                          if ($role_act["insert_act"]=="Y") {
                    ?>
          <a href="<?=base_index();?>'.str_replace("_", "-", $modul_name).'/tambah" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
?>  
                </section><!-- /.content -->
        
';
$modul_data = '
<?php

include "../../inc/config.php";


$tes=$dtable->get("'.$main_table.'", "'.$main_table.'.'.$primary_key.'", array('.$col_head.'"'.$main_table.'.'.$primary_key.'"),"'.$join.'");


?>';

$main = '
<?php
switch ($path_act) {
  case "tambah":
          foreach ($db->fetch_all("sys_menu") as $isi) {
               if ($path_url==$isi->url&&$path_act=="tambah") {
                          if ($role_act["insert_act"]=="Y") {
                             include "'.$modul_name.'_add.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }
    break;
  case "edit":
    $data_edit = $db->fetch_single_row("'.$main_table.'","'.$primary_key.'",$path_id);
        foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url&&$path_act=="edit") {
                          if ($role_act["up_act"]=="Y") {
                             include "'.$modul_name.'_edit.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }

    break;
      case "detail":
    $data_edit = $db->fetch_single_row("'.$main_table.'","'.$primary_key.'",$path_id);
    include "'.$modul_name.'_detail.php";
    break;
  default:
    include "'.$modul_name.'_view.php";
    break;
}

?>';

$modul_add = '
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     '.ucwords($_POST['page_name']).'
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">Tambah '.ucwords($_POST['page_name']).'</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah '.ucwords($_POST['page_name']).'</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/'.$modul_name.'/'.$modul_name.'_action.php?act=in">
                      '.$input_element.'
                      '.$input_gallery.'
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="submit">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
 <a href="<?=base_index();?>'.str_replace("_", "-", $modul_name).'" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            ';
$modul_edit= '

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      '.ucwords($_POST['page_name']).'
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">Edit '.ucwords($_POST['page_name']).'</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Edit '.ucwords($_POST['page_name']).'</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/'.$modul_name.'/'.$modul_name.'_action.php?act=up">
                      '.$update_element.'
                      <input type="hidden" name="id" value="<?=$data_edit->'.$primary_key.';?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="submit">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
                    <a href="<?=base_index();?>'.str_replace("_", "-", $modul_name).'" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 ';
$modul_detail= '

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     '.ucwords($_POST['page_name']).'
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">Detail '.ucwords($_POST['page_name']).'</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail '.ucwords($_POST['page_name']).'</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      '.$detail_element.'
                   '.$input_multi_image_detail.'
                    </form>
                    <a href="<?=base_index();?>'.str_replace("_", "-", $modul_name).'" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
';
$modul_action = '<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
  case "in":
  '.$if_input_file.'
  '.$if_input_uimager.'
  '.$if_input_uimagef.'
  $data = array('.$for_input_action.');
  '.$for_file_in.'
  '.$for_uimager_in.'
  '.$for_uimagef_in.'
   '.$if_boolean.'
    $in = $db->insert("'.$main_table.'",$data);
    '.$input_multi_image_action.'
    if ($in=true) {
      echo "good";
    } else {
      return false;
    }
    break;
  case "delete":
    '.$for_uimagef_delete.'
    '.$for_uimager_delete.'
    '.$for_file_delete.'
    $db->delete("'.$main_table.'","id",$_GET["id"]);
    break;
  case "up":
   $data = array('.$for_update_action.');
   '.$for_file.'
   '.$for_uimager.'
   '.$for_uimagef.'

    '.$if_boolean.'
    $up = $db->update("'.$main_table.'",$data,"id",$_POST["id"]);
    if ($up=true) {
      echo "good";
    } else {
      return false; 
    }
    break;
  default:
    # code...
    break;
}

?>';
?><?php
$gallery_detail = $gallery_detail_top.'
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Album Gallery
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">Album Gallery</a></li>
                        <li class="active">Detail '.ucwords($_POST['page_name']).'</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail Album Gallery</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

'.$button_gallery_detail.'

  <button onclick="Uploader.upload();" class="btn btn-primary">
    <i class=\'fa fa-plus\'></i> Upload Foto
  </button>
  <div id="wait" class="hide">
    <img src="<?=base_admin();?>assets/dist/img/upload-indicator.gif" alt="">
  </div>

<div>
  <iframe name="hidden_iframe" id="hidden_iframe" class="hide">
  </iframe>
</div>
 
<div id="uploaded_images" align="center">
 
</div>
                  <div class="page-header text-center">

             '.$album_title.'
            var data = JSON.parse(data);
            if (typeof (data[\'error\']) != "undefined") {
                jQuery(\'#uploaded_images\').html(data[\'error\']);
                jQuery(\'#upload_files\').val("");
                jQuery("#wait").addClass(\'hide\');
                return;
            }
            var divs = [];
            jQuery(\'#uploaded_images\').html(divs.join(""));
            jQuery(\'#upload_files\').val("");
            jQuery("#wait").addClass(\'hide\');
        }

        return {
            upload: fnUpload,
            done: fnDone
        }

    }());
</script>';

$list_gallery = '
<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage '.ucwords($_POST['page_name']).'
                    </h1>
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">'.ucwords($_POST['page_name']).' List</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                     <h3 class="box-title">List '.ucwords($_POST['page_name']).'</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>
                  <div class="box-body">
                  <div class="album-top">
<div class="col-md-2 ">
                                                    <?php
       foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url) {
                          if ($role_act["insert_act"]=="Y") {
                    ?>
          <a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'/tambah" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Album</a>
                          <?php
                          } 
                       } 
}
?>
</div>  
<div class="col-md-10">
<form action="" method="get" class="form_cari">
                <div class="input-group col-lg-8">
         <span class="input-group-btn">
<button class="btn btn-default" type="button">Pencarian !</button>
</span>
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                        <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
</form>
</div>
</div>
                     <div class="row">
'.$query_album_on_list.'
                </div>
                <div class="row">
                          <div class="col-xs-6" style="margin-top:10px">
    Showing <?=$count;?> to <?=$no-1;?> of <?=$pg->total_record;?> entries
                        
                        </div>

                        <div class="col-xs-6">
                                    <?php
                                  if (isset($_GET[\'q\'])) {
$pg->url=base_index()."'.$modul_name.'?q=".$_GET[\'q\']."&page=";
                                  }
                                    $pg->setParameter(array(
                                      \'range\'=>$limit,
                                      ));
                                      ?>

                                    <div class="dataTables_paginate paging_bootstrap">
                                    <ul class="pagination">
                                    <?=$pg->create();?>
                                    </ul>
                                    </div>
                        </div>
                </div>
                  </div>
                  </div>
              </div>
</div>
                </section><!-- /.content -->';

$list_table ='
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage '.ucwords($_POST['page_name']).'
                    </h1>
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">'.ucwords($_POST['page_name']).' List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                <h3 class="box-title">List '.ucwords($_POST['page_name']).'</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="dtb_'.$modul_name.'" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>

                          '.$table_header.'
                          <th>Action</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
        <?php
       foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url) {
                          if ($role_act["insert_act"]=="Y") {
                    ?>
          <a href="<?=base_index();?>'.str_replace("_", "-", $modul_name).'/tambah" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
      
  foreach ($db->fetch_all("sys_menu") as $isi) {

  //jika url = url dari table menu
  if ($path_url==$isi->url) {
    //check edit permission
  if ($role_act["up_act"]=="Y") {
  $edit = \'<a href="\'.base_index()."'.strtolower(str_replace(" ", "-", $_POST['page_name']))."/edit/'+aData[indek]+'"."\".'\" class=\"btn btn-primary btn-flat\"><i class=\"fa fa-pencil\"></i></a>\';
  } else {".'
    $edit ="";
  }
  if ($role_act[\'del_act\']==\'Y\') {
   $del = "<span data-id=\'+aData[indek]+\' data-uri=".base_admin()."modul/'.strtolower(str_replace(" ", "_", $_POST['page_name'])).'/'.strtolower(str_replace(" ", "_", $_POST['page_name'])).'_action.php".\' class="btn btn-danger hapus btn-flat"><i class="fa fa-trash"></i></span>\';
  } else {
    $del="";
  }
                   } 
  }
  
?>  
                </section><!-- /.content -->
        <script type="text/javascript">
var dataTable = $("#dtb_'.$modul_name.'").dataTable({
           "fnCreatedRow": function( nRow, aData, iDataIndex ) {
            var indek = aData.length-1;'."           
     $('td:eq('+indek+')', nRow).html(' <a href=\"<?=base_index();?>".strtolower(str_replace(" ", "-", $_POST['page_name']))."/detail/'+aData[indek]+'\" class=\"btn btn-success btn-flat\"><i class=\"fa fa-eye\"></i></a> ".'<?=$edit;?> <?=$del;?>'."');
       $(nRow).attr('id', 'line_'+aData[indek]);
   },
           'bProcessing': true,
            'bServerSide': true,
        'sAjaxSource': '<?=base_admin();?>modul/".strtolower(str_replace(" ", "_", $_POST['page_name']))."/".strtolower(str_replace(" ", "_", $_POST['page_name']))."_data.php',
         /*     'aoColumnDefs': [{
                'bSortable': false,
                'aTargets': [0]
            }]*/
        });</script>  
            ";
$list_table_off ='
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage '.ucwords($_POST['page_name']).'
                    </h1>
                       <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">'.ucwords($_POST['page_name']).' List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                <div class="box-header">
                                  <h3 class="box-title">List '.ucwords($_POST['page_name']).'</h3>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table id="dtb_manual" class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          '.$table_header.'
                          <th>Action</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         '.$select_table.'
                                        </tbody>
                                    </table>
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
        <?php
       foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url) {
                          if ($role_act["insert_act"]=="Y") {
                    ?>
          <a href="<?=base_index();?>'.str_replace("_", "-", $modul_name).'/tambah" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
?>  
                </section><!-- /.content -->
        
';
$list_table_manual ='
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage '.ucwords($_POST['page_name']).'
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">'.ucwords($_POST['page_name']).' List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                 <div class="box-header">
                                
                                       <form action="" method="get" class="form_cari">
                        <div class="input-group col-lg-6">
                 <span class="input-group-btn">
        <button class="btn btn-default" type="button">Pencarian !</button>
      </span>
                            <input type="text" name="q" class="form-control" placeholder="Search..."/>
                            <span class="input-group-btn">
                                <button type="submit" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>
                            </span>
                        </div>
                    </form>
                                </div><!-- /.box-header -->
                                <div class="box-body table-responsive">
                                    <table  class="table table-bordered table-striped">
                                   <thead>
                                     <tr>
                           <th style="width:25px" align="center">No</th>
                          '.$table_header.'
                          <th>Action</th>
                         
                        </tr>
                                      </thead>
                                        <tbody>
                                         '.$select_table.'
                                        </tbody>
                                    </table>
                                    '.$bottom_pagination.'
                                </div><!-- /.box-body -->
                            </div><!-- /.box -->
                        </div>
                    </div>
        <?php
       foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url) {
                          if ($role_act["insert_act"]=="Y") {
                    ?>
          <a href="<?=base_index();?>'.str_replace("_", "-", $modul_name).'/tambah" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah</a>
                          <?php
                          } 
                       } 
}
?>  
                </section><!-- /.content -->
        
';
$modul_data = '
<?php

include "../../inc/config.php";


$tes=$dtable->get("'.$main_table.'", "'.$main_table.'.'.$primary_key.'", array('.$col_head.'"'.$main_table.'.'.$primary_key.'"),"'.$join.'");


?>';

$main = '
<?php
switch ($path_act) {
  case "tambah":
          foreach ($db->fetch_all("sys_menu") as $isi) {
               if ($path_url==$isi->url&&$path_act=="tambah") {
                          if ($role_act["insert_act"]=="Y") {
                             include "'.$modul_name.'_add.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }
    break;
  case "edit":
    $data_edit = $db->fetch_single_row("'.$main_table.'","'.$primary_key.'",$path_id);
        foreach ($db->fetch_all("sys_menu") as $isi) {
                      if ($path_url==$isi->url&&$path_act=="edit") {
                          if ($role_act["up_act"]=="Y") {
                             include "'.$modul_name.'_edit.php";
                          } else {
                            echo "permission denied";
                          }
                       } 

      }

    break;
      case "detail":
    $data_edit = $db->fetch_single_row("'.$main_table.'","'.$primary_key.'",$path_id);
    include "'.$modul_name.'_detail.php";
    break;
  default:
    include "'.$modul_name.'_view.php";
    break;
}

?>';

$modul_add = '
           
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     '.ucwords($_POST['page_name']).'
                    </h1>
                           <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">Tambah '.ucwords($_POST['page_name']).'</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12"> 
        <div class="box box-solid box-primary">
                                 <div class="box-header">
                                    <h3 class="box-title">Tambah '.ucwords($_POST['page_name']).'</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/'.$modul_name.'/'.$modul_name.'_action.php?act=in">
                      '.$input_element.'
                      '.$input_gallery.'
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="submit">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
 <a href="<?=base_index();?>'.str_replace("_", "-", $modul_name).'" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
            ';
$modul_edit= '

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                      '.ucwords($_POST['page_name']).'
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">Edit '.ucwords($_POST['page_name']).'</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Edit '.ucwords($_POST['page_name']).'</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                     <form id="update" method="post" class="form-horizontal" action="<?=base_admin();?>modul/'.$modul_name.'/'.$modul_name.'_action.php?act=up">
                      '.$update_element.'
                      <input type="hidden" name="id" value="<?=$data_edit->'.$primary_key.';?>">
                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat" value="submit">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
                    <a href="<?=base_index();?>'.str_replace("_", "-", $modul_name).'" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
 ';
$modul_detail= '

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     '.ucwords($_POST['page_name']).'
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'">'.ucwords($_POST['page_name']).'</a></li>
                        <li class="active">Detail '.ucwords($_POST['page_name']).'</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                    <h3 class="box-title">Detail '.ucwords($_POST['page_name']).'</h3>
                                    <div class="box-tools pull-right">
                                        <button class="btn btn-info btn-sm" data-widget="collapse"><i class="fa fa-minus"></i></button>
                                        <button class="btn btn-info btn-sm" data-widget="remove"><i class="fa fa-times"></i></button>
                                    </div>
                                </div>

                  <div class="box-body">
                   <form class="form-horizontal">
                      '.$detail_element.'
                   '.$input_multi_image_detail.'
                    </form>
                    <a href="<?=base_index();?>'.str_replace("_", "-", $modul_name).'" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>
          
                  </div>
                  </div>
              </div>
</div>
                  
                </section><!-- /.content -->
        
';
$modul_action = '<?php
session_start();
include "../../inc/config.php";
session_check();
switch ($_GET["act"]) {
  case "in":
  '.$if_input_file.'
  '.$if_input_uimager.'
  '.$if_input_uimagef.'
  $data = array('.$for_input_action.');
  '.$for_file_in.'
  '.$for_uimager_in.'
  '.$for_uimagef_in.'
   '.$if_boolean.'
    $in = $db->insert("'.$main_table.'",$data);
    '.$input_multi_image_action.'
    if ($in=true) {
      echo "good";
    } else {
      return false;
    }
    break;
  case "delete":
    '.$for_uimagef_delete.'
    '.$for_uimager_delete.'
    '.$for_file_delete.'
    $db->delete("'.$main_table.'","'.$primary_key.'",$_GET["id"]);
    break;
  case "up":
   $data = array('.$for_update_action.');
   '.$for_file.'
   '.$for_uimager.'
   '.$for_uimagef.'

    '.$if_boolean.'
    $up = $db->update("'.$main_table.'",$data,"'.$primary_key.'",$_POST["id"]);
    if ($up=true) {
      echo "good";
    } else {
      return false; 
    }
    break;
  default:
    # code...
    break;
}

?>';
?>