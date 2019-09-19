<?php
#turn error reporting on
ini_set('display_errors',1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
//pull in config.php so we can access the variables from it
require('config.php');
echo "Loaded Host: " . $host;
$conn_string = "mysql:host=$host;dbname=$database;charset=utf8mb4";
try{
	$db = new PDO($conn_string, $username, $password);
	echo "Connected";
	//create table
	$query = "create table if not exists `TestUsers`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`pin` int default 0,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$stmt = $db->prepare($query);
	$r = $stmt->execute();
	echo "<br>" . ($r>0?"Created table or already exists":"Failed to create table") . "<br>";
	unset($r);
	$insert_query = "INSERT INTO `TestUsers`( `username`, `pin`) VALUES ('Abel Mathew', 2323)";
	$stmt = $db->prepare($insert_query);
	$r = $stmt->execute();
	$query = "create table if not exists `IT202`(
		`id` int auto_increment not null,
		`username` varchar(30) not null unique,
		`grade` varchar(2) not null unique,
		PRIMARY KEY (`id`)
		) CHARACTER SET utf8 COLLATE utf8_general_ci";
	$stmt = $db->prepare($query);
	$r = $stmt->execute();

	//simple insert
	//TODO/homework make values variables bindable
	
	//TODO catch error from DB
	$insert_query = "INSERT INTO `IT202`( `username`, `grade`) VALUES ('Abel', 'A')";
	$stmt = $db->prepare($insert_query);
	$r = $stmt->execute();
	echo "<br>" . ($r>0?"Insert successful":"Insert failed") . "<br>";
	
	//TODO select query using bindable :username is where clause
	//select * from TestUsers where username = 
	$select_query="SELECT id, username,grade FROM IT202";
	$stmt = $db->prepare($select_query);
	$result=$stmt->fetchColumn(2);
	echo $result;
}
catch(Exception $e){
	echo $e->getMessage();
	exit("Something went wrong");
}
?>