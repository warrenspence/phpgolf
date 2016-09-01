
<?php

include(CONTENT_PATH . '/pdo.php');

$results = [];

$stmt = $pdo->prepare('SELECT member, score FROM results WHERE date=? ORDER BY score ASC');
$stmt->bindValue(1, $routeTarget, PDO::PARAM_STR);
$stmt->execute();

while ($row = $stmt->fetch(PDO::FETCH_OBJ))
{
  $stmt2 = $pdo->prepare("SELECT name FROM members WHERE id=? LIMIT 1");
  $stmt2->bindValue(1, $row->member, PDO::PARAM_INT);
  $stmt2->execute();
  $member = $stmt2->fetch(PDO::FETCH_OBJ);

  array_push($results, array(
    'name' => $member->name,
    'score' => $row->score));
}

echo $mustache->render('results-fordate', array(
    'results' => $results,
  ));

?>
