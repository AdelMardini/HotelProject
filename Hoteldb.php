<?php

$con = @mysqli_connect("localhost","root","adel123") or die("Problem");

if($con)
{
	echo "Pass"."<br/>";
	if(mysqli_query($con,"CREATE DATABASE hotel_db"))
	{
		echo "DataBase Created";
	}
	else {
		echo "Error Creating DataBase ". mysqli_error($con);
	}
}
else {
	echo "Fail Connected";
}

mysqli_close($con);


?>