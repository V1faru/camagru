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
    ?>
            <form id='its' action="../index.php" method="post">
                <input type="hidden" name="email" value="<?php echo $_GET['email']; ?>" readonly>
                <input type="hidden" name="hash" value="<?php echo $_GET['hash']; ?>" readonly>
            </form>
            <script type="text/javascript">
                document.getElementById('its').submit();
            </script>
    <?php
        }
        else 
            echo "no hash or email wrong\n";
    } catch (PDOException $msg) {
    	echo 'Error: '.$msg->getMessage();
    	die();
    }
}