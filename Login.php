<!DOCTYPE html>
<?php session_start(); 
require 'class_lib.php';
?>

<html>
  <head>
    <meta charset="UTF-8">
    <title>SMS | Login</title>
    
    
    <link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/social.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

    <link rel="stylesheet" href="css/style.css">

    
    
    
  </head>

  <body>

 
<div class="pen-title">
  <h1> SOCIETY MANAGEMENT SYSTEM </h1>
</div>
<marquee>WELCOME</marquee>

<?php 

// $dbhost='localhost';
// $dbuser='root';
// $dbpass='saad1234';
// $dbname='sms';
// $connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	// if(mysqli_connect_errno())
	// {
		// die("Database connection failed");
	// }
?>


<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">Login</h1>
    <form>
      <div class="input-container">
        <input type="text" id="Username" required="required" name="e1" autocomplete="off"/>
        <label for="Username">Username</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="password" id="Password" required="required" name="e2" autocomplete="off"/>
        <label for="Password">Password</label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>Go</span></button>
      </div>
	  
<?php
  if( isset($_GET["e1"]) || isset($_GET["e2"]) )
  {
	$username = $_GET["e1"];
	$password_entered = $_GET["e2"];
	$_SESSION["user"] = $username;
	$pass_me = new login($username,$password_entered);
	$pass_me->verify($username,$password_entered);
	// $query = "SELECT password FROM members WHERE user_name = ";
	// $query .= "'{$username}'";
	// echo $query;
	// $result = mysqli_query($connection,$query);
	// if(!$result)
	// {
		// die("Fail");
	// }
	// $row = mysqli_fetch_assoc($result);
	// $original_password = $row["password"];
	// if($original_password == $password_entered)
	// {
		// header('Location: http://localhost:8000/SMS/PatronWelcome.php');
		
	// }
	// else
	// {
		// echo '<script language="javascript">';
		// echo 'alert("Wrong Password")';
		// echo '</script>';
	// }
	
  }
?>

      <div class="footer"><a href="#">Forgot your password?</a></div>
    </form>

  </div>
  
  
        <script src="js/index.js"></script>

    
	
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
	<!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    
    
  </body>
</html>
