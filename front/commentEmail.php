<div id="signIn" class="container">
	<div class="d-flex justify-content-center h-100">
		<div class="card_usrprofile">
			<div class="card-header">
				<h3>Recieve Comment notifications</h3>
			</div>
			<div class="card-body">
				<form action="server_php/userSettings.php" method="POST">
                    <div class="form-check">
                        <label class="form-check-label">
                            <input name="name" type="hidden" value="commentMail">
                            <input type="checkbox" class="form-check-input" name="changeMail" value="change" required>Recieve comment notification
                            <input type="hidden" name="passwd" value="generic" required>
                        </label>
                    </div>
                    <div class="form-group">
						<input type="submit" value="Submit" name="submit_mail" class="btn float-right login_btn">
					</div>
				</form>
			</div>
		</div>
	</div>
</div>