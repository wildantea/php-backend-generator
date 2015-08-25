
<div class="modal" id="foto-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h4 class="modal-title">Edit Deskripsi Foto</h4> </div> <div class="modal-body"> <form id="upfoto" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/gallery/gallery_action.php?act=up_desc" novalidate="novalidate"> <div class="form-group"> <label for="nama_album" class="control-label col-lg-3">Deskripsi Foto</label> <div class="col-lg-9"> <input type="text" name="deskripsi_foto" placeholder="Deskripsi Foto" id="desc_foto" class="form-control"> </div> </div><!-- /.form-group --> <input id="id" type="hidden" name="id"> </div> <div class="modal-footer"> <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary" id="save">Save changes</button> </form> </div> </div><!-- /.modal-content --> </div><!-- /.modal-dialog --> </div><!-- /.modal --> <div class="modal" id="album-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"> <div class="modal-dialog"> <div class="modal-content"> <div class="modal-header"> <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button> <h4 class="modal-title">Edit Album</h4> </div> <div class="modal-body"> <form id="upalb" method="post" class="form-horizontal foto_banyak" action="<?=base_admin();?>modul/gallery/gallery_action.php?act=up_name" novalidate="novalidate"> <div class="form-group"> <label for="nama_album" class="control-label col-lg-3">Nama Album</label> <div class="col-lg-9"> <input value="<?=$data_edit->judul_album;?>" type="text" name="judul_album" required="required" placeholder="nama_album" id="nama_album" class="form-control"> </div> </div><!-- /.form-group --> <div class="form-group"> <label for="deskripsi_album" class="control-label col-lg-3">Deskripsi Album</label> <div class="col-lg-9"> <textarea id="desc_album" name="deskripsi_album" class="form-control"><?=$data_edit->deskripsi_album;?></textarea> </div> </div><!-- /.form-group --> <input type="hidden" name="id" value="<?=$data_edit->id;?>"> </div> <div class="modal-footer"> <button type="button" class="btn btn-outline pull-left" data-dismiss="modal">Close</button> <button type="submit" class="btn btn-primary" id="save">Save changes</button> </form> </div> </div><!-- /.modal-content --> </div><!-- /.modal-dialog --> </div><!-- /.modal -->

                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                     Album Gallery
                    </h1>
                   <ol class="breadcrumb">
                        <li><a href="<?=base_index();?>"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>gallery">Album Gallery</a></li>
                        <li class="active">Detail Gallery</li>
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


                  <div class="box-body">
<button class="btn edit_album"><i class="fa fa-pencil"></i> Edit Album</button>
<div id="upload_form" class="hide">
  <form action="<?=base_admin();?>modul/gallery/gallery_action.php?act=up" target="hidden_iframe" enctype="multipart/form-data" method="post">
  <input type="hidden" name="id" value="<?=$data_edit->id;?>">
    <input type="file" multiple name="foto_banyak[]" id="upload_files" multiple accept='image/*'>
  </form>
</div>

  <button onclick="Uploader.upload();" class="btn btn-primary">
    <i class='fa fa-plus'></i> Upload Foto
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

             
     <h2 class='title_album'>
               <?=$data_edit->judul_album;?>
              </h2>
               <h4 class='desc_album'><?=$data_edit->deskripsi_album;?></h4>
                 </div>
<div id="update_content">               
 <div class="row" id="row_foto">
<?php 
 $limit =12;
$fotos=$pg->myquery("select * from tb_foto where id_album='".$data_edit->id."' order by id desc ",$limit);
       $no=$pg->Num($limit);
        $count=$pg->Num($limit);
  if ($fotos->rowCount()<1) {
        echo "No matching records found";
      }
    foreach ($fotos as $foto) {
      ?>
       <div class="col-lg-3 col-md-3 col-xs-6 thumb" id="foto_<?=$foto->id;?>">
        <span id="foto_list">
      <a class="fancybox" rel="gallery1" id="the_foto_<?=$foto->id;?>" href="<?=base_url();?>upload/foto_tb_album/<?=$foto->file_foto;?>" title="<?=$foto->deskripsi_foto;?> ">
      <img class="img-responsive gambar_list" src="../../../../upload/foto_tb_album/<?=$foto->file_foto;?>" />
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
</div>  

                  <div class="row">
                          <div class="col-xs-6" style="margin-top:10px">
    Showing <?=$count;?> to <?=$no-1;?> of <?=$pg->total_record;?> entries
                        
                        </div>

                        <div class="col-xs-6">
                          
                                    <?php
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
              

<a href="<?=base_index();?>gallery" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>
                  </div>
                  </div>
              </div>
</div>       
                </section><!-- /.content -->
<script>

function update_content(val)
{
  $.ajax({
      url: "<?=base_admin();?>modul/gallery/gallery_remote.php?id="+val,
      success:function(data){
      
        $("#update_content").html(data);
        }
      });
}
var Uploader = (function () {

        jQuery('#upload_files').on('change', function () {
            jQuery("#wait").removeClass('hide');
            jQuery('#upload_files').parent('form').submit();
        });

        var fnUpload = function () {
            jQuery('#upload_files').trigger('click');
        }

        var fnDone = function (data) {
     
           update_content('<?=$data_edit->id;?>');
            var data = JSON.parse(data);
            if (typeof (data['error']) != "undefined") {
                jQuery('#uploaded_images').html(data['error']);
                jQuery('#upload_files').val("");
                jQuery("#wait").addClass('hide');
                return;
            }
            var divs = [];
            jQuery('#uploaded_images').html(divs.join(""));
            jQuery('#upload_files').val("");
            jQuery("#wait").addClass('hide');
        }

        return {
            upload: fnUpload,
            done: fnDone
        }

    }());
</script>