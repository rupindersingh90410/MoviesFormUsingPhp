<?php


$page_title = 'Destinations';
require_once('header.php');

if(!empty($_GET['region'])){

	$region = $_GET['region'];

	echo $region;

	require_once('db.php');


	$sql = "SELECT d.*, r.name FROM destinations AS d INNER JOIN regions AS r
	ON d.destinationId = r.regionId WHERE r.name=:region";

	$cmd = $db->prepare($sql);
	$cmd->bindParam(':region', $region);
	$cmd->execute();
	$destinations = $cmd->fetchAll();

	echo '<table class="table table-striped table-hover">
					<thead>
						<th>Name</th>
						<th>Location</th>
						<th>Photo</th>
						<th>Edit</th>
					</thead>
					<tbody>';

	foreach ($destinations as $destination) {
		echo '<tr><td>' . $destination['name'] . '</td>
						<td>' . $destination['location'] . '</td>
						<td><img src="img/' . $destination['photo'] . '" alt="'. $destination['photo'] .'"></td>
						<td><a href="edit.php?destinationId=' . $destination['destinationId'] . '">Edit</a></td>
					</tr>';
	}

	echo '</tbody></table>';

	$db = null;

}else {
	echo 'Please select a region from header';
}



require_once('footer.php');
?>
