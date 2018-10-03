<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Movie Database</title>
  <!--Bootstrap -->
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

  <!-- Optional theme -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

  <!-- Latest compiled and minified JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body>
  <h1>Movie Information: </h1>
  <div class="container">
    <form action="movie_info.php" method="post">
      <div class="form-group"><label for="name">Movie Name: </label><input type="text" class="form-control" id="name" name="name"></div>
      <div class="form-group"><label for="genre">Genre: </label><input type="text" class="form-control" id="genre" name="genre"></div>
      <div class="form-group"><label for="release_date">Release Date: </label><input type="text" class="form-control" id="release_date" name="release_date"></div>
      <div class="form-group">
        <label for="rating">Rating: </label>
        <select  name="rating" class="form-control" id="rating">
         <option value="one">1</option>
         <option value="two">2</option>
         <option value="three">3</option>
         <option value="four">4</option>
         <option value="five">5</option>
         <option value="six">6</option>
         <option value="seven">7</option>
         <option value="eight">8</option>
         <option value="nine">9</option>
         <option value="ten">10</option>
        </select>
      </div>
      <input type="submit" value="send" class="btn btn-primary">
    </form>
  </div>
    <a href="table.php">To view all data. Click here!</a>
</body>
</html>
