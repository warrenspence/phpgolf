

<?php

include(CONTENT_PATH . '/pdo.php');
include(CONTENT_PATH . '/date.php');

$stmt = $pdo->prepare("SELECT name FROM members WHERE id=? LIMIT 1");
$stmt->bindValue(1, $routeTarget, PDO::PARAM_INT);
$stmt->execute();
$member = $stmt->fetch(PDO::FETCH_OBJ);

$stmt = $pdo->prepare('SELECT date, score FROM results WHERE member=? ORDER BY date ASC');
$stmt->bindValue(1, $routeTarget, PDO::PARAM_STR);
$stmt->execute();

$results = [];

while ($row = $stmt->fetch(PDO::FETCH_OBJ))
{
  array_push($results, array(
    'date' => getDisplayDate($row->date),
    'score' => $row->score));

  //echo '<tr>
      //<td>'. getDisplayDate($row->date) .'</td>
      //<td>'. $row->score .'</td>
    //</tr>';
}

echo $mustache->render('members-results', array(
    'name' => $member->name,
    'results' => $results,
  ));

?>
