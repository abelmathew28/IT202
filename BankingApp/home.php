<?php

 session_start();
 if (isset($_SESSION['userlogin'])) {
require_once 'db_connect.php'; 
$userdetailsID = $_SESSION['user_detailId'];
$sql = "SELECT account_activity.* , recip.`account_number` as recipent,depo.`account_number` as depositor FROM account_activity ,holders_detail recip,holders_detail depo WHERE account_activity.`depositer_detail_id` = depo.`detail_id` and account_activity.`recipient_detail_id` = recip.`detail_id` and ( account_activity.`depositer_detail_id`= $userdetailsID or account_activity.`recipient_detail_id`=$userdetailsID) order by activity_id ASC
limit 5;  ";
$result = $connect->query($sql);

$holders_detail = "select * from holders_detail WHERE `detail_id` ='$userdetailsID' ";
$holders_detail_result = $connect->query($holders_detail);
$holders_detail_data = $holders_detail_result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="userstyle.css" rel="stylesheet" type="text/css"></link>
    <meta charset="utf-8" />
    <title>User Home</title>
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
   <?php include 'usermenu.php'; ?>
    </div>
    <div class="container">
      <h1>
        Hey  <?php echo ucfirst($_SESSION['user_name']); ?> Here Is your Last 5 transcations
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
   <tr <?php if($row['transaction_type']=="deposit"){?> class="deposit"<?php } elseif($row['transaction_type']=="transfer"){ echo "class='transfer'";} else{?> class="withdrawal" <?php } ?>>
  
    <td><?php echo $row['depositor'];?> </td>
    <td><?php echo$row['recipent'];?></td>
    <td><?php echo ucfirst($row['transaction_type']);?></td>
    <td> $<?php echo$row['amount'];?></td>
    <td>$<?php echo$row['effective_balance'];?></td>
    <td><?php echo$row['activity_date'];?></td>
  </tr>
  <?php }?> 
   <tr>
    <th>Your Account Type:</th>
      <th><?php echo $holders_detail_data['account_type']; ?></th>
      <th></th>
      <th></th>
    <th>Available Balance:</th>
      <th><b> $ <?php echo $holders_detail_data['current_balance']; ?></b></th>
  </tr>
</table>
    </div>
    <div class="fixed-footer">
      <div class="container">Copyright &copy; 2019 &nbsp;Bank of NJIT
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
