<?php
include './controls/db.php';

$sql = "SELECT `firstName`, `lastName`, `address`, `phone`, `email` FROM `users` WHERE id = :users_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':users_id', $_SESSION['user_id'], PDO::PARAM_INT);
$stmt->execute();
$row = $stmt->fetch(PDO::FETCH_ASSOC);

?>