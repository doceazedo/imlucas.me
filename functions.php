<?php

function ROUTER_GET_REQUEST() {
  if (isset($_SERVER['REDIRECT_URL'])) {
    return substr($_SERVER['REDIRECT_URL'], 1);
  } else {
    return 'index';
  }
}

function HANDLE_REQUEST() {
  $json = json_decode(file_get_contents('data/urls.json'), true);
  if (file_exists('views/'.$GLOBALS['request'].'.php')) {
    include_once('views/'.$GLOBALS['request'].'.php');
  } else
  if (isset($json[$GLOBALS['request']])) {
    header('location: '.$json[$GLOBALS['request']]['url']);
  } else {
    include_once('views/404.php');
  }
}

function SET_COOKIE($name, $value, $days) {
  setcookie($name, $value, time() + (86400 * $days), "/");
}

function ADD_URL() {
  $users = json_decode(file_get_contents('data/users.json'), true);
  $urls = json_decode(file_get_contents('data/urls.json'), true);
  $url = $_GET['url'];
  $slug = substr(md5($url), 0, 4);
  if (isset($_GET['slug']) && $_GET['slug'] !== '') { $slug = $_GET['slug']; }
  if (isset($_GET['url']) && !isset($urls[$slug]) && $users[$_COOKIE['user']]['password'] == $_COOKIE['pass']) {
    $json  = rtrim(file_get_contents('data/urls.json'), '}');
    $json .= '},"'.$slug.'":{"url":"'.$url.'","hits":0}}';
    file_put_contents('data/urls.json', $json);
    echo $slug;
  } else {
    echo 'error';
  }
}

function IS_LOGGED_IN() {
  if (isset($_COOKIE['user'], $_COOKIE['pass'])) {
    $json = json_decode(file_get_contents('data/users.json'), true);
    if ($json[$_COOKIE['user']]['password'] == $_COOKIE['pass']) {
      return true;
    } else {
      return false;
    }
  } else {
    return false;
  }
}

function LOGIN($user, $pass) {
  $json = json_decode(file_get_contents('data/users.json'), true);
  if ($json[$user]['password'] == md5($pass)) {
    SET_COOKIE('user', $user, 1);
    SET_COOKIE('pass', md5($pass), 1);
    echo 'true';
  } else {
    echo 'false';
  }
}

?>