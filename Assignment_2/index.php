<?php


// set the page title

$title = 'Movies';

// embed the header
require('header.php');



try{
	// connect
	require('db.php');

	// write the sql query
	$sql = "SELECT * FROM movies";

	// execute the query and store the results
	$cmd = $db->prepare($sql);
	$cmd->execute();
	$movies = $cmd->fetchAll();

	// start the html display table
	echo '<a href="movie.php" title="Add a New Movie">Add a New Movie</a>
	<table class="table table-striped table-hover"><thead><th>Movie Name</th><th>Genre</th><th>Release Date</th><th>Rating</th><th>Image</th>
	<th>Edit</th><th>Delete</th></thead><tbody>';

	// loop through the results and show each movie in a new row and each value in a new column
	foreach ($movies as $movie) {
		echo '<tr><td>' . $movie['name'] . '</td>
			<td>' . $movie['genre'] . '</td>
			<td>' . $movie['release_date'] . '</td>
			<td>' . $movie['rating'] . '</td>
			<td> <img src="images/' .$movie['photo'] . '" height=200px width=200px></td>
			<td><a href="movie.php?movie_id=' . $movie['movie_id'] . '">Edit</a></td>
			<td><a href="delete-movie.php?movie_id=' . $movie['movie_id'] . '"
				onclick="return confirm(\'Are you sure you want to delete this movie?\');">Delete</td></tr>';
	}

	// close the table and body
	echo '</tbody></table>';

	// disconnect
	$db = null;


}catch(Exception $e){
	echo 'Sorry, not able to load the data!<br>';
}



// embed footer
require('footer.php');

?>
