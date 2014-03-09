<?php
	session_start();
	require_once("lib/Unirest.php");

        $config = $_SESSION['config'];
	$url = 'http://getpocket.com/v3/get?count=5';
	$data = array(
		'consumer_key' => $config['consumer_key'],
		'access_token' => $config['access_token']
	);

    $response = Unirest::post($url,
            array("Content-Type" => "application/json; charset=UTF-8",
               "X-Accept" => "application/json"),
      json_encode($data)
    );

   	$pocket_links = $response->body->list;
?>

<?/*<html>
	<head>
		<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet"/>
		<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
	</head>
	<body>
	<div class="container">
      <div class="page-header">
        <h1>List of your pocket links</h1>
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

*/?>