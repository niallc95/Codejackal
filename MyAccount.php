<?php
		setcookie(time() + (86400 * 30), "/");
?>
<!DOCTYPE html>
	<?php
		if (!isset($_SESSION['email'])) {
			header("Location: Login.php");
		else{
		session_start(); // Starting Session
		$error=''; // Variable To Store Error Message
		if (isset($_POST['submit'])) {
		if (empty($_POST['email']) || empty($_POST['pass'])) {
		$error = "Username or Password is invalid";
	}

		else
		{
		// Define $email and $pass
		$email=$_POST['email'];
		$pass=$_POST['pass'];
		

		// Establishing Connection with Server by passing server_name, user_id and password as a parameter
		$dbhost = 'localhost';
		$dbuser = 'codejackal_admin';
		$dbpass = 'Waltherp99';
		$conn = mysql_connect($dbhost, $dbuser, $dbpass);

		// To protect MySQL injection for Security purpose
		$email = stripslashes($email);
		$pass = stripslashes($pass);
		$email = mysql_real_escape_string($email);
		$pass= mysql_real_escape_string($pass);

		// Selecting Database, make sure to change this to user if you mix it up
		$db = mysql_select_db("codejackal_database", $conn);

		// SQL query to fetch information of registerd users and finds user match.
		$query = mysql_query("select * from users where pass='$pass' AND email='$email'", $conn);
		$rows = mysql_num_rows($query);
		if ($rows == 1) {
		$_SESSION['login_user']=$email; // Initializing Session
		$row = $rows->fetch_assoc();
		} else {
		  header("Location: Login");
		}
		mysql_close($conn); // Closing Connection
		}
		}
		}
		?>

		<html>
		  <head>
			<title>CodeJackal | My Account</title>
			<meta charset="utf-8">
			<meta name="viewport" content="width=device-width, initial-scale=1">
		  <!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootswatch/3.3.2/superhero/bootstrap.min.css">
		<link rel="stylesheet" href="social-buttons.css" type="text/css"/>

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		 <link async href="http://fonts.googleapis.com/css?family=Warnes" data-generated="http://enjoycss.com" rel="stylesheet" type="text/css"/>
		<script>
		  $(function () {
		  $('[data-toggle="popover"]').popover()
		})
		  $('#myModal').on('shown.bs.modal', function () {
			$('#myInput').focus()
		  })
		  $(function () {
		  $('[data-toggle="tooltip"]').tooltip()
		})
		  </script>
		  <script>
		  bootstrap_alert = function() {}
		bootstrap_alert.warning = function(message) {
					$('#alert_placeholder').html('<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button><span>'+message+'</span></div>')
				}
			
		$('#clickme').on('click', function() {
					bootstrap_alert.warning('Give us a minute to fix the site.');
		});
		  </script>
			<link rel="shortcut icon" href="food.ico">
		  </head>

		  <body>
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>                        
				  </button>
				  <a class="navbar-brand" href="index">CodeJackal</a>
				</div>
				<div class="collapse navbar-collapse" id="myNavbar">
				  <ul class="nav navbar-nav">
					<li class="active"><a href="index">My Account</a></li>
					 <li><a href="list">Archive</a></li>
					
					<li data-toggle="tooltip" data-placement="bottom" title="This is the most highly rated tutorial post"><a href="leaderboard">Code of the Month!</a></li>
				  </ul>
				  <ul class="nav navbar-nav navbar-right">
				   <li>
				  <form class="navbar-form" action="search" method="post" role="search">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Search" name="srchterm" id="srchterm">
					<div class="input-group-btn">
						<button class="btn btn-default" name ="submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
					</div>
				</div>
				</form>
				</li>
					<li><a href="Signup" data-toggle="tooltip" data-placement="bottom" title="This is not quite ready yet, sozzles." ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
					<li><a href="Login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
				  </div>
				  </ul>
				</div>
			  </div>
			</nav>
			<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
		  <div class="modal-dialog">
			<div class="modal-content">
			  <div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				  <h4 class="modal-title" id="myModalLabel">What this is all about...</h4>
				 </div>
				  <div class="modal-body">
				This page is all about uploading and reviewing personal projects that people will upload and explain each step and process of the project.<br>
				The basis of each project will be determined by the uploader including programming language or web design.
			  </div>
			  <div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
			  </div>
			</div>
		  </div>
		</div>
		<div id ="alert_placeholder">
		</div>
		 
		<div class="alert alert-info" role="alert">
			Welcome <?php echo $row['fname'];?>
		</div>
			
		
			

			
			
		 




			 

		 <!-- This is where the user posts will go  -->
				
		   

		  
			  <div class="clearfix visible-lg"></div>
			  <center>
			  <footer class ="footer">
			  <div class = "container">
			  <p class=" text-muted">Code Jackal &copy; 2015</p>
			  </div>
			  </footer>
			  </center>
			</div>
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
			<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		  </body>
		</html>