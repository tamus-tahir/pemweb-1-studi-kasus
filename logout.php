<?php
include_once 'config/autoload.php';

session_unset();

session_destroy();

header('location:' . $base_url . 'login');
