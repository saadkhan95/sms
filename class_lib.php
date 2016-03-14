<?php

	
	
	class login
	{
		var $user_name;
		var $password;
	

	 public function __construct($name , $entered_password)
	 {
		$this->user_name = $name;
		$this->password = $entered_password;
	 }
	 
	
	function verify()
	{
		$dbhost='localhost';
		$dbuser='root';
		$dbpass='saad1234';
		$dbname='sms';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		if(mysqli_connect_errno())
		{
			die("Database connection failed");
		}
		$username = $this->user_name;
		$password = $this->password;
		$query = "SELECT password,D_ID FROM members WHERE user_name = ";
		$query .= "'{$username}'";
		$result = mysqli_query($connection,$query);
		if(!$result)
		{
			die("Fail");
		}
		$row = mysqli_fetch_assoc($result);
		$original_password = $row["password"];
		
		if($original_password == $password)
		{
			if($row["D_ID"] == "1")
			{
				header('Location: http://localhost:8000/SMS/AdminWelcome.php');
			}
			else if($row["D_ID"] == "2")
			{
				header('Location: http://localhost:8000/SMS/PatronWelcome.php');
			}
			mysqli_close($connection);
		}
		else
		{
			echo 'alert("Wrong Password")';
			echo '</script>';
		}
	
	}

	}
	
	
	class admin{
		
		var $admin_name;
	
	public function __construct($name)
	{
		$this->admin_name = $name;
	}
	
		function addSociety($society_name)
		{
		$dbhost='localhost';
		$dbuser='root';
		$dbpass='saad1234';
		$dbname='sms';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		$query_personInsert = "INSERT INTO society (S_name) VALUES (";
		$query_personInsert .= "'{$society_name}')";
		$result = mysqli_query($connection,$query_personInsert);
		if(mysqli_connect_errno())
		{
			die("Database connection failed");
		}
		mysqli_close($connection);
		}
		
		function addPatron($patron_name,$patron_society)
		{
		$dbhost='localhost';
		$dbuser='root';
		$dbpass='saad1234';
		$dbname='sms';
		$connection = mysqli_connect($dbhost,$dbuser,$dbpass,$dbname);
		$default_pass = "1234";
		$query_society = "SELECT S_ID FROM Society WHERE S_name = ";
		$query_society .= "'{$patron_society}'";
		$result = mysqli_query($connection,$query_society);
		if(!$result)
		{
			die();
			return;
		}
		if(mysqli_num_rows($result)==0)
		{
			echo "<script type='text/javascript'>alert('Society does not exist, please retry');</script>";
			die();
			return;
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
		mysqli_close($connection);
		}
	
	}

	
?>