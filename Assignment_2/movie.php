<?php

// authentication check
require('auth.php');

// set page title
$title = 'Movie Details';

// embed the header
require('header.php');

// initialize variables
$movie_id = null;
$name = null;
$genre = null;
$release_date = null;
$rating = null;
$photo = null;


// check the url for a movie_id parameter and store the value in a variable if we find one
if (empty($_GET['movie_id']) == false) {
	$movie_id = $_GET['movie_id'];

	try{

		// connect
		require('db.php');

		// write the sql query
		$sql = "SELECT * FROM movies WHERE movie_id = :movie_id";

		// execute the query and store the results
		$cmd = $db->prepare($sql);
		$cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
		$cmd->execute();
		$movies = $cmd->fetchAll();

		// populate the fields for the selected movie from the query result
		foreach ($movies as $movie) {
			$name = $movie['name'];
			$genre = $movie['genre'];
			$release_date = $movie['release_date'];
			$rating = $movie['rating'];
			$photo = 'images/'.$movie['photo'];
		}

		// disconnect
		$db = null;
		

	} catch(Exception $e){
		echo "Problem occured while getting the data<br>";
	}


}

?>

	<div class="container">
		<h1>Movie Details</h1>
	    <form enctype="multipart/form-data" method="post" action="save-movie.php">
	        <fieldset class="form-group">
	            <label for="name" class="col-sm-4">Movie Name:</label>
	            <input type="text" name="name" id="name" required value="<?php echo $name; ?>" />
	        </fieldset>
	         <fieldset class="form-group">
	            <label for="genre" class="col-sm-4">Genre:</label>
	            <input name="genre" id="genre" required type="text" value="<?php echo $genre; ?>" />
	        </fieldset>
	         <fieldset class="form-group">
	            <label for="release_date" class="col-sm-4">Release_date:</label>
	            <input name="release_date" id="release_date" required type="text" value="<?php echo $release_date; ?>" />
	        </fieldset>
	         <fieldset class="form-group">
	            <label for="rating" class="col-sm-4">Rating:</label>
	            <input name="rating" id="rating" required type="number" value="<?php echo $rating; ?>" />
	        </fieldset>
					<fieldset class="form-group">
						<label for="photo" class="col-sm-4">Select Image: </label>
						<input type="file" name="photo" required "/>
					</fieldset>
	        <input name="movie_id" type="hidden" value="<?php echo $movie_id; ?>" />
	        <button type="submit" class="col-sm-2 btn btn-success">Submit</button>
	    </form>
	</div>

<?php // embed footer
require('footer.php');
 ?>
