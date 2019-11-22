<?php
@session_start();
include "../config/koneksi.php";
$area= $_SESSION['area'];
$id_area = $_SESSION['id_area'];
// error_reporting(0);

?>
<?php
if (!$_SESSION['id']) {
    header('Location: ../login.php');
} else{

  ?>

<!-- /*Create Nopen rianto - date 2017-06-02 */ -->
<!DOCTYPE html>

<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../../img/icon.png" />
  <title>Admin</title>

  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
  <link rel="stylesheet" href="../css/fontawesome/css/font-awesome.css">
  <link rel="stylesheet" type="text/css" href="../assets/css/datatables.min.css" />
  <link rel="stylesheet" href="../assets/css/AdminLTE.min.css">
  <link rel="stylesheet" href="../assets/css/bootstrap3-wysihtml5.min.css">
  <link rel="stylesheet" href="../assets/css/skins/_all-skins.min.css">
  <link rel="stylesheet" href="../assets/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link rel="stylesheet" href="../assets/select2/dist/css/select2.min.css">




<body class="hold-transition skin-blue sidebar-mini">

  <div class="wrapper">
  <!--   <div class="logo">
      <img src="../../img/logo/<?= $logohitam['img_logo'] ?>" style="margin-left: 30px; margin-top: 5px; width: 150px;">
      <span class="nm-sek"></span>
    </div> -->
    <header class="main-header">
      <!-- Logo -->
      <div href="#" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><b>Adm</b></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b>Selamat Datang</b></span>
      </div>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top" role="navigation">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>
        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <!-- Messages: style can be found in dropdown.less-->


            <!-- User Account: style can be found in dropdown.less -->
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="../assets/images/admin.png" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['username'];?></span>

              </a>

              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="../assets/images/admin.png" class="img-circle" alt="User Image">
                  <p>
                    <?php echo $_SESSION['username'];?></br><span style=""><?= "AREA: "."$area"; ?></span>
                  </p>

                </li>
                <!-- Menu Body -->
                <li class="user-body">

                </li>
                <!-- Menu Footer-->
                <li class="user-footer">

                  <div class="pull-right">
                    <a href="../logout.php" class="btn btn-default btn-flat"><i class="fa fa-sign-out"> Keluar</i></a>
                  </div>
                </li>
              </ul>
            </li>

          </ul>
        </div>
      </nav>
    </header>
    <!-- Left side column. contains the logo and sidebar style="margin-top: 60px;"-->
    <aside class="main-sidebar" >
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar" style="">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../assets/images/admin.png" class="img-rounded" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['username'];?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>

        </div>
      
        <!-- sidebar menu: : style can be found in sidebar.less -->
        <ul class="sidebar-menu">
          <li>
            <a href="?module=home/view">
              <i class="fa fa-dashboard"></i> <span>Dashboard</span>
            </a>
          </li>

            <li>
                <a href="?module=produk/view">
                  <i class="fa fa-table"></i> <span>Data</span>
                </a>
              </li>
       
          <li>
            <a href="?module=pelanggan/view">
              <i class="fa fa-table"></i> <span> Pelanggan</span>
            </a>
          </li>

          <li>
            <a href="#">
              <i class="fa fa-calendar-o"></i> <span>Laporan Penjualan</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar-o"></i> <span>Statistik</span>
            </a>
          </li>
          <li>
            <a href="#">
              <i class="fa fa-calendar-o"></i> <span>Ingatkan</span>
            </a>
          </li>

          <li>
            <a href="?module=sales/view">
              <i class="fa fa-table"></i> <span>Data Sales</span>
            </a>
          </li>

         
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <content>
      <?php include"content.php"; ?>
    </content>
    <!-- /.content-wrapper -->

    <footer class="main-footer">
      <div class="pull-right hidden-xs">
        <b></b>
      </div>
      &copy; Copyright <?php echo date('Y');  ?> CV. Mediatama Web Indonesia
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark" style="top:50px;">
      <!-- Create the tabs -->
      <ul class="nav nav-tabs nav-justified control-sidebar-tabs">

      </ul>
      <!-- Tab panes -->
      <div class="tab-content">
        <!-- Home tab content -->
        <div class="tab-pane" id="control-sidebar-home-tab">
        </div>
      </div>
    </aside><!-- /.control-sidebar -->
    <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->

  </div><!-- ./wrapper -->

  <!-- jQuery 2.1.4 -->
  <script src="../assets/js/jquery-1.10.2.min.js"></script>
  <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
  <!-- Bootstrap 3.3.5 -->
  <script src="../assets/js/bootstrap.min.js"></script>

  <script type="text/javascript" src="../assets/js/datatables.min.js"></script>
  <script type="text/javascript" src="../assets/js/bootstrap3-wysihtml5.all.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../assets/js/app.min.js"></script>
  <script src="../ckeditor/ckeditor.js"></script>
  <script src="../assets/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
  <script src="../assets/js/backtoTop.js"></script>
  <script src="../assets/select2/dist/js/select2.full.min.js"></script>
  <!-- include summernote css/js -->
  <link href="../assets/summer/summer.css" rel="stylesheet">
  <script src="../assets/summer/summer.js"></script>
  <script>
    $(function () {
      $('.textarea').wysihtml5();
      $('.select2').select2();
      $('#datepicker').datepicker({
        autoclose: true
      });

      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
      });



    });
  </script>
</body>

</html>
<?php
}
?>