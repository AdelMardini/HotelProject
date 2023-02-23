<?php include 'header.php';?>
<div class="container">

<h1 class="title">User Page</h1>


<!-- form -->
<div class="contact">



       <div class="row">
       	
       	<div class="col-sm-12">


		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		

       		<?php 
       			echo"<h4> Welcome: ".$_COOKIE["user"]."</h4>";
				   
				   FillUserInfo();

				   Function FillUserInfo()
				   {
							$con = @mysqli_connect("localhost","root","adel123") or die("Problem");
					   if($con)
					   {
							mysqli_select_db($con,"hotel_db");
							$sql = "select * from hotel_db.Users where id = ".$_COOKIE["userId"];
							$result = mysqli_query($con,$sql);
						
							while($row = mysqli_fetch_array($result))
							{
								echo "<script type='text/javascript'>window.onload = codeAddress; function codeAddress(){ document.getElementById('fname').value='".$row["FirstName"]."'; document.getElementById('lname').value='".$row["LastName"]."';
												document.getElementById('email').value='".$row["Email"]."';}</script>";

								/*fname.value=$row["FirstName"];
								lname.value=$row["LastName"];
								email.value=$row["Email"];*/

								/*echo("<div class='form-group'>First Name:</td><td><input type='text' class='form-control' value='".$row["FirstName"]."' name='fname'/></div>");
								echo("<div class='form-group'>Last Name:</td><td><input type='text' class='form-control' value='".$row["LastName"]."' name='lname'/></div>");
								echo("<div class='form-group'>Email:</td><td><input type='email' class='form-control' value='".$row["Email"]."' name='email'/></div>");*/
							}

							echo("<br/><br/>");
							mysqli_close($con);
					   }
				   }

				   if(isset($_POST["view"]))
				   {
						echo "<script type='text/javascript'>location.href = 'UserReserve.php';</script>";
				   }
				   else if(isset($_POST["update"]))
				   {
						$con = @mysqli_connect("localhost","root","adel123") or die("Problem");
						if($con)
						{
							mysqli_select_db($con,"hotel_db");

							$sql ="UPDATE hotel_db.Users SET FirstName='".$_POST["fname"]."',LastName='".$_POST["lname"]."',Email='".$_POST["email"]."' where ID = ".$_COOKIE["userId"];

							if(mysqli_query($con,$sql))
							{
								//echo "<script type='text/javascript'>location.href = 'UserCP.php';</script>";
								//mysqli_close($con);

								FillUserInfo();
								mysqli_close($con);
							}
						}
				   }					
			?>
			<form role="form" method="post">		
				<div class="form-group">	
					First Name:<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
				</div>
				<div class="form-group">	
					Last Name:<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
				</div>
				<div class="form-group">
					Email: <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
				</div>
				<button type="submit" class="btn btn-default" name="update">Update Information</button>
				&nbsp;
				<button type="submit" class="btn btn-default" name="view">View Reserve Hotels</button>			
			</form>
			</div>


       	</div>





       </div>
</div>
</div>
<!-- form -->

</div>
<?php include 'footer.php';?>
