<?php
	//require_once('config.php');
	session_start();
	/* read the docs!
		by default, I'm just returning the 5 most recent
		pocket items.
		read more here: http://getpocket.com/developer/docs/v3/retrieve
	 */
        $config = $_SESSION['config'];
	/*$url = 'http://getpocket.com/v3/get?count=5';
	$data = array(
		'consumer_key' => $config['consumer_key'],
		'access_token' => $config['access_token']
	);
	$options = array(
		'http' => array(
			'method'  => 'POST',
                        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
			'content' => http_build_query($config)
		)
	);
	$context  = stream_context_create($options);
	$result = file_get_contents($url, false, $context);
        print_r($result);*/
        print_r($_SESSION);
?>