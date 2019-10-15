<!DOCTYPE html>
<html>
<head>
	<title>Registration Page</title>
</head>
<script type = "text/javascript">

      function validate() {
		var email = document.getElementById("email").value;
         if( email == "" ){
            alert("The email address is empty");
            document.myForm.email.focus();
            return false;
         }
         if(email.indexOf("@", 0) < 0  || email.indexOf(".", 0) < 0) {
           alert("valid email address required - either @ or . is missing");
            document.myForm.email.focus() ;
            return false;
         }
		 var cemail = document.getElementById("cemail").value;
       if( cemail == "" ){
            alert("The confirm email address is empty");
            document.myForm.cemail.focus();
            return false;
         }
          if(cemail.indexOf("@", 0) < 0  || cemail.indexOf(".", 0) < 0) {
            alert("please provide valid confirm email address - either @ or . is missing");
            document.myForm.cemail.focus() ;
            return false;
         }
		 else if (email != cemail) { 
            alert("Email and  confirm Email are not matching ");
            document.myForm.cemail.focus() ;
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
		 if (password != cpassword) { 
            alert("Password and  conform Password doesnt match ");
            document.myForm.cpassword.focus() ;
            return false;
         }
         var username = document.getElementById("username").value;
       if( username === undefined || username =="" ) {
         alert("Please provide user name");
            document.myForm.username.focus() ;
            return false;
         }
		 
		 alert("Registered successfully")
         return( true );
      }
</script>

<body>
<h1>User Registration Page</h1>
 
	<form  name = "myForm" onsubmit = "return(validate());" method="post">
		<div>
				<p>User Email:<input type="email" id="email" name="email"  /></p>
				<p>Confirm Email:<input type="email" id="cemail" name="cemail"  /></p>
				<p>Password:<input type="password" id="password" name="password" /></p>
				<p>Confirm Password:<input type="password" id="cpassword" name="cpassword" /><p>
             <p>User Name:<input type="text" id="username" name="usernamee" /><p>
				<p><input type ="submit" value ="Submit" /> </p>
		</div>
	</form>

</body>
</html>
