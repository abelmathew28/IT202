<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
</head>
<?php 
if($_POST) {

	if($_POST['password'] == $_POST['cpassword']){
		$fname = $_POST['fname'];
		$lname = $_POST['lname'];
		$username = $_POST['username'];
		$password = $_POST['password'];
		$cpassword = $_POST['cpassword'];
	?>  
	   <div>
			<h2>User Registration Details</h2>
			First Name: <?php echo $fname; ?><br>
			Last Name: <?php echo $lname; ?><br>
			Username: <?php echo $username; ?><br>
			Password: <?php echo $password; ?><br>
			Confirmed Password: <?php echo $cpassword; ?><br>
		</div>
	<?php 
	}
	else{
		?>
		<div>
		   <h4> Password and  Confirm Password did not match</h4>
		</div>	
		<?php 
	}
}
?>

<body>
	<legend><br><h1>User Registration Page</legend></body><br></h1>
 
	<form  name = "myForm"  method="post">
		<div>
				<p>First Name:<input type="text" name="fname"  /></p>
				<p>Last Name:<input type="text" name="lname"  /></p>
				<p>User Name:<input type="text" name="username" required="required" /></p>
				<p>Password:<input type="password" name="password"  required="required"/></p>
				<p>Confirm Password:<input type="password" name="cpassword" required="required"  /><p>
			<p><input type ="submit" value ="Submit" /> &nbsp;&nbsp; <button type="reset" value="Reset">Reset</button>
				</p>
			</div>
	</form>

</body>
</html>
