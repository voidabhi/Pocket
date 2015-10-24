<?php
    session_start();
   	require_once "lib/Unirest.php";
   	require_once "config.php";

	$request_token = $_GET['request_token'];

	// pocket authorization url
	$url = 'https://getpocket.com/v3/oauth/authorize';
	$data = array(
		'consumer_key' => $config['consumer_key'],
		'code' => $request_token
	);

	// making post request with the data
   $response = Unirest::post($url,
            array("Content-Type" => "application/json; charset=UTF-8",
               "X-Accept" => "application/json"),
      json_encode($data)
    );

	$result  = $response->body;

	// check if access token is present
	if(isset($result->access_token)){
        $config['access_token']=$result->access_token;
        $_SESSION['username'] = $result->username;
        $_SESSION['config'] = $config;
        
        // redirecting to api page
        header("location:api.php");
	} else{
		echo "Something went wrong. :( ";
	}


?>
