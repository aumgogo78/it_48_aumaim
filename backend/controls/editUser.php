<?php
    session_start();
    include 'db.php';

    if($_SERVER['REQUEST_METHOD'] === 'POST' ){
        $id = $_POST['id'];
        $firstName = $_POST['firstName'];
        $lastName = $_POST['lastName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $add = $_POST['address'];

        $stmt = $pdo->prepare("UPDATE users SET firstName = ? , lastName = ?, address = ?, phone = ?, email = ? WHERE id = ?" );
        $result = $stmt->execute([$firstName, $lastName, $add, $phone, $email, $id]);

        if ($result) {
            $_SESSION['success'] = "User update successfully";
            header("Location: ../users.php");
        }   else {
            $_SESSION['error'] = "Failed to update user.";
            header("Location: ../edituser.php?id=" . $id);
        }
        exit;
    }
?>