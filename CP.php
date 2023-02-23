<?php include 'header.php';?>
<div class="container">

<h1 class="title">Admin Control Panel</h1>


<!-- form -->
<div class="contact">
       <div class="row">
       	
       <?php  
            if(isset($_POST["hotel"]))
                echo "<script type='text/javascript'>location.href = 'AdHotels.php';</script>"; 
            else if(isset($_POST["room"]))
                echo "<script type='text/javascript'>location.href = 'AdRooms.php';</script>"; 
            else if(isset($_POST["user"]))
                echo "<script type='text/javascript'>location.href = 'SysUsers.php';</script>"; 
        ?>

       	<div class="col-sm-12">
		<div class="col-sm-6 col-sm-offset-3">
			<div class="spacer">

			<?php 
       			echo"<h4> Welcome: ".$_COOKIE["user"]."</h4>";                  
			?>
			<form role="form" method="post">
			<button type="submit" class="btn btn-default" name="user">Users</button>
            &nbsp;
            <button type="submit" class="btn btn-default" name="hotel">Hotels</button>
            &nbsp;
            <button type="submit" class="btn btn-default" name="room">Rooms</button>
			</form>
			</div>


       	</div>





       </div>
</div>
</div>
<!-- form -->

</div>
<?php include 'footer.php';?>