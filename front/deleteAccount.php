<div id="signIn" class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card_usrprofile">
			<div class="card-header">
				<h3>Delete Account</h3>
			</div>
			<div class="card-body">
				<form action="server_php/userSettings.php" method="POST">
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-user"></i></span>
						</div>
						<input type="text" class="form-control" name="username" placeholder="Username">				
                    </div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="Password">
					</div>
					<div class="form-group">
						<input type="submit" value="Submit" name="submit_del" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>