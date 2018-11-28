<?php


// auth check
require('auth.php');

// header
$title = 'Saving your Movie...';
require('header.php');

// save form inputs into variables
if(!empty($_POST['movie_id'])){
	$movie_id = $_POST['movie_id'];
}
$name = $_POST['name'];
$genre = $_POST['genre'];
$release_date = $_POST['release_date'];
$rating = $_POST['rating'];

// create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
if (empty($name)) {
	// notify the user
	echo 'Movie name is required<br />';

	// change $ok to false so we know not to save
	$ok = false;
}

if (empty($genre)) {
	// notify the user
	echo 'Genre is required<br />';

	// change $ok to false so we know not to save
	$ok = false;
}
elseif (empty($release_date)) {
	echo 'Release date is invalid<br />';
	$ok = false;
}

if (empty($rating)) {
	// notify the user
	echo 'Rating is required<br />';

	// change $ok to false so we know not to save
	$ok = false;
}
elseif (is_numeric($rating) == false) {
	echo 'Rating is invalid<br />';
	$ok = false;
}
if (isset($_FILES['logo'])) {
    $logoFile = $_FILES['logo'];

    if ($logoFile['size'] > 0) {
        // generate unique file name
        $logo = session_id() . "-" . $logoFile['name'];

        // check file type
        $fileType = null;
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $fileType = finfo_file($finfo, $logoFile['tmp_name']);

        // allow only jpeg & png
        if (($fileType != "image/jpeg") && ($fileType != "image/png")) {
            echo 'Please upload a valid JPG or PNG logo<br />';
            $ok = false;
        }
        else {
            // save the file
            move_uploaded_file($logoFile['tmp_name'], "img/{$logo}");
        }
    }

}

if ($ok == true) {

	try{

		// connect to the database
		require_once('db.php');

		if (empty($movie_id)) {
			// set up the SQL INSERT command
			$sql = "INSERT INTO movies (name, genre, release_date, rating, photo) VALUES (:name, :genre, :release_date, :rating, :photo)";
		}
		else {
			// set up the SQL UPDATE command to modify the existing movie
			$sql = "UPDATE movies SET name = :name, genre = :genre, release_date = :release_date, rating = :rating, photo = :photo WHERE movie_id = :movie_id";
		}

		// create a command object and fill the parameters with the form values
		$cmd = $db->prepare($sql);
		$cmd->bindParam(':name', $name);
		$cmd->bindParam(':genre', $genre);
		$cmd->bindParam(':release_date', $release_date);
		$cmd->bindParam(':rating', $rating);
		$cmd->bindParam(':photo', $photo);

		// fill the movie_id if we have one
		if (!empty($movie_id)) {
			$cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);
		}

		// execute the command
		$cmd->execute();

		// disconnect from the database
		$db = null;

		// show confirmation
		echo "Movie Saved";

	} catch(Exception $e){
		echo 'Sorry, can\'t save the data';
	}

}

require('footer.php');
?>
