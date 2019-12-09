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
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="userstyle.css" rel="stylesheet" type="text/css"></link>
    <meta charset="utf-8" />
    <title>Account Details</title>

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


div#sc-edprofile input[type="text"],div#sc-edprofile textarea {
  width: 92%;
  background: #fff;
  margin-bottom: 4%;
  border: 1px solid #ccc;
  padding: 4%;
  font-family: 'Open Sans', sans-serif;
  font-size: 95%;
  color: #555;

}

    </style>
  </head>
  <body>
    <div class="fixed-header">
<?php include 'usermenu.php'; ?>
    </div>
    <div class="container">

 <div id="sc-edprofile">
  <h1>ACCOUNT DETAILS</h1>
  <div class="sc-container">
    <label> Name:</label>
    <input type="text" name="fname" id="fname" value="<?php echo $userdetails['first_name']; ?> <?php echo $userdetails['Last_name']; ?>" readonly />
     <label>Account Number:</label>
    <input type="text" name="lname" id="lname" value="<?php echo $userdetails['account_number']; ?>" readonly />
    <label>Account Type:</label>
    <input type="text" name="Address1" id="Address1"  value="<?php echo $userdetails['account_type']; ?>" readonly/>
    <label>Current Balance:</label>
    <input type="text" name="zipcode" id="zipcode" value="<?php echo $userdetails['current_balance']; ?>" readonly />
  </div>
</div>

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

