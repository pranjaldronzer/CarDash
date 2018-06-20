<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta http-equiv="imagetoolbar" content="no" />
        <meta http-equiv="Content-Language" content="en" />
        <meta http-equiv="X-UA-Compatible" content="IE=Edge" />

        <link rel="icon" href="img/favicon/favicon.ico" type="image/x-icon" />
        <link rel="shortcut icon" href="img/favicon/favicon.ico" type="image/x-icon" />
        <link rel="apple-touch-icon" href="img/favicon/favicon-apple-152px-precomposed.png" />
        <link rel="apple-touch-icon-precomposed" href="img/favicon/favicon-apple-152px-precomposed.png" />
        <meta name="msapplication-TileImage" content="img/favicon/favicon-win8.png" />
        <meta name="msapplication-TileColor" content="#FFFFFF" />

        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
        <meta name="apple-mobile-web-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <meta name="format-detection" content="telephone=no" />
        <meta name="msapplication-tap-highlight" content="no" />

        <title>Server Webhook</title>

        <script type="text/javascript">

            var ngLibsURL = 'controls.js/debug/libs/';

            function ngStartParams()
            {
                // Start parameters
                this.Version = '1.0';
                //        this.Lang = 'en';
            }

        </script>
        <?php
        include 'newPage.php';
        
        $method = $_SERVER['REQUEST_METHOD'];

        $requestBody = file_get_contents('php://input');

        filter($method, $requestBody);

        function filter($request, $parameter) {
            if ($request == 'POST') {
                $query = $_SERVER['QUERY_STRING'];

                if ($query == "speech") {

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
            }

            if ($request == 'GET') {
                //send ("In GET requestBody");		
                //send ("<br>");


                $myfile = fopen("sample.html", "r") or die("Unable to open file!");
                echo fread($myfile, filesize("sample.html"));
                fclose($myfile);
                $abc = new handleQuery();
            }
        }

        function send($parameter) {
            echo $parameter;
        }
        ?>

        <!-- Controls.js files -->
        <script type="text/javascript" src="controls.js/debug/libs.js?1"></script>
        <!-- <script type="text/javascript" src="controls.js/debug/controls.js?1"></script> -->
        <script type="text/javascript" src="controls.js/debug/controls-vm.js?1"></script>

        <!--  Use WinEight Skin -->
        <script type="text/javascript" src="controls.js/debug/libs/ng_wineight/wineight.js?1"></script>
        <link rel="stylesheet" href="controls.js/debug/libs/ng_wineight/wineight.css?1" type="text/css" />

        <!--  Use WinXP Skin -->
        <script type="text/javascript" src="controls.js/debug/libs/ng_winxp/winxp.js?1"></script>
        <link rel="stylesheet" href="controls.js/debug/libs/ng_winxp/winxp.css?1" type="text/css" />

        <!-- Use Wireframe Skin -->
        <script type="text/javascript" src="controls.js/debug/libs/ng_wireframe/wireframe.js?1"></script>
        <link rel="stylesheet" href="controls.js/debug/libs/ng_wireframe/wireframe.css?1" type="text/css" />

        <!-- Your project files -->
        <script type="text/javascript" src="js/main.js?1"></script>

    </head>
    <body scroll="no" onload="new ngApplication(new ngStartParams(), 'ngApp')">
        <div id="ngApp" class="ngApplication"></div>
    </body>
</html>
