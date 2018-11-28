<?php
try{

  // access the existing session
  session_start();

  // remove all session variables
  session_unset();

  // destroy the user session
  session_destroy();

  // redirect to login
  header('location:login.php');


} catch(Exception $e){

  echo 'Sorry, some problem occured while logging you out!<br>';

}

 ?>
