<?php 

include 'newPage.php';

$method = $_SERVER['REQUEST_METHOD'];
$query=$_SERVER['QUERY_STRING'];
send ($query);
send ("<br>");
$requestBody = file_get_contents('php://input');

filter($method,$requestBody);

function filter($request, $parameter)
{
	if($request == 'POST')
	{
		if ($query== "speech") 
		{
			
			$json = json_decode($parameter);
		
			$text = $json->queryResult->queryText;
		
			switch ($text) 
				{
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
	}
	
	if ($request =='GET') 
	{
		//send ("In GET requestBody");		
		//send ("<br>");
		

		$myfile = fopen("sample.html", "r") or die("Unable to open file!");
		echo fread($myfile,filesize("sample.html"));
		fclose($myfile);
		$abc = new handleQuery();

	}
		
}

function send($parameter)
{
	echo $parameter;
}



?>
