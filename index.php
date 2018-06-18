<?php

$method = $_SERVER['REQUST_METHOD'];

if (method=="POST")
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode(requestBody);

	$text = $json->result->parameter->text;
	switch ($text) {
		case 'hello':
			$speech = "Hello frm this side"
			break;
		
		default:
			$speech = "Invalid Request"
			break;

	}

	$response = new \stdClass();
	$response->speech = "";
	$response->displaytext = "";
	$response->source = "webhook";

	echo json_encode($response);
}

else
{
	echo "Methode declined"
}

?>