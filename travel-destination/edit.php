
<?php
$page_title = "Edit";
require_once('header.php');

$destinationId = $_GET['destinationId'];

$name = null;
$location = null;
$description = null;
$region = null;
$photo = null;

if(!empty($destinationId) ){


 require_once('db.php');

 $sql = "SELECT d.name AS d_name, d.location, d.description, d.photo, r.name AS r_name FROM destinations AS d
 INNER JOIN regions AS r ON d.destinationId=r.regionId WHERE d.destinationId = :destinationId";

 $cmd = $db->prepare($sql);
 $cmd->bindParam(':destinationId', $destinationId);
 $cmd->execute();

 $destinations = $cmd->fetchAll();


 foreach($destinations as $destination){

   $name = $destination['d_name'];
   $location = $destination['location'];
   $description = $destination['description'];
   $region = $destination['r_name'];
   $photo = $destination['photo'];

 }

 $db = null;

}

 ?>
<main>
  <form enctype="multipart/form-data" action="update.php" method="post">
      <div class="form-group">
        <label for="name">Name: </label>
        <input class="form-control" type="text" name="name" value="<?php echo $name ?>">
      </div>
      <div class="form-group">
        <label for="location">Location: </label>
        <input class="form-control" type="text"  name="location" value="<?php echo $location ?>">
      </div>
      <div class="form-group">
        <label for="description">Description: </label>
        <input class="form-control" type="text" name="description" value="<?php echo $description ?>">
      </div>
      <div class="form-group">
        <label for="region">Region: </label>
        <input class="form-control" type="text" name="region" value="<?php echo $region ?>">
      </div>
      <div class="image">
        <img src="img/<?php echo $photo ?>" alt="<?php echo $photo ?>">
      </div>

      <input type="hidden" name="destinationId" value="<?php echo $destinationId ?>">
      <input type="submit" name="submit" value="Submit">
  </form>
</main>
<?php require_once('footer.php'); ?>
