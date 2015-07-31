<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>PHP Backend Generator</title>
    <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
    <!-- Bootstrap 3.3.2 -->
    <link href="admina/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
    <!-- Font Awesome Icons -->
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
    <!-- Ionicons -->
    <link href="http://code.ionicframework.com/ionicons/2.0.0/css/ionicons.min.css" rel="stylesheet" type="text/css" />
    <!-- Theme style -->
    <link href="admina/assets/dist/css/AdminLTE.min.css" rel="stylesheet" type="text/css" />
    <link href="admina/assets/dist/css/skins/skin-blue.min.css" rel="stylesheet" type="text/css" />
 <style type="text/css">
  .content-wrapper p{padding:0 10px;font-size:16px}#components>h3{font-size:25px;color:#000}#components>h4{font-size:20px;color:#000}ul{margin-bottom:20px}.page-header{margin:20px 0;position:relative;z-index:1;font-size:30px}.page-header a,.page-header span{z-index:5;display:block;background-color:#ecf0f5;color:#000}.page-header a::before,.page-header span::before{content:'#';font-size:25px;margin-right:10px;color:#3c8dbc}#components>h3:before,.page-header:before{display:block;content:" ";margin-top:-60px;height:60px;visibility:hidden}.lead{font-size:18px;font-weight:400}.eg{position:absolute;top:0;left:0;display:inline-block;background:#d2d6de;padding:5px;border-bottom-right-radius:3px;border-top-left-radius:3px;border-bottom:1px solid #d2d6dc;border-right:1px solid #d2d6dc}.eg+*{margin-top:30px}.content{padding:10px 25px}.hierarchy{background:#333;color:#fff}.plugins-list li{width:50%;float:left}pre{border:none}.sidebar{margin-top:0;padding-top:0!important}.box .main-header{z-index:1000;position:relative}.treeview .nav li a:active,.treeview .nav li a:hover{background:0 0}p{padding:0!important}.prettyprint{background:#fff;font-family:Menlo,'Bitstream Vera Sans Mono','DejaVu Sans Mono',Monaco,Consolas,monospace;font-size:12px;line-height:1.5;border:1px solid #dedede!important;padding:10px;max-height:300px}.pln{color:#111}@media screen{.kwd,.str{color:#739200}.com{color:#999}.typ{color:#f05}.lit{color:#538192}.clo,.opn,.pun,.tag{color:#111}.atn{color:#739200}.atv{color:#f05}.dec,.var{color:#111}.fun{color:#538192}}@media print,projection{.kwd,.tag,.typ{font-weight:700}.str{color:#060}.kwd{color:#006}.com{color:#600;font-style:italic}.typ{color:#404}.lit{color:#044}.clo,.opn,.pun{color:#440}.tag{color:#006}.atn{color:#404}.atv{color:#060}}ol.linenums{margin-top:0;margin-bottom:0}
</style>
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
    <![endif]-->
  </head>
  <body class="skin-blue fixed" data-spy="scroll" data-target="#scrollspy">
    <div class="wrapper">

      <header class="main-header">
        <!-- Logo -->
        <a style="font-size: 13px;" href="../index2.html" class="logo"><b>PHP BACKEND GENERATOR</b></a>
        <!-- Header Navbar: style can be found in header.less -->
        <nav class="navbar navbar-static-top" role="navigation">
          <!-- Sidebar toggle button-->
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
         
        </nav>
      </header>
      <!-- Left side column. contains the logo and sidebar -->
      <aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar" id="scrollspy">

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="nav sidebar-menu">
            <li class="header">TABLE OF CONTENTS</li>
            <li><a href="#introduction"><i class='fa fa-circle-o'></i> Pengenalan</a></li>
             <li><a href="#fitur"><i class='fa fa-circle-o'></i> Fitur</a></li>
            <li><a href="#download"><i class='fa fa-circle-o'></i> Instalasi</a></li>
           
            <li><a href="#gen_album"><i class='fa fa-circle-o'></i> Generate Album</a></li>
            <li><a href="#advice"><i class='fa fa-circle-o'></i> Download </a></li>
        
           
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>

      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <h1>
            PHP Backend Generator
            <small>Current version 1.0.1</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Documentation</li>
          </ol>
        </div>

        <!-- Main content -->
        <div class="content body">
