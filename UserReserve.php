<?php include 'header.php';?>
<div class="container">

<h1 class="title">Reserved Hotels</h1>


<!-- form -->
<div class="contact">
       <div class="row">
       	
	   <?php
	   
				print "Date: ".date('d-m-y h:i:s');		   		
		if(isset($_POST["save"]))
		{
			$con = @mysqli_connect("localhost","root","adel123") or die("Problem");
			if($con)
			{
				mysqli_select_db($con,"hotel_db");
				$sql = "INSERT INTO hotel_db.UserReservation(FK_UserId,FK_HotelId,FK_RoomId,FromDate,ToDate,Price,AdultNo,ChildsNo,CreatedDate)
				VALUES('".$_COOKIE["userId"]."','".$_POST["hname"]."','".$_POST["rname"]."','".date('d-m-y')."','".date('d-m-y')."',130,2,2,'".date('d-m-y h:i:s')."')";

				if(mysqli_query($con,$sql))
				{
					print("Successfully Reserve room");
					mysqli_close($con);
				}
		
			}
		}


	?>

       	<div class="col-sm-12">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		

       		<h4>Add New Reservation</h4>
			<form role="form" method="post">
			<div class="form-group">Select Hotel
			<?php
				$con = @mysqli_connect("localhost","root","adel123") or die("Problem");
				if($con)
				{
					mysqli_select_db($con,"hotel_db");

					$sql = "Select * from hotel_db.Hotels";

					$result = mysqli_query($con,$sql);

					echo("<select id='hname' name='hname'>");

					while($row = mysqli_fetch_array($result))
					{
						echo("<option value='".$row["ID"]."'>".$row["Name"]."</option>");
					}

					echo("</select>");
					mysqli_close($con);
				}

			?>
			</div>
			<button type="submit" class="btn btn-default" name="viewR">View Rooms</button>
			<div class="form-group">Select Room
			<?php
			if(isset($_POST["viewR"]) or isset($_POST["viewDR"]))
			{
			print "view hotel room";

					$con = @mysqli_connect("localhost","root","adel123") or die("Problem");
					if($con)
					{
						mysqli_select_db($con,"hotel_db");

						$sql = "Select * from hotel_db.HotelRooms where FK_HotelId = ".$_POST["hname"];

						$result = mysqli_query($con,$sql);

						echo("<select id='rname' name='rname'>");

						while($row = mysqli_fetch_array($result))
						{
							echo("<option value='".$row["ID"]."'>".$row["Name"]."</option>");
						}

						echo("</select>");
						mysqli_close($con);
					}
				}
			?>
			</div>
			<button type="submit" class="btn btn-default" name="viewDR">View Room Detailes </button>

			<?php
				if(isset($_POST["viewDR"]))
				{
					$con = @mysqli_connect("localhost","root","adel123") or die("Problem");
					if($con)
					{
						mysqli_select_db($con,"hotel_db");

						$sql = "Select *,Hotels.name as hname,HotelRooms.name as rname from hotel_db.HotelRooms INNER JOIN hotel_db.Hotels on HotelRooms.FK_HotelId = Hotels.ID where HotelRooms.ID = ".$_POST["rname"];

						$result = mysqli_query($con,$sql);

						echo("<br/><br/><table border='1' class='table ViewTable'><tr><th>Hotel Name</th><th>Room Name</th><th>View Type</th><th>Bed Type</th><th>Bed Number</th><th>Area</th><th>Price</th></tr>");

						while($row = mysqli_fetch_array($result))
						{
							echo("<tr><td>".$row["hname"]."</td><td>".$row["rname"]."</td><td>".$row["ViewType"]."</td><td>".$row["BedType"]."</td><td>".$row["BedsNo"]."</td><td>".$row["Area"]."</td><td>".$row["Price"]."</td></tr>");
						}

						echo("</table>");
						mysqli_close($con);
					}
				}
			?>
			<button type="submit" class="btn btn-default" name="save">Reserve this Room </button>
			</form>			
			</div>
       	</div>
			<?php
				$con = @mysqli_connect("localhost","root","adel123") or die("Problem");
				if($con)
				{
					mysqli_select_db($con,"hotel_db");

					$sql = "Select *,Hotels.name as hname,HotelRooms.name as rname,HotelRooms.BedType,HotelRooms.BedsNo,HotelRooms.Area,HotelRooms.Price from hotel_db.UserReservation 
					INNER JOIN hotel_db.Hotels on UserReservation.FK_HotelId = Hotels.ID INNER JOIN hotel_db.HotelRooms on UserReservation.FK_RoomId = HotelRooms.ID WHERE UserReservation.FK_UserId = ".$_COOKIE["userId"];

					$result = mysqli_query($con,$sql);

					echo("<br/><br/><table border='1' class='table ViewTable'><tr><th>Hotel Name</th><th>Room Name</th><th>Reserved Date</th><th>Bed Type</th><th>Bed Number</th><th>Area</th><th>Price</th></tr>");

					while($row = mysqli_fetch_array($result))
					{
						echo("<tr><td>".$row["hname"]."</td><td>".$row["rname"]."</td><td>".$row["CreatedDate"]."</td><td>".$row["BedType"]."</td><td>".$row["BedsNo"]."</td><td>".$row["Area"]."</td><td>".$row["Price"]."</td></tr>");
					}

					echo("</table>");
					mysqli_close($con);
				}
			?>





       </div>
</div>
</div>
<!-- form -->

</div>
<?php include 'footer.php';?>
