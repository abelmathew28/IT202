<?php require_once 'db_connect.php'; 
 session_start();
if($_POST) {

$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM login WHERE username = '$username'";
$result = $connect->query($sql);
$login_data = $result->fetch_assoc();

if($result->num_rows > 0) {
        //session_register("username");
        if(password_verify($password, $login_data['passcode'])) {
         $_SESSION['userlogin'] = $username;
        require_once 'session.php';
      }else {
         $error = "Your Login Name or Password is invalid";
      }
}
}
?>
<html>
   
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <title>NJIT Login Page</title>
      <link href="style.css" rel="stylesheet" type="text/css"></link>

      <style type = "text/css">


      
      </style>
      
   </head>
   
   <body >
    <div class="fixed-header">
      <div class="containers">
        <nav>
            <a href="index.php">Home</a>
           <a href="userregister.php">Register</a>
          <a href="aboutus.php">About Us</a>
          <a href="product.php">Product</a>
		      <a href="contactus.php">Contact Us</a>
          
        </nav>
      </div>
    </div>
	<div class="sidenav">
         <div class="login-main-text">
            <h2><b>Bank of NJIT</b></h2>
            <h3>America's Most Convenient Bank</h3>
            <p>Welcome to NJIT Online Banking</p>

         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="user-action">
         <div class="user-main-text">
         <h4>NJIT Online Banking</h4>
            <p>
                <a class="swd-button" href="login.php">Login </a>
               <a class="swd-button" href="userregister.php"> Register</a>
            </p>
      <p class="text-details"> <a href="login.php">Learn more about Personal Online Banking</a><br/>
      <a href="login.php">Learn more about Small Business Online Banking</a></p>
         </div>
      </div>

   </body>
</html>
