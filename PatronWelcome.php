<!DOCTYPE html>
<?php session_start(); ?>
<?php	$user = $_SESSION["user"]; ?>
<html>
  <head>
    <meta charset="UTF-8">
    <title>SMS | <?php echo $user ?></title>
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
	$query = "SELECT S_name from society WHERE S_ID = (SELECT S_ID FROM members WHERE user_name = ";
	$query .= "'{$user}')";
	$result = mysqli_query($connection,$query);
	if(!$result)
	{
		die("Fail");
	}
	$row = mysqli_fetch_assoc($result);
	$society = $row["S_name"];
	$_SESSION["society"] = $society;
?>
		<div class="pen-title">
		<h1> SOCIETY MANAGEMENT SYSTEM </h1>
		<h2 style="color:#334045"> <font size="6"><?php echo $society;?></font> </h2>
		</div>
		<div class="container">
			<div class="card"></div>
			<div class="card">
			<h1 class="title">Welcome <?php	echo nl2br("\n".$user); ?></h1>
		</div>
		</div>
		<div class="link text-center">
		<div class="footer col-sm-4">
			<h1 class="title"><a href="http://localhost:8000/SMS/addMember.php">Society Body</a></h1>
		</div>
		<div class="footer col-sm-4">
			<h1 class="title"><a href="#">Society Events</a></h1>
		</div>
		<div class="footer col-sm-4">
			<h1 class="title"><a href="#">Society Budget</a></h1>
		</div>
		</div>
		</br></br>
		<div class="wrapper">
	<div class="social">&#62220;</div>
	<div class="social">&#62217;</div>
	<div class="social">&#62223;</div>
	</div>
	</div>
</body>
</html>