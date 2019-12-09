      <div class="container">
        <nav>
			<div class="left">Welcome  <?php echo $_SESSION['user_name']; ?></div>
          <a href="adminhome.php">Home</a>
          <div class="dropdown"> 
            <a class="dropdowntitle" href="adminhome.php">Services</a>
          <i class="fa fa-caret-down"></i>
          <div class="dropdown-content">
         <a href="depositdetails.php">Deposit details</a>
         <a href="withdrawdetails.php">Withdraw details</a>
        <a href="transferdetails.php">Transfer details</a>
          </div>  
          </div>
            <a href="userdetails.php">Account Holder Details</a>
        
		  <div class="right">
       <a href="logout.php">Sign Out</a>
    </div>
          
        </nav>
      </div>
