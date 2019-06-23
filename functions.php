<?php

function ROUTER_GET_REQUEST() {
  if (isset($_SERVER['REDIRECT_URL'])) {
    return substr($_SERVER['REDIRECT_URL'], 1);
  } else {
    return 'home';
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

function ADD_URL() {
  if (isset($_GET['url'])) {
    $url = $_GET['url'];
    $slug = substr(md5($url), 0, 4);
    if (isset($_GET['slug']) && $_GET['slug'] !== '') { $slug = $_GET['slug']; }
    $json  = rtrim(file_get_contents('data/urls.json'), '}');
    $json .= '},"'.$slug.'":{"url":"'.$url.'","hits":0}}';
    file_put_contents('data/urls.json', $json);
    echo $slug;
  }
}

?>