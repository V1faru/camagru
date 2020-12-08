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
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
	<link rel="stylesheet" href="assets/css/cunt.css">
</head>
<body>
	<div class="header">
		<?php include('header.php'); ?>
	</div>
	<div class="middle">
	</div>
	<div class="right">

	</div class="footer">
	<?php include('footer.php'); ?>
	</div>

	<script src="assets/js/header.js">
	</script>
</body>
</html>