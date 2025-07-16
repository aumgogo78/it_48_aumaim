<?php   
    $host = 'localhost';
    $dbname = 'db_food';
    $username = 'root';
    $password = '';

    try {
        $pdo = new PDO("mysql:host=$host; dbname=$dbname; charset=utf8mb4", $username, $password);
        $pdo->setAttribute(
            PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION
        );
        echo "<script>console.log('Connection Success');</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error:". $e->getMessage()."')</script>";
        exit();
    }
?>