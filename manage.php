<?php

require_once('functions.php');

if (isset($_GET['action'])) {
  switch ($_GET['action']) {
    case 'add':
      ADD_URL();
      break;
  }
}

?>