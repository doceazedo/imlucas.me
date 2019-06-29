<!DOCTYPE html>
<html>
<?php require_once('views/parts/header.php'); ?>
<body>
<?php

if (IS_LOGGED_IN()) {
  require_once('views/home.php');
} else {
  require_once('views/login.php');
}

?>
</body>
</html>