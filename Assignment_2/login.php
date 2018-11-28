<?php
$title = 'Login';
require('header.php'); ?>

<main class="container">
	<h1>Log In</h1>
	<form method="post" action="validate.php">
		<fieldset class="form-group">
			<label for="username" class="col-sm-4">Email:</label>
			<input name="username" required type="email" />
		</fieldset>
		<fieldset class="form-group">
			<label for="password" class="col-sm-4">Password:</label>
			<input name="password" required type="password" />
		</fieldset>
		<button type="submit" class="col-sm-offset-4 btn btn-success">Log In</button>
	</form>
</main>

<?php require('footer.php'); ?>

