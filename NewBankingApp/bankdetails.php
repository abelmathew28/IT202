<?php

 session_start();
 if (isset($_SESSION['userlogin'])) {
require_once 'db_connect.php'; 
$username = $_SESSION['userlogin'];
$user_id = $_SESSION['userId'];
$userDetail_id = $_SESSION['user_detailId'];
$sql = "SELECT * from bank_detail";
$result = $connect->query($sql);
$bankdetails = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="userstyle.css" rel="stylesheet" type="text/css"></link>
    <meta charset="utf-8" />
    <title>Bank Details</title>

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
  <h1>BANK DETAILS</h1>
  <div class="sc-container">
    <label> Bank Name:</label>
    <input type="text"  value="<?php echo $bankdetails['bank_name']; ?>" readonly />
     <label>Address:</label>
          <textarea name="" id="" cols="30" rows="10"><?php echo $bankdetails['bank_address']; ?></textarea>
    <label>State:</label>
    <input type="text" value="<?php echo $bankdetails['state']; ?>" readonly/>
    <label>Zip:</label>
    <input type="text"  value="<?php echo $bankdetails['zip']; ?>" readonly />
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

