<?php

function koneksi()
{
  return mysqli_connect('localhost', 'root', '', 'classicmodels');
}

function query($query)
{
  $conn = koneksi();

  $result = mysqli_query($conn, $query);

  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }

  return $rows;
}

function tambah($data)
{
  $conn = koneksi();

  $pic = htmlspecialchars($data['pic']);
  $employeeNumber = htmlspecialchars($data['employeeNumber']);
  $lastName = htmlspecialchars($data['lastName']);
  $firstName = htmlspecialchars($data['firstName']);
  $extension = htmlspecialchars($data['extension']);
  $email = htmlspecialchars($data['email']);
  $officeCode = htmlspecialchars($data['officeCode']);
  $reportsTo = htmlspecialchars($data['reportsTo']);
  $jobTitle = htmlspecialchars($data['jobTitle']);

  $query = "INSERT INTO
              employees
            VALUES
            ('$pic', '$employeeNumber', '$lastName', '$firstName', '$extension', '$email', '$officeCode', '$reportsTo', '$jobTitle');
            ";
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function hapus($id)
{
  $conn = koneksi();
  mysqli_query($conn, "DELETE FROM employees WHERE employeeNumber=$id") or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
}

function edit($data)
{
  $conn = koneksi();

  // var_dump($data, $_POST);
  // die;
  $id = $data['id'];
  $pic = htmlspecialchars($data['pic']);
  $employeeNumber = htmlspecialchars($data['employeeNumber']);
  $lastName = htmlspecialchars($data['lastName']);
  $firstName = htmlspecialchars($data['firstName']);
  $extension = htmlspecialchars($data['extension']);
  $email = htmlspecialchars($data['email']);
  $officeCode = htmlspecialchars($data['officeCode']);
  $reportsTo = htmlspecialchars($data['reportsTo']);
  $jobTitle = htmlspecialchars($data['jobTitle']);

  $query = "UPDATE employees SET
              pic = '$pic',
              employeeNumber = '$employeeNumber',
              lastName = '$lastName',
              firstName = '$firstName',
              extension = '$extension',
              email = '$email',
              officeCode = '$officeCode',
              reportsTo = '$reportsTo',
              jobTitle = '$jobTitle'
            WHERE employeeNumber=$id";
  //var_dump($query);
  mysqli_query($conn, $query) or die(mysqli_error($conn));
  return mysqli_affected_rows($conn);
  // var_dump($query);
}

function total_employee()
{
  return query("SELECT COUNT(*) AS total FROM employees");
}

function total_payment()
{
  return query("SELECT FORMAT(SUM(amount),0) AS total FROM payments");
}

function minimum_stock()
{
  return query("SELECT MIN(quantityInStock) AS min FROM products");
}
