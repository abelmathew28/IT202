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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="userstyle.css" rel="stylesheet" type="text/css"></link>
    <meta charset="utf-8" />
    <title>User Home</title>
           <script type = "text/javascript">
   <!--
      // Form validation code will come here.
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
   //-->
</script>
    <style>
      .dropdown{
        padding:10px;
      }
      /* Add some padding on document's body to prevent the content
    to go underneath the header and footer */


@import url(https://fonts.googleapis.com/css?family=Open+Sans:300,400,700);

/* css class for the edit profile generated errors */
.profilepress-edit-profile-status {
  width: 400px;
  text-align: center;
  background-color: #e74c3c;
  color: #ffffff;
  border: medium none;
  border-radius: 4px;
  font-size: 17px;
  font-weight: normal;
  line-height: 1.4;
  padding: 8px 5px;
  margin: auto;
}

.memo-edprofile-success {
  width: 400px;
  text-align: center;
  background-color: #2ecc71;
  color: #ffffff;
  border: medium none;
  border-radius: 4px;
  font-size: 17px;
  font-weight: normal;
  line-height: 1.4;
  padding: 8px 5px;
  margin: auto;
}

#sc-edprofile {
  background: #f0f0f0;
  width: 400px;
  margin: 0 auto;
  margin-top: 8px;
  margin-bottom: 2%;
  transition: opacity 1s;
  -webkit-transition: opacity 1s;
}

#sc-edprofile h1 {
  background: #ccc;
  padding: 20px 0;
  font-size: 140%;
  font-weight: 300;
  text-align: center;
  color: #000;
}

div#sc-edprofile .sc-container {
  background: #f0f0f0;
  padding: 6% 4%;
}

div#sc-edprofile input[type="email"],
div#sc-edprofile input[type="text"],
div#sc-edprofile input[type="password"], div#sc-edprofile select, div#sc-edprofile textarea {
  width: 92%;
  background: #fff;
  margin-bottom: 4%;
  border: 1px solid #ccc;
  padding: 4%;
  font-family: 'Open Sans', sans-serif;
  font-size: 95%;
  color: #555;
}

div#sc-edprofile select {
  width: 100%;
}

div#sc-edprofile textarea {
  height: 100px;
}

div#sc-edprofile input[type="submit"] {
  width: 100%;
  background: #ccc;
  border: 0;
  padding: 4%;
  font-family: 'Open Sans', sans-serif;
  font-size: 100%;
  color: #000;
  cursor: pointer;
  transition: background .3s;
  -webkit-transition: background .3s;
}

div#sc-edprofile input[type="submit"]:hover {
  background: #2288bb;
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
      <div class="container">Copyright &copy; 2019 &nbsp;ABM Bank
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

