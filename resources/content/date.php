<?php

function getDisplayDate($mysqldate) {
  $phpdate = strtotime($mysqldate);
  return date('l F jS, Y', $phpdate);
}

?>
