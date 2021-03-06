<?php
session_start();
if(isset($_SESSION["username"])){
header("Location: save&go.php");
exit(); }
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<title>Save & Go App - Search Engine Fuel Station</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0" />
	<link rel="stylesheet" type="text/css" href="css/reset.css">
	<link rel="stylesheet" type="text/css" href="css/save&go.css">
     <link rel="shortcut icon" href="img/IMG_1419.ico">
    <script type="text/javascript" src="js/jquery.js"></script>
    <script type="text/javascript" src="js/main.js"></script>
</head>
<body>

	<header>
		<div class="logo">
			<a href="save&go.php"><img src="img/logo.png" title="Save & Go App - Search Engine Fuel Station" alt="Save & Go App - Search Engine Fuel Station"/></a>
		</div><!-- end logo -->

		<div id="menu_icon"></div>
		<nav>
			<ul>
                <li><a href="save&go.php" title="Save & Go">Save & Go</a></li>
				<li><a href="quicksearch.php" title="Quick Search">Quick Search</a></li>
                <li><a href="login.php" class="selected" title="Login">Login</a> | <a href="registration.php" title="Register">Register</a></li>
				<li><a href="managerlogin.php" title="Manager Login">Managers</a></li>
				<!--<li><a href="contact.html">Contact Us</a></li>-->
			</ul>
		</nav><!-- end navigation menu -->

		<div class="footer clearfix">
			<ul class="social clearfix">


				<li><a href="https://www.facebook.com/SaveAGo/" target="_blank" class="fb" data-title="Facebook"></a></li>

				<li><a href="https://twitter.com/SaveNnGo" target="_blank" class="twitter" data-title="Twitter"></a></li>

			</ul><!-- end social -->

			<div class="rights">
				<p>Copyright © 2016 Save & Go.</p>
				<p>Developed by <strong>. . .</strong></p>
			</div><!-- end rights -->
		</div ><!-- end footer -->
	</header><!-- end header -->

	<section class="main clearfix">

		<section class="top2">
			<div class="wrapper content_header clearfix">
				<div class="work_nav">

					<!--<ul class="btn clearfix">
						<li><a href="#" class="previous" data-title="Previous"></a></li>
						<li><a href="index.html" class="grid" data-title="Portfolio"></a></li>
						<li><a href="#" class="next" data-title="Next"></a></li>
					</ul>	-->

				</div><!-- end work_nav -->
				<h1 class="title">Login</h1>
			</div>
		</section><!-- end top -->

		<section class="wrapper">
			<div class="content">


<?php
	require('db.php');
    // If form submitted, insert values into the database.
    if (isset($_POST['username'])){
        $username = $_POST['username'];
        $password = $_POST['password'];

		$username = stripslashes($username);
		$username = mysql_real_escape_string($username);
		$password = stripslashes($password);
		$password = mysql_real_escape_string($password);

	//Checking is user existing in the database or not
        $query = "SELECT * FROM `users` WHERE username='$username' and password='".md5($password)."'";
		$result = mysql_query($query) or die(mysql_error());
		$rows = mysql_num_rows($result);
        if($rows==1){
			$_SESSION['username'] = $username;
			header("Location: index.php"); // Redirect user to index.php
            }else{
				echo "<div class='form'><h3>Username/password is incorrect.</h3><br/>Click here to <a href='login.php'>Login</a></div>";
				}
    }else{



?>

<div class="form">
<form action="" method="post" name="login">
Username:</br>
<input type="text" name="username" placeholder="Username" required /></br></br>
Password:</br>
<input type="password" name="password" placeholder="Password" required /></br></br>
<input name="submit" type="submit" value="Login" style="border:none; background-color:#3C9; color:#FFF; font-size:16px; border-radius:6px; cursor:pointer;" title="Login"/>
</form>
<p>Not registered yet? <a href="registration.php" title="Register Here">Register Here</a></p>
</div>
<?php } ?>

			</div><!-- end content -->
		</section>
	</section><!-- end main -->

</body>
</html>
