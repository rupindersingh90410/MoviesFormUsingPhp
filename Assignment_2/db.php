<?php
try{
  // global database connection
    $db = new PDO('mysql:host=aws.computerstudi.es;dbname=gc200397613', 'gc200397613', 'eedZzT8hO_');
}
catch(PDOException $e){
  echo 'Sorry, can\'t connect to database!<br>';
}


?>
