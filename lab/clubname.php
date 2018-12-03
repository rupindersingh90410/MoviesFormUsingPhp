<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Save club</title>
</head>
<body>
<?php
// introduce variables to store the form input values
$club_id = $_POST['club_id'];
$club_name = $_POST['club_name'];
$ground = $_POST['ground'];

// validate each input
$ok = true;

if (empty($club_name)) {
    echo "Name is Required.<br />";
    $ok = false;
}

if ($ground == '-Select-') {
    echo "Ground is Required.<br />";
    $ok = false;
}

if ($ok) {
    $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200397613', 'gc200397613', 'eedZzT8hO_');

    if (empty($club_id)) {
        $sql = "INSERT INTO clubs (club_name, ground) 
    VALUES (:club_name, :ground)";
    }
    else {
        $sql = "UPDATE clubs SET club_name = :club_name, ground = :ground, WHERE club_id = :club_id";
    }

    $cmd = $db->prepare($sql);
    $cmd->bindParam(':club_name', $club_name, PDO::PARAM_STR, 50);
    $cmd->bindParam(':ground', $name, PDO::PARAM_STR, 60);


    if (!empty($club_id)) {
        $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
    }
    $cmd->execute();

    $db = null;

    header('location:clubs.php');
}
?>

</body>
</html>