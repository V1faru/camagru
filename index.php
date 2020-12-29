<?php
session_start();
require_once('config/init_setup.php');
require_once('server_php/verifySession.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Camagru</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/cunt.css">
	<link rel="stylesheet" href="assets/css/user_profile.css">
</head>
<body>
	<div class="header ">
		<?php include('header.php'); ?>
	</div>
	<div class="middle">
	</div>
	<div class="footer">
	<?php include('footer.php'); ?>
	</div>

	<script src="assets/js/header.js">
	</script>
	<script src="assets/js/userSettings.js">
	</script>
	<script>
		var session = '<?php echo $_SESSION['verified'];?>';
		console.log(session + 'session');
		var username = '<?php echo $_SESSION['username'];?>';
		console.log(username + 'username');
		var email = '<?php echo $_POST['email'];?>';
		console.log(username + 'email');
		var hash = '<?php echo $_POST['hash'];?>';
		console.log(username + 'hash');
		if(session == 0 && username != "")
			mrBoss('front/verify_email.php');
		else if (username != '' && email != '' && hash != '')
			mrBoss('front/resetPswd.php');
	</script>
</body>
</html>