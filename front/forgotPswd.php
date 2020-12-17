<?php
	//session_start();
	//if ($_SESSION['username'] != "" && $_SESSION['verified'] == 0){
		//header('location: ../index.php');
	//	die();
	//}
	
?>
<div id="signIn" class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Forgot Password</h3>
			</div>
			<div class="card-body">
				<form action="server_php/forgotPswd.php" method="POST">
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="username">				
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-at"></i></span>
						</div>
						<input type="email" class="form-control" name="email" placeholder="Email">				
                    </div>
					<div class="form-group">
						<input type="submit" value="Submit" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>