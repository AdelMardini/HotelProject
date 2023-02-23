<?php include 'header.php';?>
<div class="container">

<h1 class="title">System Users</h1>


<!-- form -->
<div class="contact">



       <div class="row">
       	
       	<div class="col-sm-12">


		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		

       		<?php

			   if(isset($_POST["back"]))
                echo "<script type='text/javascript'>location.href = 'CP.php';</script>"; 

               $con = @mysqli_connect("localhost","root","adel123") or die("Problem");
				if($con)
				{
					mysqli_select_db($con,"hotel_db");

					$sql = "Select * from hotel_db.Users";

					$result = mysqli_query($con,$sql);

					echo("<br/><br/><table border='1' class='table ViewTable'><tr><th>User Name</th><th>Email</th><th>User Type</th></tr>");

					while($row = mysqli_fetch_array($result))
					{
						echo("<tr><td>".$row["FirstName"]." ".$row["LastName"] ."</td><td>".$row["Email"]."</td><td>".$row["UserType"]."</td></tr>");
					}

					echo("</table>");
					mysqli_close($con);
				}


            ?>

			<form role="form" method="post">
            <button type="submit" class="btn btn-default" name="back">Back</button>
			</form>
			</div>


       	</div>





       </div>
</div>
</div>
<!-- form -->

</div>
<?php include 'footer.php';?>
