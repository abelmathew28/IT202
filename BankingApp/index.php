<?php require_once 'db_connect.php'; 
 //session_start();
if($_POST) {

	$username = $_POST['username'];
	$password = $_POST['password'];
$sql = "SELECT id FROM login WHERE username = '$username' and passcode = '$password'";
$result = $connect->query($sql);

if($result->num_rows > 0) {
       
         echo "USER NAME :" . $username;
         echo "<br>";
         echo "PASSWORD : " . $password;

      }
      else
      {
         $error = "Your Login Name or Password is invalid";
      }
}
?>
<html>
  
   <form method="POST" action="">
    <hi>BANKING APP LOGIN SCREEN</hi>
    <br></br>

    <div>
      <label>User Name</label>
      <input type="text" name="username" placeholder="User Name">
    </div>
    <div>
      <label>Password</label>
      <input type="password" name="password" placeholder="Password">
    </div>
  <div>           
    <button type="submit" >Login</button>
  </div>
   <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
  </form>
    

</html><?php>
