<?php
        session_start();
	$request_token = $_GET['request_token'];

	$url = 'https://getpocket.com/v3/oauth/authorize';
	$data = array(
		'consumer_key' => $config['consumer_key'],
		'code' => $request_token
	);
	/*$options = array(
		'http' => array(
			'method'  => 'POST',
                        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
			'content' => http_build_query($data)
		)
	);*/

    $response = Unirest::post($url,
            array("Content-Type" => "application/json; charset=UTF-8",
               "X-Accept" => "application/json"),
      json_encode($data)
    );

/*	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
	// our $result contains our access token

	$access_token = explode('&',$result);*/

	print_r($response->body);
	/*if($access_token[0]!=''){
        $config['access_token']=$access_token[0];
        $_SESSION['config'] = $config;
        header("location:api.php");
	} else{
		echo "Something went wrong. :( ";
	}*/


?>
