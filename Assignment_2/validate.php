

<!DOCTYPE html>
<html>

<body>

<?php
// store the inputs & hash the password
$username = $_POST['username'];
$password = $_POST['password'];
$password = hash('sha512', $_POST['password']);

// connect
require_once('db.php');

// write the query
$sql = "SELECT user_id FROM user WHERE username = :username AND password = :password";

// create the command, run the query and store the result
$cmd = $db->prepare($sql);
$cmd->bindParam(':username', $username);
$cmd->bindParam(':password', $password);
$cmd->execute();
$users = $cmd->fetchAll();

//if count is 1, we found a matching username and password in the database
if (count($users) >= 1) {
    echo 'Logged in Successfully.';

    foreach  ($users as $user) {
        //get the user_id and store it because the web is stateless
        //then take the user to subcribers.php

        //access the current user's session
        session_start();

        //store the user's unique identifier in a session variable
        $_SESSION['user_id'] = $user['user_id'];

        //redirect to subscribers
        header('location:movie.php');

    }
}
else {
    echo 'Invalid Login';
}

$db = null;
?>

</body>
</html>
