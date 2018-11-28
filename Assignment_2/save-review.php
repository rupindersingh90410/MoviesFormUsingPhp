<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save Review</title>
</head>
<body>

<?php
// introduce variables to store the form input values
$username = $_POST['username'];
$rating = $_POST['rating'];
$comments = $_POST['comments'];
$movie = $_POST['movie'];

// validate each input
$ok = true;

if (empty($username)) {
    echo "Username is Required.<br />";
    $ok = false;
}

if (empty($rating)) {
    echo "Rating is Required.<br />";
    $ok = false;
}

if (empty($comments)) {
    echo "Comments are Required.<br />";
    $ok = false;
}

if ($movie == '-Select-') {
    echo "Movie is Required.<br />";
    $ok = false;
}

// only save if no validation errors
if ($ok) {
    // connect to the database with server, username, password, dbname
    require('db.php');

    // set up and execute an INSERT or UPDATE command

        $sql = "INSERT INTO reviews (username, rating, comments, movie) 
    VALUES (:username, :rating, :comments, :movie)";

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':username', $username, PDO::PARAM_STR, 60);
    $cmd->bindParam(':rating', $rating, PDO::PARAM_INT);
    $cmd->bindParam(':comments', $comments, PDO::PARAM_STR, 5000);
    $cmd->bindParam(':movie', $movie, PDO::PARAM_STR, 100);

    $cmd->execute();

    // disconnect
    $db = null;

    header('location:reviews.php');
}
?>

</body>
</html>
