<?php
require_once('../config/connect.php');
session_start();
if ($_SESSION['username'] != "" && $_SESSION['verified'] == 0){
    header('location: ../index.php');
    die();
}
    
try {
	$stmt = $db->prepare('SELECT * FROM `users` WHERE username = :log');
    $stmt->bindParam(':log', $_POST['username']);
    echo $_POST['username'];
    $stmt->execute();
    $row = $stmt->fetch(PDO::FETCH_ASSOC);
    if ($row && hash('whirlpool', $_POST['password']) ===  $row['password']) {
        echo "success\n";
        $_SESSION['username'] = $row['username'];
        $_SESSION['verified'] = $row['verified'];
        $_SESSION['date'] = $row['creationDate'];
        $_SESSION['email'] = $row['email'];
        header('location: ../index.php');
        echo "success";
    }
    else 
        echo "error";
} catch (PDOException $msg) {
	echo 'Error: '.$msg->getMessage();
	die();
}