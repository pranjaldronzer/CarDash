<?php 

$parameter = $_SERVER['REQUEST_METHOD'];
$requestBody = file_get_contents('php://input');

filter($requestBody);

function filter($parameter)
{
	if($parameter == 'POST')
	{
	
	$json = json_decode($parameter);

	$text = $json->queryResult->queryText;

	switch ($text) {
		case 'hi':
			$speech = "Hi, Nice to meet you";
			break;

		case 'bye':
			$speech = "Bye, good night";
			break;

		case 'anything':
			$speech = "Yes, you can type anything here.";
			break;
		
		default:
			$speech = "Sorry, I didnt get that. Please ask me something else.";
			break;
	}


	$response = new \stdClass();
	$response->speech = $speech;
	$response->displayText = $speech;
	$response->source = "webhook";
	send(json_encode($response));
	}
	
	if ($parameter=='GET') 
	{
		send ("In GET requestBody");		
	}
	else
	{
	send ("Method not allowed");
	}	
}

function send($parameter)
{
	echo $parameter;
}



?>
