<?php
        session_start();

	$request_token = $_GET['request_token'];

	$url = 'https://getpocket.com/v3/oauth/authorize';
	$data = array(
		'consumer_key' => $config['consumer_key'],
		'code' => $request_token
	);
	$options = array(
		'http' => array(
			'method'  => 'POST',
                        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
			'content' => http_build_query($data)
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	// our $result contains our access token

	$access_token = explode('&',$result);
	if($access_token[0]!=''){
		echo "<h1>You've been authenticated succesfully!</h1>";
		echo "You should write down the access_token and then add it to config.php<br>";
		echo "Your access token: ". $access_token[0];
		echo "<br>";
		echo "add this to config.php";
	} else{
		echo "Something went wrong. :( ";
	}

        $config['access_token']=$access_token[0];
        $_SESSION['config'] = $config;
        header("location:api.php");


?>
