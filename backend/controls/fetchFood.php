<?php
    include './controls/db_food.php';
    session_start();

    // ดึงข้อมูลผู้ใช้งานจาก database
    $sql = "SELECT `id`, `product_name`, `description`, `price`, `created_at` FROM `products`";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>