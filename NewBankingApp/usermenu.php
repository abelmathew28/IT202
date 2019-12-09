      <div class="container">
        <nav>
			<div class="left">Welcome  <?php echo $_SESSION['user_name']; ?></div>
          <a href="home.php">Home</a>
          <div class="dropdown"> 
            <a class="dropdowntitle" href="home.php">Services</a>
          <i class="fa fa-caret-down"></i>
          <div class="dropdown-content">
         <a href="deposit.php">Deposit</a>
         <a href="withdraw.php">Withdraw</a>
        <a href="transfer.php">Transfer</a>
          </div>  
          </div>
            <a href="bankdetails.php">Bank Details</a>
		  <a href="accountActivity.php">Account Activity	</a>
          <div class="dropdown"> 
            <a class="dropdowntitle" href="home.php">Profile</a>
          <i class="fa fa-caret-down"></i>
          <div class="dropdown-content">
          <a href="accountDetails.php">Account Details</a>
         <a href="userprofile.php">Edit Profile</a>
        <a href="changePassword.php">Password</a>
          </div>
          </div>
        
		  <div class="right">
       <a href="logout.php">Sign Out</a>
    </div>
          
        </nav>
      </div>
