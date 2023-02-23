<?php include 'header.php';?>

<?php

$con = @mysqli_connect("localhost","root","adel123") or die("Problem");

if($con)
{
	mysqli_select_db($con,"hotel_db");
	
		$sql="select * from hotel_db.Users where Email = '".$_POST["email"] ."'and password = '". $_POST['pass']."'";
		$result = mysqli_query($con,$sql);

		while($row = mysqli_fetch_array($result))
		{
			
		}

		echo("This User does not exist, Please register to site");
	
		   
		   
}


?>

