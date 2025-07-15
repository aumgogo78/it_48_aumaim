<?php
include 'db_food.php';

if ($_SERVER['REQUEST_METHOD'] = 'POST') {
  $foodName = $_POST['product_name'];
  $desMenu = $_POST['description'];
  $priceMenu = $_POST['price'];
  $pictureMenu = null;

  if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
    $target_dir = "../../assets/imgs/";
    $image_name = basename($_FILES["product_image"]["name"]);
    $target_file = $target_dir . $image_name;

    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
      if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
        $pictureMenu = $image_name;
      } else {
        $_SESSION['error'] = "Sorry, there was an error uploading your file.";
        header("Location: ../menu.php?id=" . $id);
        exit;
      }
    } else {
      $_SESSION['error'] = "Invalid file  type. Only JPG, JPEG, PNG & GIF file are allowed.";
      header("Location: ../menu.php?id=" . $id);
      exit;
    }

    $sql = "INSERT INTO products (product_name, description, price, product_image) VALUES (?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);
    $stmt->execute([
      $foodName,
      $desMenu,
      $priceMenu,
      $pictureMenu
    ]);
  }



  header("location: ../menu.php");
}
