<!DOCTYPE html>
<?php
session_start(); // Starting Session
$error=''; // Variable To Store Error Message
if (isset($_POST['submit'])) {
if (empty($_POST['username']) || empty($_POST['password'])) {
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
$query = mysql_query("select * from login where pass='$pass' AND email='$email'", $conn);
$rows = mysql_num_rows($query);
if ($rows == 1) {
$_SESSION['login_user']=$email; // Initializing Session
header("location: User.php"); // Redirecting To Other Page
} else {
$error = "Username or Password is invalid";
}
mysql_close($connection); // Closing Connection
}
}
?>
<html>
  <head>
    <title>CodeJackal | Login</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootswatch/3.3.2/superhero/bootstrap.min.css">
<!-- You're a tool conor --> 
<!-- Angular js import motherfucker -->
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>

<!-- jQuery library -->
<link rel="stylesheet" src="socialbtn.css" type="text/css"/>
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
          <a class="navbar-brand" href="index.php">CodeJackal</a>
        </div>
        <div class="collapse navbar-collapse" id="myNavbar">
          <ul class="nav navbar-nav">
            <li><a href="index.php">Home</a></li>
             <li><a href="list.php">Archive</a></li>
            <li><a href="random.php">Random</a></li>
            <li><a href="about.html">About Us</a></li>
            <li><a href="contact.php">Contact</a></li>
            <li data-toggle="tooltip" data-placement="bottom" title="This is the most highly rated tutorial post"><a href="leaderboard.php">Code of the Month!</a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li>
          <form class="navbar-form" action="search.php" method="post" role="search">
		<div class="input-group">
			<input type="text" class="form-control" placeholder="Search" name="srchterm" id="srchterm">
			<div class="input-group-btn">
				<button class="btn btn-default" name ="submit" type="submit"><i class="glyphicon glyphicon-search"></i></button>
			</div>
		</div>
		</form>
		</li>
            <li><a href="Signup.php" data-toggle="tooltip" data-placement="bottom" title="This is not quite ready yet, sozzles." ><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
            <li class="active"><a href="Login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
          </div>
          </ul>
        </div>
      </div>
    </nav>
    <div id = "alert_placeholder"></div>
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <h4 class="modal-title" id="myModalLabel">A little helping hand...</h4>
      </div>
      <div class="modal-body">
        So you've made it to the Login part of the site, good for you, you're brilliant. That means you made a page, and are trying to Login to that page, so you can get started That's good. I like you.<br>
        Judging by you clicking on this, you need help. That's no problem. Just means you're not a techy perhaps.<hr>
        <br>
        What you're gonna want to do, is just enter in all of your silly little credentials (Email, Password) and I'll let the server do the rest.<br>
        Trust me, it's easy!
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div id = "alert_placeholder"></div>
    <div class="container">
      <div class="jumbotron">
        <h1>Come to login?</h1>      
         <br>
         <form role="form" action = "member.php" ng-app="" ng-controller="validateCtrl" 
name="myForm" novalidate>
    <div class="form-group">
      <label for="usr">E-mail:</label>
      <input type="email" class="form-control" id="email" ng-model="email" required name="email"><small><span style="color:orange" ng-show="myForm.email.$dirty && myForm.email.$invalid"><span ng-show="myForm.email.$error.required">Email is required.</span>
<span ng-show="myForm.email.$error.email">Invalid email address.</span>
</span></small>
    </div><form role="form">
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control" name="password" id="pwd" placeholder ="Enter in dat password yo.">
    </div>
    <div class="col-sm-offset-0 col-sm-10">
        <input type = "button" class="btn btn-success" ng-disabled="myForm.user.$dirty && myForm.user.$invalid ||  
myForm.email.$dirty && myForm.email.$invalid" id = "clickme" value="Submit!"/>
        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">
  Does someone need help?
</button>
<small><span style="color:orange"><?php echo $error; ?>
   </div>
<script>
bootstrap_alert = function() {}
bootstrap_alert.warning = function(message) {
            $('#alert_placeholder').html('<div class="alert alert-danger"><a class="close" data-dismiss="alert">×</a><span>'+message+'</span></div>')
        }

$('#clickme').on('click', function() {
            bootstrap_alert.warning('Sadly, we are not quite ready to commit to you yet, we have to work on ourselves first.');
});
</script>​
      </div>
  </form>
  </form>
  <script>
function validateCtrl($scope) {
    $scope.email = '';
}
</script>
      </div>
    </div>
</div>

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
