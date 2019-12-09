
<?php

 session_start();
 if (isset($_SESSION['userlogin'])) {
require_once 'db_connect.php'; 
$userdetailsID = $_SESSION['user_detailId'];

  $sql = "SELECT account_activity.* , recip.`account_number` as recipent,depo.`account_number` as depositor FROM account_activity ,holders_detail recip,holders_detail depo WHERE account_activity.`depositer_detail_id` = depo.`detail_id` and account_activity.`recipient_detail_id` = recip.`detail_id` and  account_activity.transaction_type= 'transfer' order by activity_id ASC";


  $result = $connect->query($sql);
$holders_detail = "select * from holders_detail WHERE `detail_id` ='$userdetailsID' ";
$holders_detail_result = $connect->query($holders_detail);
$holders_detail_data = $holders_detail_result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link href="userstyle.css" rel="stylesheet" type="text/css"></link>
    <meta charset="utf-8" />
    <title>Transfer Details</title>
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

    </style>
  </head>
  <body>
    <div class="fixed-header">
   <?php include 'adminmenu.php'; ?>
    </div>
    <div class="container">
      <h1>
        Transfer Details
      </h1>
      <table>
  <tr>
    <th>Account Source</th>
    <th>Account Deposit</th>
     <th>Memo</th>
    <th>Amount</th>
    <th>Curent Balance </th>
    <th>Date</th>
  </tr>
   <?php while($row = $result->fetch_assoc()) { ?>
   <tr>
  
    <td><?php echo $row['depositor'];?> </td>
    <td><?php echo$row['recipent'];?></td>
    <td><?php echo ucfirst($row['transaction_type']);?></td>
    <td> $<?php echo$row['amount'];?></td>
    <td>$<?php echo$row['effective_balance'];?></td>
      <?php  $TDate = $row['activity_date'];  
    $newDate = date("d-m-Y", strtotime($TDate));   ?>
    <td><?php echo $newDate;?></td>
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

