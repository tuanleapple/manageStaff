<?php 
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require_once __DIR__ .'/controllers/HomeController.php';
        $home = new HomeController();
        $home->SayHi();
        break;
    default:
        http_response_code(404);
        require __DIR__ . '/views/404.php';
        break;
}
