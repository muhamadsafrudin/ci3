<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title>safr/code</title>
  <link rel="icon" type="image/png" href="<?php echo base_url()?>assets/images/icons/download.png"/>
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/adminlte.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/daterangepicker/daterangepicker.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url()?>assets/dist/css/select2.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-dark bg-primary" >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link bg-danger">
      <span class="brand-text font-weight-light ml-3">In and Out</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <?php
          if($this->fungsi->user_login()->level  == 1 ) {
            echo "<img src='".base_url()."assets/dist/img/admin.PNG' class='img-circle elevation-2' alt='User Image'>";
          } else {
            echo "<img src='".base_url()."assets/dist/img/user.PNG' class='img-circle elevation-2' alt='User Image'>";
          }
          ?>
        </div>
        <div class="info">
          <a href="#" class="d-block"><?= $this->fungsi->user_login()->name ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
               <li class="nav-item has-treeview menu-close">
                <a href="<?php echo base_url()?>dashboard" <?=$this->uri->segment(1)=='dashboard'?$a='active':$a=''?> class="nav-link <?=$a?>">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>
                    Dashboard
                  </p>
                </a>
              </li>         

              <li class="nav-item">
                <a href="<?php echo base_url()?>products/" <?=$this->uri->segment(1)=='products'?$a='active':$a=''?> class="nav-link <?=$a?>">
                  <i class="fas fa-store nav-icon"></i>
                  <p>Products</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url()?>suppliers/" <?=$this->uri->segment(1)=='suppliers'?$a='active':$a=''?> class="nav-link <?=$a?>">
                  <i class="fa fa-shipping-fast nav-icon"></i>
                  <p>Suppliers</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>pembeli/" <?=$this->uri->segment(1)=='pembeli'?$a='active':$a=''?> class="nav-link <?=$a?>">
                  <i class="nav-icon fa fa-restroom"></i>
                  <p>Pembeli</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>transaksi/" <?=$this->uri->segment(1)=='transaksi'?$a='active':$a=''?> class="nav-link <?=$a?>">
                  <i class="nav-icon fa fa-handshake"></i>
                  <p>transaksi</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="<?=base_url()?>pembayaran/" <?=$this->uri->segment(1)=='pembayaran'?$a='active':$a=''?> class="nav-link <?=$a?>">
                  <i class="nav-icon fa fa-money-bill-wave"></i>
                  <p>pembayaran</p>
                </a>
              </li>
            <?php if($this->fungsi->user_login()->level == 1) { ;?>
              <li class="nav-item">
                <a href="<?=site_url('user/')?>" <?=$this->uri->segment(1)=='user'?$a='active':$a=''?> class="nav-link <?=$a?>">
                  <i class="fa fa-users nav-icon"></i>
                  <p>User</p>
                </a>
              </li>
            <?php };?>
          </li>
          <li class="nav-item">
            <a href="<?=site_url('auth/logout')?>" class="nav-link" onclick="return confirm('apakah anda yakin akan keluar')">
              <i class="fas fa-sign-out-alt"></i>
              <p>
                logout
                <span class="right badge badge-danger"></span>
              </p>
            </a>
          </li>
        </li>
        </ul> 
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <div class="content-wrapper"> 
        <?php echo $contents ?>
  </div>
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer footer footer-expand footer-light bg-primary">
    <strong>Copyright &copy;2021 safr/code</a>.</strong>
    <div class="float-right d-none d-sm-inline-block"><?=date('l, d-M-Y');?></div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
<!-- jQuery -->
<script src="<?php echo base_url()?>assets/plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/moment/moment.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/adminlte.js"></script>
<script src="<?php echo base_url()?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?php echo base_url()?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?php echo base_url()?>assets/dist/js/select2.min.js"></script>


<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true,
      "autoWidth": false,
    });
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });

  $(function() {
    setTimeout(function() {
        $("#hilang").hide('blind', {}, 400)
    }, 4000);
});

$(document).ready(function () {
                $("#product").select2({
                    placeholder: "Please Select"
                });

                $("#pembeli").select2({
                    placeholder: "Please Select"
                });
});
</script>
</body>
</html>
