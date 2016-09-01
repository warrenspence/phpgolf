<?php

include(CONTENT_PATH . '/pdo.php');
include(CONTENT_PATH . '/date.php');

$results = [];

$stmt = $pdo->query('SELECT DISTINCT date FROM results');

while ($row = $stmt->fetch(PDO::FETCH_OBJ))
{
  array_push($results, array(
    'dateVal' => $row->date,
    'dateStr' => getDisplayDate($row->date)));
}

echo $mustache->render('results-list', array(
    'results' => $results,
  ));

?>
