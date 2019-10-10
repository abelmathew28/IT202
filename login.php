<!DOCTYPE html> 
<html> 
 
 <script type = "text/javascript">
      function validate() {
		
		 var uname = document.getElementById("uname").value;
          if( uname == "" || uname === undefined  ) {
            alert("Please provide your User name!");
            document.myForm.uname.focus() ;
            return false;
         }
		 
		 var password = document.getElementById("password").value;
          if( password == ""  || password === undefined  ) {
            alert("Please provide your password!");
            document.myForm.password.focus() ;
            return false;
         }
		 
		 var usertype = document.getElementById("usertype").value;
         if( usertype == null || usertype == '' ) {
           alert("Please select any value");
            document.myForm.usertype.focus() ;
            return false;
         }
		 else if(usertype =="Select One"){

			alert("You have selected the default value Select One");
			document.myForm.usertype.focus() ;
			return false;
		}
		 else if(usertype =="Checking" || usertype =="Savings"){

			alert("You have selected "+ usertype);
            document.myForm.usertype.focus() ;
            return true;
		 }
         return( true );
      }
</script>
<body> 

<div <h1>Login Form with Drop Down</h1> </div>
	<form action="login.php" name = "myForm" onsubmit = "return(validate());" method="post"> 
	   
		<div> 
        
			<label><br>Username</br></label> 
			<input type="text" placeholder="Enter Username" id="uname" name="uname" > 

			<label><br>Password</br></label> 
			<input type="password" placeholder="Enter Password" id="password" name="password"  > 
			<label><br>Account Type</br></label> 
			<select name="usertype" id="usertype">
				//<option value=""></option>
                <option value="Select One" selected="">Select One</option>
                <option value="Checking">Checking</option>
				<option value="Savings">Savings</option>
            </select>
            <div><br></br></div>
			<input type = "submit" value = "Submit" /> &nbsp; <button  type="reset" value="Reset">Reset</button>
		</div> 
	</form> 

</body> 

</html> 