<section id='introduction'>
  <h2 class='page-header'><a href="#introduction">Pengenalan</a></h2>
  <p class='lead'>
    <b>PHP BACKEND GENERATOR</b> dibuat untuk membantu para developer atau siapapun yang perlu cara cepat membuat CRUD (create, read, update,delete) menggunakan PHP.<br>
    Temen - temen bisa men-generate coding php untuk me-manage data - data dari database (mysql) secara instant tanpa harus coding. Tool ini bisa juga untuk pembelajaran jika temen - teman baru memulai mempelajari PHP. Alur Code yang digenerate oleh tool ini masih tergolong mudah dimengerti, jadi sangat membantu sekali untuk memahami alur coding php. <br>
    Tool ini menggunakan template admin gratis dari <a href="https://almsaeedstudio.com/AdminLTE">Almsaeedstudio</a> Yakni AdminLTE 2. Silakan Merujuk ke link tersebut untuk mengetahui lebih jauh referensi komponen template.
    <br>
    Tool ini bersifat Open Source, temen - teman bisa menggunakanya secara bebas.
  </p>
</section><!-- /#introduction -->

<section id="screenshot">
  <h2 class='page-header'><a href="#screenshot">Screenshoot</a></h2>
<p class='lead'>
  <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="manual_img/1.png" alt="...">
      <div class="carousel-caption">
       Home Dasboard
      </div>
    </div>
    <div class="item">
      <img src="manual_img/2.png" alt="...">
      <div class="carousel-caption">
        Modul Management
      </div>
    </div>
    <div class="item">
       <img src="manual_img/3.png" alt="...">
      <div class="carousel-caption">
        Page Builder
      </div>
    </div>
     <div class="item">
       <img src="manual_img/4.png" alt="...">
      <div class="carousel-caption">
        Menu Management Permission
      </div>
    </div>

  </div>


  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
</p>
</section>

<section id="fitur">
  <h2 class="page-header"><a href="#fitur">Fitur</a></h2>
  <p class="lead"></p>
  <ul>
  <ul>
    <li>Generate Code Secara Otomatis</li>
    <li>Modul components</li>
    <li>Modul Group User</li>
    <li>Modul permissions berdasarkan Level Group User</li>
    <li>Menu Management</li>
    <li>User management</li>
    <li>Upload image and file</li>
    <li>CKeditor support + kcfinder integrations</li>
    <li>Join tables (inner join, left join, right join)</li>
    <li>List Table dengan Datatable Server Side</li>
   <li>List Table dengan Datatable Manual</li>
   <li>List Table dengan Manual Pagination</li>
    <li>Pilihan Type input element : Textbox, Date, Textarea, Editor, Checkbox, Radio, Selectbox dari database</li>
    <li>Ajax dengan Jquery Form dan Validation dengan jquery validation</li>
    <li>Generate Modul Gallery untuk management foto</li>
    <li>Boostrap 3 admin lte v2</li>
</ul>
  </ul>
</section>

          <!-- ============================================================= -->

<section id='download'>
  <h2 class='page-header'><a href="#download">Instalasi</a></h2>
<h3>Download & Extract</h3>
<p class='lead'>
    Silakan Download Program ini di halaman bawah, atau bisa fork dari github.<br>
    Masuk ke directory htdocs (untuk user windows)<br>
    Buat folder baru di htdocs, misal website<br>
    Extract File downloadan ke folder website
  </p>
    <pre class='hierarchy'><code class="language-bash" data-lang="bash">Misal saya buat strukturnya seperti ini

website/
├── admina/
│   ├── assets/
│   ├── inc
│   ├── modul
│   ├── system
├── upload/
│   ├── back_profil_foto/
│   ├── web_foto_upload
│   
</code></pre>
<h3>Database</h3>
<p class='lead'>
    Buat Database baru atau misal anda punya database yang mau dibuat adminya
  </p>
<h3>Edit Config</h3>
<p class='lead'>
    Edit config.php pada folder admina/inc/config.php
  </p>
  <pre class='hierarchy'><code class="language-bash" data-lang="bash">Sesuaikan Bari berikut
//host
define( "HOST", "localhost" );
//nama database
define( "DATABASE_NAME", "generator_v2" );
define( "DB_USERNAME", "root" );
//password mysql
define( "DB_PASSWORD", "mypatrick" );
//dir admin
define( "DIR_ADMIN", "website/admina/");
//main directory
define( "DIR_MAIN", "website/");
</code></pre>
<h3>Install</h3>
<pre class='hierarchy'><code class="language-bash" data-lang="bash">
 Buka di url http://localhost/website/install.php
    Setelah itu login 
    username : admin
    password : admin
</code></pre>
</section>

          <!-- ============================================================= -->

<section id="gen_album">
  <h2 class="page-header"><a href="#gen_album">Generate Album Gallery</a></h2>
  <p class="lead">Dalam tool ini ada fitur untuk generate album gallery, dan berikut apa yang harus dipersiapkan untuk generate album gallery</p>
  <ul>
    <li>Menyiapkan Table untuk album gallery<p></p>
      <img src="manual_img/album.png">
      <pre class='hierarchy'><code class="language-bash" data-lang="bash">
 -- -----------------------------------------------------
