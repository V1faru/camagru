<?php
require_once('../config/connect.php');
session_start();
if (isset($_POST['password']) && $_POST['password'] == $_POST['c_password']) {
    try {
    	$stmt = $db->prepare('SELECT * FROM `users` WHERE username = :log OR email = :email');
        $stmt->bindParam(':log', $_POST['username']);
        $stmt->bindParam(':email', $_POST['email']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            header('location: ../index.php?error=2&string=login_or_email_in_use');
        } else {
            $stmt = $db->prepare('INSERT IGNORE INTO users (username, password, email, hash, creationDate) VALUES (:log, :passwd, :mail, :hash, :dateNow)');
            $stmt->bindParam(':log', $_POST['username']);
            $stmt->bindParam(':passwd', hash('whirlpool', $_POST['password']));
            $stmt->bindParam(':mail', $_POST['email']);
            $hash = md5(rand(0,1000));
            $dateNow = date("Y-m-d H:i:s");
            $stmt->bindParam(':hash', $hash);
            $stmt->bindParam(':dateNow', $dateNow);
            $stmt->execute();
            $_SESSION['username'] = $_POST['username'];
            include('verify_email.php');
            $_SESSION['verified'] = '0';
            header('location: ../index.php');
        }
    } catch (PDOException $msg) {
    	echo 'Error: '.$msg->getMessage();
    	die();
    }
}
else {
    header('location: ../index.php?error=2&string=passwd_and_confirmPassword_no_match');
}