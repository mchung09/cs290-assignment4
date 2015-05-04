<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
ob_start();
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Content 1 Page</title>
</head>
<body>

<?php

if(isset($_GET['action']) && $_GET['action'] == 'end'){
	$_SESSION = array();
	session_destroy();
	header("Location: login.php");
	die();
}

if(!isset($_POST['username']) && !isset($_POST['validate']) && !isset($_SESSION['visits'])){
	echo "<p>A user name must be entered.";
	echo "<p>Click <a href ='content1.php?action=end'>here</a> to return to the login screen.";
}
else if((!isset($_POST['username']) || $_POST['username'] == null) && !isset($_SESSION['visits'])) {
	echo "<p>A user name must be entered.";
	echo "<p>Click <a href ='content1.php?action=end'>here</a> to return to the login screen.";
} 
else {  

	if(session_status() == PHP_SESSION_ACTIVE){
		
		echo "<p>Hello! This is Content 2 Page.";
		echo "<p>Click <a href='content1.php'>here</a> to return to content1.php.";
		
	}
}

?>

</body>
</html>