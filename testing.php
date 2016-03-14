<?php
 
  if( isset($_GET["yourname"]) || isset($_GET["yourage"]) )
 
  {
 
     echo "Welcome ". $_GET['yourname']. "<br />";
 
     echo "You age is ". $_GET['yourage']. " years.";
 
     exit();
 
  }
 
?>
 
<html>
 
<body>
 
  <form action="<?php $_PHP_SELF ?>" method="GET">
 
  Your Name: <input type="text" name="yourname" />
 
  Your Age: <input type="text" name="yourage" />
 
  <input type="submit" />
 
  </form>
 
</body>
 
</html>