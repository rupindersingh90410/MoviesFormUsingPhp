<?php
require('auth.php');
$title = "Movies Reviews";
require('header.php');
?>
<body>

<a href="reviews.php">View Reviews</a>

<h1>Create a Review</h1>

<form method="post" action="save-review.php">
    <fieldset>
        <label for="username" class="col-md-1">Username: </label>
        <input name="username" id="username" required />
    </fieldset>
    <fieldset>
        <label for="rating" class="col-md-1">Rating: </label>
        <input name="rating" id="rating" required type="number" min="0" max="5" />
    </fieldset>
    <fieldset>
        <label for="comments" class="col-md-1">Comments: </label>
        <textarea name="comments" id="comments" required></textarea>
    </fieldset>
    <fieldset>
        <label for="movie" class="col-md-1">Movie: </label>
        <select name="movie" id="movie">
            <option>-Select-</option>
            <?php
            // connect
            require('db.php');

            // set up query
            $sql = "SELECT name FROM movies ORDER BY name";
            $cmd = $db->prepare($sql);

            // fetch the results
            $cmd->execute();
            $movies = $cmd->fetchAll();

            // loop through and create a new option tag for each type
            foreach ($movies as $m) {
                    echo "<option> {$m['name']} </option>";
            }

            // disconnect
            $db = null;
            ?>
        </select>
    </fieldset>
    <button class="col-md-offset-1 btn btn-primary">Save</button>
</form>
</body>
</html>
