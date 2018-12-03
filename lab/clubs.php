<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Clubs</title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
</head>
<body>
<a href="club.php">Add a New Club</a>
<h1>Clubs</h1>
<?php

$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200397613', 'gc200397613', 'eedZzT8hO_');

$sql = "SELECT * FROM clubs";

$cmd = $db->prepare($sql);
$cmd->execute();
$clubs = $cmd->fetchAll();


echo '<table class="table table-striped table-hover"><thead><th>Name</th><th>Ground</th><th>Actions</th></thead>';

foreach ($clubs as $c) {
    echo "<tr><td> {$c['club_name']} </td>
        <td> {$c['ground']} </td>
        <td><a href=\"clubs.php?club_id={$c['club_id']}\">Edit</a> | 
        <a href=\"delete-club.php?club_id={$c['club_id']}\" 
        class=\"text-danger confirmation\">Delete</a></td></tr>";
}
echo '</table>';

$db = null;
?>

<!-- js -->
<script src="js/jquery-3.3.1.min.js"></script>
<script src="js/scripts.js"></script>

<?php require('footer.php');
?>
</body>
</html>