
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Install
                    </h1>
                    <ol class="breadcrumb">
                        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                        <li><a href="#">Modul</a></li>
                        <li class="active">Modul List</li>
                    </ol>
                </section>

                <!-- Main content -->
                <section class="content">
                    <div class="row">
                        <div class="col-xs-12">
                            <div class="box">
                                       <?php

           if ($db->check_tb_exist()>0) {
              ?>
                    <span class="btn btn-danger btn-lg" onClick="install('n')"><i class='fa fa-trash-o'></i> Remove System</span>
                 <?php }
                  else {
                ?>
                         <span class="btn btn-success btn-lg" onClick="install('y')"><i class='fa fa-gear'></i> Install System</span>
         
                <?php
               }
             
               ?>
                            </div><!-- /.box -->
                        </div>
                    </div>     
                </section><!-- /.content -->



<script>
function install(val)
{

   $('#loadnya').show();
   if (val=='y') {
       $.ajax({
      url: "<?=base_admin();?>system/install/install_action.php?act=in",
      success:function(data){
       
         $('#loadnya').hide();
        window.location='<?=base_index();?>install';
      }
    });
     } else {
         $.ajax({
      url: "<?=base_admin();?>system/install/install_action.php?act=del",
      success:function(data){
         $('#loadnya').hide();
         window.location='<?=base_index();?>install';
       // console.log(data);
      }
    });
     }

}
</script>