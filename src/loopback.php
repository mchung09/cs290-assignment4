<?php
error_reporting(E_ALL);
ini_set('display_errors',1);
header('Content-type: text/plain');

//Declare array
$arr = array();

//I found $_SERVER['REQUEST_METHOD'] in the php manual:
//http://php.net/manual/en/reserved.variables.server.php
//It took me some time to figure out how these worked.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $arr['Type'] = 'POST';
    //add form type POST in the array
}
else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
	$arr['Type'] = 'GET';
	//add form type GET in the array
}
else {}

if (count($_GET) === 0 && count($_POST) === 0) {
	$arr['parameters'] = null; 
}
else {
	//I found the explode option from the lectures and Sessions.php.
	//I found $_SERVER['QUERY_STRING'] in the php manual
	//http://php.net/manual/en/reserved.variables.server.php
	//It took me some time to figure out how these worked.
	//I found the par_str in the php manual
	//https://php.net/parse_str
	//I found the new stdClass() from the contributor note
	// in the php manual
	// http://php.net/manual/en/language.types.object.php
	$arr['parameters'] = new stdClass();
	
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {
		$postQueryString = file_get_contents("php://input");
    	parse_str($postQueryString, $arr['parameters']);
    	//I found the file_get_contents("php://input") from the contributor note
		// in the php manual
		//http://php.net/manual/en/reserved.variables.httprawpostdata.php
	}
	else if ($_SERVER['REQUEST_METHOD'] === 'GET') {
		parse_str($_SERVER['QUERY_STRING'], $arr['parameters']);
	}
	else {}
	
}

//Encode into JSON string and output on the screen
//This is from the assignment instructions
echo json_encode($arr);

?>