<?php
include "../../inc/config.php";
echo "<pre>";
print_r($_POST);

//jika type menu adalah single menu, parent set jadi 0
if ($_POST['type_menu']=='single') {
  $parent = 0;
} else {
  $parent = $_POST['parent'];
}

if(isset($_POST["tampil"])=="on")
    {
      $tampil = "Y";
    } else { 
      $tampil = "N";
    }

if ($_POST['type_menu']=='main') {
     
  $data = array(
    'page_name'=>strtolower($_POST['page_name']),
    'icon'=>$_POST['icon'],
    'urutan_menu'=>$_POST['urutan_menu'],
    'parent'=>$parent,
    'tampil'=>$tampil,
    'type_menu'=>$_POST['type_menu']
    );
  $db->insert('sys_menu',$data);
  
    $last_id= $db->get_last_id();  

  foreach ($db->fetch_all('sys_group_users') as $group) {
    if ($group->id==1) {
      $db->fetch_custom("insert into sys_menu_role(id_menu,group_id,read_act,insert_act,update_act,delete_act)
  values (".$last_id.",".$group->id.",'Y','Y','Y','Y')");
    } else {
      $db->fetch_custom("insert into sys_menu_role(id_menu,group_id,read_act,insert_act,update_act,delete_act)
  values (".$last_id.",".$group->id.",'N','N','N','N')");
    }
    
  }
  exit();
}



$modul_name = str_replace(" ", "_", strtolower($_POST['page_name']));
//mkdir('../../modul/'.$modul_name);
if (!is_dir('../../modul/'.$modul_name)) {
	mkdir('../../modul/'.$modul_name);
}
$main_table = $_POST['table'];
$primary_key = $_POST['primary_key'];
$pilih=array();
$label=array();
$type=array();
$required=array();
$from=array();
$on_value=array();
$on_name=array();
$allowed = array();
$width=array();
$height=array();
$yes_val=array();
$no_val=array();


$select_table='';


if ($_POST['method_table']=='gallery') {
$main_table = $_POST['album_table'];
$primary_key = $_POST['album_primary'];
	$input_gallery_action = '<?php
include "../../inc/config.php";
switch ($_GET["act"]) {
	case "in"://add new album & upload foto
	$data = array("'.$_POST['album_name'].'"=>$_POST["'.$_POST['album_name'].'"],"'.$_POST['deskripsi_album'].'"=>$_POST["'.$_POST['deskripsi_album'].'"]);
		$in = $db->insert("'.$_POST['album_table'].'",$data);
	$id_akhir=$db->get_last_id();
	if (!is_dir("../../../upload/foto_'.$_POST['album_table'].'")) {
	mkdir("../../../upload/foto_'.$_POST['album_table'].'");
	}
	for ($i=0; $i <count($_FILES["foto_banyak"]["name"]) ; $i++) { 
 		 if (!preg_match("/.(jpg|png|jpeg|gif|bmp)$/i", $_FILES["foto_banyak"]["name"][$i]) ) {
							echo "pastikan file yang anda pilih jpg|png|jpeg|gif|bmp";
							exit();
						} else {';
 if(isset($_POST["rename_foto"])=="on")
		{
			$input_gallery_action .='
$filename = $_FILES["foto_banyak"]["name"][$i];
$filename = preg_replace("#[^a-z.0-9]#i", "", $filename); 
$ex = explode(".", $filename); // split filename
$fileExt = end($ex); // ekstensi akhir
 $filename = time().rand().".".$fileExt;//rename nama file';
		} else { 
$input_gallery_action .='$filename = $_FILES["foto_banyak"]["name"][$i];';
		}
$input_gallery_action .='
move_uploaded_file($_FILES["foto_banyak"]["tmp_name"][$i], "../../../upload/foto_'.$_POST['album_table'].'/".$filename);
$db->insert("'.$_POST['foreign_album'].'",array("'.$_POST['foreign_album_nama'].'"=>$filename,"'.$_POST['foreign_album_id'].'"=>$id_akhir));
						}
 	}
		if ($in=true) {
			echo "good";
		} else {
			return false;
		}
		break; //delete album
	case "hapus_album":
		foreach ($db->fetch_custom("select * from '.$_POST['foreign_album'].' where '.$_POST['foreign_album_primary'].'=?",array("'.$_POST['foreign_album_primary'].'"=>$_GET["id"])) as $key) {
			$db->deleteDirectory("../../../upload/foto_'.$_POST['album_table'].'/".$key->'.$_POST['foreign_album_nama'].');
		}
		$db->delete("'.$_POST['album_table'].'","'.$_POST['album_primary'].'",$_GET["id"]);
		break;
		//update desc foto
	case "up_desc":
		$up=$db->update("'.$_POST['foreign_album'].'",array("'.$_POST['foreign_album_desc'].'"=>$_POST["'.$_POST['foreign_album_desc'].'"]),"'.$_POST['foreign_album_primary'].'",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false;
		}
		break;
		//up album name & desc
	case "up_name":
		$data = array("'.$_POST['album_name'].'"=>$_POST["'.$_POST['album_name'].'"],"'.$_POST['deskripsi_album'].'"=>$_POST["'.$_POST['deskripsi_album'].'"],);
		$up = $db->update("'.$_POST['album_table'].'",$data,"'.$_POST['album_primary'].'",$_POST["id"]);
		if ($up=true) {
			echo "good";
		} else {
			return false;
		}
		break;
	//upload tambahan foto di album
	case "up":
$images = array();
	for ($i=0; $i <count($_FILES["foto_banyak"]["name"]) ; $i++) { 
 		 if (!preg_match("/.(jpg|png|jpeg|gif|bmp)$/i", $_FILES["foto_banyak"]["name"][$i]) ) {
$images = array("error"=>"pastikan file yang anda pilih jpg|png|jpeg|gif|bmp");
						} else {';
 if(isset($_POST["rename_foto"])=="on")
		{
			$input_gallery_action .='
$filename = $_FILES["foto_banyak"]["name"][$i];
$filename = preg_replace("#[^a-z.0-9]#i", "", $filename); 
$ex = explode(".", $filename); // split filename
$fileExt = end($ex); // ekstensi akhir
 $filename = time().rand().".".$fileExt;//rename nama file';
		} else { 
$input_gallery_action .='$filename = $_FILES["foto_banyak"]["name"][$i];';
		}
$input_gallery_action .='		
move_uploaded_file($_FILES["foto_banyak"]["tmp_name"][$i], "../../../upload/foto_'.$_POST['album_table'].'/".$filename);
$db->insert("'.$_POST['foreign_album'].'",array("'.$_POST['foreign_album_nama'].'"=>$filename,"'.$_POST['foreign_album_id'].'"=>$_POST["id"]));
$images[] = "../../../../upload/foto_'.$_POST['album_table'].'/".$filename;
						}
 	}
?>
<script type="text/javascript">
  window.parent.Uploader.done(\'<?php echo json_encode($images); ?>\');
  </script>
<?php
		break;
case "hapus_foto":
	$db->deleteDirectory("../../../upload/foto_'.$_POST['album_table'].'/".$db->fetch_single_row("'.$_POST['foreign_album'].'","'.$_POST['foreign_album_primary'].'",$_GET["id"])->'.$_POST['foreign_album_nama'].');
		$db->delete("'.$_POST['foreign_album'].'","'.$_POST['foreign_album_primary'].'",$_GET["id"]);
	break;
	default:
		# code...
		break;
}
?>';

$query_album_on_list = '
<?php 
 $limit =12;
        $search ="";
        if (isset($_GET["q"])) {
          $search_condition = $db->getRawWhereFilterForColumns
          ($_GET["q"], array("'.$_POST['album_name'].'"));
          $search = "where $search_condition";
        }

    $dtb=$pg->myquery("select * from '.$_POST['album_table'].' $search",$limit);
       $no=$pg->Num($limit);
        $count=$pg->Num($limit);

        if ($dtb->rowCount()<1) {
        echo\'<div class="col-xs-6" style="margin-top:10px">
    No matching records found    
                        </div>\';
      }
      foreach ($dtb as $isi) {

      $sub=$db->fetch_custom("select count('.$_POST['foreign_album_primary'].') as jml,'.$_POST['foreign_album_nama'].' from '.$_POST['foreign_album'].' where '.$_POST['foreign_album_id'].'=\'$isi->id\' limit 1"); 

        foreach ($sub as $sb) {
          ?>
<div class="col-sm-4"> 
<article class="album"> 
<header> 
<a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'/detail/<?=$isi->id;?>"> 
<img class="img-responsive gambar" src="<?=base_url();?>upload/foto_'.$_POST['album_table'].'/<?=$sb->'.$_POST['foreign_album_nama'].';?>"> 
</a> 

</header> 
<section class="album-info"> 
<h3>
<a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'/detail/<?=$isi->id;?>"><?=$isi->'.$_POST['album_name'].';?></a>
</h3> 
<p><?=$isi->'.$_POST['deskripsi_album'].';?></p> 
</section> 
<footer> 
<div class="album-images-count"> <i class="fa fa-picture-o"></i>
<?=$sb->jml;?>
</div> 
<div class="album-options">
<a class="hapus_album" data-id="<?=$data_edit->'.$_POST['album_primary'].';?>" data-uri="<?=base_admin();?>modul/'.$modul_name.'/'.$modul_name.'_action.php" data-gallery="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'"><i class="fa fa-trash"></i></a>
 </div> 
 </footer> 
 </article> 
 </div> 
                <?php
        }
    $no++;
}
?>';
$input_gallery = '
<form id="input" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/'.strtolower(str_replace(" ", "_", $_POST['page_name'])).'/'.$modul_name.'_action.php?act=in">
                      <div class="form-group">
                        <label for="Nama Album" class="control-label col-lg-2">Nama Album</label>
                        <div class="col-lg-10">
                          <input type="text" name="'.$_POST['album_name'].'" placeholder="Nama Album" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label for="Nama Album" class="control-label col-lg-2">Deskripsi Album</label>
                        <div class="col-lg-10">
                          <input type="text" name="'.$_POST['deskripsi_album'].'" placeholder="Deskripsi Album" class="form-control" required> 
                        </div>
                      </div><!-- /.form-group -->
                      <div class="form-group">
                        <label class="control-label col-lg-2">Foto</label>
                        <div class="col-lg-10">
                          <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                              <img data-src="holder.js/100%x100%" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> 
                                <input type="file" name="foto_banyak[]" accept="image/*">
                              </span> 
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                            </div>
                          </div>
                            <span id="add_next">
                  </span>
                             <span class="btn btn-primary btn-flat" onClick="add_multi()"><i class="fa fa-plus"></i> Tambah Foto</span>
               
                        </div>
                      </div>';
$gallery_detail_top = '
<div class="modal" id="foto-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h4 class="modal-title">Edit Deskripsi Foto</h4> </div> <div class="modal-body"> <form id="upfoto" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/'.str_replace(" ", "_", $_POST['page_name']).'/'.str_replace(" ", "_", $_POST['page_name']).'_action.php?act=up_desc" novalidate="novalidate"> <div class="form-group"> <label for="nama_album" class="control-label col-lg-3">Deskripsi Foto</label> <div class="col-lg-9"> <input type="text" name="'.$_POST['foreign_album_desc'].'" placeholder="Deskripsi Foto" id="desc_foto" class="form-control"> </div> </div><!-- /.form-group --> <input id="id" type="hidden" name="id"> </div> <div class="modal-footer"> <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary" id="save">Save changes</button> </form> </div> </div><!-- /.modal-content --> </div><!-- /.modal-dialog --> </div><!-- /.modal --> <div class="modal" id="album-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h4 class="modal-title">Edit Album</h4> </div> <div class="modal-body"> <form id="upalb" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/'.$modul_name.'/'.$modul_name.'_action.php?act=up_name" novalidate="novalidate"> <div class="form-group"> <label for="nama_album" class="control-label col-lg-3">Nama Album</label> <div class="col-lg-9"> <input value="<?=$data_edit->'.$_POST['album_name'].';?>" type="text" name="'.$_POST['album_name'].'" required="required" placeholder="nama_album" id="nama_album" class="form-control"> </div> </div><!-- /.form-group --> <div class="form-group"> <label for="deskripsi_album" class="control-label col-lg-3">Deskripsi Album</label> <div class="col-lg-9"> <textarea id="desc_album" name="'.$_POST['deskripsi_album'].'" class="form-control"><?=$data_edit->'.$_POST['deskripsi_album'].';?></textarea> </div> </div><!-- /.form-group --> <input type="hidden" name="id" value="<?=$data_edit->'.$_POST['album_primary'].';?>"> </div> <div class="modal-footer"> <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary" id="save">Save changes</button> </form> </div> </div><!-- /.modal-content --> </div><!-- /.modal-dialog --> </div><!-- /.modal -->
';
$button_gallery_detail = '
                  <div class="box-body">
<button class="btn edit_album"><i class="fa fa-pencil"></i> Edit Album</button>
<div id="upload_form" class="hide">
  <form action="<?=base_admin();?>modul/'.$modul_name.'/'.$modul_name.'_action.php?act=up" target="hidden_iframe" enctype="multipart/form-data" method="post">
  <input type="hidden" name="id" value="<?=$data_edit->'.$_POST['album_primary'].';?>">
    <input type="file" multiple name="foto_banyak[]" id="upload_files" multiple accept=\'image/*\'>
  </form>
</div>';
$album_title = '
     <h2 class=\'title_album\'>
               <?=$data_edit->'.$_POST['album_name'].';?>
              </h2>
               <h4 class=\'desc_album\'><?=$data_edit->'.$_POST['deskripsi_album'].';?></h4>
                 </div>
<div id="update_content">               
 <div class="row" id="row_foto">
<?php 
 $limit =12;
$fotos=$pg->myquery("select * from '.$_POST['foreign_album'].' where '.$_POST['foreign_album_id'].'=\'".$data_edit->'.$_POST['album_primary'].'."\' order by '.$_POST['foreign_album_primary'].' desc ",$limit);
       $no=$pg->Num($limit);
        $count=$pg->Num($limit);
  if ($fotos->rowCount()<1) {
        echo "No matching records found";
      }
    foreach ($fotos as $foto) {
      ?>
       <div class="col-lg-3 col-md-3 col-xs-6 thumb" id="foto_<?=$foto->'.$_POST['foreign_album_primary'].';?>">
        <span id="foto_list">
      <a class="fancybox" rel="gallery1" id="the_foto_<?=$foto->'.$_POST['foreign_album_primary'].';?>" href="<?=base_url();?>upload/foto_'.$_POST['album_table'].'/<?=$foto->'.$_POST['foreign_album_nama'].';?>" title="<?=$foto->'.$_POST['foreign_album_desc'].';?> ">
      <img class="img-responsive gambar_list" src="../../../../upload/foto_'.$_POST['album_table'].'/<?=$foto->'.$_POST['foreign_album_nama'].';?>" />
    </a>
    <span data-id="<?=$foto->'.$_POST['foreign_album_primary'].';?>" data-desc="<?=$foto->'.$_POST['foreign_album_desc'].';?>" class="btn btn-default btn-flat up_foto"><i class="fa fa-pencil icon"></i></span>

    <span data-id="<?=$foto->'.$_POST['foreign_album_primary'].';?>" data-uri="<?=base_admin();?>modul/'.$modul_name.'/'.$modul_name.'_action.php" class="btn btn-danger btn-flat hapus_foto"><i class="fa fa-trash"></i></span>
    </span>
            </div>

  <?php
      $no++;
    }
      ?>

                  </div>
</div>  

                  <div class="row">
                          <div class="col-xs-6" style="margin-top:10px">
    Showing <?=$count;?> to <?=$no-1;?> of <?=$pg->total_record;?> entries
                        
                        </div>

                        <div class="col-xs-6">
                          
                                    <?php
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
              

<a href="<?=base_index();?>'.strtolower(str_replace(' ', '-', $_POST['page_name'])).'" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>
                  </div>
                  </div>
              </div>
</div>       
                </section><!-- /.content -->
<script>

function update_content(val)
{
  $.ajax({
      url: "<?=base_admin();?>modul/'.$modul_name.'/'.$modul_name.'_remote.php?id="+val,
      success:function(data){
      
        $("#update_content").html(data);
        }
      });
}
var Uploader = (function () {

        jQuery(\'#upload_files\').on(\'change\', function () {
            jQuery("#wait").removeClass(\'hide\');
            jQuery(\'#upload_files\').parent(\'form\').submit();
        });

        var fnUpload = function () {
            jQuery(\'#upload_files\').trigger(\'click\');
        }

        var fnDone = function (data) {
     
           update_content(\'<?=$data_edit->'.$_POST['album_primary'].';?>\');';
$gallery_remote = '
<div class="row" id="row_foto">
<?php 
include "../../inc/config.php";
$id = $_GET[\'id\'];
 $limit =12;
$fotos=$pg->myquery("select * from '.$_POST['foreign_album'].' where '.$_POST['foreign_album_id'].'=\'".$id."\' order by '.$_POST['foreign_album_primary'].' desc ",$limit);
       $no=$pg->Num($limit);
        $count=$pg->Num($limit);
   
    foreach ($fotos as $foto) {
      ?>
       <div class="col-lg-3 col-md-3 col-xs-6 thumb" id="foto_<?=$foto->'.$_POST['foreign_album_primary'].';?>">
        <span id="foto_list">
      <a class="fancybox" rel="gallery1" id="the_foto_<?=$foto->'.$_POST['foreign_album_primary'].';?>" href="<?=base_url();?>upload/foto_'.$_POST['album_table'].'/<?=$foto->'.$_POST['foreign_album_nama'].';?>" title="<?=$foto->'.$_POST['foreign_album_desc'].';?> ">
      <img class="img-responsive" src="../../../../upload/foto_'.$_POST['album_table'].'/<?=$foto->'.$_POST['foreign_album_nama'].';?>" />
    </a>
    <span data-id="<?=$foto->'.$_POST['foreign_album_primary'].';?>" data-desc="<?=$foto->'.$_POST['foreign_album_desc'].';?>" class="btn btn-default btn-flat up_foto"><i class="fa fa-pencil icon"></i></span>

    <span data-id="<?=$foto->'.$_POST['foreign_album_primary'].';?>" data-uri="<?=base_admin();?>modul/'.$modul_name.'/'.$modul_name.'_action.php" class="btn btn-danger btn-flat hapus_foto"><i class="fa fa-trash"></i></span>
    </span>
            </div>

  <?php
      $no++;
    }
      ?>
                  </div>';
}

elseif ($_POST['method_table']=='dtb_server') {
	for ($i=0; $i <count($_POST['join_cond']) ; $i++) { 
	$join.= " ".$_POST['join_cond'][$i]." join ".$_POST['join_with'][$i]." on ".$_POST['join_on_first'][$i]."=".$_POST['join_on_next'][$i];
	}
} elseif ($_POST['method_table']=='dtb_manual') {

	foreach ($_POST['dipilih1'] as $key => $value) {

	$col1 =implode(",", array_keys($_POST['dipilih1']));

	$exp_key=explode(".", $key);
	$col .='<td><?=$isi->'.$exp_key[1].';?></td>'.PHP_EOL;
	}
	if (count($_POST['join_cond']>1)) {
		for ($i=0; $i <count($_POST['join_cond']) ; $i++) { 
			$join1.= " ".$_POST['join_cond'][$i]." join ".$_POST['join_with'][$i]." on ".$_POST['join_on_first'][$i]."=".$_POST['join_on_next'][$i];
		}
			$select_table = '<?php 
			$dtb=$db->fetch_custom("select '.$col1.','.$main_table.'.'.$primary_key.' from '.$main_table.' '.$join1.'");
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->'.$primary_key.';?>">
        <td align="center"><?=$i;?></td>'.$col.'
        <td>
        <a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'/detail/<?=$isi->'.$primary_key.';?>" class="btn btn-success btn-flat"><i class="fa fa-eye"></i></a> 
        <?=($role_act["up_act"]=="Y")?\'<a href="\'.base_index().\''.strtolower(str_replace(" ", "-", $_POST['page_name'])).'/edit/\'.$isi->'.$primary_key.'.\'" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></a>\':"";?>  
        <?=($role_act["del_act"]=="Y")?\'<button class="btn btn-danger hapus btn-flat" data-uri="\'.base_admin().\'modul/'.strtolower(str_replace(" ", "_", $_POST['page_name'])).'/'.$modul_name.'_action.php" data-id="\'.$isi->'.$primary_key.'.\'"><i class="fa fa-trash-o"></i></button>\':"";?>
        </td>
        </tr>
				<?php
				$i++;
			}
			?>';
	} else {
			$select_table = '<?php 
			$dtb=$db->fetch_custom("select '.$col1.' from '.$main_table.'");
			$i=1;
			foreach ($dtb as $isi) {
				?><tr id="line_<?=$isi->'.$primary_key.';?>"><td align="center"><?=$i;?></td>
        '.$col.';
        <td>
        <a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'/detail/<?=$isi->'.$primary_key.';?>" class="btn btn-success btn-flat"><i class="fa fa-eye"></i></a>
        <?=($role_act["up_act"]=="Y")?\'<a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'/edit/<?=$isi->'.$primary_key.';?>" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></a>\':"";?>
        <?=($role_act["del_act"]=="Y")?\'<button class="btn btn-danger hapus btn-flat" data-uri="\'.base_admin().\'modul/'.strtolower(str_replace(" ", "_", $_POST['page_name'])).'/'.$modul_name.'_action.php" data-id="\'.$isi->'.$primary_key.'.\'"><i class="fa fa-trash-o"></i></button>\':"";?>
        </td>
        </tr>
				<?php
			$i++;
			}
			?>';
	}

} elseif ($_POST['method_table']=='manual_pagination') {
	foreach ($_POST['dipilih1'] as $key => $value) {

  $col1 =implode(",", array_keys($_POST['dipilih1']));

  $exp_key=explode(".", $key);
  $col .='<td><?=$isi->'.$exp_key[1].';?></td>'.PHP_EOL;
  $col_search.='"'.$exp_key[1].'",';
  }
  if (count($_POST['join_cond']>1)) {
    for ($i=0; $i <count($_POST['join_cond']) ; $i++) { 
      $join1.= " ".$_POST['join_cond'][$i]." join ".$_POST['join_with'][$i]." on ".$_POST['join_on_first'][$i]."=".$_POST['join_on_next'][$i];
    }
      $select_table = '<?php 
      $limit =10;
        $search ="";
        if (isset($_GET["q"])) {
          $search_condition = $db->getRawWhereFilterForColumns
          ($_GET["q"], array('.$col_search.'));
          $search = "where $search_condition";
        }

      $dtb=$pg->myquery("select '.$col1.','.$main_table.'.'.$primary_key.' from '.$main_table.' '.$join1.' $search",$limit);
       $no=$pg->Num($limit);
        $count=$pg->Num($limit);
      if ($dtb->rowCount()<1) {
        echo "<tr><td colspan=\''.(count($_POST['dipilih1'])+2).'\'>No matching records found</td></tr>";
      }
      foreach ($dtb as $isi) {
        ?><tr id="line_<?=$isi->'.$primary_key.';?>">
        <td align="center"><?=$no;?></td>'.$col.'
        <td>
        <a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'/detail/<?=$isi->'.$primary_key.';?>" class="btn btn-success btn-flat"><i class="fa fa-eye"></i></a>
        <?=($role_act["up_act"]=="Y")?\'<a href="\'.base_index().\''.strtolower(str_replace(" ", "-", $_POST['page_name'])).'/edit/\'.$isi->'.$primary_key.'.\'" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></a>\':"";?>
        <?=($role_act["del_act"]=="Y")?\'<button class="btn btn-danger hapus btn-flat" data-uri="\'.base_admin().\'modul/'.strtolower(str_replace(" ", "_", $_POST['page_name'])).'/'.$modul_name.'_action.php" data-id="\'.$isi->'.$primary_key.'.\'"><i class="fa fa-trash-o"></i></button>\':"";?>
        </td>
        </tr>
        <?php
        $no++;
      }
      ?>';

      $bottom_pagination='<div class="col-xs-6" style="margin-top:10px">
    Showing <?=$count;?> to <?=$no-1;?> of <?=$pg->total_record;?> entries
                        
                        </div>

                        <div class="col-xs-6">
                          
                                    <?php
                                  if (isset($_GET[\'q\'])) {
$pg->url=base_index()."'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'?q=".$_GET[\'q\']."&page=";
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
                        </div>';
  } else {
      $select_table = '<?php 
      $limit =10;
        $search ="";
        if (isset($_GET["q"])) {
          $search_condition = $db->getRawWhereFilterForColumns
          ($_GET["q"], array("nama_jurusan", "nama_fak"));
          $search = "where $search_condition";
        }
      $dtb=$pg->myquery("select '.$col1.' from '.$main_table.' $search",$limit);
      $no=$pg->Num($limit);
        $count=$pg->Num($limit);
      if ($dtb->rowCount()<1) {
        echo "<tr><td colspan=\''.(count($_POST['dipilih1'])+2).'\'>No matching records found</td></tr>";
      }
      foreach ($dtb as $isi) {
        ?><tr id="line_<?=$isi->'.$primary_key.';?>">
        <td align="center"><?=$no;?></td>'.$col.';
        <td>
        <a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'/detail/<?=$isi->'.$primary_key.';?>" class="btn btn-success btn-flat"><i class="fa fa-eye"></i></a>
        <?=($role_act["up_act"]=="Y")?\'<a href="<?=base_index();?>'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'/edit/<?=$isi->'.$primary_key.';?>" class="btn btn-primary btn-flat"><i class="fa fa-pencil"></i></a>\':"";?>
        <?=($role_act["del_act"]=="Y")?\'<button class="btn btn-danger btn-flat" data-uri="\'.base_admin().\'modul/'.strtolower(str_replace(" ", "_", $_POST['page_name'])).'/'.$modul_name.'_action.php" data-id="\'.$isi->'.$primary_key.'.\'"><i class="fa fa-trash-o"></i></button>\':"";?>
        </td>
        </tr>
        <?php
      $no++;
      }
      ?>';
      $bottom_pagination='<div class="col-xs-6" style="margin-top:10px">
    Showing <?=$count;?> to <?=$no-1;?> of <?=$pg->total_record;?> entries
                        
                        </div>

                        <div class="col-xs-6">
                          
                                    <?php
                                  if (isset($_GET[\'q\'])) {
                                    $pg->url=base_index()."'.strtolower(str_replace(" ", "-", $_POST['page_name'])).'?q=".$_GET[\'q\']."&page=";
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
                        </div>';
  }	
}



//list table creation

foreach ($_POST['dipilih1'] as $key => $value) {
	$thead[$key]=$value;
	$col_head .="'$key',";
}

//label list table 
foreach ($_POST['label1'] as $key => $value) {
	if (in_array($key, array_keys($thead)) ) {
		$table_header .="<th>$value</th>".PHP_EOL."\t\t\t\t\t\t\t\t\t\t\t\t\t";
	}
}

//checked berarti dibuath crud
foreach ($_POST['dipilih'] as $key => $value) {
	$pilih[$key]=$value;
}

//for label, 
foreach (array_filter($_POST['label']) as $key => $value) {
	//check if sama dengan array yang ada di dipilih
	if (in_array($key, array_keys($pilih)) ) {
		$label[$key]=$value;
	}
		
	
}
//required checkbox
foreach ($_POST['required'] as $key => $value) {
	if (in_array($key, array_keys($pilih)) ) {
	$required[$key]=$value;
	}
}
//pilih type
foreach ($_POST['type'] as $key => $value) {
	if (in_array($key, array_keys($pilih)) ) {
	$type[$key]=$value;
	}
}

//from 
foreach ($_POST['from'] as $key => $value) {
	$from[$key]=$value;
}

//on value 
foreach ($_POST['on_value'] as $key => $value) {
	$on_value[$key]=$value;
}
//on name 
foreach ($_POST['on_name'] as $key => $value) {
	$on_name[$key]=$value;
}
//allowed upload file

foreach ($_POST['alowed'] as $key => $value) {
	$allowed[$key]=$value;
}

//witdh upload image resize
foreach ($_POST['width'] as $key => $value) {
	$width[$key]=$value;
}
//heigh upload image resize
foreach ($_POST['height'] as $key => $value) {
	$height[$key]=$value;
}

//boolean yes value 
foreach ($_POST['yes_val'] as $key => $value) {
	$yes_val[$key]=$value;
}
//boolean no value
foreach ($_POST['no_val'] as $key => $value) {
	$no_val[$key]=$value;
}

$tes = array_merge_recursive($pilih,$label,$type,$required,$from,$on_value,$on_name,$allowed,$width,$height,$yes_val,$no_val);

$i=1;
foreach ($tes as $key => $value) {

	if ($value[3]=='on') {
		$required="required";
	} else {
		$required='';
	}

	if ($value[2]=='text') {
		$input='<input type="text" name="'.$key.'" placeholder="'.$value[1].'" class="form-control" '.$required.'> ';
		$update='<input type="text" name="'.$key.'" value="<?=$data_edit->'.$key.';?>" class="form-control" '.$required.'> ';
		$detail='<input type="text" disabled="" value="<?=$data_edit->'.$key.';?>" class="form-control">';
		
		$input_action = '"'.$key.'"=>$_POST["'.$key.'"],';
		$update_action = '"'.$key.'"=>$_POST["'.$key.'"],';
	}elseif ($value[2]=='email') {
	$input='<input type="text" data-rule-email="true" name="'.$key.'" placeholder="'.$value[1].'" class="form-control" '.$required.'> ';
		$update='<input type="text"  data-rule-email="true" name="'.$key.'" value="<?=$data_edit->'.$key.';?>" class="form-control" '.$required.'> ';
		$detail='<input type="text" disabled="" value="<?=$data_edit->'.$key.';?>" class="form-control">';
		$input_action = '"'.$key.'"=>$_POST["'.$key.'"],';
		$update_action = '"'.$key.'"=>$_POST["'.$key.'"],';
	} elseif ($value[2]=='textarea') {
		$input ='<textarea id="editbox" name="'.$key.'" class="editbox"></textarea>';
		$update='<textarea id="editbox" name="'.$key.'" class="editbox"'.$required.'><?=$data_edit->'.$key.';?> </textarea>';
		$detail='<textarea id="editbox" name="'.$key.'" disabled="" class="editbox"'.$required.'><?=$data_edit->'.$key.';?> </textarea>';
		$input_action = '"'.$key.'"=>$_POST["'.$key.'"],';
		$update_action = '"'.$key.'"=>$_POST["'.$key.'"],';
	} elseif ($value[2]=='number') {
		$input='<input type="text" data-rule-number="true" name="'.$key.'" placeholder="'.$value[1].'" class="form-control" '.$required.'> ';
		$update='<input type="text" data-rule-number="true" name="'.$key.'" value="<?=$data_edit->'.$key.';?>" class="form-control" '.$required.'> ';
		$detail='<input type="text" disabled="" value="<?=$data_edit->'.$key.';?>" class="form-control">';
		$input_action = '"'.$key.'"=>$_POST["'.$key.'"],';
		$update_action = '"'.$key.'"=>$_POST["'.$key.'"],';
	}elseif ($value[2]=='date') {
		$detail='<input type="text" disabled="" value="<?=tgl_indo($data_edit->'.$key.');?>" class="form-control">';
		$input='<input type="text" id="tgl'.$i.'" data-rule-date="true" name="'.$key.'" placeholder="'.$value[1].'" class="form-control" '.$required.'> ';
		$update='<input type="text" id="tgl'.$i.'" data-rule-date="true" name="'.$key.'" value="<?=$data_edit->'.$key.';?>" class="form-control" '.$required.'> ';
		$i++;
		$input_action = '"'.$key.'"=>$_POST["'.$key.'"],';
		$update_action = '"'.$key.'"=>$_POST["'.$key.'"],';
	} elseif ($value[2]=='boolean') {
		$input = '<input name="'.$key.'" class="make-switch" type="checkbox" checked>';
		if ($value[3]=='on') {
			$isi_yes=$value[4];
			$isi_no = $value[5];
		} else {
			$isi_yes=$value[3];
			$isi_no = $value[4];
		}
		$if_boolean.= 'if(isset($_POST["'.$key.'"])=="on")
		{
			$'.$key.' = array("'.$key.'"=>"'.$isi_yes.'");
			$data=array_merge($data,$'.$key.');
		} else { 
			$'.$key.' = array("'.$key.'"=>"'.$isi_no.'");
			$data=array_merge($data,$'.$key.');
		}';

		$update = '<?php if ($data_edit->'.$key.'=="'.$isi_yes.'") {
			?>
			<input name="'.$key.'" class="make-switch" type="checkbox" checked>
			<?php
		} else {
			?>
			<input name="'.$key.'" class="make-switch" type="checkbox">
			<?php
		}?>';
		$detail='<?php if ($data_edit->'.$key.'=="'.$isi_yes.'") {
			?>
			<input name="'.$key.'" class="make-switch" disabled type="checkbox" checked>
			<?php
		} else {
			?>
			<input name="'.$key.'" class="make-switch" disabled type="checkbox">
			<?php
		}?>';
		$input_action = '';
             $update_action = '';

	}
	elseif ($value[2]=='select')
	{
		if ($value[3]=='on') {
			$val = explode('.', $value[5]);
			$val_name = explode('.', $value[6]);
			$from_table=$value[4];
		} else {
			$val = explode('.', $value[4]);
			$val_name = explode('.', $value[5]);
			$from_table=$value[3];
		}

		$input ='<select name="'.$key.'" data-placeholder="Pilih '.$value[1].' ..." class="form-control chzn-select" tabindex="2" '.$required.'>
               <option value=""></option>
               <?php foreach ($db->fetch_all("'.$from_table.'") as $isi) {
               		echo "<option value=\'$isi->'.$val[1].'\'>$isi->'.$val_name[1].'</option>";
               } ?>
              </select>';
        $update = '<select name="'.$key.'" data-placeholder="Pilih '.$value[1].'..." class="form-control chzn-select" tabindex="2" '.$required.'>
               <option value=""></option>
               <?php foreach ($db->fetch_all("'.$from_table.'") as $isi) {

               		if ($data_edit->'.$key.'==$isi->'.$val[1].') {
               			echo "<option value=\'$isi->'.$val[1].'\' selected>$isi->'.$val_name[1].'</option>";
               		} else {
               		echo "<option value=\'$isi->'.$val[1].'\'>$isi->'.$val_name[1].'</option>";
               			}
               } ?>
              </select>';
        $detail='<?php foreach ($db->fetch_all("'.$from_table.'") as $isi) {
               		if ($data_edit->'.$key.'==$isi->'.$val[1].') {

               			echo "<input disabled class=\'form-control\' type=\'text\' value=\'$isi->'.$val_name[1].'\'>";
               		}
               } ?>
              ';
             $input_action = '"'.$key.'"=>$_POST["'.$key.'"],';
             $update_action = '"'.$key.'"=>$_POST["'.$key.'"],';
	} //upload file 
	elseif($value[2]=='ufile')
	{
		if ($value[3]=='on') {
			$tipe_alow=$value[4];
		} else {
			$tipe_alow=$value[3];
		}
		$input = '<div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="input-group">
                              <div class="form-control uneditable-input span3" data-trigger="fileinput">
                                <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span> 
                              </div>
                              <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span> 
                                <input type="file" name="'.$key.'" '.$required.'>
                              </span> 
                              <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                            </div>
                          </div>';
                          $if_input_file = 'if (!is_dir("../../../upload/'.$modul_name.'")) {
							mkdir("../../../upload/'.$modul_name.'");
						}';
		$update = '<div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="input-group">
                              <div class="form-control uneditable-input span3" data-trigger="fileinput">
                                <i class="glyphicon glyphicon-file fileinput-exists"></i> <span class="fileinput-filename"></span> 
                              </div>
                              <span class="input-group-addon btn btn-default btn-file"><span class="fileinput-new">Select file</span> <span class="fileinput-exists">Change</span> 
                                <input type="file" name="'.$key.'">
                              </span> 
                              <a href="#" class="input-group-addon btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 

                            </div>
                             <a href="../../../../upload/'.$modul_name.'/<?=$data_edit->'.$key.'?>"><?=$data_edit->'.$key.'?></a>
                          </div>';
                        
                          $for_file_in .= '
                    if (!preg_match("/.('.$tipe_alow.')$/i", $_FILES["'.$key.'"]["name"]) ) {

							echo "pastikan file yang anda pilih '.$tipe_alow.'";
							exit();

						} else {
							move_uploaded_file($_FILES["'.$key.'"]["tmp_name"], "../../../upload/'.$modul_name.'/".$_FILES[\''.$key.'\'][\'name\']);
							$'.$key.' = array("'.$key.'"=>$_FILES["'.$key.'"]["name"]);
							$data = array_merge($data,$'.$key.');
						}';
                         $for_file .= '
                         if(isset($_FILES["'.$key.'"]["name"])) {
                        if (!preg_match("/.('.$tipe_alow.')$/i", $_FILES["'.$key.'"]["name"]) ) {

							echo "pastikan file yang anda pilih '.$tipe_alow.'";
							exit();

						} else {
							move_uploaded_file($_FILES["'.$key.'"]["tmp_name"], "../../../upload/'.$modul_name.'/".$_FILES[\''.$key.'\'][\'name\']);
							$db->deleteDirectory("../../../upload/'.$modul_name.'/".$db->fetch_single_row("'.$main_table.'","'.$primary_key.'",$_POST["id"])->'.$key.');
							$'.$key.' = array("'.$key.'"=>$_FILES["'.$key.'"]["name"]);
							$data = array_merge($data,$'.$key.');
						}

                         }';
//delete image action
$for_file_delete = '$db->deleteDirectory("../../../upload/'.$modul_name.'/".$db->fetch_single_row("'.$main_table.'","'.$primary_key.'",$_POST["id"])->'.$key.');';

        $detail='<input type="text" disabled="" value="<?=$data_edit->'.$key.';?>" class="form-control">';
                          $input_action = '';
             $update_action = '';
	} elseif ($value[2]=='uimager') {
		if ($value[3]=='on') {
			$height_crop=$value[4];
			$width_crop=$value[5];
		} else {
			$height_crop=$value[3];
			$width_crop=$value[4];
		}
		$detail='<div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                    <img src="../../../../upload/'.$modul_name.'/<?=$data_edit->'.$key.'?>"></div>
                  </div>';
		        $input = '<div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                              <img data-src="holder.js/100%x100%" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> 
                                <input type="file" name="'.$key.'" accept="image/*">
                              </span> 
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                            </div>
                          </div>';
          $if_input_uimager = 'if (!is_dir("../../../upload/'.$modul_name.'")) {
							mkdir("../../../upload/'.$modul_name.'");
						}';
		    $for_uimager_in .= '
                    if (!preg_match("/.(png|jpg|jpeg|gif|bmp)$/i", $_FILES["'.$key.'"]["name"]) ) {

							echo "pastikan file yang anda pilih png|jpg|jpeg|gif";
							exit();

						} else {
$db->compressImage($_FILES["'.$key.'"]["type"],$_FILES["'.$key.'"]["tmp_name"],"../../../upload/'.$modul_name.'/",$_FILES["'.$key.'"]["name"],'.$height_crop.','.$width_crop.');
						$'.$key.' = array("'.$key.'"=>$_FILES["'.$key.'"]["name"]);
							$data = array_merge($data,$'.$key.');
						}';

   $for_uimager .= '
                         if(isset($_FILES["'.$key.'"]["name"])) {
                        if (!preg_match("/.(png|jpg|jpeg|gif|bmp)$/i", $_FILES["'.$key.'"]["name"]) ) {

							echo "pastikan file yang anda pilih gambar";
							exit();

						} else {
$db->compressImage($_FILES["'.$key.'"]["type"],$_FILES["'.$key.'"]["tmp_name"],"../../../upload/'.$modul_name.'/",$_FILES["'.$key.'"]["name"],'.$height_crop.','.$width_crop.');
							$db->deleteDirectory("../../../upload/'.$modul_name.'/".$db->fetch_single_row("'.$main_table.'","'.$primary_key.'",$_POST["id"])->'.$key.');
							$'.$key.' = array("'.$key.'"=>$_FILES["'.$key.'"]["name"]);
							$data = array_merge($data,$'.$key.');
						}

                         }';
   $for_uimager_delete .= '
		$db->deleteDirectory("../../../upload/'.$modul_name.'/".$db->fetch_single_row("'.$main_table.'","'.$primary_key.'",$_POST["id"])->'.$key.');';

$update = '<div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                             <img src="../../../../upload/'.$modul_name.'/<?=$data_edit->'.$key.'?>">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> 
                                <input type="file" name="'.$key.'" accept="image/*">
                              </span> 
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                            </div>
                          </div>';
                       $input_action = '';
             $update_action = '';
		
	}elseif ($value[2]=='uimagef') {
		$detail='<div class="fileinput fileinput-new" data-provides="fileinput">
                    <div class="fileinput-preview thumbnail" data-trigger="fileinput" style="width: 200px; height: 150px;">
                    <img src="../../../../upload/'.$modul_name.'/<?=$data_edit->'.$key.'?>"></div>
                  </div>';
        $input = '<div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                              <img data-src="holder.js/100%x100%" alt="...">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> 
                                <input type="file" name="'.$key.'" accept="image/*">
                              </span> 
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                            </div>
                          </div>';
          $if_input_uimagef = 'if (!is_dir("../../../upload/'.$modul_name.'")) {
							mkdir("../../../upload/'.$modul_name.'");
						}';
		    $for_uimagef_in .= '
                    if (!preg_match("/.(png|jpg|jpeg|gif|bmp)$/i", $_FILES["'.$key.'"]["name"]) ) {

							echo "pastikan file yang anda pilih png|jpg|jpeg|gif";
							exit();

						} else { 
			move_uploaded_file($_FILES["'.$key.'"]["tmp_name"], "../../../upload/'.$modul_name.'/".$_FILES[\''.$key.'\'][\'name\']);
				
						$'.$key.' = array("'.$key.'"=>$_FILES["'.$key.'"]["name"]);
							$data = array_merge($data,$'.$key.');
						}';

   $for_uimagef .= '
                         if(isset($_FILES["'.$key.'"]["name"])) {
                        if (!preg_match("/.(png|jpg|jpeg|gif|bmp)$/i", $_FILES["'.$key.'"]["name"]) ) {

							echo "pastikan file yang anda pilih gambar";
							exit();

						} else {
			move_uploaded_file($_FILES["'.$key.'"]["tmp_name"], "../../../upload/'.$modul_name.'/".$_FILES[\''.$key.'\'][\'name\']);
				
							$db->deleteDirectory("../../../upload/'.$modul_name.'/".$db->fetch_single_row("'.$main_table.'","'.$primary_key.'",$_POST["id"])->'.$key.');
							$'.$key.' = array("'.$key.'"=>$_FILES["'.$key.'"]["name"]);
							$data = array_merge($data,$'.$key.');
						}

                         }';
   $for_uimagef_delete .= '
		$db->deleteDirectory("../../../upload/'.$modul_name.'/".$db->fetch_single_row("'.$main_table.'","'.$primary_key.'",$_POST["id"])->'.$key.');';

        $update = '<div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;">
                             <img src="../../../../upload/'.$modul_name.'/<?=$data_edit->'.$key.'?>">
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div>
                            <div>
                              <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> 
                                <input type="file" name="'.$key.'" accept="image/*">
                              </span> 
                              <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> 
                            </div>
                          </div>';
                       $input_action = '';
             $update_action = '';
		
	}

$input_element .= '<div class="form-group">
                        <label for="'.$value[1].'" class="control-label col-lg-2">'.$value[1].'</label>
                        <div class="col-lg-10">
                          '.$input.'
                        </div>
                      </div><!-- /.form-group -->'.PHP_EOL;
$update_element .= '<div class="form-group">
                        <label for="'.$value[1].'" class="control-label col-lg-2">'.$value[1].'</label>
                        <div class="col-lg-10">
                          '.$update.'
                        </div>
                      </div><!-- /.form-group -->'.PHP_EOL;
$detail_element .= '<div class="form-group">
                        <label for="'.$value[1].'" class="control-label col-lg-2">'.$value[1].'</label>
                        <div class="col-lg-10">
                          '.$detail.'
                        </div>
                      </div><!-- /.form-group -->'.PHP_EOL;

$for_input_action .= $input_action;
$for_update_action .=$update_action;
		
}

include "template.php";
//write form add
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_add.php',$modul_add);
//write main modul action
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'.php',$main);

//write modul data
if ($_POST['method_table']=='dtb_server') {
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_data.php',$modul_data);
//write list table 
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_view.php',$list_table);
//write modul action 
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_action.php',$modul_action);
//write modul edit form
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_edit.php',$modul_edit);
//write detial form
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_detail.php',$modul_detail);

} elseif($_POST['method_table']=='dtb_manual') {
	//write list table 
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_view.php',$list_table_off);
//write modul action 
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_action.php',$modul_action);
//write modul edit form
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_edit.php',$modul_edit);
//write detial form
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_detail.php',$modul_detail);

} elseif($_POST['method_table']=='manual_pagination') {
		//write list table 
	$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_view.php',$list_table_manual);
	//write modul action 
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_action.php',$modul_action);
//write modul edit form
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_edit.php',$modul_edit);
//write detial form
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_detail.php',$modul_detail);
} elseif($_POST['method_table']=='gallery') {
	//write list table 
	$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_view.php',$list_gallery);
//write gallery action 
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_action.php',$input_gallery_action);
//write gallery detail
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_detail.php',$gallery_detail);
//write remote gallery file
$db->buat_file('../../modul/'.$modul_name.'/'.$modul_name.'_remote.php',$gallery_remote);
}



$data = array(
	'nav_act'=>$modul_name,
	'page_name'=>$_POST['page_name'],
	'main_table'=>$_POST['table'],
	'urutan_menu'=>$_POST['urutan_menu'],
	'url'=>strtolower(str_replace(" ", "-", $_POST['page_name'])),
  'icon'=>$_POST['icon'],
    'parent'=>$parent,
    'tampil'=>$tampil,
    'type_menu'=>$_POST['type_menu']
	);
    $db->insert('sys_menu',$data);

    $last_id= $db->get_last_id();  

  foreach ($db->fetch_all('sys_group_users') as $group) {
    if ($group->id==1) {
      $db->fetch_custom("insert into sys_menu_role(id_menu,group_id,read_act,insert_act,update_act,delete_act)
  values (".$last_id.",".$group->id.",'Y','Y','Y','Y')");
    } else {
      $db->fetch_custom("insert into sys_menu_role(id_menu,group_id,read_act,insert_act,update_act,delete_act)
  values (".$last_id.",".$group->id.",'N','N','N','N')");
    }
    
  }

print_r($tes);
echo "</pre>";
?>