<?php
require 'functions.php';
$employees = query("SELECT * FROM employees ORDERS LIMIT 5 ");
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
      <a href="" class="brand-link">
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
              <a href="#" class="nav-link">
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
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Gian ERP</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <div class="card-tools">
                    <div class="input-group input-group-sm" style="width: 140px;">
                      <a href="tambah.php">
                        <button type="button" class="btn btn-block btn-success btn-">Add Employee</button>
                      </a>
                    </div>
                  </div>
                </div>
                <!-- /.card-header -->
                <div class="card-body table-responsive p-0">
                  <table class="table table-hover text-nowrap">
                    <thead>
                      <tr>
                        <th>Pic</th>
                        <th>Employee Number</th>
                        <th>Last Name</th>
                        <th>First Name</th>
                        <th>Extension</th>
                        <th>Email</th>
                        <th>Office Code</th>
                        <th>Reports To</th>
                        <th>Job Title</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <tbody>
                      <!-- ISI DATABASE -->
                      <?php foreach ($employees as $e) : ?>
                        <tr>
                          <td>
                            <!-- <image width="30px" height="30px"> -->
                            <img width="80px" height="80px" src="image/<?= $e['pic']; ?>">
                          </td>
                          <td><?= $e['employeeNumber']; ?></td>
                          <td><?= $e['lastName']; ?></td>
                          <td><?= $e['firstName']; ?></td>
                          <td><?= $e['extension']; ?></td>
                          <td><?= $e['email']; ?></td>
                          <td><?= $e['officeCode']; ?></td>
                          <td><?= $e['reportsTo']; ?></td>
                          <td><?= $e['jobTitle']; ?></td>
                          <td>
                            <a href="edit.php?id=<?= $e['employeeNumber']; ?>" class="btn btn-app bg-primary">
                              <i class="fas fa-edit"></i>Edit</a>
                            <a href="hapus.php?id=<?= $e['employeeNumber']; ?>" class="btn btn-app bg-warning" onclick="return confirm('Apakah anda yakin?');">
                              <i class="fas fa-eraser"></i>Hapus</a>
                            <!-- <a href="hapus.php?id=<?= $e['employeeNumber']; ?>" onclick="return confirm('apakah anda yakin?');">hapus</a> -->
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
            </div>
          </div>
          <!-- /.row -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <!-- ./card-header -->
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
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
  <!-- AdminLTE App -->
  <script src="./dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="./dist/js/demo.js"></script>
</body>

</html>