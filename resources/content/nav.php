<?php
$navItems = array(
  array('location', 'Location'),
  array('coursemap', 'Course Map'),
  array('coursegallery', 'Course Gallery'),
  array('members', 'Members'),
  array('results', 'Results'),
  array('contact', 'Contact Us'),
);
?>

<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">Quarry Hill Golf Course</a>
        </div>
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
              <?php
              foreach ($navItems as $navItem) {
                list($link, $name) = $navItem;
                if ($link == $route) {
                  echo "<li class='active'><a href=\"/$link/\">$name</a></li>\n";
                } else {
                  echo "<li><a href=\"/$link/\">$name</a></li>\n";
                }
              }
              ?>
            </ul>
        </div>
    </div>
</nav>
