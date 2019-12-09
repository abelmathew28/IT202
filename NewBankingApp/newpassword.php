<?php require_once 'db_connect.php'; 
if($_POST) {
$username = $_POST['username'];
$password = $_POST['password'];
$pswdencrypted = password_hash($password, PASSWORD_DEFAULT);
echo $login_detail  = "UPDATE login SET  passcode = '$pswdencrypted' WHERE username = '$username'";
if($connect->query($login_detail) === TRUE) {
      echo '<script language="javascript">';
      echo 'alert("successfully updated Password")';
      echo '</script>';
      header( "refresh:.1; url=login.php" ); 
	} else {
          $error = "invalid Input";
	}
}
?>
<html>
   
   <head>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <title>New Password Page</title>
      <link href="style.css" rel="stylesheet" type="text/css"></link>

      <style type = "text/css">

.login-main-text h2 {
    font-weight: 300;
}
.loginclass {
    -webkit-box-flex: 0;
    -ms-flex: 0 0 50%;
    flex: 0 0 50%;
    max-width: 50%;
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
      
      </style>
      
   </head>
   
   <body >
    <div class="fixed-header">
      <div class="containers">
        <nav>
            <a href="index.php">Home</a>
           <a href="userregister.php">Register</a>
          <a href="aboutus.php">About Bank</a>
          <a href="product.php">Product</a>
		      <a href="contactus.php">Contact Us</a>
          
        </nav>
      </div>
    </div>
	<div class="sidenav">
         <div class="login-main-text">
            <h2><b>NJIT Bank</b></h2>
            <h3>America's Most Convenient Bank</h3>
            <p>Welcome to NJIT Online Banking</p>

         </div>
      </div>
      <div class="main">
         <div class="loginclass">
            <div class="login-form">
            <h3>New Password</h3>
               <form method="POST" action="">
                  <div class="form-group">
                     <label>User Email</label>
                     <input type="text" name="username" class="form-control"  value="<?php echo $_GET['usernamename']; ?>"placeholder="User Name" readonly>
                  </div>
                  <div class="form-group">
                     <label>Enter New Password</label>
                     <input type="password" name="password" class="form-control" placeholder="password">
                  </div>
                
                  <button type="submit" class="swd-button">submit</button>
               </form>
               <div style="font-size:11px; color:#cc0000; margin-top:10px"><?php echo $error; ?></div>
               <div>
				</div>
			</div>
            </div>
         </div>
      </div>

   </body>
</html>
