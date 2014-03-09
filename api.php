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
        $pocket_links = $response->body->list;
?>

<html>
	<head>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</head>
	<body>
	<div class="container">
      <div class="page-header">
        <h1>Bootstrap grid examples</h1>
        <p class="lead">Basic grid layouts to get you familiar with building within the Bootstrap grid system.</p>
      </div>
		<ul>
		<?
        foreach($pocket_links as $link){
			print_r("<li><a href=".$link->given_url.">".$link->given_title."</a></li>");
		}
		?>
		</ul>
		</div>
	</body>
</html>