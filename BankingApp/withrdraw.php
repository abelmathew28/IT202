<?php

 session_start();
 if (isset($_SESSION['userlogin'])) {
   $user_name= $_SESSION['userlogin'];
  require_once 'db_connect.php';
  $id=$_SESSION['userId'];
  $account_number = "SELECT * FROM `holders_detail` WHERE `holder_id` = $id";
	$accresult = $connect->query($account_number);
	$data = $accresult->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
  <head>
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link href="userstyle.css" rel="stylesheet" type="text/css"></link>
    <meta charset="utf-8" />
    <title>ABM Bank Withdraw</title>
    <style>
    .register{
  padding: 20px;
    width: 600px;
    height:90%;
    margin: 100px 20px 20px 20px ;
    border: 1px solid #000;
  }
  .register h4{
    text-align: center;
  }
.inputdata p , .inputdataselect p{
  text-align: justify;
    display: inline;
    min-width: 400px;
}
.inputdata , .inputdataselect{
  padding: 10px 20px 10px 20px;
}
.registersec{
   height : 100%;
}
.registerdetails{
  text-align:center;
  min-height: 90%;
  margin:20px;
      margin: auto;
    width: 55%;
}
    </style>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
      <title>Login Page</title>
           <script type = "text/javascript">
   <!--
      // Form validation code will come here.
      function validate() {
     var balance = document.getElementById("balance").value;
          if( balance == "" ) {
            alert("Please provide  valid Transfer Amount!");
            document.myForm.amount.focus() ;
            return false;
         } 
         var amount = document.getElementById("amount").value;
          if( amount == "" ) {
            alert("Please provide Transfer amount");
            document.myForm.amount.focus() ;
            return false;
         }
     
     
         return( true );
      }

      function val() {
    var amount = document.getElementById("amount").value;
    var currentbalance = document.getElementById("currentbalance").value;
    var balance = currentbalance - amount;      
    if(balance>=0 ) {
            
           alert("Your Remaing Balace Is:"+balance);
            var elem = document.getElementById('balance');
            var old  = elem.value;
            elem.value =balance;         
           return( true );
    }
    else{
           alert("You can transfer upto:"+currentbalance);
            document.myForm.amount.focus() ;
            return false;
    }
}
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
     $(".inputdata").hide();
    $('#account_type').on('change', function() {
      if ( this.value == 'Savings')
      {
        $(".inputdata").show();
      }
      else
      {
          $(".inputdata").hide();
      }
    });
});
</script>
  </head>
  <body>
    <div class="fixed-header">
      <?php include 'usermenu.php'; ?>
    </div>
    <div class="registersec">
      <div class="registerdetails">
             <div class="register">
  <h4>Withdrawal Form </h4>
 <form action="account_withdraw_action.php"  name = "myForm" onsubmit = "return(validate());" method="post">
      <div class="inputdataselect" >
				<p>Account Type: <select name="account_type" id="account_type">
				 <option value="">---Select Account---</option>
				 <option value="Savings"> Savings</option>
				 <option value="Checking"> Checking</option>
			</select>
			</p>
			</div>
       <div class="inputdata">
        <p>Account Number: <?php echo $data['account_number']; ?>
        <input type="hidden" name="account_number" id="account_number" value="<?php echo $data['account_number']; ?>" readonly /></p>
      </div>  
       <div class="inputdata">
        <p> Account Type: <?php echo $data['account_type']; ?>
        <input type="hidden" name="account_type" id="account_type" value="<?php echo $data['account_type']; ?>" readonly /></p>
      </div>  

      <div class="inputdata">
        <p> Current Balance: $<?php echo $data['current_balance']; ?>
        <input type="hidden" name="currentbalance" id="currentbalance" value="<?php echo $data['current_balance']; ?>" readonly /></p>
        <input type="hidden" name="detailsid" id="detailsid" value="<?php echo $data['detail_id']; ?>" />
      </div>  
      <div class="inputdata">
        <p> Amount :</p><input type="text" name="amount" id="amount"  onchange="val()" />
        <td class="warningmessage" id="amount"> </td>
      </div>
      <div class="inputdata">
        <p> Balance: </p><input type="text" name="balance" id="balance" readonly />
        <td class="warningmessage" id="state"> </td>
      </div>
      <div class="inputdata">
      <p> <input type = "submit" value = "Submit" /> &nbsp;&nbsp; <button type="reset" value="Reset">Reset</button>
        </p>
      </div>
    </table>
  </form>
 
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

