
<html>
   
   <head>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link href="style.css" rel="stylesheet" type="text/css"></link>
      <title>Login Page</title>
           <script type = "text/javascript">
   <!--
      // Form validation code will come here.
      function validate() {
    var fname = document.getElementById("fname").value;
         if( fname == "" ) {
            alert("Please provide your first  name!");
            document.myForm.fname.focus() ;
            return false;
         }
     var lname = document.getElementById("lname").value;
          if( lname == "" ) {
            alert("Please provide your last name!");
            document.myForm.lname.focus() ;
            return false;
         }
         var Address1 = document.getElementById("Address1").value;
          if( Address1 == "" ) {
            alert("Please provide your initial Address!");
            document.myForm.Address1.focus() ;
            return false;
          }
         var state = document.getElementById("state").value;
          if( state == "" ) {
            alert("Please provide your state!");
            document.myForm.state.focus() ;
            return false;
         }
         var zipcode = document.getElementById("zipcode").value;
          if( zipcode == "" ) {
            alert("Please provide your zipcode!");
            document.myForm.zipcode.focus() ;
            return false;
         }
         var account_type = document.getElementById("account_type").value;
          if( account_type == "" ) {
            alert("Please select Account Type!");
            document.myForm.account_type.focus() ;
            return false;
         }
         var security_questions = document.getElementById("security_questions").value;
          if( security_questions == "" ) {
            alert("Please select Security Question!");
            document.myForm.security_questions.focus() ;
            return false;
         }
          var answer = document.getElementById("answer").value;
          if( answer == "" ) {
            alert("Please provide your answer!");
            document.myForm.answer.focus() ;
            return false;
         }
          var phone = document.getElementById("phone").value;
          if( phone == "" ) {
            alert("Please provide your phone Number!");
            document.myForm.phone.focus() ;
            return false;
         }
     var contact = document.getElementById("username").value;
         if(contact == "" || contact.indexOf("@", 0) < 0  || contact.indexOf(".", 0) < 0) {
            alert("Please provide your valid username!");
            document.myForm.username.focus() ;
            return false;
         }
     var password = document.getElementById("password").value;
     if( password === undefined || password =="" ) {
            alert("Please Enter your password!");
            document.myForm.password.focus() ;
            return false;
         }
     var cpassword = document.getElementById("cpassword").value;
     if( cpassword === undefined || cpassword =="" ) {
      alert("Please provide conform Password!");
            document.myForm.cpassword.focus() ;
            return false;
         }
     else if (password != cpassword) { 
            alert("Password and  conform Password doesnt match ");
            document.myForm.cpassword.focus() ;
            return false;
         }
    
     
     
         return( true );
      }
   //-->
</script>
</head>
<?php 

require_once 'db_connect.php'; 
$sql = "SELECT * FROM security_question";
$result = $connect->query($sql);
?>
      <style type = "text/css">

.register{
  padding: 20px;
    width: 600px;
    margin: 100px 20px 20px 20px ;
    border: 1px solid #000;
  }
  .register h4{
    text-align: center;
  }
.inputdata p{
  text-align: justify;
    display: inline;
    min-width: 400px;
}
.inputdata{
  padding: 10px 20px 10px 20px;
}
.submitdata{
 text-align: center;
 padding: 10px;
}
      </style>
      
   </head>
   
   <body >
    <div class="fixed-header">
      <div class="containers">
        <nav>
            <a href="index.php">Home</a>
           <a href="userregister.php">Register</a>
          <a href="aboutus.php">About Bank</a>
          <a href="product.php">Product</a>
		      <a href="contactus.php">Contact Us</a>
          
        </nav>
      </div>
    </div>
	<div class="sidenav">
         <div class="login-main-text">
            <h2><b>Bank of NJIT</b></h2>
            <h3>America's Most Convenient Bank</h3>
            <p>Welcome to NJIT Online Banking</p>

         </div>
      </div>
      <div class="main">
         <div class="registerdetails">
             <div class="register">
  <h4>Register and Create and Account with Bank of NJIT</h4>

  <form action="registerAction.php"  name = "myForm" onsubmit = "return(validate());" method="post">
    <div>
      <div class="inputdata">
        <span>  First Name: </span>
        <input type="text" name="fname" id="fname" />
       
      </div>  
      <div class="inputdata">
        <span> Last Name:</span> <input type="text" name="lname" id="lname" />
             </div>
        <div class="inputdata">
        <span> Address: </span><input type="text" name="Address1" id="Address1" />
             </div>
      <div class="inputdata">
        <span> State: </span><input type="text" name="state" id="state" />
          </div>
      <div class="inputdata">
        <span> Zipcode: </span><input type="text" name="zipcode" id="zipcode" />
            </div>
      <div class="inputdata">
        <span> Account Type:</span> <select name="account_type" id="account_type">
         <option value="">---Select Account---</option>
         <option value="Savings"> Savings</option>
      </select>
      
             </div>
        <div class="inputdata">
          <span> 
        Security Question: </span> <select name="security_questions" id="security_questions">
        <option value="">---Select Question---</option>
         
         <?php while($row = $result->fetch_assoc()) { ?>
         
        <option value="<?php echo$row['ID'];?>"> <?php echo$row['security_question'];?>

        </option>

        <?php }?> </select>
     
      </div>
        <div class="inputdata">
        <span> Answer:</span> <input type="text" name="answer" id="answer" />
           </div>
      <div class="inputdata">
        <span> Phone:</span><input type="phone" name="phone" id="phone"  />
          </div>
      <div class="inputdata">
        <span> User Name(user email):</span><input type="text" name="username" id="username"  />
      
      </div>
      <div class="inputdata">
        <span> Password:</span><input type="password" name="password" id="password"/>
   
      </div>
      <div class="inputdata">
        <span> Conform Password:</span><input type="password" name="cpassword" id="cpassword"  />
      </div>
      <div class="submitdata">
       <input class="swd-button" type = "submit" value = "Register" /> &nbsp;&nbsp; <button  class="swd-button" type="reset" value="Reset">Reset</button>
        
      </div>
  </form>

</div>
         </div>
      </div>

   </body>
</html>
