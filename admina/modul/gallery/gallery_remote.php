
<div class="row" id="row_foto">
<?php 
include "../../inc/config.php";
$id = $_GET['id'];
 $limit =12;
$fotos=$pg->myquery("select * from tb_foto where id_album='".$id."' order by id desc ",$limit);
       $no=$pg->Num($limit);
        $count=$pg->Num($limit);
   
    foreach ($fotos as $foto) {
      ?>
       <div class="col-lg-3 col-md-3 col-xs-6 thumb" id="foto_<?=$foto->id;?>">
        <span id="foto_list">
      <a class="fancybox" rel="gallery1" id="the_foto_<?=$foto->id;?>" href="<?=base_url();?>upload/foto_tb_album/<?=$foto->file_foto;?>" title="<?=$foto->deskripsi_foto;?> ">
      <img class="img-responsive" src="../../../../upload/foto_tb_album/<?=$foto->file_foto;?>" />
    </a>
    <span data-id="<?=$foto->id;?>" data-desc="<?=$foto->deskripsi_foto;?>" class="btn btn-default btn-flat up_foto"><i class="fa fa-pencil icon"></i></span>

    <span data-id="<?=$foto->id;?>" data-uri="<?=base_admin();?>modul/gallery/gallery_action.php" class="btn btn-danger btn-flat hapus_foto"><i class="fa fa-trash"></i></span>
    </span>
            </div>

  <?php
      $no++;
    }
      ?>
                  </div>