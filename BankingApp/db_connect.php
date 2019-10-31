<?php 

$localhost = "sql1.njit.edu";
$username = "ab2323";
$password = "r0IgvuRjH";
$dbname = "ab2323";

// create connection
$connect = new mysqli($localhost, $username, $password, $dbname);

// check connection
if($connect->connect_error) {
	die("connection failed : " . $connect->connect_error);
} else {
	// echo "Successfully Connected";
}

?>

