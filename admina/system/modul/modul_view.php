
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        Manage Modul
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
                                <div class="box-header">
                                </div><!-- /.box-header -->
                                <div class="box-body">
                                    <table id="modul" class="table table-bordered table-striped">
                                   <thead>
                                        <tr>
                                          <th>Modul</th>
                                          <th>Order</th>
                                           <th>Tampil</th>
                                           <th>Icon</th>
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
         <a href="<?=base_index();?>modul/tambah" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
          
                </section><!-- /.content -->
  <script>
           $(function() {
             $('#modul').dataTable({
 
      
           "fnCreatedRow": function( nRow, aData, iDataIndex ) {
            //console.log(aData);
                              
     $('td:eq(4)', nRow).html('<a href="<?=base_index();?>modul/detail/'+aData[4]+'" class="btn btn-success"><i class="fa fa-eye"></i></a> <a href="<?=base_index();?>modul/edit/'+aData[4]+'" class="btn btn-primary"><i class="fa fa-pencil"></i></a>  <button id="'+aData[4]+'" class="btn btn-danger hapus" data-uri="<?=base_admin();?>system/modul/modul_action.php" data-id="'+aData[4]+'"><i class="fa fa-trash-o"></i></button>');
       $(nRow).attr('id', 'line_'+aData[4]);
   },

           "bProcessing": true,
            "bServerSide": true,
        "sAjaxSource": "<?=base_admin();?>system/modul/modul_data.php",
              "aoColumnDefs": [{
               'bSortable': false,
                'aTargets': [0]
            }]
        });
});
        </script>