<?php

require_once('functions.php');

if (isset($_GET['user'], $_GET['pass'])) {
  LOGIN($_GET['user'], $_GET['pass']);
}

?>