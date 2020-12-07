<?php
require_once('../config/connect.php');

if (isset($_SESSION['username']) && $_SESSION['username'] != "") {
    try {
        $stmt = $db->prepare('SELECT (verified) FROM `users` WHERE username = :log');
	    $stmt->bindParam(':log', $_SESSION['username']);
        $stmt->execute();
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($row)
            $_SESSION['verified'] = $row['verified'];
        else {
            $_SESSION['username'] = "";
        }
    } catch( PDOException $Exception ) {
        echo 'Error: '.$Exception->getMessage();
        die();
    }
}
else
    $_SESSION['username'] = "";
