<?php 

require_once 'db_connect.php';

if($_POST) {
	$beneficiaryacc = $_POST['beneficiaryacc'];
	$amount = $_POST['amount'];
	$balance = $_POST['balance'];
	$detailsid = $_POST['detailsid'];
	$account_type = $_POST['account_type'];
	$account_number = $_POST['account_number'];
	
	$status ="active";
	$date =date("Y/m/d");

	$holders_detail = "select * from holders_detail WHERE `account_number` ='$beneficiaryacc' ";
	$holders_detail_result = $connect->query($holders_detail);
	$holders_detail_data = $holders_detail_result->fetch_assoc();
	$recipient_detail_id = $holders_detail_data['detail_id'];
	$current_balance= $holders_detail_data['current_balance'];
	$recipient_current_balance = $current_balance + $amount;
	if(!empty($holders_detail_data) ){

	 	$account_activity = "INSERT INTO account_activity (transaction_type, amount,effective_balance, depositer_detail_id,recipient_detail_id,transaction_show,activity_date,status) VALUES ('transfer', '-$amount','$balance','$detailsid','$recipient_detail_id',1, '$date', '$status')"; 
		$connect->query($account_activity);
		$account_activity1 = "INSERT INTO account_activity (transaction_type, amount,effective_balance, depositer_detail_id,recipient_detail_id,transaction_show,activity_date,status) VALUES ('transfer', '$amount','$amount','$recipient_detail_id','$detailsid',2, '$date', '$status')"; 
		$connect->query($account_activity1);
		$aaccount_activityid = $connect->insert_id;

		//$account_holders_details = "INSERT INTO account_account_details (depositer_detail_id,recipient_detail_id, account_activity_id,status) VALUES ('$detailsid','$recipient_detail_id', '$aaccount_activityid','$status')";
		//$connect->query($account_holders_details);

		$depositer_detail_update  = "UPDATE holders_detail SET current_balance = '$balance', last_transaction_date = '$date', last_transaction_amount = '$amount', transaction_type = 'transfer' WHERE detail_id = {$detailsid}";
		$connect->query($depositer_detail_update) ;

		$recipient_detail_update  = "UPDATE holders_detail SET current_balance = '$recipient_current_balance', last_transaction_date = '$date', last_transaction_amount = '$amount', transaction_type = 'deposit' WHERE detail_id = {$recipient_detail_id}";
	 	$connect->query($recipient_detail_update) ;

		echo "<h3>Hi Successfully Transfered Amount</h3>";
		echo "<p>Account Number: $account_number To  $beneficiaryacc Account Type: $account_type</p>";
		echo "<p>Your Current Balance is : $ $balance</p>";
			echo "<a href='accountActivity.php'>Click here to  Home </a>";	
	} else {
			echo "<h3>Hi Invalid Account Number or IFSC code Please Check</h3>";
			echo "<a href='accountActivity.php'>Click here to  Home  </a>";
	}

	$connect->close();
}

?>
