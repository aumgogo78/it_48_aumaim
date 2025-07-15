<?php
    include './controls/db.php';
    session_start();

    // ดึงข้อมูลผู้ใช้งานจาก database
    $sql = "SELECT `id`, `firstName`, `lastName`, `email`, `pass`, `phone`, `address`, `create_at`,`role`, `profile_image`  FROM `users` ";
    $stmt = $pdo->prepare($sql);
    $stmt->execute();
?>