<?php require_once 'db_connect.php'; 
 session_start();

$sql = "SELECT * FROM security_question";
$result = $connect->query($sql);
if($_POST) {

$username = $_POST['username'];
$security_questions = $_POST['security_questions'];
$answer = $_POST['answer'];
$sql = "SELECT account_holders.*,holders_detail.* from account_holders,holders_detail WHERE account_holders.email='$username' and holders_detail.security_question_id='$security_questions'and holders_detail.answer='$answer'";
$result = $connect->query($sql);

if($result->num_rows > 0) {
        header("location: newpassword.php?usernamename=$username");
}
else {
         $error = "Invalid Input";
      }
}
?>
<html>
   
   <head>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <title>Forgot Password</title>
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
            <h2><b>Bank of NJIT</b></h2>
            <h3>America's Most Convenient Bank</h3>
            <p>Welcome to NJIT Online Banking</p>

         </div>
      </div>
      <div class="main">
         <div class="loginclass">
            <div class="login-form">
            <h3>Forgot Password</h3>
               <form method="POST" action="">
                  <div class="form-group">
                     <label>User Email</label>
                     <input type="text" name="username" class="form-control" placeholder="User Name">
                  </div>
                  <div class="form-group">
                     <label>Security Question</label><br>
                     <select name="security_questions" id="security_questions">
                     <option value="">---Select Question---</option>
                        <?php while($row = $result->fetch_assoc()) { ?>
                     <option value="<?php echo$row['ID'];?>"> <?php echo$row['security_question'];?>
                     </option>
                     <?php }?> </select>
                  </div>
                  <div class="form-group">
                     <label>Answer</label>
                     <input type="text" name="answer" class="form-control" placeholder="answer">
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
