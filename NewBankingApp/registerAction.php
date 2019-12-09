<?php 

require_once 'db_connect.php';

if($_POST) {
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$Address1 = $_POST['Address1'];
	$state = $_POST['state'];
	$zipcode = $_POST['zipcode'];
	$account_type = $_POST['account_type'];
	$security_question = $_POST['security_questions'];
	$answer = $_POST['answer'];
	$phone = $_POST['phone'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$user ="user";
	$status ="active";
	$date =date("Y/m/d");
	$pswdencrypted = password_hash($password, PASSWORD_DEFAULT);
	 $sql = "SELECT account_holders.`holder_id` ,account_holders.`first_name`, holders_detail.`detail_id` FROM account_holders ,holders_detail WHERE account_holders.`holder_id` = holders_detail.`holder_id` and account_holders.email = '$username'";
   $result = $connect->query($sql);

   if($result->num_rows > 0) {

 		echo "<h3>Hi  $fname  Your  Email Id Already Exist</h3>";
		echo "<p>Please Use Another Email Id</p>";
		echo "<a href='userregister.php'>Register Page </a>";	

      }else {
    
	$sql = "INSERT INTO login (username, passcode, usertype, status) VALUES ('$username', '$pswdencrypted', '$user', '$status')";

	if($connect->query($sql) === TRUE) {
	 $login_id = $connect->insert_id;
		$account_number = "select * from holders_detail order by `detail_id` desc limit 1";
		$accresult = $connect->query($account_number);
		$data = $accresult->fetch_assoc();

			if(empty($data)) {
				$bank_account_number="900000000101";
			} else {
					$curaccno = $data['account_number'];
				$bank_account_number= $curaccno + 1;
			}

			$account_holders = "INSERT INTO account_holders (first_name, Last_name, address1,address2,state,zip_code,phone,email,login_id, status) VALUES ('$fname', '$lname', '$Address1','$Address2', '$state', '$zipcode','$phone', '$username', '$login_id', '$status')";

			if($connect->query($account_holders) === TRUE) {
				$account_holderid = $connect->insert_id;
				$account_holders_details = "INSERT INTO holders_detail (holder_id,account_number, account_type,security_question_id,answer,initial_deposit,current_balance,last_transaction_date, last_transaction_amount) VALUES ('$account_holderid','$bank_account_number', '$account_type','$security_question', '$answer', 0,0, '$date', 0)";
				$connect->query($account_holders_details);
			}
			else{
				echo "Error " . $sql . ' ' . $connect->connect_error;
			}


		echo "<h3>Hi  $fname  Your  Successfully Created your Account</h3>";
		echo "<p>Your Account Number is : $bank_account_number</p>";
		echo "<a href='index.php'>Click here to  Login </a>";	
	} else {
		echo "Error " . $sql . ' ' . $connect->connect_error;
	}
   }
	$connect->close();
}

?>
