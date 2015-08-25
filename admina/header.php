<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Backend Generator V2</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
 
   <!-- special jquery jQuery 2.1.3 -->
    <script src="<?=base_admin();?>assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
 
 <?php

 if ($path['call_parts'][1]=='index.php'||$path['call_parts'][1]=='') {
  ?>

<!--home assets -->
     <!-- Bootstrap 3.3.2 -->
    <link href="<?=base_admin();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Morris chart -->
    <link href="<?=base_admin();?>assets/plugins/morris/morris.css" rel="stylesheet" type="text/css" />
    <!-- jvectormap -->
    <link href="<?=base_admin();?>assets/plugins/jvectormap/jquery-jvectormap-1.2.2.css" rel="stylesheet" type="text/css" />
    <!-- Daterange picker -->
    <link href="<?=base_admin();?>assets/plugins/daterangepicker/daterangepicker-bs3.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_admin();?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_admin();?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
     <?php
    } elseif ($path['call_parts'][1]!==''&& array_key_exists(2,$path['call_parts'])==false) {
   ?>
<!-- list table -->
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=base_admin();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- DATA TABLES -->
    <link href="<?=base_admin();?>assets/plugins/datatables/dataTables.bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_admin();?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_admin();?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
       <!-- i just place it DATA TABES SCRIPT here-->
    <script src="<?=base_admin();?>assets/plugins/datatables/jquery.dataTables.js" type="text/javascript"></script>
    <script src="<?=base_admin();?>assets/plugins/datatables/dataTables.bootstrap.js" type="text/javascript"></script>
 
    <?php
     } elseif ($path['call_parts'][1]!==''&&array_key_exists(2,$path['call_parts'])==true) {
    ?>
<!--form asset -->
    <!-- Bootstrap 3.3.2 -->
    <link href="<?=base_admin();?>assets/bootstrap/css/bootstrap.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="<?=base_admin();?>assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <!-- AdminLTE Skins. Choose a skin from the css/skins 
         folder instead of downloading all of them to reduce the load. -->
    <link href="<?=base_admin();?>assets/dist/css/skins/_all-skins.min.css" rel="stylesheet" type="text/css" />
	 <link href="<?=base_admin();?>assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css" rel="stylesheet" type="text/css" />
	    <!-- date picker -->
    <link href="<?=base_admin();?>assets/plugins/datepicker/datepicker3.css" rel="stylesheet" type="text/css" />
    <!--switch button -->
       <link href="<?=base_admin();?>assets/plugins/switch/bootstrap-switch.min.css" rel="stylesheet" type="text/css" />
     <!--switch button -->
       <link href="<?=base_admin();?>assets/plugins/chosen/chosen.min.css" rel="stylesheet" type="text/css" />
   <!--fancy box -->
     <link href="<?=base_admin();?>assets/plugins/fancybox/jquery.fancybox.css" rel="stylesheet" type="text/css" />
<?php }?>
<!--always show up -->
  <link href="<?=base_admin();?>assets/plugins/fakeloader/fakeLoader.css" rel="stylesheet" type="text/css" />
 <!--image preview -->
  <link href="<?=base_admin();?>assets/plugins/holder/jasny-bootstrap.min.css" rel="stylesheet" type="text/css" />

 <link href="<?=base_admin();?>assets/dist/css/overide.css" rel="stylesheet" type="text/css" />


    </head>
  <body class="skin-green">
   <div class="fakeloader"></div>
   <div id="loadnya" style="display:none">
    <img src="<?=base_admin();?>assets/dist/img/loadnya.gif" class="ajax-loader"/>
</div>
<!--notif here -->
<div class="notif_top" style="display:none">
  <div class="alert alert-success" style="margin-left:0">
  <button class="close" data-dismiss="alert">×</button>
  <center><strong>Data Berhasil di Tambahkan</strong></center>
</div>
</div>
<div class="notif_top_up" style="display:none" >
  <div class="alert alert-success" style="margin-left:0">
  <button class="close" data-dismiss="alert">×</button>
  <center><strong>Data Berhasil di Perbaharui</strong></center>
</div>
</div>
    <div class="wrapper">
  <?php 

  include "top_bar.php";
  include "left_nav.php";
  ?>