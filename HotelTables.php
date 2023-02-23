<?php
$con = @mysqli_connect("localhost","root","adel123") or die("Problem");

if($con)
{
	echo "Pass Connect"."<br/>";

	mysqli_select_db($con,"hotel_db");

	//$sql = "Create Table Users(ID int NOT NULL AUTO_INCREMENT,FirstName VARCHAR(50),LastName VARCHAR(50),Email VARCHAR(50),Password VARCHAR(50),UserType VARCHAR(5) ,PRIMARY KEY(ID))";
	

	//$sql = "Create Table Hotels(ID int NOT NULL AUTO_INCREMENT,Name VARCHAR(50),Country VARCHAR(50),City VARCHAR(50),MainImg VARCHAR(50),Description VARCHAR(500),Classification int,PoolsNo int,PRIMARY KEY(ID))";

	//$sql = "Create Table HotelRooms(ID int NOT NULL AUTO_INCREMENT,FK_HotelId INT, Name VARCHAR(50),ViewType VARCHAR(50),BedType VARCHAR(50),Area VARCHAR(50),Description VARCHAR(500),BedsNo int,Price VARCHAR(50),MainImg VARCHAR(100), PRIMARY KEY(ID))";


	$sql = "Create Table UserReservation(ID int NOT NULL AUTO_INCREMENT,FK_UserId INT,FK_HotelId INT, FK_RoomId INT, FromDate date,ToDate date,Price VARCHAR(10), AdultNo INT,ChildsNo INT,CreatedDate DATETIME, PRIMARY KEY(ID))";

	if(mysqli_query($con,$sql))
		print "Table Created"."<br/>";
	else 
		print "Error when create table". mysqli_error($con);
}

mysqli_close($con);


?>
