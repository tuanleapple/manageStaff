<?php 
    $request = $_SERVER['REQUEST_URI'];
    $the_array = explode('/', trim($request, '/'));
    if (isset($_COOKIE["key_post"])){
        $user_cookie = $_COOKIE["key_post"];
    } else {
        require_once __DIR__ .'/controllers/HomeController.php';
        $home = new HomeController();
        $home->setCookieClient();
    }
    if (!empty($the_array[1])){
        $url = parse_url($request);
        $check = strtok($the_array[1], '?');
        if ($url["path"] === '/getDistrict/'. $check) {
            require_once __DIR__ .'/controllers/HomeController.php';
            $home = new HomeController();
            $home->getDistrict($check);
            return false;
        }
        if ($url["path"] === '/getWard/'. $check) {
            require_once __DIR__ .'/controllers/HomeController.php';
            $home = new HomeController();
            $home->getWard($check);
            return false;
        }
        switch ($request) {
            case '/products/'. $the_array[1] :
                require_once __DIR__ .'/controllers/HomeController.php';
                $home = new HomeController();
                $home->products($the_array[1]);
                break;
            case '/editCollectionProduct/'. $the_array[1] :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->editCollectionProduct($the_array[1]);
                break;
            case '/editPost/'. $the_array[1] :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->editPost($the_array[1]);
                break;
            case '/editProduct/'. $the_array[1] :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->editProduct($the_array[1]);
                break;
            case '/page/'. $the_array[1] :
                require_once __DIR__ .'/controllers/HomeController.php';
                $home = new HomeController();
                $home->page($the_array[1]);
                break;
        }
    } else {
        $url = parse_url($request);
        if ($url["path"] == '/getCity') {
            require_once __DIR__ .'/controllers/HomeController.php';
            $home = new HomeController();
            $home->getCity();
            return false;
        }
        switch ($request) {
            case '/' :
                require_once __DIR__ .'/controllers/HomeController.php';
                $home = new HomeController();
                $home->SayHi();
                break; 
            case '/addCart' :
                require_once __DIR__ .'/controllers/HomeController.php';
                $home = new HomeController();
                $home->addCart();
                break;
            case '/cart' :
                require_once __DIR__ .'/controllers/HomeController.php';
                $home = new HomeController();
                $home->carts();
                break;
            case '/checkouts' :
                require_once __DIR__ .'/controllers/HomeController.php';
                $home = new HomeController();
                $home->checkout();
                break;
            case '/checkLoginClient' :
                require_once __DIR__ .'/controllers/HomeController.php';
                $home = new HomeController();
                $home->checkLoginClient();
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
            case '/account' :
                require_once __DIR__ .'/controllers/HomeController.php';
                $home = new HomeController();
                $home->account();
                break;
            case '/qualityPlus' :
                require_once __DIR__ .'/controllers/HomeController.php';
                $home = new HomeController();
                $home->qualityPlus();
                break;
            case '/loginAdmin' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->loginAdmin();
                break;
            case '/checkLoginAdmin' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->checkLogin();
                break;
            case '/users' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->users();
                break;
            case '/productCreateImage' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->createProductimage();
                break;
            case '/createImage' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->createImage();
                break;
            case '/tinymceUploadImage' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->tinymceUploadImage();
                break;
            case '/createPostAdmin' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->createPostAdmin();
                break;
            case '/productDeleteImage' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->productDeleteImage();
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
            case '/billLog' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->billLog();
                break;
            // case '/editProduct' :
            //     require_once __DIR__ .'/controllers/AdminController.php';
            //     $home = new AdminController();
            //     $home->editProduct();
            //     break;
            case '/delete' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->delete();
                break;
            case '/createProduct' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->createProduct();
                break;
            case '/createProducts' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->createProducts();
                break;
            case '/collectionProductCreate' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->collectionProductCreate();
                break;
            case '/collectionProductEdit' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->collectionProductEdit();
                break;
            case '/editPostAdmin' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->editPostAdmin();
                break;
            case '/createPost' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->createPost();
                break;
            case '/findUser' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->findUser();
                break;
            case '/createUser' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->createUser();
                break;
            case '/editUser' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->editUser();
                break;
            case '/createCollection' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->createCollection();
                break;
            case '/createCollectionProduct' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->createCollectionProduct();
                break;
            case '/editCollection' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->editCollection();
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
            case '/getCollection' :
                require_once __DIR__ .'/controllers/AdminController.php';
                $home = new AdminController();
                $home->getCollection();
                break;
            default:
                require_once __DIR__ .'/controllers/HomeController.php';
                $home = new HomeController();
                $home->view404();
                break;
        }
    }
?>