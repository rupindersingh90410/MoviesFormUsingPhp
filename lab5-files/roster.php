<?php

require_once('header.php');

//get racers for selected team


if (is_numeric($_GET['teamId'])) {
    $teamId = $_GET['teamId'];
    require_once('db.php');
	$sql = "SELECT racerName, age, sex, phoneNum FROM racers WHERE teamId = teamId ORDER BY racerName";
	$cmd = $db->prepare($sql);
	$cmd->bindParam(':teamId', $teamId, PDO::PARAM_INT);
	$cmd->execute();
	$racers = $cmd->fetchAll();

	echo '<table border="1">
		<tr><td>Racer</td>
		<td>Age</td>
		<td>Sex</td>
		<td>Phone</td></tr>';

	foreach ($racers as $racer) {
		echo '<tr><td>' . $racer['racerName'] . '</td>
			<td>' . $racer['age'] . '</td>
			<td>' . $racer['sex'] . '</td>
			<td>' . $racer['phoneNum'] . '</td></tr>';
	}
    echo '</table>';
	$db = null;

}
else {
	header('location:default.php');
}

?>
