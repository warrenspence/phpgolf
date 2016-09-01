
<?php

include(CONTENT_PATH . '/pdo.php');

$members = [];

$stmt = $pdo->query('SELECT id,name FROM members');

while ($row = $stmt->fetch(PDO::FETCH_OBJ))
{
  array_push($members, array(
    'id' => $row->id,
    'name' => $row->name));
}

echo $mustache->render('members-list', array(
    'members' => $members,
  ));

?>
