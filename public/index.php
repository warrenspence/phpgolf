<?php
  require_once("/home/warren/work/quarryhill/resources/config.php");

  function getCurrentUri()
  {
    $basepath = implode('/', array_slice(explode('/', $_SERVER['SCRIPT_NAME']), 0, -1)) . '/';
    $uri = substr($_SERVER['REQUEST_URI'], strlen($basepath));
    if (strstr($uri, '?')) $uri = substr($uri, 0, strpos($uri, '?'));
    $uri = '/' . trim($uri, '/');
    return $uri;
  }

  $base_url = getCurrentUri();
  $routeStr = explode('/', $base_url);

  $routes = array();
  foreach($routeStr as $route)
  {
    if(trim($route) != '')
      array_push($routes, $route);
  }

  $route = $routes[0];
  $routeTarget = $routes[1];
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Quarry Hill Golf Course</title>
  <link href="http://quarryhill.local/css/bootstrap.min.css" rel="stylesheet">
  <link href="http://quarryhill.local/css/style.css" rel="stylesheet">
  <link href="http://quarryhill.local/css/font-awesome.min.css" rel="stylesheet" type="text/css">
</head>
<body>

  <?php include(CONTENT_PATH . '/nav.php'); ?>

  <div class="container">
    <div class="row">

      <?php
      switch ($route) {
          case '':
            echo "hello top page";
            break;

          case 'location':
            include(CONTENT_PATH . '/location.html');
            break;

          case 'members':
            if (isset($routeTarget)) {
              include(CONTENT_PATH . '/members-results.php');
            }
            else {
              include(CONTENT_PATH . '/members-list.php');
            }
            break;

          case 'results':
            if (isset($routeTarget)) {
              include(CONTENT_PATH . '/results-fordate.php');
            }
            else {
              include(CONTENT_PATH . '/results-list.php');
            }
            break;

          default:
            echo "no specific code setup for '$route' route.";
            break;
      }
      ?>

    </div>
  </div>
</body>
</html>
