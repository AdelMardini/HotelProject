<?php include 'header.php';?>
<div class="container" style="margin-bottom:210px">

<h1 class="title">Login Page</h1>


<!-- form -->
<div class="contact">



<div class="row">
       	
       	<div class="col-sm-12">
      


		   <?php 


		   if(isset($_POST["submit"]))
		   {
			   $con = @mysqli_connect("localhost","root","adel123") or die("Problem");

				if($con)
				{
					mysqli_select_db($con,"hotel_db");
	
						$sql="select * from hotel_db.Users where Email = '".$_POST["email"] ."'and password = '". $_POST['pass']."'";
						$result = mysqli_query($con,$sql);

						while($row = mysqli_fetch_array($result))
						{
							setcookie("user",$row["FirstName"]." ".$row["LastName"],time()+3600);
							setcookie("userId",$row["ID"],time()+3600);

							//echo("User Type is ".$row["UserType"]);

							if($row["UserType"] == "admin")
								echo "<script type='text/javascript'>location.href = 'CP.php';</script>";
							else
								echo "<script type='text/javascript'>location.href = 'UserCP.php';</script>";
						}

						print("This User does not exist, Please register to site");	   		   
				}
			}
			else if(isset($_POST["Reg"]))
			{
				echo "<script type='text/javascript'>location.href = 'Register.php';</script>";
			}

		   
		   ?>

	<div class="col-sm-6 col-sm-offset-3">
		<div class="spacer">       		
			<form role="form" method="post">			
				<div class="form-group">
					<input type="email" class="form-control" name="email" id="email" placeholder="Enter email">
				</div>
				<div class="form-group">
					<input type="password" class="form-control" id="pass" name="pass" placeholder="Password">
				</div>
				<button type="submit" name="submit" class="btn btn-default">Login</button>
				&nbsp;
				<button type="submit" name="Reg" class="btn btn-default">Register</button>
			</form>
		</div>
    </div>
</div>
</div>
</div>
<!-- form -->

</div>
<?php include 'footer.php';?>
