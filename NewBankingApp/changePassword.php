<?php

 session_start();
 if (isset($_SESSION['userlogin'])) {
require_once 'db_connect.php'; 
$username = $_SESSION['userlogin'];


if($_POST) {
  $password = $_POST['password'];
  	$pswdencrypted = password_hash($password, PASSWORD_DEFAULT);
 $password  = "UPDATE login SET passcode = '$pswdencrypted' WHERE username = '$username'";
if($connect->query($password) === TRUE) {
      echo '<script language="javascript">';
      echo 'alert("Password successfully Updated")';
      echo '</script>';
      //header("Location: userprofile.php");
	} else {
    	echo '<script language="javascript">';
      echo 'alert("Erorr while updating record")';
      echo '</script>';
	}
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="userstyle.css" rel="stylesheet" type="text/css"></link>
    <meta charset="utf-8" />
    <title>Chnage Password</title>
           <script type = "text/javascript">

      function validate() {
     var password = document.getElementById("password").value;
     if( password === undefined || password =="" ) {
            alert("Please Enter your password!");
            document.myForm.password.focus() ;
            return false;
         }
     var cpassword = document.getElementById("cpassword").value;
     if( cpassword === undefined || cpassword =="" ) {
      alert("Please provide conform Password!");
            document.myForm.cpassword.focus() ;
            return false;
         }
     else if (password != cpassword) { 
            alert("Password and  conform Password doesnt match ");
            document.myForm.cpassword.focus() ;
            return false;
         }
    
     
     
         return( true );
      }
</script>
       <style>
      .dropdown{
        padding:10px;
      }

#sc-edprofile {
  width: 400px;
  margin: 0 auto;
  margin-top: 8px;
  margin-bottom: 2%;
}


div#sc-edprofile input[type="password"]{
  width: 92%;
  background: #fff;
  margin-bottom: 4%;
  border: 1px solid #ccc;
  padding: 4%;
  font-family: 'Open Sans', sans-serif;
  font-size: 95%;
  color: #555;

}

div#sc-edprofile input[type="submit"] {
  width: 100%;
  background: #ccc;
  border: 0;
  padding: 4%;
  font-size: 100%;
  color: #000;
}
    </style>
  </head>
  <body>
    <div class="fixed-header">
<?php include 'usermenu.php'; ?>
    </div>
    <div class="container">

 <div id="sc-edprofile">
  <h1>CHANGE PASSWORD</h1>
  
  <form name = "myForm" onsubmit = "return(validate());" method="post">
  <div class="sc-container">
    <label>New Password:</label>
    <input type="password" name="password" id="password" />
     <label>Conform Password:</label>
    <input type="password" name="cpassword" id="cpassword" />
    <input type="submit" value="Submit" />
  </div>
</div>
</form>
</div>
    <div class="fixed-footer">
      <div class="container">Copyright &copy; 2019 &nbsp;NJIT Bank
</div>
    </div>
  </body>
</html>
<?php
 }
 else{
 	header("Location: index.php");
 }
?>


