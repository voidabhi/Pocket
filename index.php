<!DOCTYPE html>
<?php
    require_once 'lib/Unirest.php';
    require_once 'config.php';

    Unirest::verifyPeer(false);

    $data = array(
        'consumer_key' => $config['consumer_key'],
	'redirect_uri' => $config['redirect_uri']
     );

    $response = Unirest::post("https://getpocket.com/v3/oauth/request",
            array("Content-Type" => "application/json; charset=UTF-8",
               "X-Accept" => "application/json"),
      json_encode($data)
    );

    $code = $response->body->code;

    print_r($code);

    header("Location: https://getpocket.com/auth/authorize?request_token=$code&redirect_uri=".$config['redirect_uri']."?request_token=$code");
?>
