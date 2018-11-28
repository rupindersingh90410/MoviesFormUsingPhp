<?php


$title = 'Saving your Registration';
require('header.php');

// store the user inputs in variables
$username = $_POST['username'];
$password = $_POST['password'];
$confirm = $_POST['confirm'];
$ok = true;

// validate the inputs
if (empty($username)) {
	echo 'Email is required<br />';
	$ok = false;
}

if (empty($password)) {
	echo 'Password is required<br />';
	$ok = false;
}

if ($password != $confirm) {
	echo 'Passwords do not match<br />';
	$ok = false;
}

// proceed if the inputs are complete
if ($ok) {

	// hash the password so it's not stored in plain text in the database
	$hashed_password = hash('sha512', $password);

	try{

	} catch(Exception $e){
		echo 'Sorry, can\'t able to register you!<br>';
	}

	// connect to the database
	require_once('db.php');

	// set up the SQL INSERT command
	$sql = "INSERT INTO user (username, password) VALUES (:username, :password)";

	// populate the Insert with parameter values
	$cmd = $db->prepare($sql);
	$cmd->bindParam(':username', $username, PDO::PARAM_STR, 50);
	$cmd->bindParam(':password', $hashed_password, PDO::PARAM_STR, 128);

	// execute the INSERT
	$cmd->execute();

	// disconnect
	$db = null;
	echo 'User Saved';
}

require('footer.php');
?>
