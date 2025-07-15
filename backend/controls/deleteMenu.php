<?php
    session_start();
    include 'db_food.php';

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        $stmt = $pdo->prepare("DELETE FROM products WHERE id = ?");
        $result = $stmt->execute([$id]);

        if ($result) {
            $_SESSION['success'] = "User deleted successfully";
            header("Location: ../menu.php");
        } else {
            $_SESSION['error'] = "Failed to delete user.";
            header("Location: ../menu.php");
        }

        exit;
    }
?>