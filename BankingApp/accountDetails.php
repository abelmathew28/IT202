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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="userstyle.css" rel="stylesheet" type="text/css"></link>
    <meta charset="utf-8" />
    <title>User Home</title>

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
  background: #3399cc;
  border: 0;
  padding: 4%;
  font-family: 'Open Sans', sans-serif;
  font-size: 100%;
  color: #fff;
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


