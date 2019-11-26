<?php
  require_once 'db_connect.php';
   session_start();
   
   $user_name= $_SESSION['userlogin'];
   
   $sql = "SELECT account_holders.`holder_id` ,account_holders.`first_name`, holders_detail.`detail_id` FROM account_holders ,holders_detail WHERE account_holders.`holder_id` = holders_detail.`holder_id` and account_holders.email = '$username'";
   $result = $connect->query($sql);

   if($result->num_rows > 0) {

 	   $result_data = $result->fetch_assoc();
      $_SESSION['userId'] = $result_data['holder_id'];
      $_SESSION['user_detailId'] = $result_data['detail_id']; 
      $_SESSION['user_name'] = $result_data['first_name']; 
      header("location: home.php");

      }else {
          header("location:index.php");
   }
   
?>
