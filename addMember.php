<!DOCTYPE html>
<?php session_start(); ?>
<?php	$user = $_SESSION["user"];
		$society = $_SESSION["society"];?>

<html >
  <head>
    <meta charset="UTF-8">
    <title>SMS | Add Members</title>
    



    <link rel="stylesheet" href="css/reset.css">

    <link rel='stylesheet prefetch' href='http://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
	<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

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
?>

<div class="pen-title">
		<h1> SOCIETY MANAGEMENT SYSTEM </h1>
		<h2 style="color:#334045"> <font size="6"><?php echo $society;?></font> </h2>
		</div>


<div class="container">
  <div class="card"></div>
  <div class="card">
    <h1 class="title">ADD MEMBER</h1>
    <form>
      <div class="input-container">
        <input type="text" id="Member_name" required="required" name="e1"/>
        <?php $_Get ?>
		<label for="Member_name">Member Name</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input type="text" id="Member_designation" required="required" name="e2"/>
        <label for="Member_designation">Member Designation</label>
        <div class="bar"></div>
		</div>
		<div class="input-container">
		<label> Join Date: </label>
		</div>
		</br>
		</br>
		</br>
	  <div class="input-container">
		<input type="date" id="Start_date" required="required" name="e4"/>
		<label for="Start_date"></label>
        <div class="bar"></div>
      </div>
      <div class="button-container">
        <button><span>ADD</span></button>
      </div>
<?php
		  if( isset($_GET["e1"]) || isset($_GET["e2"]))
		  {
			$member_name = $_GET["e1"];
			$member_society = $_GET["e2"];
			$default_pass = "1234";
			$query_society = "SELECT S_ID FROM Society WHERE S_name = ";
			$query_society .= "'{$member_society}'";
			$result = mysqli_query($connection,$query_society);
			if(!$result)
			{
				die("Fail");
			}
			$row = mysqli_fetch_assoc($result);
			$society_id = $row["S_ID"];
			$designation_id = "2";
			$query_personInsert = "INSERT INTO persons (P_name) VALUES (";
			$query_personInsert .= "'{$patron_name}')";
			$result = mysqli_query($connection,$query_personInsert);
			$query_retrievePID = "SELECT P_ID FROM persons ORDER BY P_ID DESC LIMIT 1";
			$result = mysqli_query($connection,$query_retrievePID);
			$row = mysqli_fetch_assoc($result);
			$person_id = $row["P_ID"];
			$query_addPatron = "INSERT INTO members "; 
			$query_addPatron .="(User_name,Password,P_ID,D_ID,S_ID) VALUES ";
			$query_addPatron .="('{$patron_name}','{$default_pass}',{$person_id},{$designation_id},{$society_id})";
			$result = mysqli_query($connection,$query_addPatron);
			
		}
	?>

    </form>
  </div>
  
  </div>
</div>
</body>
</html>

<?php

	mysqli_close($connection);

?>