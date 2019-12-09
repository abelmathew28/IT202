<?php

 session_start();
 if (isset($_SESSION['userlogin'])) {
require_once 'db_connect.php'; 
$username = $_SESSION['userlogin'];
$user_id = $_SESSION['userId'];
$userDetail_id = $_SESSION['user_detailId'];
$sql = "SELECT account_holders.*, holders_detail.* from account_holders, holders_detail where  holders_detail.holder_id = account_holders.holder_id and account_holders.email='$username'";
$result = $connect->query($sql);
$userdetails = $result->fetch_assoc();

$qs = "SELECT * FROM security_question";
$qresult = $connect->query($qs);

if($_POST) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$Address1 = $_POST['Address1'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];
	$security_question = $_POST['security_questions'];
	$answer = $_POST['answer'];
  $phone = $_POST['phone'];
$account_holders  = "UPDATE account_holders SET first_name = '$fname', Last_name = '$lname', address1 = '$Address1', state = '$state', zip_code = '$zipcode', phone = '$phone' WHERE holder_id = {$user_id}";
$holders_detail  = "UPDATE holders_detail SET security_question_id = '$security_question', answer = '$answer' WHERE detail_id = {$userDetail_id}";
if($connect->query($account_holders) === TRUE && $connect->query($holders_detail) === TRUE) {
      echo '<script language="javascript">';
      echo 'alert("successfully updated Profile")';
      echo '</script>';
      header( "refresh:.1; url=userprofile.php" ); 
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
    <title>User Home</title>
            <script type = "text/javascript">
   <!--
      // Form validation code will come here.
      function validate() {
    var fname = document.getElementById("fname").value;
         if( fname == "" ) {
            alert("Please provide your first  name!");
            document.myForm.fname.focus() ;
            return false;
         }
     var lname = document.getElementById("lname").value;
          if( lname == "" ) {
            alert("Please provide your last name!");
            document.myForm.lname.focus() ;
            return false;
         }
         var Address1 = document.getElementById("Address1").value;
          if( Address1 == "" ) {
            alert("Please provide your initial Address!");
            document.myForm.Address1.focus() ;
            return false;
          }
         var state = document.getElementById("state").value;
          if( state == "" ) {
            alert("Please provide your state!");
            document.myForm.state.focus() ;
            return false;
         }
         var zipcode = document.getElementById("zipcode").value;
          if( zipcode == "" ) {
            alert("Please provide your zipcode!");
            document.myForm.zipcode.focus() ;
            return false;
          }
         var security_questions = document.getElementById("security_questions").value;
          if( security_questions == "" ) {
            alert("Please select Security Question!");
            document.myForm.security_questions.focus() ;
            return false;
         }
          var answer = document.getElementById("answer").value;
          if( answer == "" ) {
            alert("Please provide your answer!");
            document.myForm.answer.focus() ;
            return false;
         }
          var phone = document.getElementById("phone").value;
          if( phone == "" ) {
            alert("Please provide your phone Number!");
            document.myForm.phone.focus() ;
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

#sc-edprofile {
  width: 400px;
  margin: 0 auto;
  margin-top: 8px;
  margin-bottom: 2%;
}


div#sc-edprofile input[type="text"],div#sc-edprofile textarea ,div#sc-edprofile select {
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
  <h1>PROFILE UPDATE</h1>
  
  <form   name = "myForm" onsubmit = "return(validate());" method="post">
  <div class="sc-container">
    <label>First name:</label>
    <input type="text" name="fname" id="fname" value="<?php echo $userdetails['first_name']; ?>" />
     <label>Last name:</label>
    <input type="text" name="lname" id="lname" value="<?php echo $userdetails['Last_name']; ?>" />
    <label>Address:</label>
    <input type="text" name="Address1" id="Address1"  value="<?php echo $userdetails['address1']; ?>"/>
    <label>State:</label>
    <input type="text" name="state" id="state"  value="<?php echo $userdetails['state']; ?>"/>
    <label>Zip:</label>
    <input type="text" name="zipcode" id="zipcode" value="<?php echo $userdetails['zip_code']; ?>" />
    <label>Security Question:</label>
    <select name="security_questions" id="security_questions">
         <?php while($row = $qresult->fetch_assoc()) { ?>
         <option value="<?php echo $row['ID'];?>" <?php if ($row['ID'] == $userdetails['security_question_id']) echo ' selected="selected"'; ?>>
       <?php echo$row['security_question'];?>

        </option>

        <?php }?> </select>
    <label>Answer:</label>
   <input type="text" name="answer" id="answer" value="<?php echo $userdetails['answer']; ?>"  />
   <label>Phone:</label>
  <input type="text" name="phone" id="phone" value="<?php echo $userdetails['phone']; ?>"  />
    <input type="submit" value="Update" />
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

