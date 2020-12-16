<div id="signIn" class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card">
			<div class="card-header">
				<h3>Verify Email</h3>
			</div>
			<div class="card-body">
				<h4>Please activate your account</h4>
				<p>Didnt recieve an verification email? Request a new one below.</p>
				<form action="server_php/verify_email.php" method="POST">
                    <div class="input-group form-group">
						<div class="input-group-prepend">
							<span class="input-group-text"><i class="fas fa-at"></i></span>
						</div>
						<input type="text" class="form-control" name="email" placeholder="Email">				
                    </div>
					<div class="form-group">
						<input type="submit" value="again" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>