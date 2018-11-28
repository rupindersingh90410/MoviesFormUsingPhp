<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?php echo $title; ?></title>
    <link rel="stylesheet" href="css/bootstrap.min.css" />
    <script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="default.php">Home</a>
    </div>

    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
            <li><a href="index.php">Movies</a></li>
            <li><a href="reviews.php">Reviews</a></li>
        </ul>

        <ul class="nav navbar-nav navbar-right">
            <?php // show public or private links depending on whether the user has been authenticated
            if (!empty($_SESSION['user_id'])) { ?>
                <li><a href="logout.php" title="Logout">Logout</a></li>
                <?php
            }
            else { ?>
                <li><a href="register.php" title="Register">Register</a></li>
                <li><a href="login.php" title="Login">Login</a></li>
            <?php } ?>
        </ul>
    </div>
</nav>