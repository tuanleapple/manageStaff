<?php 
$request = $_SERVER['REQUEST_URI'];

switch ($request) {
    case '/' :
        require_once __DIR__ .'/controllers/HomeController.php';
        $home = new HomeController();
        $home->SayHi();
        break;
    case '/products' :
        require_once __DIR__ .'/controllers/HomeController.php';
        $home = new HomeController();
        $home->products();
        break;
    case '/cart' :
        require_once __DIR__ .'/controllers/HomeController.php';
        $home = new HomeController();
        $home->carts();
        break;
    case '/checkout' :
        require_once __DIR__ .'/controllers/HomeController.php';
        $home = new HomeController();
        $home->checkout();
        break;
    case '/login' :
        require_once __DIR__ .'/controllers/HomeController.php';
        $home = new HomeController();
        $home->login();
        break;
    case '/signup' :
        require_once __DIR__ .'/controllers/HomeController.php';
        $home = new HomeController();
        $home->signup();
        break;
    case '/loginAdmin' :
        require_once __DIR__ .'/controllers/AdminController.php';
        $home = new AdminController();
        $home->loginAdmin();
        break;
    case '/users' :
        require_once __DIR__ .'/controllers/AdminController.php';
        $home = new AdminController();
        $home->users();
        break;
    case '/product' :
        require_once __DIR__ .'/controllers/AdminController.php';
        $home = new AdminController();
        $home->product();
        break;
    case '/post' :
        require_once __DIR__ .'/controllers/AdminController.php';
        $home = new AdminController();
        $home->post();
        break;
    case '/log' :
        require_once __DIR__ .'/controllers/AdminController.php';
        $home = new AdminController();
        $home->log();
        break;
    case '/editProduct' :
        require_once __DIR__ .'/controllers/AdminController.php';
        $home = new AdminController();
        $home->editProduct();
        break;
    case '/createProduct' :
        require_once __DIR__ .'/controllers/AdminController.php';
        $home = new AdminController();
        $home->createProduct();
        break;
    case '/createPost' :
        require_once __DIR__ .'/controllers/AdminController.php';
        $home = new AdminController();
        $home->createPost();
        break;
    case '/createCollection' :
        require_once __DIR__ .'/controllers/AdminController.php';
        $home = new AdminController();
        $home->createCollection();
        break;
    case '/collectionProduct' :
        require_once __DIR__ .'/controllers/AdminController.php';
        $home = new AdminController();
        $home->collectionProduct();
        break;
    case '/collection' :
        require_once __DIR__ .'/controllers/AdminController.php';
        $home = new AdminController();
        $home->collection();
        break;
    default:
        require_once __DIR__ .'/controllers/HomeController.php';
        $home = new HomeController();
        $home->view404();
        break;
}
