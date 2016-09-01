<?php

$pdo = new PDO('mysql:host='. $dbConfig['host'] .';dbname='. $dbConfig['dbname'] .';charset=utf8', $dbConfig['username'], $dbConfig['password']);
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);

?>
