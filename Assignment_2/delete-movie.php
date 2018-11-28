<?php

// auth check
require('auth.php');

// save form inputs into variables
$movie_id = $_GET['movie_id'];

try{

  // connect to the database
  require('db.php');

  // set up the SQL DELETE command to remove the selected movie
  $sql = "DELETE FROM movies WHERE movie_id = :movie_id";


  // create a command object and fill the parameters with the movie_id value
  $cmd = $db->prepare($sql);
  $cmd->bindParam(':movie_id', $movie_id, PDO::PARAM_INT);

  // execute the command
  $cmd->execute();

  // disconnect from the database
  $db = null;

  // redirect to updated movies.php
  header('location:movies.php');


} catch(Exception $e){

  echo 'Sorry, not able to delete';

}


require('footer.php');
 ?>
