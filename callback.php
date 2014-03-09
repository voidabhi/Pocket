<?php
    session_start();
   	require_once "lib/Unirest.php";
   	require_once "config.php";

	$request_token = $_GET['request_token'];

	$url = 'https://getpocket.com/v3/oauth/authorize';
	$data = array(
		'consumer_key' => $config['consumer_key'],
		'code' => $request_token
	);

   $response = Unirest::post($url,
            array("Content-Type" => "application/json; charset=UTF-8",
               "X-Accept" => "application/json"),
      json_encode($data)
    );

	$result  = $response->body;


	if($access_token[0]!=''){
        $config['access_token']=$result["access_token"];
        $_SESSION['username'] = $result["username"];
        $_SESSION['config'] = $config;
        header("location:api.php");
	} else{
		echo "Something went wrong. :( ";
	}


?>
