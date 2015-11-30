
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                       Tambah Page
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="<?=base_index();?>modul">Page</a></li>
                        <li class="active">Tambah Page</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
<div class="row">
    <div class="col-lg-12">
        <div class="box box-primary">
                                <div class="box-header">
                                </div><!-- /.box-header -->

                  <div class="box-body">
                        <form class="form-horizontal" id="input_page" action="<?=base_admin();?>system/page/input_page.php" method="post">
                      <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Page / Menu Name</label>
                        <div class="col-lg-10">
                          <input type="text" id="text1" name="page_name" required placeholder="Page name" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
                           <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Icon</label>
                        <div class="col-lg-7">
                          <input type="text" id="text1" name="icon" placeholder="fa-camera-retro" class="form-control">
                        <a target="_blank" href="<?=base_index();?>page/icon">Referensi Icon (new window)</a>
                        </div>
                      </div><!-- /.form-group -->
                             <div class="form-group">
                 <label class="control-label col-lg-2">Type Menu</label>
                 <div class="col-lg-10">
                   <select data-placeholder="Pilih Modul" name="type_menu" onChange="type_of_menu(this.value)" class="form-control chzn-select" tabindex="2">
                     <option value="main">Main (Tree Menu)</option>
                     <option value="page">Page</option>
                   </select>
                 </div>
               </div>
                         <div class="form-group" id="parent">
                        <label class="control-label col-lg-2">Parent</label>
                        <div class="col-lg-10">
                          <select data-placeholder="Pilih Modul" name="parent" class="form-control chzn-select" tabindex="2">
                            <option value="0">None</option>
                            <?php foreach ($db->fetch_custom('select * from sys_menu where url=""') as $isi) {
                              echo "<option value='$isi->id'>$isi->page_name</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                           <div class="form-group">
                        <label for="text1" class="control-label col-lg-2">Urutan Menu</label>
                        <div class="col-lg-4">
                          <input type="text" id="text1" name="urutan_menu" required placeholder="Urutan Menu" class="form-control">
                        </div>
                      </div><!-- /.form-group -->
                         <div class="form-group">
                        <label for="Update" class="control-label col-lg-2">Tampil</label>
                        <div class="col-lg-10">

                          <input name="tampil" class="make-switch" data-on-text="Yes" data-off-text="No" type="checkbox" data-on-color="info" data-off-color="danger" checked="">
                         </div>
                      </div><!-- /.form-group -->

                     <div id="type_menu" style="display:none">
                         <div class="form-group">
                        <label class="control-label col-lg-2">List Method</label>
                        <div class="col-lg-10">
                        <select class="form-control" onChange="list_type(this.value)" name="method_table">
                         <option value="">Pilih Method</option>
                          <option value="dtb_server">Datatable Server Side</option>
                          <option value="dtb_manual">Datatable Manual</option>
                          <option value="manual_pagination">Manual Pagination</option>
                          <option value="gallery">Buat Gallery Album</option>
                        </select>
                        </div>
                      </div>

                      </div>

                      <div id="list_type" style="display:none">
                       <div class="form-group">
                        <label class="control-label col-lg-2">Table Album</label>
                        <div class="col-lg-10">
        <select id="album_table" data-placeholder="Pilih Table" onChange="get_album(this.value)" name="album_table" class="form-control chzn-select" tabindex="2">
                            <option value=""></option>
                            <?php foreach ($db->fetch_custom('show table status') as $tb) {
                              echo "<option value='$tb->Name'>$tb->Name</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>
                      <div style="margin-bottom:20px" id="isi_album"></div>
                      </div>

                      <div class="another_choice" style="display:none">

                         <div class="form-group">
                        <label class="control-label col-lg-2">Table</label>
                        <div class="col-lg-10">
                          <select id="main_table" data-placeholder="Pilih Table" onChange="fetch_table(this.value)" name="table" class="form-control chzn-select" tabindex="2">
                            <option value="">Pilih Table</option>
                            <?php foreach ($db->fetch_custom('show table status') as $tb) {
                              echo "<option value='$tb->Name'>$tb->Name</option>";
                            }
                            ?>
                          </select>
                        </div>
                      </div>


                       <div id="isi_table"></div>
                       <div id="isi_view"> </div>
                       </div>

                      <div class="form-group">
                        <label for="tags" class="control-label col-lg-2">&nbsp;</label>
                        <div class="col-lg-10">
                          <input type="submit" class="btn btn-primary btn-flat">
                        </div>
                      </div><!-- /.form-group -->
                    </form>
<a href="<?=base_index();?>page" class="btn btn-success btn-flat"><i class="fa fa-step-backward"></i> Kembali</a>

                  </div>
                  </div>
              </div>
</div>

                </section><!-- /.content -->



 <script type="text/javascript">
//type menu

  function type_of_menu(val)
  {
      if (val=='single') {
        //$(".another_choice").hide();
          $("#type_menu").show();
          $("#parent").hide();

      } else if(val=='page')  {
         $("#type_menu").show();
            $("#parent").show();
        //$(".another_choice").show();
      }else  {
         $("#type_menu").hide();
            $("#parent").show();
        //$(".another_choice").show();
      }
  }
  //list type
  function list_type(val)
  {

      if (val=='gallery') {
        $(".another_choice").hide();
          $("#list_type").show();

      } else {
         $("#list_type").hide();
        $(".another_choice").show();
      }
  }
  function fetch_table(val)
  {
    $.ajax({
      url: "<?=base_admin();?>system/page/get_table.php?tb="+val,
      success:function(data){
      //  alert(data);
        $("#isi_table").html(data);
      }
    });
    $.ajax({
      url: "<?=base_admin();?>system/page/for_view.php?tb="+val,
      success:function(data){
      //  alert(data);
        $("#isi_view").html(data);
      }
    });
  }

  //copy lable on check
  function copy_to(table,col)
  {

    $("#label_"+table+"_"+col).val(col);
  }
   //copy lable on check list table
  function copy_to1(table,col)
  {

    $("#label1_"+table+"_"+col).val(col);
  }

  //onchange type
  function tipe(val,col)
  {

    if (val=='select') {
        $.ajax({
      url: "<?=base_admin();?>system/page/isi_from_table.php?col="+col,
      success:function(data){
        $("#type_content_"+col).html(data);
        }
      });

    } else if(val=='uimager')
        {
            $("#type_content_"+col).html("<div class='form-group'> <label class='control-label col-lg-2'>Width </label> <div class='col-lg-3' style='padding-left:0;padding-top:2px'> <input type='text' id='required' name='width["+col+"]' class='form-control'> </div> </div><div class='form-group'> <label class='control-label col-lg-2'>Height </label> <div class='col-lg-3' style='padding-left:0;padding-top:2px'> <input type='text' id='required' name='height["+col+"]' class='form-control'> </div> </div> ");
        }
         else if(val=='boolean')
        {
            $("#type_content_"+col).html("<div class='form-group'> <label class='control-label col-lg-3'>Yes Value </label> <div class='col-lg-3' style='padding-left:0;padding-top:2px'> <input type='text' id='required' name='yes_val["+col+"]' class='form-control'> </div> </div><div class='form-group'> <label class='control-label col-lg-3'>No Value </label> <div class='col-lg-3' style='padding-left:0;padding-top:2px'> <input type='text' id='required' name='no_val["+col+"]' class='form-control'> </div> </div> ");
        }
      else if(val=='ufile')
      {
            $("#type_content_"+col).html("<div class='form-group'> <label class='control-label col-lg-3'>Allowed Type</label> <div class='col-lg-8' style='padding-top: 3px;'> <input type='text' id='required' name='alowed["+col+"]' value='pdf|txt|docx|doc' class='form-control col-lg-6'> </div> </div>");
      }

     else {
       $("#type_content_"+col).html('');
    }
  }
  //from table , fetch on name and on value
  //param table, and column
  function from_table(tb,col)
  {

      $.ajax({
      url: "<?=base_admin();?>system/page/isi_on.php?tb="+tb+"&col="+col,
      success:function(data){

        $("#isi_on_"+col).html(data);
        }
      });
  }

  function add_join()
  {
    var tb = $('#main_table').find(":selected").text();
     $.ajax({

      //?tb="+tb+"&col="+col
      url: "<?=base_admin();?>system/page/isi_join.php?prev_tb="+tb,
      success:function(data){

        $("#isi_join").append(data);
        }
      });
  }

  //val is selected table join
  function isi_kanan(val,prev_tb)
  {
     $('#isi_kanan_join').attr('id','isi_kanan_join_'+val);
    $.ajax({
      //?tb="+tb+"&col="+col
      url: "<?=base_admin();?>system/page/isi_kanan_join.php?tb="+val+"&prev="+prev_tb,
      success:function(data){
        $("#isi_kanan_join_"+val).html(data);
        }
      });
     $.ajax({
      //?tb="+tb+"&col="+col
      url: "<?=base_admin();?>system/page/embed_list.php?tb="+val,
      success:function(data){
        $("#embed").append(data);
        }
      });
  }


  //val is table
  function del_join(val)
  {
    $('#isi_kanan_join_'+val).parent().parent().remove();
    $('#box_'+val).remove();
  }

  function add_join_with(prev)
  {
     $.ajax({

      //?tb="+tb+"&col="+col
      url: "<?=base_admin();?>system/page/isi_join_with.php?prev_tb="+prev,
      success:function(data){

        $("#isi_join").append(data);
        }
      });
  }

  //add multi image
  function add_multi_image()
  {
     var tb = $('#main_table').find(":selected").text();
    $.ajax({
      url: "<?=base_admin();?>system/page/isi_multi_image.php?prev_tb="+tb,
      success:function(data){

        $("#isi_remote").html(data);
        }
      });
  }

  //get foreign album table
  function get_foreign_album(key)
  {
     $.ajax({
      url: "<?=base_admin();?>system/page/isi_foreign_album.php?table="+key,
      success:function(data){
        $("#isi_foreign").html(data);
        }
      });
  }
  //album table
   //multi image foreign key
  function get_album(key)
  {

     $.ajax({
      url: "<?=base_admin();?>system/page/isi_create_album.php?table="+key,
      success:function(data){
        $("#isi_album").html(data);
        }
      });
  }

  //multi image foreign key
  function change_key(key)
  {

     $.ajax({
      url: "<?=base_admin();?>system/page/isi_remote_key.php?table="+key,
      success:function(data){
        $("#isi_remote_key").html(data);
        }
      });
  }
  //hapus multi
  function hapus_multi()
  {
    $("#isi_remote").html('');
  }
</script>
