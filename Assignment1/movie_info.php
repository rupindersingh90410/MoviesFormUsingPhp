<?php

  $name = $_POST['name'];
  $genre = $_POST['genre'];
  $release_date = $_POST['release_date'];
  $rating = $_POST['rating'];

  $ok = true;


  $name = validate_data($name);
  $genre = validate_data($genre);
  $release_date = validate_data($release_date);


  if($ok == true){

    try{

        $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200397613', 'gc200397613', 'eedZzT8hO_');
      echo "Connected <br>";

    }catch(PDOException $e){
      echo "Sorry can't connect <br>";
    }


    $sql = "INSERT INTO movies (name, genre, release_date, rating) VALUES (:name, :genre, :release_date, :rating)";


    $cmd = $db->prepare($sql);

    $cmd->bindParam('name', $name);
    $cmd->bindParam('genre', $genre);
    $cmd->bindParam('release_date', $release_date);
    $cmd->bindParam('rating', $rating);


    $cmd->execute();

    echo "Movie Saved. <br>";

    $db = null;

  }







  //function for validation
  function validate_data($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    if(empty($data)){
      $ok = false;
      echo "Text field is required";
    }
    return $data;
  }








 ?>
