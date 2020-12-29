<?php
require_once('database.php');
// create DATABASE
try {
    $db = new PDO($DB_HOST, $DB_USER, $DB_PASSWORD);
    // set the PDO error mode to exception
    $db->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    $sql = "CREATE DATABASE IF NOT EXISTS db_camagru";
    $db->exec($sql);
} catch (PDOException $e) {
    echo "ERROR CREATING DATABASE: " . $e->getMessage() . "Aborting process<br>";
}
try {
    //create Table 'users'
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS `users` (
        `user_id` int(11) NOT NULL AUTO_INCREMENT,
        `username` varchar(50) NOT NULL UNIQUE,
        `email` varchar(250) NOT NULL UNIQUE,
        `hash` varchar(32) NOT NULL,
        `verified` tinyint(1) NOT NULL DEFAULT '0',
        `password` varchar(255) NOT NULL,
        `recieveCommentEmail` tinyint(1) NOT NULL DEFAULT '1',
        `creationDate` DATETIME NOT NULL,
        PRIMARY KEY (`user_id`)
    )";
    $dbh->exec($sql);
    $pass = hash('whirlpool', '123');
    $dateNow = date("Y-m-d H:i:s");
    $sql = "INSERT IGNORE INTO `users` (`username`, `email`, `hash`, `verified`, `password`, `recieveCommentEmail`, `creationDate`)
        VALUES ('admin', 'admin@gmail.com', '123', 1, '$pass', '0', '$dateNow')";
    $dbh->exec($sql);
} catch (PDOException $e) {
    echo "ERROR CREATING USERS TABLE: " . $e->getMessage() . "Aborting process<br>";
}

try {
    //create Table 'posts'
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS `posts` (
        `post_id` int(11) NOT NULL AUTO_INCREMENT,
        `photoName` varchar(500) NOT NULL,
        `creationDate` DATETIME NOT NULL,
        `user_id` int(11),
        FOREIGN KEY (`user_id`) REFERENCES users(`user_id`),
        PRIMARY KEY (`post_id`)
    )";
    $dbh->exec($sql);
} catch (PDOException $e) {
    echo "ERROR CREATING posts TABLE: " . $e->getMessage() . "Aborting process<br>";
}
try {
    //create Table 'comments'
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS `comments` (
        `comments_id` int(11) NOT NULL AUTO_INCREMENT,
        `comment` varchar(3000) NOT NULL,
        `creationDate` DATETIME NOT NULL,
        `user_id` int(11),
        FOREIGN KEY (`user_id`) REFERENCES users(`user_id`),
        `post_id` int(11),
        FOREIGN KEY (`post_id`) REFERENCES posts(`post_id`),
        PRIMARY KEY (`comments_id`)
    )";
    $dbh->exec($sql);
} catch (PDOException $e) {
    echo "ERROR CREATING comments TABLE: " . $e->getMessage() . "Aborting process<br>";
}

try {
    //create Table 'likes'
    $dbh = new PDO($DB_DSN, $DB_USER, $DB_PASSWORD);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "CREATE TABLE IF NOT EXISTS `likes` (
        `like_id` int(11) NOT NULL AUTO_INCREMENT,
        `user_id` int(11),
        FOREIGN KEY (`user_id`) REFERENCES users(`user_id`),
        `post_id` int(11),
        FOREIGN KEY (`post_id`) REFERENCES posts(`post_id`),
        PRIMARY KEY (`like_id`)
    )";
    $dbh->exec($sql);
} catch (PDOException $e) {
    echo "ERROR CREATING comments TABLE: " . $e->getMessage() . "Aborting process<br>";
}