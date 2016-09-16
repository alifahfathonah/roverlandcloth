<!DOCTYPE HTML>

<html>
<head>
	<title>Roverland Cloth</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<link rel="icon" href="../assets/images/roverland.png" type="image/png" sizes="16x16">
	<!--[if lte IE 8]><script src="css/ie/html5shiv.js"></script><![endif]-->
	<script src="js/skel.min.js"></script>
	<script src="js/init.js"></script>
	<noscript>
		<link rel="stylesheet" href="css/skel.css" />
		<link rel="stylesheet" href="css/style.css" />
		<link rel="stylesheet" href="css/style-wide.css" />
		<link rel="stylesheet" href="css/style-noscript.css" />

	</noscript>
	<!--[if lte IE 9]><link rel="stylesheet" href="css/ie/v9.css" /><![endif]-->
	<!--[if lte IE 8]><link rel="stylesheet" href="css/ie/v8.css" /><![endif]-->
</head>
<body class="loading">
	<div id="wrapper">
		<div id="bg"></div>
		<div id="overlay"></div>
		<div id="main">

			<!-- Header -->
			<header id="header">
				<?php if($_REQUEST['act']=='admin'){ ?>
				<h1><span>Welcome Administrator </span></h1><?php } ?>
				<?php if($_REQUEST['act']=='pengunjung'){ ?>
				<h1><span>Welcome Customer </span></h1><?php } ?>
				<center><img class="img-responsive" src="../assets/images/cgxfh.png"></center>						
				<p>&nbsp;&bull;&nbsp;Limited &nbsp;&bull;&nbsp; Precious &nbsp;&bull;&nbsp; Quality</p>
				<p>Est. 2013</p>
				<nav>
					<ul>
					<?php if($_REQUEST['act']=='admin'){ ?>
						<li><a href="#" class="fa fa-twitter"><span>Twitter</span></a></li>
						<li><a href="#" class="fa fa-facebook"><span>Facebook</span></a></li>
						<li><a href="../paneladmin/login" class="fa fa-user"><span>login</span></a></li>
						<li><a href="../home" class="fa fa-home"><span>Website</span></a></li>
					<?php } ?>
					<?php if($_REQUEST['act']=='pengunjung'){ ?>
						<li><a href="#" class="fa fa-twitter"><span>Twitter</span></a></li>
						<li><a href="../home" class="fa fa-home"><span>Website</span></a></li>
						<li><a href="#" class="fa fa-facebook"><span>Facebook</span></a></li>
					<?php } ?>
					</ul>
				</nav>
			</header>

			<!-- Footer -->
			 <footer id="footer">
                        <span class="copyright">&copy; Design By: <a href="#">Fajarnur24</a>.</span>
                    </footer>

		</div>
	</div>
</body>
</html>