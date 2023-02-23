<?php include 'header.php';?>
<div class="container">

<h1 class="title">Hotel Rooms</h1>


<!-- form -->
<div class="contact">



       <div class="row">
       	
       	<div class="col-sm-12">

		   <?php
			   if(isset($_POST["save"]))
			   {
					$con = @mysqli_connect("localhost","root","adel123") or die("Problem");

					if($con)
					{
						mysqli_select_db($con,"hotel_db");

						if (!empty($_FILES) && isset($_FILES['upload']))
						{
							$target = "uploadFiles/";
							$target = $target . basename($_FILES['upload']['name']);

							if(move_uploaded_file($_FILES["upload"]['tmp_name'],$target))
							{
								$sql = @"INSERT INTO hotel_db.HotelRooms (FK_HotelId,Name,ViewType,BedType,Area,Description,BedsNo,Price,MainImg) VALUES
										(".$_POST["hname"].",'".$_POST["rname"]."','".$_POST["viewT"]."','".$_POST["bedT"]."',".$_POST["area"].",'".$_POST["dscp"]."',".$_POST["bedN"].",'".$_POST["price"]."','".basename($_FILES["upload"]["name"])."')";

								if(mysqli_query($con,$sql))
								{
									print("Successfully Insert new Hotel Room");
									mysqli_close($con);
								}
							}
						}
					}
			   }
			   else if(isset($_POST["cancel"]))
			   {
					  echo "<script type='text/javascript'>location.href = 'CP.php';</script>";
			   }
		   ?>


		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		

       		<h4>Add New Room</h4>
			<form role="form" method="post" enctype="multipart/form-data">
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
			<div class="form-group">
			Room Name: <input type="text" class="form-control" id="rname" name="rname" placeholder="Name">
			</div>
			<div class="form-group">
			View Type: <input type="text" class="form-control" id="viewT" name="viewT" placeholder="View Type">
			</div>
			<div class="form-group">
			Bed Type <input type="text" class="form-control" id="bedT" name="bedT" placeholder="Bed Type">
			</div>
			<div class="form-group">
			Bed Number <input type="number" class="form-control" id="bedN" name="bedN" placeholder="Bed Number">
			</div>
			<div class="form-group">
			Room Area <input type="number" class="form-control" id="area" name="area" placeholder="Room Area">
			</div>
			<div class="form-group">
			Room Price <input type="text" class="form-control" id="price" name="price" placeholder="Room Price">
			</div>
			<div class="form-group">	
			Room Image: <input type="file" class="form-control" id="upload" name="upload" placeholder="File">
			</div>
			<div class="form-group">
			Description <textarea type="text" class="form-control" id="dscp" name="dscp"  placeholder="Description" rows="4"></textarea>
			</div>
					
			<button type="submit" class="btn btn-default" name="save" id="save">Save</button>
				&nbsp;
			<button type="submit" class="btn btn-default" name="cancel">Cancel</button>
			</form>

			


			</div>


       	</div>

		   <?php
				$con = @mysqli_connect("localhost","root","adel123") or die("Problem");
				if($con)
				{
					mysqli_select_db($con,"hotel_db");

					$sql = "Select *,Hotels.name as hname,HotelRooms.name as rname from hotel_db.HotelRooms INNER JOIN hotel_db.Hotels on HotelRooms.FK_HotelId = Hotels.ID";

					$result = mysqli_query($con,$sql);

					echo("<br/><br/><table border='1' class='table ViewTable'><tr><th>Hotel Name</th><th>Room Name</th><th>View Type</th><th>Bed Type</th><th>Bed Number</th><th>Area</th><th>Price</th></tr>");

					while($row = mysqli_fetch_array($result))
					{
						echo("<tr><td>".$row["hname"]."</td><td>".$row["rname"]."</td><td>".$row["ViewType"]."</td><td>".$row["BedType"]."</td><td>".$row["BedsNo"]."</td><td>".$row["Area"]."</td><td>".$row["Price"]."</td></tr>");
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
