<?php
    session_start();
    include 'db_food.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
        $id = $_POST['id'];
        $product = $_POST['product_name'];
        $des = $_POST['description'];
        $price = $_POST['price'];


        $stmt = $pdo->prepare("UPDATE products SET product_name = ? , description = ?, price = ? WHERE id = ?" );
        $result = $stmt->execute([$product, $des, $price, $id]);

        if ($result) {
            $_SESSION['success'] = "User update successfully";
            header("Location: ../menu.php");
        }   else {
            $_SESSION['error'] = "Failed to update user.";
            header("Location: ../editmenu.php?id=" . $id);
        }
        exit;
    }
?>