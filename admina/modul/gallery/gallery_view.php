
<!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Gallery
                    </h1>
                        <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>gallery">Gallery</a></li>
                        <li class="active">Gallery List</li>
                    </ol>
                </section>
                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-solid box-primary">
                                   <div class="box-header">
                                     <h3 class="box-title">List Gallery</h3>
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
          <a href="<?=base_index();?>gallery/tambah" class="btn btn-primary btn-flat"><i class="fa fa-plus"></i> Tambah Album</a>
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

<?php 
 $limit =12;
        $search ="";
        if (isset($_GET["q"])) {
          $search_condition = $db->getRawWhereFilterForColumns
          ($_GET["q"], array("judul_album"));
          $search = "where $search_condition";
        }

    $dtb=$pg->myquery("select * from tb_album $search",$limit);
       $no=$pg->Num($limit);
        $count=$pg->Num($limit);

        if ($dtb->rowCount()<1) {
        echo'<div class="col-xs-6" style="margin-top:10px">
    No matching records found    
                        </div>';
      }
      foreach ($dtb as $isi) {

      $sub=$db->fetch_custom("select count(id) as jml,file_foto from tb_foto where id_album='$isi->id' limit 1"); 

        foreach ($sub as $sb) {
          ?>
<div class="col-sm-4"> 
<article class="album"> 
<header> 
<a href="<?=base_index();?>gallery/detail/<?=$isi->id;?>"> 
<img class="img-responsive gambar" src="<?=base_url();?>upload/foto_tb_album/<?=$sb->file_foto;?>"> 
</a> 

</header> 
<section class="album-info"> 
<h3>
<a href="<?=base_index();?>gallery/detail/<?=$isi->id;?>"><?=$isi->judul_album;?></a>
</h3> 
<p><?=$isi->deskripsi_album;?></p> 
</section> 
<footer> 
<div class="album-images-count"> <i class="fa fa-picture-o"></i>
<?=$sb->jml;?>
</div> 
<div class="album-options">
<a class="hapus_album" data-id="<?=$data_edit->id;?>" data-uri="<?=base_admin();?>modul/gallery/gallery_action.php" data-gallery="<?=base_index();?>gallery"><i class="fa fa-trash"></i></a>
 </div> 
 </footer> 
 </article> 
 </div> 
                <?php
        }
    $no++;
}
?>
                </div>
                <div class="row">
                          <div class="col-xs-6" style="margin-top:10px">
    Showing <?=$count;?> to <?=$no-1;?> of <?=$pg->total_record;?> entries
                        
                        </div>

                        <div class="col-xs-6">
                                    <?php
                                  if (isset($_GET['q'])) {
$pg->url=base_index()."gallery?q=".$_GET['q']."&page=";
                                  }
                                    $pg->setParameter(array(
                                      'range'=>$limit,
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
                </section><!-- /.content -->