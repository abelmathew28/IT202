<?php 

$localhost="sql1.njit.edu";//your msql host [sql1, sql2, sql3]
$dbname="ab2323";//ucid
$username="ab2323";//ucid
$password="r0IgvuRjH";//mysql password (not ucid password)

echo var_export($password);
// create connection
$connect = new mysqli($localhost, $username, $password, $dbname);

// check connection
if($connect->connect_error) {
	die("connection failed : " . $connect->connect_error);
} else {
	// echo "Successfully Connected";
}

?>
