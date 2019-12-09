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
   
   <head><link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <title>Login Page</title>
      <link href="style.css" rel="stylesheet" type="text/css"></link>

      <style type = "text/css">

.login-main-text h2 {
    font-weight: 300;
}

.btn-black {
    background-color: #000 !important;
    color: #fff;
}
.swd-button {
    background: #11c3ff linear-gradient(to bottom, transparent, #009bcf);
    border: 1px solid white;
    border-radius: 5px;
	color: white;
    display: inline-block;
	font: bold 12px Arial, Helvetica, sans-serif;
    padding: 10px 15px;
    text-decoration: none;
    text-transform: uppercase;
}

      
      </style>
      
   </head>
   
   <body >
    <div class="fixed-header">
      <div class="containers">
        <nav>
          <a href="index.php">Home</a>
           <a href="userregister.php">Register</a>
          <a href="#">About Bank</a>
          <a href="#">Product</a>
          <a href="#">Services</a>
		  <a href="#">Contact Us</a>
          
        </nav>
      </div>
    </div>
	<div class="sidenav">
         <div class="login-main-text">
            <h2><b>ABM Bank</b></h2>
            <h3>America's Most Convenient Bank</h3>
            <p>Welcome to ABM Online Banking</p>

         </div>
      </div>
      <div class="main">
         <div class="col-md-6 col-sm-12">
            <div class="user-action">
         <div class="user-main-text">
         <h4>Online Banking</h4>
            <p>
                <a class="swd-button" href="login.php">Login</a>
               <a class="swd-button" href="userregister.php">Register</a>
            </p>
      <p class="text-details"> <a href="login.php">Learn more about Personal Online Banking</a><br/>
      <a href="login.php">Learn more about Small Business Online Banking</a></p>
         </div>
      </div>

   </body>
</html>
