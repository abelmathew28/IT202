<?php

 session_start();
 if (isset($_SESSION['userlogin'])) {
require_once 'db_connect.php'; 
$userdetailsID = $_SESSION['user_detailId'];
$sql = "SELECT account_holders.*, holders_detail.* from account_holders,holders_detail where holders_detail.holder_id = account_holders.holder_id and holders_detail.holder_id !=1 order by holders_detail.holder_id ASC ";
$result = $connect->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="userstyle.css" rel="stylesheet" type="text/css"></link>
    <meta charset="utf-8" />
    <title>Admin Home</title>
    <style>
    table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}
th{
 background-color: #67C5FE;
}

.deposit {
  background-color: #AEE967;
}
.withdrawal {
  background-color: #E9D167;
}
.transfer {
  background-color: #FE9267;
}
    </style>
  </head>
  <body>
    <div class="fixed-header">
   <?php include 'adminmenu.php'; ?>
    </div>
    <div class="container">
      <h1>
     Account Holder Details
      </h1>
      <table>
  <tr>
    <th>Holder Name</th>
    <th>Phone</th>
     <th>Email</th>
    <th>Account No</th>
    <th>Account Type </th>
    <th>Current Balance</th>
  </tr>
   <?php while($row = $result->fetch_assoc()) { ?>
   <tr>
  
    <td><?php echo $row['first_name'];?>&nbsp; <?php echo $row['Last_name'];?> </td>
    <td><?php echo$row['phone'];?></td>
    <td><?php echo ucfirst($row['email']);?></td>
    <td> <?php echo$row['account_number'];?></td>
    <td><?php echo$row['account_type'];?></td>
    <td><?php echo$row['current_balance'];?></td>
  </tr>
  <?php }?>
</table>
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
