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
   
   <head>
      <title>Login Page</title>
      <link href="style.css" rel="stylesheet" type="text/css"></link>

      <style type = "text/css">

.login-main-text h2 {
    font-weight: 300;
}
.form-control {
    display: block;
    width: 100%;
    padding: .375rem .75rem;
    font-size: 1rem;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #ced4da;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
}
}
.btn-black {
    background-color: #F00000 !important;
    color: #fff;
}
      
      </style>
      
   </head>
   
   <body >
    <div class="fixed-header">
      <div class="containers">
        <nav>
          <a href="index.php">Home</a>
          <a href="#">Products</a>
          <a href="#">Services</a>
		  <a href="#">Contact Us</a>
          
        </nav>
      </div>
    </div>
	<div class="sidenav">
         <div class="login-main-text">
            <h2><b>NJIT Bank</b></h2>
            <h3>NJIT's Most Convenient Bank</h3>
            <p>Welcome to NJIT Online Banking</p>

         </div>
      </div>
      <div class="main">
         <div class="loginclass">
            <div class="login-form">
               <form method="POST" action="">
                  <div class="form-group">
                     <label>User Name</label>
                     <input type="text" name="username" class="form-control" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" placeholder="Password">
                  </div>
                
                  <button type="submit" class="btn btn-black">Login</button>
               </form>
               <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               <div>
				 <p><a href="#">Don't have an account?<a href="userregister.php">Sign Up</a></p>
				</div>
			</div>
            </div>
         </div>
      </div>

   </body>
</html>
