 </div> <!--content wrapper -->
 <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->


 <?php
 if ($path['call_parts'][1]=='index.php'||$path['call_parts'][1]=='') {
 	?>

<!--home asset -->
   <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_admin();?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_admin();?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_admin();?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- Sparkline -->
    <script src="<?=base_admin();?>assets/plugins/sparkline/jquery.sparkline.min.js" type="text/javascript"></script>
    <!-- jvectormap -->
    <script src="<?=base_admin();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js" type="text/javascript"></script>
    <script src="<?=base_admin();?>assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js" type="text/javascript"></script>
    <!-- daterangepicker -->
    <script src="<?=base_admin();?>assets/plugins/daterangepicker/daterangepicker.js" type="text/javascript"></script>
    <!-- datepicker -->
    <script src="<?=base_admin();?>assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!-- iCheck -->
    <script src="<?=base_admin();?>assets/plugins/iCheck/icheck.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="<?=base_admin();?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- ChartJS 1.0.1 -->
    <script src="<?=base_admin();?>assets/plugins/chartjs/Chart.min.js" type="text/javascript"></script>

    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="<?=base_admin();?>assets/dist/js/pages/dashboard2.js" type="text/javascript"></script>

    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_admin();?>assets/dist/js/demo.js" type="text/javascript"></script>

   <?php
    } elseif ($path['call_parts'][1]!==''&&array_key_exists(2,$path['call_parts'])==false) {
   ?>
   <!--list table assets -->
     <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_admin();?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!--delete script-->
    <script src="<?=base_admin();?>assets/dist/js/delete.js"></script>
    <!-- SlimScroll -->
    <script src="<?=base_admin();?>assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='<?=base_admin();?>assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="<?=base_admin();?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_admin();?>assets/dist/js/demo.js" type="text/javascript"></script>
    <!-- page script -->
    <script type="text/javascript">
      $(function () {
        $("#dtb_manual").dataTable();
        $('#example2').dataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": false,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false
        });
      });
    </script>
    <?php
     } elseif ($path['call_parts'][1]!==''&&array_key_exists(2,$path['call_parts'])==true) {
    ?>
    <!--form asset -->
 <!-- jQuery 2.1.3 -->
   <script src="<?=base_admin();?>assets/login/js/jqueryform.js"></script>
  <script src="<?=base_admin();?>assets/login/js/validate.js"></script>


      <script src="<?=base_admin();?>assets/plugins/ckeditor/ckeditor.js"></script>

     <script src="<?=base_admin();?>assets/plugins/ckeditor/adapters/jquery.js"></script>

<script type="text/javascript">
  $('textarea.editbox' ).ckeditor({
    filebrowserBrowseUrl: '<?=base_admin();?>assetsplugins/kcfinder/browse.php?type=files',
filebrowserImageBrowseUrl: '<?=base_admin();?>assets/plugins/kcfinder/browse.php?type=images',
filebrowserFlashBrowseUrl: '<?=base_admin();?>assets/plugins/kcfinder/browse.php?type=flash',
filebrowserUploadUrl: '<?=base_admin();?>assets/plugins/kcfinder/upload.php?type=files',
filebrowserImageUploadUrl: '<?=base_admin();?>assets/plugins/kcfinder/upload.php?type=images',
filebrowserFlashUploadUrl: '<?=base_admin();?>assets/plugins/kcfinder/upload.php?type=flash'
  });
</script>
<!--fancy box -->
<script type="text/javascript" src="<?=base_admin();?>assets/plugins/fancybox/jquery.fancybox.js"></script>
 <link rel="stylesheet" type="text/css" href="<?=base_admin();?>assets/plugins/fancybox/jquery.fancybox.css?v=2.1.5" media="screen" />
 <script type="text/javascript">
 $(document).ready(function() {
  $(".fancybox").fancybox({
    openEffect  : 'none',
    closeEffect : 'none',
    loop : false
  });
});
 </script>

      <script src="<?=base_admin();?>assets/dist/js/input.js"></script>
       <script src="<?=base_admin();?>assets/dist/js/update.js"></script>
     <!--delete script-->
    <script src="<?=base_admin();?>assets/dist/js/delete.js"></script>
         <script src="<?=base_admin();?>assets/dist/js/pass_up.js"></script>

    <!-- Bootstrap 3.3.2 JS -->
    <script src="<?=base_admin();?>assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
     <script src='<?=base_admin();?>assets/plugins/fastclick/fastclick.min.js'></script>
   <!-- AdminLTE App -->
    <script src="<?=base_admin();?>assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="<?=base_admin();?>assets/dist/js/demo.js" type="text/javascript"></script>
  <!--image upload preview -->
     <script src="<?=base_admin();?>assets/plugins/holder/holder.js" type="text/javascript"></script>
     <script src="<?=base_admin();?>assets/plugins/holder/jasny-bootstrap.min.js" type="text/javascript"></script>
    
   <!-- date-picker -->
        <script src="<?=base_admin();?>assets/plugins/datepicker/bootstrap-datepicker.js" type="text/javascript"></script>
    <!--switch button -->
     <script src="<?=base_admin();?>assets/plugins/switch/bootstrap-switch.min.js" type="text/javascript"></script>
      <!--switch button -->
     <script src="<?=base_admin();?>assets/plugins/chosen/chosen.jquery.min.js" type="text/javascript"></script>
  

    <script type="text/javascript">
    $(function(){

                $.each($('.make-switch'), function () {
        $(this).bootstrapSwitch({
            onText: $(this).data('onText'),
            offText: $(this).data('offText'),
            onColor: $(this).data('onColor'),
            offColor: $(this).data('offColor'),
            size: $(this).data('size'),
            labelText: $(this).data('labelText')
        });
    });
   //hapus multi foto
    $(".foto_banyak").on('click','.hapus_foto',function() {
        $(this).parent().remove();
        });   
    //chosen select
    $(".chzn-select").chosen();
    $(".chzn-select-deselect").chosen({
        allow_single_deselect: true
    });

    });


    //multi image append
      function add_multi(val)
{
 
 $("#add_next").append('<div class="fileinput fileinput-new" data-provides="fileinput"> <div class="fileinput-new thumbnail" style="width: 200px; height: 150px;"> <img data-src="holder.js/100%x100%" alt="100%x100%" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iVVRGLTgiIHN0YW5kYWxvbmU9InllcyI/PjxzdmcgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgdmlld0JveD0iMCAwIDE5MCAxNDAiIHByZXNlcnZlQXNwZWN0UmF0aW89Im5vbmUiPjxkZWZzLz48cmVjdCB3aWR0aD0iMTkwIiBoZWlnaHQ9IjE0MCIgZmlsbD0iI0VFRUVFRSIvPjxnPjx0ZXh0IHg9IjY5LjA1NDY4NzUiIHk9IjcwIiBzdHlsZT0iZmlsbDojQUFBQUFBO2ZvbnQtd2VpZ2h0OmJvbGQ7Zm9udC1mYW1pbHk6QXJpYWwsIEhlbHZldGljYSwgT3BlbiBTYW5zLCBzYW5zLXNlcmlmLCBtb25vc3BhY2U7Zm9udC1zaXplOjEwcHQ7ZG9taW5hbnQtYmFzZWxpbmU6Y2VudHJhbCI+MTkweDE0MDwvdGV4dD48L2c+PC9zdmc+" data-holder-rendered="true" style="height: 100%; width: 100%; display: block;"> </div> <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px;"></div> <span class="btn btn-danger hapus_foto"><i class="fa fa-trash"></i></span> <div> <span class="btn btn-default btn-file"><span class="fileinput-new">Select image</span> <span class="fileinput-exists">Change</span> <input type="file" accept="image/*" name="foto_banyak[]"> </span> <a href="#" class="btn btn-default fileinput-exists" data-dismiss="fileinput">Remove</a> </div> </div>');


}
</script>
    <!-- Bootstrap WYSIHTML5 -->
<script src="<?=base_admin();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js" type="text/javascript"></script>

    <?php }
    ?>
<!-- always show up -->
  <script src="<?=base_admin();?>assets/plugins/fakeloader/fakeLoader.min.js"></script>
         <!-- add new calendar event modal -->
 <script>
            $(document).ready(function(){

 
                $(".fakeloader").fakeLoader({

            timeToHide:100, //Time in milliseconds for fakeLoader disappear
            zIndex:999, // Default zIndex
          //  spinner:"spinner1",//Options: 'spinner1', 'spinner2', 'spinner3', 'spinner4', 'spinner5', 'spinner6', 'spinner7' 
          //  bgColor:"#2ecc71", //Hex, RGB or RGBA colors
                    bgColor:"#00a65a",
                    spinner:"spinner2"
                });
            });
        </script>
  </body>
</html>
