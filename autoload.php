
<?php

define('APP_ROOT', __DIR__.'/../');
 
require APP_ROOT.'/vendor/autoload.php';
 
date_default_timezone_set('Asia/Kolkata');
 
// Require all classes
 
spl_autoload_register(function ($class_name) {
 
  require_once APP_ROOT."/config.php";
  require_once APP_ROOT."/api.php";
});
