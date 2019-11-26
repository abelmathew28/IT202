
<html>
   
   <head>
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

.login-main-text h2{
    font-weight: 300;
}

.btn-black{
    background-color: #000 !important;
    color: #fff;
    padding: 10px;
    border-radius: 5px;
}
      </style>
      
   </head>
   
   <body >
    <div class="fixed-header">
      <div class="containers">
        <nav>
          <a href="index.php">Home</a>
           <a href="login.php">Login</a>
          <a href="#">About Bank</a>
          <a href="#">Product</a>
          <a href="#">Services</a>
		  <a href="#">Contact Us</a>
          
        </nav>
      </div>
    </div>
	<div class="sidenav">
         <div class="login-main-text">
            <h2><b>NJIT Bank</b></h2>
            <h3>NJIT's Most Convenient Bank</h3>
            <p>Welcome to NJIT Online Banking</p>

         </div>
      </div>
      <div class="main">
         <div class="registerdetails">
             <div class="register">
  <h4>User Registration Page</h4>

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
        <span> state: </span><input type="text" name="state" id="state" />
          </div>
      <div class="inputdata">
        <span> Zipcode: </span><input type="text" name="zipcode" id="zipcode" />
            </div>
      <div class="inputdata">
        <span> Account Type:</span> <select name="account_type" id="account_type">
         <option value="">---Select Account---</option>
         <option value="Savings"> Savings</option>
         <option value="Checking"> Checking</option>
      </select>
      
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
       <input class="submit-link" type = "submit" value = "Register" /> &nbsp;&nbsp; <button  class="btn-black" type="reset" value="Reset">Reset</button>
        
      </div>
  </form>

</div>
         </div>
      </div>

   </body>
</html>
