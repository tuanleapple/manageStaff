<?php


class HomeController extends BaseController {
    function setCookieClient() {
        $random = $this->generateRandomString();
        //30 day
        $this->model('Cookie_tokenModel')->Cookie_token($random, '', '');
        setcookie("key_post", $random, time()+31556926);
    }

    function generateRandomString($length = 15) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    function SayHi(){
        $type = 'ALL COLLECTION';
        $product = $this->model('productModel')->product();
        $collection = $this->model('collectionModel')->collection();
        $collection_product = $this->model('collectionProductModel')->collectionProduct();
        $pagination = $this->model('productModel')->pagination($page = 1);
        $product = $pagination[1];
        $cart = $this->model('cartModel')->cart();
        $this->view("layout", [
            "Page"=>"main",
            "product"=> $product,
            "collection"=> $collection,
            "collectionProduct"=> $collection_product,
            "type" => $type,
            "cart" => $cart,
            "pagination" => $pagination[0],
        ]);
    }
    function collections($id){
        $type = 'ALL COLLECTION';
        $product = $this->model('productModel')->product();
        $collection = $this->model('collectionModel')->collection();
        $collection_product = $this->model('collectionProductModel')->collectionProduct();
        $pagination = $this->model('productModel')->paginations($page = 1, $id);
        $product = $pagination[1];
        $cart = $this->model('cartModel')->cart();
        $this->view("layout", [
            "Page"=>"main",
            "product"=> $product,
            "collection"=> $collection,
            "collectionProduct"=> $collection_product,
            "type" => $type,
            "cart" => $cart,
            "pagination" => $pagination[0],
        ]);
    }
    function page($page) {
        $type = 'ALL COLLECTION';
        $product = $this->model('productModel')->product();
        $collection = $this->model('collectionModel')->collection();
        $collection_product = $this->model('collectionProductModel')->collectionProduct();
        $pagination = $this->model('productModel')->pagination($page);
        $product = $pagination[1];
        $cart = $this->model('cartModel')->cart();
        $this->view("layout", [
            "Page"=>"main",
            "product"=> $product,
            "collection"=> $collection,
            "collectionProduct"=> $collection_product,
            "type" => $type,
            "cart" => $cart,
            "pagination" => $pagination[0],
        ]);
    }
    function new($title) {
        $type = 'NEWS';
        $collection = $this->model('collectionModel')->collection();
        $cart = $this->model('cartModel')->cart();
        $post = $this->model('PostModel')->news($title);
        $this->view("layout", [
            "Page"=>"new",
            "collection"=> $collection,
            "type" => $type,
            "cart" => $cart,
            "content" => $post[0]['content'],
        ]);
    }
    function view404(){
        $this->view("page404", []);
    }
    function products($request){
        if($request) {
            $type = 'ALL COLLECTION';
            $collection = $this->model('collectionModel')->collection();
            $productInfo = $this->model('productModel')->productTitle($request);
            $productRelated = $this->model('productModel')->productRelated($productInfo[0]['id'], $productInfo[0]['collection_id']);
            $variant = $this->model('productModel')->variant($productInfo[0]['id']);
            $productTitle = $productInfo[0]['title'];
            $cart = $this->model('cartModel')->cart();
            $this->view("layout", [
                "Page"=>"page",
                "collection"=> $collection,
                "type" => $type,
                "productInfo" => $productInfo[0],
                "productRelated" => $productRelated,
                "variant" => $variant,
                "productTitle" => $productTitle,
                "cart" => $cart,
            ]);
        }
    }

    function carts(){
        $type = 'carts';
        $product = $this->model('productModel')->product();
        $collection = $this->model('collectionModel')->collection();
        $cart = $this->model('cartModel')->cart();
        $this->view("layout", [
            "Page"=>"cart",
            "collection"=> $collection,
            "product"=> $product,
            "type" => $type,
            "cart" => $cart,
        ]);
    }
    function addCart(){
        $this->model('cartModel')->addCart($_POST);
    }
    function getCity(){
        $City = $this->model('productModel')->city();
        $success = array('data' => '1','city'=> $City);
        return print_r(json_encode($success));
    }
    function qualityPlus(){
        $id = $_POST['id'];
        $quality = $_POST['quality'];
        $this->model('productModel')->qualityPlus($id, $quality);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }
    function getDistrict($id) {
        $District = $this->model('productModel')->district($id);
        $success = array('data' => '1','district'=> $District);
        return print_r(json_encode($success));
    }
    function getWard($id){
        $Ward = $this->model('productModel')->ward($id);
        $success = array('data' => '1','ward'=>$Ward);
        return print_r(json_encode($success));
    }
    function checkout(){
        $cart = $this->model('cartModel')->cart();
        $total = 0;
        if(!empty($cart)){
            foreach($cart as $value){
                $total = $total + ($value['price'] * $value['quality']);
            }
        }
        $this->view("checkout", [
            "Page"=>"checkout",
            "cart"=> $cart,
            "total"=> $total,
        ]);
    }
    function checkoutCart(){
        $this->model('ProductModel')->billLog($_POST);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }
    function login(){
        if (isset($_COOKIE["user_client"])) {
            $this->account();
        }
            $type = 'Login';
            $collection = $this->model('collectionModel')->collection();
            $cart = $this->model('cartModel')->cart();
            $this->view("layout", [
                "Page"  =>"login",
                "type" => $type,
                "collection" => $collection,
                "cart" => $cart,
            ]);
    }
    function signup(){
        if (isset($_COOKIE["user_client"])) {
            $this->account();
        }
        $type = 'Sign In';
        $collection = $this->model('collectionModel')->collection();
        $cart = $this->model('cartModel')->cart();
        $this->view("layout", [
            "Page"  =>"signup",
            "type" => $type,
            "collection" => $collection,
            "cart" => $cart,
        ]);
    }
    function checkLoginClient(){
        $user = $_POST["email"];
        $pwd = $_POST["password"];
        $check = $this->model('userAdminModel')->checkLoginClient($user);
        if (password_verify($pwd, $check[0]['password'])) {
            setcookie("user_client", $check[0]['id'], time()+31556926);
            $success = array('data' => '1');
            return print_r(json_encode($success));
        }
    }
    function account(){
        if (isset($_COOKIE["user_client"])) {
            $type = 'User';
            $getbill = $this->model('otherModel')->getbill();
            $cus = $this->model('otherModel')->cus();
            $collection = $this->model('collectionModel')->collection();
            $cart = $this->model('cartModel')->cart();
            $this->view("layout", [
                "Page"  =>"view",
                "type" => $type,
                "cus" => $cus[0],
                "getbill" => $getbill,
                "collection" => $collection,
                "cart" => $cart
            ]);
        }

    }
}
?>