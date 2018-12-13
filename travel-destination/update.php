<?php

  $destinationID = $_POST['destinationId'];



  if(!empty($destinationId)){

    $name = $_POST['name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $region = $_POST['region'];
    $photo = $_FILES['photo']['name'];

    $target = 'img/' . $photo;

    require_once('db.php');

    if(move_uploaded_file($_FILES['photo']['tmp_name'], $target)){
      $sql = "UPDATE destinations AS d INNER JOIN regions AS r
      ON d.destinationId = r.regionId SET d.name=:name, d.location=:location, d.description=:description, r.name=:region, d.photo=:photo
      WHERE destinationId=:destionationId";

      $cmd = $db->prepare($sql);

      $cmd->bindParam(':name', $name);
      $cmd->bindParam(':location', $location);
      $cmd->bindParam(':description', $description);
      $cmd->bindParam(':region', $region);
      $cmd->bindParam(':photo', $photo);
      $cmd->bindParam(':destionationId', $destinationId);

      $cmd->execute();
    }



    $db = null;

    header('location:destionations.php');
  }

 ?>
