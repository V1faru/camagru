<?php
require_once('../config/connect.php');
session_start();
if (isset($_POST['password']) && isset($_POST['c_password']) && isset($_SESSION['username']) && $_SESSION['username'] != '' && $_POST['password'] === $_POST['c_password']) {
    try {
        $stmt = $db->prepare('SELECT * FROM `users` WHERE username = :log');
        $stmt->bindParam(':log', $_SESSION['username']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$row) {
            echo "error : email and hash did not match";
            die();
        }
        $stmt = $db->prepare('UPDATE `users` SET password = :passwd, hash = :hash WHERE username = :log');
        $stmt->bindParam(':log', $_SESSION['username']);
        $pass = hash('whirlpool', $_POST['password']);
        $stmt->bindParam(':passwd', $pass);
        $hash = md5(rand(0,1000));
        $stmt->bindParam(':hash', $hash);
        $stmt->execute();
        echo "success : password reset";
        header('location: ../index.php');
    } catch( PDOException $Exception ) {
        echo 'Error: '.$Exception->getMessage();
        die();
    }
} else
    echo "error : value error";