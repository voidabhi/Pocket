<!DOCTYPE html>
<?php
    require_once 'lib/Unirest.php';
    require_once 'config.php';

    Unirest::verifyPeer(false);
    
    // fetch consumer key and redirect uri from config file
    $data = array(
        'consumer_key' => $config['consumer_key'],
	'redirect_uri' => $config['redirect_uri']
     );
     
     
    // request for access token
    $response = Unirest::post("https://getpocket.com/v3/oauth/request",
            array("Content-Type" => "application/json; charset=UTF-8",
               "X-Accept" => "application/json"),
      json_encode($data)
    );
    $code = $response->body->code;

    // printing request code
    echo($code);

    // redirecting to pocket authorization url
    header("Location: https://getpocket.com/auth/authorize?request_token=$code&redirect_uri=".$config['redirect_uri']."?request_token=$code");
?>
