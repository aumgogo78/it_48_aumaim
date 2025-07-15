<?php
  include 'db.php';

  if($_SERVER['REQUEST_METHOD'] = 'POST'){
    $fname = $_POST['firstName'];
    $lname = $_POST['lastName'];
    $mail = $_POST['email'];
    $pass = password_hash($_POST['pass'],
    PASSWORD_DEFAULT);
    $phone = $_POST['phone'];
    $add = $_POST['address'];

    $sql = "INSERT INTO users (firstName, lastName, email, pass, phone, address) VALUES (?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $fname,
      $lname,
      $mail,
      $pass,
      $phone,
      $add
    ]);

    header("location: ../index.php");
  }
?>