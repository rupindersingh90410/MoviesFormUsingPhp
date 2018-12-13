<?php ob_start();

// auth check
require_once('auth.php');

// header
$page_title = null;
$page_title = 'Saving your book...';
require_once('header.php');

// save form inputs into variables
$title = null;
$year = null;
$author = null;
$book_id = null;

$title = $_POST['title'];
$year = $_POST['year'];
$author = $_POST['author'];
$book_id = $_POST['book_id'];

// create a variable to indicate if the form data is ok to save or not
$ok = true;

// check each value
if (empty($title)) {
	// notify the user
	echo 'Title is required<br />';
	
	// change $ok to false so we know not to save
	$ok = false;
}

if (empty($year)) {
	// notify the user
	echo 'Year is required<br />';
	
	// change $ok to false so we know not to save
	$ok = false;
}
elseif (is_numeric($year) == false) {
	echo 'Year is invalid<br />';
	$ok = false;
}

if (empty($author)) {
	// notify the user
	echo 'Author is required<br />';
	
	// change $ok to false so we know not to save
	$ok = false;
}

if ($ok == true) {
	// dbect to the database
	require_once('db.php');
	
	if (empty($book_id)) {
		// set up the SQL INSERT command
		$sql = "INSERT INTO books (title, author, year) VALUES (:title, :author, :year)";
	}
	else {
		// set up the SQL UPDATE command to modify the existing book
		$sql = "UPDATE books SET title = :title, author = :author, year = :year WHERE book_id = :book_id";
	}
	
	// create a command object and fill the parameters with the form values
	$cmd = $db->prepare($sql);
	$cmd->bindParam(':title', $title, PDO::PARAM_STR, 50);
	$cmd->bindParam(':author', $author, PDO::PARAM_INT);
	$cmd->bindParam(':year', $year, PDO::PARAM_INT);
	
	// fill the book_id if we have one
	if (!empty($book_id)) {
		$cmd->bindParam(':book_id', $book_id, PDO::PARAM_INT);
	}
	
	// execute the command
	$cmd->execute();
	
	// disdbect from the database
	$db = null;
	
	// show confirmation
	echo "Book Saved";
}

require_once('footer.php');
ob_flush();
?>
