<?php
    include 'db_food.php';

    // ดึงข้อมูลผู้ใช้งานตาม id
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM products WHERE id = ?");
    $stmt->execute([$id]);
    $food = $stmt->fetch(PDO::FETCH_ASSOC);
?>