-- Table `tb_album`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tb_album` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `judul_album` VARCHAR(100) NULL,
  `deskripsi_album` VARCHAR(250) NULL,
  PRIMARY KEY (`id`))
ENGINE = InnoDB;


-- -----------------------------------------------------
-- Table `tb_foto`
-- -----------------------------------------------------
CREATE TABLE IF NOT EXISTS `tb_foto` (
  `id` INT NOT NULL AUTO_INCREMENT,
  `file_foto` VARCHAR(45) NULL,
  `deskripsi_foto` VARCHAR(45) NULL,
  `id_album` INT NULL,
  PRIMARY KEY (`id`),
  INDEX `fk_tb_foto_1_idx` (`id_album` ASC),
  CONSTRAINT `fk_tb_foto_1`
    FOREIGN KEY (`id_album`)
    REFERENCES `tb_album` (`id`)
    ON DELETE CASCADE
    ON UPDATE CASCADE)
ENGINE = InnoDB;
</code></pre>
    Silakan paste query sql diatas di database yang dibuat
    </li>
  
    <li>Masuk ke menu modul, buat modul misal media</li>

    <li>Kemudian Pilih menu page, pilih modul media (yang tadi dibuat), kasih nama page (misal gallery), urutan menu 1, pilih method buat gallery album, pilih table album dan list foto yang tadi dibuat seperti gambar dibawah <p><p>
      <img src="manual_img/create_gallery.png" width="90%"></p>
      klik rename on jika file yang diupload mau di rename
     </li>
  </ul>
</section>

          <!-- ============================================================= -->

<section id='advice'>
  <h2 class='page-header'><a href="#advice">Download Program</a></h2>
  <p class='lead' style="text-align:center">
    <a target="_blank" class="btn btn-primary btn-lg" href="https://github.com/wildantea/php-backend-genererator/archive/master.zip">Download</a>
  </p>

</section>



          
        </div><!-- /.content -->
      </div><!-- /.content-wrapper -->

      <footer class="main-footer">
        <div class="pull-right hidden-xs">
          <b>Version</b> 2.0
        </div>
        <strong>Copyright &copy; 2014-2015 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights reserved.
      </footer>

    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.3 -->
    <script src="admina/assets/plugins/jQuery/jQuery-2.1.3.min.js"></script>
    <!-- Bootstrap 3.3.2 JS -->
    <script src="admina/assets/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
    <!-- FastClick -->
    <script src='admina/assets/plugins/fastclick/fastclick.min.js'></script>
    <!-- AdminLTE App -->
    <script src="admina/assets/dist/js/app.min.js" type="text/javascript"></script>
    <!-- SlimScroll 1.3.0 -->
    <script src="admina/assets/plugins/slimScroll/jquery.slimscroll.min.js" type="text/javascript"></script>
    <script src="https://google-code-prettify.googlecode.com/svn/loader/run_prettify.js"></script>
    <script>
/* 
 * Documentation specific JS script
 */
$(function () {
  var slideToTop = $("<div />");
  slideToTop.html('<i class="fa fa-chevron-up"></i>');
  slideToTop.css({
    position: 'fixed',
    bottom: '20px',
    right: '25px',
    width: '40px',
    height: '40px',
    color: '#eee',
    'font-size': '',
    'line-height': '40px',
    'text-align': 'center',
    'background-color': '#222d32',
    cursor: 'pointer',
    'border-radius': '5px',
    'z-index': '99999',
    opacity: '.7',
    'display': 'none'
  });
  slideToTop.on('mouseenter', function () {
    $(this).css('opacity', '1');
  });
  slideToTop.on('mouseout', function () {
    $(this).css('opacity', '.7');
  });
  $('.wrapper').append(slideToTop);
  $(window).scroll(function () {
    if ($(window).scrollTop() >= 150) {
      if (!$(slideToTop).is(':visible')) {
        $(slideToTop).fadeIn(500);
      }
    } else {
      $(slideToTop).fadeOut(500);
    }
  });
  $(slideToTop).click(function () {
    $("body").animate({
      scrollTop: 0
    }, 500);
  });
  $(".sidebar-menu li a").click(function () {
    var $this = $(this);
    var target = $this.attr("href");
    if (typeof target === 'string') {
      $("body").animate({
        scrollTop: ($(target).offset().top) + "px"
      }, 500);
    }
  });
});
    </script>
  </body>
</html>
