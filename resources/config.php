<?php

$dbConfig = array(
  "dbname" => "quarryhill",
  "username" => "root",
  "password" => "qrv8nbt",
  "host" => "localhost"
);

define("CONTENT_PATH", realpath(dirname(__FILE__) . '/content'));

// Error reporting.
ini_set("error_reporting", "true");
error_reporting(E_ALL|E_STRCT);

// load 3rd party libraries
require_once("/home/warren/work/quarryhill/vendor/autoload.php");

// setup mustache template engine
$mustache = new Mustache_Engine(array(
    'loader' => new Mustache_Loader_FilesystemLoader(dirname(__FILE__) . '/templates'),
  ));

?>
