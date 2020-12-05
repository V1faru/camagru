<?php
require_once('../config/connect.php');
session_start();
try {
	$stmt = $db->prepare('SELECT * FROM `users` WHERE username = :log');
	$stmt->bindParam(':log', $_POST['username']);
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row && hash('whirlpool', $_POST['password']) ===  $row['password']) {
        echo "success\n";
        $_SESSION['username'] = $row['username'];
        $_SESSION['verified'] = $row['verified'];
        header('location: ../index.php');
    }
    else 
        header('location: ../index.php?error=2&string=no_match');
} catch (PDOException $msg) {
	echo 'Error: '.$msg->getMessage();
	die();
}