<!DOCTYPE html>
<html>
<head>
<meta content="text/html; charset=utf-8" http-equiv="Content-Type">
<title><?php echo $page_title; ?></title>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" integrity="sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css" integrity="sha384-aUGj/X2zp5rLCbBxumKTCw2Z50WgIr1vs/PFN4praOTvYXWlVyh2UtNUU0KAUhAX" crossorigin="anonymous">


<style media="screen">
	footer {
		position: fixed;
		bottom: 0;
		right: 0;
		left: 0;
	}
	img{
		height: 100px;
		width: 100px;
	}
</style>
</head>

<body>

<nav class="navbar">
	<ul class="nav navbar-nav">
			<li><a href="default.php" title="Default">Default</a></li>
			<li><a href="destinations.php" title="Destinations">Destinations</a></li>
			<li>
				<a href="destinations.php?region=Asia">Asia</a>
			</li>
			<li>
				<a href="destinations.php?region=Europe">Europe</a>
			</li>
			<li>
				<a href="destinations.php?region=The Americans">The Americans</a>
			</li>
			<li><a href="api/destinations.php" title="API">API</a></li>

	</ul>
</nav>
