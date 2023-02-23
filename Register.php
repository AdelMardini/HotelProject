<?php include 'header.php';?>
<div class="container">

<h1 class="title">Register New Account</h1>


<!-- form -->
<div class="contact">

<?php

if(isset($_POST["save"]))
{
	$con = @mysqli_connect("localhost","root","adel123") or die("Problem");
	if($con)
	{
		mysqli_select_db($con,"hotel_db");

		$sqlRet ="select * from hotel_db.Users where email ='".$_POST["email"]."'";

		$result = mysqli_query($con,$sqlRet);

		while($row = mysqli_fetch_array($result))
		{
			echo("This Email already exist in our site, Please change it or <a href='login.php'>Login</a>");
			return;
		}
			
			$sql = "INSERT INTO hotel_db.Users(FirstName,LastName,Email,Password,UserType)VALUES('".$_POST["fname"]."','".$_POST["lname"]."','".$_POST["email"]."','".$_POST["pass"]."','user')";

			if(mysqli_query($con,$sql))
			{
				print("Successfully Registered, Please <a href='login.php'>Login</a> to our site");
				mysqli_close($con);
			}
		
	}
}


?>

       <div class="row">
       	
       	<div class="col-sm-12">       	


		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">   		

       		<h4>Register to our site to reserve hotels</h4>
			<form role="form" method="post">
				<div class="form-group">	
				<input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
				</div>
				<div class="form-group">	
				<input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
				</div>
				<div class="form-group">
				<input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
				</div>
				<div class="form-group">
				<input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
				</div>
					
				<button type="submit" name="save" class="btn btn-default">Register</button>
				&nbsp;
				<button type="submit" name="cancel" class="btn btn-default">Cancel</button>
			</form>
			</div>


       	</div>





       </div>
</div>
</div>
<!-- form -->

</div>
<?php include 'footer.php';?>
