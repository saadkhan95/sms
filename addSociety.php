<!DOCTYPE html>
<?php session_start(); 
require 'class_lib.php';
$user = $_SESSION["user"];
?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SMS | Add Society</title>
    
	<link rel="stylesheet" href="css/reset.css">
	<link rel="stylesheet" href="css/social.css">
    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

        <link rel="stylesheet" href="css/style.css">   
  </head>

  <body>

 
<div class="pen-title">
  <h1> SOCIETY MANAGEMENT SYSTEM </h1>
</div>
<?php 

$dbhost='localhost';
$dbuser='root';
$dbpass='saad1234';
$dbname='sms';
$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);

	if(mysqli_connect_errno())
	{
		die("Database connection failed");
	}
?>


<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">ADD SOCIETY</h1>
    <form>
      <div class="input-container">
        <input type="text" id="Society_name" required="required" name="e1"/>
        <label for="Member_name">Society Name</label>
        <div class="bar"></div>
      </div>
	  <div class="button-container">
        <button><span>ADD</span></button>
      </div>
      </div>
	<?php
  if( isset($_GET["e1"]))
  {
	$new_entry = $_GET["e1"];
	$doer = new admin($user);
	$doer->addSociety($new_entry);
	}
?>

    </form>
  </div>
  
  </div>
</div>
        <script src="js/index.js"></script>
  </body>


  
  </html>

<?php

	mysqli_close($connection);

?>