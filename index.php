<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
session_start();
define("ROW_PER_PAGE", 20);
require_once __DIR__ ."/mvc/core/BaseController.php";
require_once __DIR__."/mvc/Routes.php";
?>