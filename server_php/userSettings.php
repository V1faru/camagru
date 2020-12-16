<?php
session_start();
require_once('../config/connect.php');
if (isset($_POST['submit']) && isset($_SESSION['login']) && $_SESSION['login'] != "" && isset($_POST['passwd'])) {
    if ($_POST['submit'] === 'changePasswd' && $_POST['newPasswd'] === $_POST['newPasswdAgain']) {
        try {
            $stmt = $db->prepare('SELECT * from `users` WHERE login = :log');
            $stmt->bindParam(':log', $_SESSION['login']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                header('location: ../index.php?error=2&string=how');
                die();
            } else if ($row['passwd'] !== hash('whirlpool', $_POST['passwd'])) {
                header('location: ../index.php?error=2&string=oldPasswd_wrong');
                die();
            }
            $stmt = $db->prepare('UPDATE `users` SET passwd = :pass WHERE login = :log');
            $stmt->bindParam(':log', $_SESSION['login']);
            $stmt->bindParam(':pass', hash('whirlpool', $_POST['newPasswd']));
            $stmt->execute();
            header('location: ../index.php?error=2&string=newPasswd_updated');
        } catch( PDOException $Exception ) {
            echo 'Error: '.$Exception->getMessage();
            die();
        }
    } else if ($_POST['submit'] === 'changeEmail' && isset($_POST['newEmail']) && $_POST['newEmail'] === $_POST['newEmailAgain']) {
        try {
            $stmt = $db->prepare('SELECT * from `users` WHERE login = :log');
            $stmt->bindParam(':log', $_SESSION['login']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                header('location: ../index.php?error=2&string=how');
                die();
            }
            $stmt = $db->prepare('SELECT * from `users` WHERE email = :email');
            $stmt->bindParam(':email', $_SESSION['newEmail']);
            $stmt->execute();
            $empty = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($empty) {
                header('location: ../index.php?error=2&string=email_in_use');
                die();
            } else if ($row['passwd'] !== hash('whirlpool', $_POST['passwd'])) {
                header('location: ../index.php?error=2&string=passwd_wrong');
                die();
            }
            $stmt = $db->prepare('UPDATE `users` SET email = :email WHERE login = :log');
            $stmt->bindParam(':log', $_SESSION['login']);
            $stmt->bindParam(':email', $_POST['newEmail']);
            $stmt->execute();
            header('location: ../index.php?error=2&string=newEmail_updated');
        } catch( PDOException $Exception ) {
            echo 'Error: '.$Exception->getMessage();
            die();
        }
    } else if ($_POST['submit'] === 'changeLogin' && isset($_POST['newLogin']) && $_POST['newLogin'] === $_POST['newLoginAgain']) {
        try {
            $stmt = $db->prepare('SELECT * from `users` WHERE login = :log');
            $stmt->bindParam(':log', $_SESSION['login']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                header('location: ../index.php?error=2&string=how');
                die();
            }
            $stmt = $db->prepare('SELECT * from `users` WHERE login = :log');
            $stmt->bindParam(':log', $_POST['newLogin']);
            $stmt->execute();
            $empty = $stmt->fetch(PDO::FETCH_ASSOC);
            if ($empty) {
                header('location: ../index.php?error=2&string=login_in_use');
                die();
            } else if ($row['passwd'] !== hash('whirlpool', $_POST['passwd'])) {
                header('location: ../index.php?error=2&string=passwd_wrong');
                die();
            }
            $stmt = $db->prepare('UPDATE `users` SET login = :logi WHERE login = :log');
            $stmt->bindParam(':log', $_SESSION['login']);
            $stmt->bindParam(':logi', $_POST['newLogin']);
            $stmt->execute();
            $_SESSION['login'] = $_POST['newLogin'];
            header('location: ../index.php?error=2&string=newLogin_updated');
        } catch( PDOException $Exception ) {
            echo 'Error: '.$Exception->getMessage();
            die();
        }
    } else if ($_POST['submit'] === 'deleteLogin' && isset($_POST['login']) && isset($_POST['passwd']) && $_POST['login'] === $_SESSION['login']) {
        try {
            $stmt = $db->prepare('SELECT * from `users` WHERE login = :log');
            $stmt->bindParam(':log', $_SESSION['login']);
            $stmt->execute();
            $row = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$row) {
                header('location: ../index.php?error=2&string=how');
                die();
            } else if ($row['passwd'] !== hash('whirlpool', $_POST['passwd'])) {
                header('location: ../index.php?error=2&string=passwd_wrong');
                die();
            }
            $stmt = $db->prepare('DELETE FROM `users` WHERE login = :log');
            $stmt->bindParam(':log', $_SESSION['login']);
            $stmt->execute();
            $_SESSION['login'] = "";
            header('location: ../index.php?error=2&string=login_deleted');
        } catch( PDOException $Exception ) {
            echo 'Error: '.$Exception->getMessage();
            die();
        }
    }
}