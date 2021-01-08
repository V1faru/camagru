<div id="signIn" class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card_usrprofile">
			<div class="card-header">
				<h3>Change Password</h3>
			</div>
			<div class="card-body">
                <form action="server_php/userSettings.php" method="POST">
                    <div class="input-group form-group">
						<input type="hidden" name="name" value="changePswd">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="old_passwd" placeholder="Current Password">
					</div>
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="password" placeholder="New Password">
					</div>
					<div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-key"></i></span>
						</div>
						<input type="password" class="form-control" name="c_password" placeholder="Confirm Password">
					</div>
					<div class="form-group">
						<input type="submit" value="Submit"  name="submit_pswd" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>