<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<title>Multiplication Table</title>
</head>
<body>

<form action="multtable.php" method="get">
<h1 style="font-weight:bold;"> Please enter the multiplication table values: </h1>
Minimum Multiplicand: <input type="text" name="min-multiplicand"><br><br>
Maximum Multiplicand: <input type="text" name="max-multiplicand"><br><br>
Minimum Multiplier: <input type="text" name="min-multiplier"><br><br>
Maximum Multiplier: <input type="text" name="max-multiplier"><br><br>
<input type="submit">
</form>

<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
//Error reporting code is from the lectures
//Initial page does not have any query strings.
//In order to avoid error output on the first load, kill the page
//when no parameters are passed in the url.
if (count($_GET) == 0) {
	die();
}

$minMultiplicand = $_GET['min-multiplicand'];
$maxMultiplicand = $_GET['max-multiplicand'];
$minMultiplier = $_GET['min-multiplier'];
$maxMultiplier = $_GET['max-multiplier'];

//I found the javascript alert code from Stack Overflow forum.
//Link is found here: http://stackoverflow.com/questions/6871435/how-to-add-a-javascript-alert-with-a-php-script

if($minMultiplicand == NULL) {
	echo "<script type='text/javascript'>
             alert('Missing Parameter minMultiplicand.');
         </script>";
    die();
}
else if($maxMultiplicand == NULL) {
	echo "<script type='text/javascript'>
             alert('Missing Parameter maxMultiplicand.');
         </script>";
    die();
}
else if($minMultiplier == NULL) {
	echo "<script type='text/javascript'>
             alert('Missing Parameter minMultiplier.');
         </script>";
    die();
}
else if($maxMultiplier == NULL) {
	echo "<script type='text/javascript'>
             alert('Missing Parameter maxMultiplier.');
         </script>";
    die();
}
else {}

if(is_int($minMultiplicand) || $minMultiplicand < 0) {
	echo "<script type='text/javascript'>
             alert('Invalid input. Minimum multiplicand must be a positive integer.');
         </script>";
    die();
}
else if(is_int($maxMultiplicand) || $maxMultiplicand < 0) {
	echo "<script type='text/javascript'>
             alert('Invalid input. Maximum multiplicand must be a positive integer.');
         </script>";
    die();
}
else if(is_int($minMultiplier) || $minMultiplier < 0) {
	echo "<script type='text/javascript'>
             alert('Invalid input. Minimum multiplier must be a positive integer.');
         </script>";
    die();
}
else if(is_int($maxMultiplier) || $maxMultiplier < 0) {
	echo "<script type='text/javascript'>
             alert('Invalid input. Maximum multiplier must be a positive integer.');
         </script>";
    die();
}
else {}

if($minMultiplicand > $maxMultiplicand) {
	echo "<script type='text/javascript'>
             alert('Minimum multiplicand larger than maximum.');
         </script>";
    die();
}
else if($minMultiplier > $maxMultiplier) {
	echo "<script type='text/javascript'>
             alert('Minimum multiplier larger than maximum.');
         </script>";
    die();
}
else {}



?>

<p><h3>Multiplication Table</h3>
<p>
<table border="1">

<?php

echo '<tr><td>';
for ($i = $minMultiplier; $i <= $maxMultiplier; $i++) {
	echo '<td style="font-weight:bold;">' . $i;
}

for ($i = $minMultiplicand; $i <= $maxMultiplicand; $i++) {
	echo '<tr><td style="font-weight:bold;">' . $i;

	for ($j = $minMultiplier; $j <= $maxMultiplier; $j++) {
		echo '<td>' . ($i * $j);
	}
}	

?>

</table>

</body>
</html>
