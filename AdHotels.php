<?php include 'header.php';?>
<div class="container">

<h1 class="title">System Hotels</h1>


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
								$sql = "INSERT INTO hotel_db.Hotels (Name,Country,City,MainImg,Description,Classification,PoolsNo) VALUES('".$_POST["hname"]."','".$_POST["country"]."','".$_POST["city"]."','".basename($_FILES["upload"]["name"])."','".$_POST["dscp"]."',".$_POST["class"].",".$_POST["pool"].")";

								if(mysqli_query($con,$sql))
								{
									print("Successfully Insert new Hotel");
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

       		<h4>Manage Hotels</h4>
			<form role="form" method="post" enctype="multipart/form-data">
				<div class="form-group">	
				Hotel Name: <input type="text" class="form-control" id="hname" name="hname" placeholder="Name">
				</div>
				<div class="form-group">	
				Hotel Image: <input type="file" class="form-control" id="upload" name="upload" placeholder="File">
				</div>
				<div class="form-group">
				Hotel Country: <input type="text" class="form-control" id="country" name="country" placeholder="Enter country">
				</div>
				<div class="form-group">
				Hotel City: <input type="text" class="form-control" id="city" name="city" placeholder="City">
				</div>
				<div class="form-group">
				Description:<textarea type="text" class="form-control"  placeholder="description" name="dscp" rows="4"></textarea>
				</div>
				<div class="form-group">
				Hotel Classification: <input type="number" class="form-control" id="class" name="class" placeholder="Classification">
				</div>
				<div class="form-group">
				Pools Number: <input type="number" class="form-control" id="pool" name="pool" placeholder="Pools Number">
				</div>
				<button type="submit" class="btn btn-default" name="save">Save</button>
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

					$sql = "Select * from hotel_db.Hotels";

					$result = mysqli_query($con,$sql);

					echo("<br/><br/><table border='1' class='table ViewTable'><tr><th>Name</th><th>Country</th><th>City</th><th>Classification</th></tr>");

					while($row = mysqli_fetch_array($result))
					{
						echo("<tr><td>".$row["Name"]."</td><td>".$row["Country"]."</td><td>".$row["City"]."</td><td>".$row["Classification"]." Stars</td></tr>");
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
