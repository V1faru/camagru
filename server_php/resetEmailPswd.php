<?php
require_once('../config/connect.php');
session_start();
if (isset($_GET['email']) && isset($_GET['hash'])) {
    try {
    	$stmt = $db->prepare('SELECT * FROM `users` WHERE email = :email AND hash = :hash');
        $stmt->bindParam(':email', $_GET['email']);
    	$stmt->bindParam(':hash', $_GET['hash']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            $_SESSION['username'] = $row['username'];
            $_SESSION['verified'] = $row['verified'];
        }
        else 
            echo "no hash or email wrong\n";
    } catch (PDOException $msg) {
    	echo 'Error: '.$msg->getMessage();
    	die();
    }
}