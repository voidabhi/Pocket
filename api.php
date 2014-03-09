<?php
	//require_once('config.php');
	session_start();
	require_once 'lib/Unirest.php';
	/* read the docs!
		by default, I'm just returning the 5 most recent
		pocket items.
		read more here: http://getpocket.com/developer/docs/v3/retrieve
	 */
        $config = $_SESSION['config'];
        $access_token = explode("=",$config['access_token']);
	$url = 'http://getpocket.com/v3/get?count=5';
	$data = array(
		'consumer_key' => $config['consumer_key'],
		'access_token' => $access_token[1]
	);

    $response = Unirest::post($url,
            array("Content-Type" => "application/json; charset=UTF-8",
               "X-Accept" => "application/json"),
      json_encode($data)
    );
        print_r(json_encode($response->body->list));
?>