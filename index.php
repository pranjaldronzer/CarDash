<?php

$method = $_SERVER['REQUST_METHOD'];

if (method=="POST")
{
	$requestBody = file_get_contents('php://input');
	$json = json_decode(requestBody);

	$text = $json->queryResult;
	switch ($text) {
		case 'hello':
			$speech = "Hello from this side"
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
