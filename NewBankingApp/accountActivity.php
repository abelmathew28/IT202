<?php

 session_start();
 if (isset($_SESSION['userlogin'])) {
require_once 'db_connect.php'; 
$userdetailsID = $_SESSION['user_detailId'];
if($_POST['transaction_type']=="transfer"|| $_POST['transaction_type']=="deposit" ||$_POST['transaction_type']=="withdrawal") {
  $transaction_type=$_POST['transaction_type'];
  $sql = "SELECT account_activity.* , recip.`account_number` as recipent,depo.`account_number` as depositor FROM account_activity ,holders_detail recip,holders_detail depo WHERE account_activity.`depositer_detail_id` = depo.`detail_id` and account_activity.`recipient_detail_id` = recip.`detail_id` and  account_activity.transaction_type= '$transaction_type' and ( account_activity.`depositer_detail_id`= $userdetailsID or account_activity.`recipient_detail_id`=$userdetailsID) order by activity_id ASC";

}else{
  $sql = "SELECT account_activity.* , recip.`account_number` as recipent,depo.`account_number` as depositor FROM account_activity ,holders_detail recip,holders_detail depo WHERE account_activity.`depositer_detail_id` = depo.`detail_id` and account_activity.`recipient_detail_id` = recip.`detail_id` and ( account_activity.`depositer_detail_id`= $userdetailsID or account_activity.`recipient_detail_id`=$userdetailsID) order by activity_id ASC";
}

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
    <title>Account activity</title>
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
.sortsec{
 padding-bottom:20px;
 text-align:right;
}
.submit-link {
    background-color: rgb(6, 100, 22);
    color: #fff;
    padding: 5px 15px;
    border-radius: 5px;
}
select{
  padding: 5px 15px;
}
    </style>
  </head>
  <body>
    <div class="fixed-header">
   <?php include 'usermenu.php'; ?>
    </div>
    <div class="container">
      <h1>
        Hello  <?php echo ucfirst($_SESSION['user_name']); ?> Here are your transactions.
      </h1>
      <div class="sortsec">
      <form method="post">
          <label for="first-name">Transaction Type:</label>
         <select name="transaction_type" id="account_type">
          <option value="">---Select Type---</option>
          <option value="all" <?=$_POST['transaction_type'] == 'all' ? ' selected="selected"' : '';?> > All</option>
          <option value="transfer" <?=$_POST['transaction_type'] == 'transfer' ? ' selected="selected"' : '';?> > Transfer</option>
          <option value="withdrawal" <?=$_POST['transaction_type'] == 'withdrawal' ? ' selected="selected"' : '';?>> Withdrawal</option>
          <option value="deposit" <?=$_POST['transaction_type'] == 'deposit' ? ' selected="selected"' : '';?> > Deposit</option>
        </select>
          <input  class="submit-link"  type="submit" value="Submit">
      </form>
      </div>
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
    <td> <?php echo$row['amount'];?></td>
    <td><?php echo$row['effective_balance'];?></td>
        <?php  $TDate = $row['activity_date'];  
    $newDate = date("d-m-Y", strtotime($TDate));   ?>
    <td><?php echo $newDate;?></td>
  </tr>
  <?php }?> 
   <tr>
    <th>Your Account Type:</th>
      <th><?php echo $holders_detail_data['account_type']; ?></th>
      <th></th>
      <th></th>
    <th>Your Available Balance:</th>
      <th><b> $ <?php echo $holders_detail_data['current_balance']; ?></b></th>
  </tr>
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

