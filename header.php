<?php
require_once 'functions.php';
require_once 'config.php';

if (!empty(SITE_ROOT)){
    $url_path = "/".SITE_ROOT."/";
} else{
    $url_path = "/";
}

?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="http://localhost/eproblog/css/style.css">
	<link rel="stylesheet" type="text/css" href="http://localhost/eproblog/css/index.css">
	<link rel="stylesheet" type="text/css" href="css/index.css" >
	<script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
    <link rel="stylesheet" href="http://localhost/eproblog/css/redactor.css">
	<link rel="stylesheet" href="http://localhost/eproblog/css/post.css">
    <script src="http://localhost/eproblog/redactor.min.js.download" type="text/javascript"></script>

	<title>Epro Blog</title>
</head>
<body>
<header>
	<nav>
		<ul class="flex-center">
			<div class="logo-container nav-aside">
				<img src="#">
			</div>
			<div class="nav-list-container flex-center">
				<li><a href="#">Home</a></li>
				<li><a href="about.html">About</a></li>
				<li><a href="#">Contact</a></li>
				<?php
				if(isset($_SESSION['username'])){
				echo '<li><a href="http://localhost/eproblog/admin.php">Admin</a></li>';
				}
				?>
			</div>
			<div class="nav-btn nav-aside flex-end">
				<li><a class="twiter-btn" href="./login.html">login</a></li>
			</div>
		</ul>
	</nav>
</header>