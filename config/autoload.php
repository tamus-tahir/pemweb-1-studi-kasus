<?php

require_once 'connection.php';
require_once 'helper.php';
session_start();

$uri_segment = explode('/', parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH));
$base_url = 'http://localhost/starter-template/';
