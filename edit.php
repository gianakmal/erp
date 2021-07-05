<?php
require 'functions.php';

// // ambil di dari url
$id = $_GET['id'];

// //query pegawai berdasarkan id
$e = query("SELECT * FROM employees WHERE employeeNumber=$id") or die(mysqli_error($conn));
// $e = query("SELECT * FROM employees LIMIT 10") or die(mysqli_error($conn));
// print "<pre>";
//var_dump($e[0]);

// cek apakah tombol edit sudah ditekan apa belum
if (isset($_POST['edit'])) {
  if (edit($_POST) > 0) {
    echo "<script>
    alert('Data berhasil diubah');
    document.location.href = 'index.php';
    </script>";
  } else {
    echo "Data gagal diubah";
  }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Employees</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="./plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="./dist/css/adminlte.min.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="./index.php" class="brand-link">
        <img src="./dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">ERP Gian</span>
      </a>
      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="./dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Budi Hermawan</a>
          </div>
        </div>
        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="#" class="nav-link active">
                <i class="nav-icon fas fa-user"></i>
                <p>
                  Employees
                  <!-- <span class="right badge badge-danger">Baru</span> -->
                </p>
              </a>
            </li>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
              </li>
            </ul>
          </nav>
          <h1>Gian ERP</h1>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-10">
              <!-- general form elements -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Edit Data Employee</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="" method="POST" enctype="multipart/form-data">
                  <input type="hidden" name="id" value="<?= $e[0]['employeeNumber']; ?>">
                  <input type="hidden" name="gambarLama" value="<?= $e[0]['pic']; ?>">
                  <div class="card-body">
                    <div class="form-group">
                      <label>Pic</label><br>
                      <img width="80px" height="80px" src="image/<?= $e[0]['pic']; ?>"><br><br>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" name="pic">
                          <label class="custom-file-label">Pilih gambar</label>
                        </div>
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Employee Number</label>
                      <input type="text" class="form-control" value="<?= $e[0]['employeeNumber']; ?>" name="employeeNumber" required>
                    </div>
                    <div class="form-group">
                      <label>Last Name</label>
                      <input type="text" class="form-control" value="<?= $e[0]['lastName']; ?>" name="lastName" required>
                    </div>
                    <div class="form-group">
                      <label>First Name</label>
                      <input type="text" class="form-control" value="<?= $e[0]['firstName']; ?>" name="firstName" required>
                    </div>
                    <div class="form-group">
                      <label>Extension</label>
                      <input type="text" class="form-control" value="<?= $e[0]['extension']; ?>" name="extension" required>
                    </div>
                    <div class="form-group">
                      <label>E-mail</label>
                      <input type="email" class="form-control" value="<?= $e[0]['email']; ?>" name="email" required>
                    </div>
                    <div class="form-group">
                      <label for="officeCode">Office Code:</label>
                      <select class="form-control" name="officeCode" id="officeCode">
                        <option value="<?= $e[0]['officeCode']; ?>"><?= $e[0]['officeCode']; ?>-<?= $e[0]['officeCode']; ?></option>
                        <option value="1">1-1</option>
                        <option value="2">2-2</option>
                        <option value="3">3-3</option>
                        <option value="4">4-4</option>
                        <option value="5">5-5</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="reportsTo">Reports To:</label>
                      <select class="form-control" name="reportsTo" id="reportsTo">
                        <option value="<?= $e[0]['reportsTo']; ?>"><?= $e[0]['reportsTo']; ?></option>
                        <option value="1002 - Murphy">1002 - Murphy</option>
                        <option value="1056 - Patterson">1056 - Patterson</option>
                        <option value="1076 - Firelli">1076 - Firelli</option>
                        <option value="1088 - Patterson">1088 - Patterson</option>
                        <option value="1102 - Bondur">1102 - Bondur</option>
                      </select>
                    </div>
                    <div class="form-group">
                      <label>Job Title</label>
                      <input type="text" class="form-control" value="<?= $e[0]['jobTitle']; ?>" name="jobTitle" required>
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" class="btn btn-primary" name="edit">Perbaharui</button>
                  </div>
                </form>
              </div>
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Beta</b> Version
      </div>
      <!-- <strong>Copyright &copy; 2014-2021 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved. -->
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="./plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="./plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="./plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="./dist/js/demo.js"></script>
  <!-- Page specific script -->
  <script>
    $(function() {
      bsCustomFileInput.init();
    });
  </script>
</body>

</html>