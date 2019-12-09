<?php 

require_once 'db_connect.php';

if($_POST) {

	$amount = $_POST['amount'];
	$balance = $_POST['balance'];
	$detailsid = $_POST['detailsid'];
	$account_type = $_POST['account_type'];
	$account_number = $_POST['account_number'];
	$status ="active";
	$date =date("Y/m/d");
	$account_activity = "INSERT INTO account_activity (transaction_type, amount,effective_balance, depositer_detail_id,recipient_detail_id,transaction_show,activity_date,status) VALUES ('deposit', '-$amount','-$amount',1,'$detailsid',1,'$date', '$status')";
	
	if($connect->query($account_activity)){
	$account_activitys = "INSERT INTO account_activity (transaction_type, amount,effective_balance, depositer_detail_id,recipient_detail_id,transaction_show,activity_date,status) VALUES ('deposit', '$amount','$balance','$detailsid',1,2,'$date', '$status')";
		$connect->query($account_activitys);
		$withdrawal_detail_update  = "UPDATE holders_detail SET current_balance = '$balance', last_transaction_date = '$date', last_transaction_amount = '$amount', transaction_type = 'deposit' WHERE detail_id = {$detailsid}";
		$connect->query($withdrawal_detail_update) ;

		echo "<h3>Your amount was successfully deposited </h3>";

		echo "<p>Your Current Balance is : $ $balance</p>";
			echo "<a href='accountActivity.php'>Click here to  Home </a>";	
	} else {
			echo "<h3>Hi Invalid Transaction please try again later</h3>";
			echo "<a href='accountActivity.php'>Click here to  Home  </a>";
	}

	$connect->close();
}

?>
