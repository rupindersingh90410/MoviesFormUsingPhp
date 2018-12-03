
<?php
$club_name = null;
$ground = null;
if (!empty($_GET['club_id'])) {
    $club_id = $_GET['club_id'];

    $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200397613', 'gc200397613', 'eedZzT8hO_');

    $sql = "SELECT * FROM clubs WHERE club_id = :club_id";
    $cmd = $db->prepare($sql);
    $cmd->bindParam(':club_id', $club_id, PDO::PARAM_INT);
    $cmd->execute();
    $c = $cmd->fetch();

    $club_name = $c['club_name'];
    $ground = $c['ground'];

    $db = null;
}
?>
<?php
$title = "Teams";
require('header.php');
    echo '<a href="clubs.php">Add a New Team</a> ';

?>
<a href="clubname.php">Visit Clubs</a>

<h1>Club Information</h1>

<form method="post" action="clubname.php">
    <fieldset>>
    </fieldset>
    <label for="club_name" class="col-md-1">Club Name: </label>
    <input name="club_name" id="club_name" required value="<?php echo $club_name; ?>" />
    </fieldset>
    <fieldset>
        <label for="ground" class="col-md-1">Ground: </label>
        <select name="ground" id="ground">
            <option>-Select-</option>



<?php

$db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200397613', 'gc200397613', 'eedZzT8hO_');

$sql = "SELECT * FROM clubs ORDER BY clubs";
$cmd = $db->prepare($sql);

$cmd->execute();
$club_name = $cmd->fetchAll();

foreach ($club_name as $cn) {
    if ($cn['club_name'] == $club_name) {
        echo "<option selected> {$cn['club_name']} </option>";
    }
    else {
        echo "<option> {$cn['club_name']} </option>";
    }
}
$db = null;
?>
        </select>
    </fieldset>
        <button class="col-md-offset-1 btn btn-primary">Save</button>
        <input type="hidden" name="club_id" id="club_id" value="<?php echo $club_id; ?>" />
</form>
</body>
</html>

