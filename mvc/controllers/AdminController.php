<?php

// http://localhost/live/Home/Show/1/2


class AdminController extends BaseController {

    function loginAdmin(){
        $this->view("login", []);
    }

    function view404(){
        $this->view("page404", []);
    }

    function users(){
        $users = $this->model('userAdminModel')->user_admin();
        $this->view("layoutAdmin", [
            "Page"=>"user",
            "users"=> $users
        ]);
    }
    
    function product(){
        $qr = "SELECT product.*,(SELECT SUM(quality) FROM variant WHERE product_id = product.id) AS qualityProduct FROM product ORDER BY product.created_at DESC ";
        $products = $this->model('productModel')->paginationTemplate($page = 1, $qr, 'product');
        $this->view("layoutAdmin", [
            "Page"=>"product",
            "products"=> $products[1],
            "pagination" => $products[0],
        ]);
    }
    function productPage($page) {
        $qr = "SELECT product.*,(SELECT SUM(quality) FROM variant WHERE product_id = product.id) AS qualityProduct FROM product ORDER BY product.created_at DESC ";
        $products = $this->model('productModel')->paginationTemplate($page, $qr, 'product');
        $this->view("layoutAdmin", [
            "Page"=>"product",
            "products"=> $products[1],
            "pagination" => $products[0],
        ]);
    }
    function post(){
        $post = $this->model('PostModel')->getPost();
        $this->view("layoutAdmin", [
            "Page"=>"post",
            "post"=> $post,
        ]);
    }

    function log(){
        $qr = "SELECT log.user_id,log.module,log.message,log.created_at,user_admin.fullname  FROM log INNER JOIN user_admin WHERE log.user_id = user_admin.id ";
        $log = $this->model('productModel')->paginationTemplate($page = 1, $qr, 'log');
        $this->view("layoutAdmin", [
            "Page"=>"log",
            "logs"=> $log[1],
            "pagination" => $log[0],
        ]);
    }

    function logPage($page){
        $qr = "SELECT log.user_id,log.module,log.message,log.created_at,user_admin.fullname  FROM log INNER JOIN user_admin WHERE log.user_id = user_admin.id ";
        $log = $this->model('productModel')->paginationTemplate($page, $qr, 'log');
        $this->view("layoutAdmin", [
            "Page"=>"log",
            "logs"=> $log[1],
            "pagination" => $log[0],
        ]);
    }

    function editProduct($id){
        $product = $this->model('productModel')->productPage($id);
        $this->view("layoutAdmin", [
            "Page"=>"editProduct",
            "product"=>$product,
        ]);
    }
    function editProducts(){
        $product = $this->model('productModel')->editProducts($_POST);
        if ($product) {
            $success = array('data' => '1');
            return print_r(json_encode($success));
        }
    }

    function createProduct(){
        $collectionProduct = $this->model('collectionProductModel')->collectionProduct();
        $gender = $this->model('collectionProductModel')->attributeGender();
        $size = $this->model('collectionProductModel')->attributeSize();
        $this->view("layoutAdmin", [
            "Page"=>"createProduct",
            "collectionProduct"=>$collectionProduct,
            "gender"=> $gender,
            "size"=>$size,
        ]);
    }
    function createProducts(){
        $product = $this->model('productModel')->createProducts($_POST);
        if ($product) {
            $success = array('data' => '1');
            return print_r(json_encode($success));
        }
      
    }

    function createPost(){
        $this->view("layoutAdmin", [
            "Page"=>"createPost",
        ]);
    }

    function createUser(){
        $this->model('userAdminModel')->createUser($_POST);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }

    function editUser(){
        $this->model('userAdminModel')->editUser($_POST);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }

    function findUser(){
        $check = $this->model('userAdminModel')->findUser($_POST['id']);
        $success = array('data' => '1','user' => $check[0]);
        return print_r(json_encode($success));
    }

    function createCollection(){
        $title = $_POST['title'];
        $des = $_POST['des'];
        $handle = $this->convert_handle($title);
        $this->model('collectionModel')->createCollection($title, $des, $handle);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }

    function editCollection(){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $des = $_POST['des'];
        $handle = $this->convert_handle($title);
        $this->model('collectionModel')->updateCollection($id, $title, $des, $handle);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }

    function collectionProduct(){
        $collectionProduct = $this->model('collectionProductModel')->collectionProduct();
        $gender = $this->model('collectionProductModel')->attributeGender();
        $size = $this->model('collectionProductModel')->attributeSize();
        $this->view("layoutAdmin", [
            "Page"=>"collectionProduct",
            "collectionProduct"=>$collectionProduct,
            "gender"=> $gender,
            "size"=>$size,
        ]);
    }

    function createProductimage()
    {
        $images = array();
        $uploads_dir = getcwd().DIRECTORY_SEPARATOR .'public/upload/product/';
        foreach ($_FILES["file"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["file"]["tmp_name"][$key];
                $name = hexdec(uniqid()) .'.'. pathinfo($_FILES["file"]["name"][$key], PATHINFO_EXTENSION);
                move_uploaded_file($tmp_name, "$uploads_dir/$name");
                $images[]=$name;
            }
        }
        $success = array('data' => '1','images'=>$images);
        return print_r(json_encode($success));
    }

    function createImage()
    {
        $uploads_dir = getcwd().DIRECTORY_SEPARATOR .'public/upload/post/';
        $tmp_name = $_FILES["post-image"]["tmp_name"];
        $name = hexdec(uniqid()) .'.'. pathinfo($_FILES["post-image"]["name"], PATHINFO_EXTENSION);
        move_uploaded_file($tmp_name, "$uploads_dir/$name");
        $success = array('data' => '1','name'=>$name);
        return print_r(json_encode($success));
    }

    function tinymceUploadImage()
    {
        if (isset($_SERVER['HTTPS'])) {
            $protocol = ($_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
        } else {
            $protocol = 'http';
        }
        $mainUrl = DIRECTORY_SEPARATOR;
        $imageFolder ="public/upload/post/";
        if (!is_dir($imageFolder)) {
            mkdir($mainUrl . $imageFolder, 0777);
        }
        reset($_FILES);
        $temp = current($_FILES);
        if ($temp['tmp_name']) {
            header('Access-Control-Allow-Origin: ' . $_SERVER['HTTP_ORIGIN']);
            // Sanitize input
            if (preg_match("/([^\w\s\d\-_~,;:\[\]\(\).])|([\.]{2,})/", $temp['name'])) {
                header("HTTP/1.1 400 Invalid file name.");
                return;
            }
            // Verify extension
            if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif","jpeg", "jpg", "png"))) {
                header("HTTP/1.1 400 Invalid extension.");
                return;
            }
            
            // Accept upload if there was no origin, or if it is an accepted origin
            $filetowrite = $imageFolder . $temp['name'];
            // var_dump($temp['tmp_name']);die;
            move_uploaded_file($temp['tmp_name'], $filetowrite);
            $arr = array(
                'code' => 1,
                'filename' => $filetowrite,
                'location' => $mainUrl . $filetowrite
            );
            return print_r(json_encode($arr));
        }
    }

    function productDeleteImage()
    {
        $image_path = getcwd().DIRECTORY_SEPARATOR . "public/upload/product/".$_POST['image']; 
        if (file_exists($image_path)) {
            unlink($image_path);
            $success = array('data' => '1');
            return print_r(json_encode($success));
        }
    }

    function createPostAdmin()
    {
        $this->model('PostModel')->add($_POST);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }

    function collection(){
        $collection = $this->model('collectionModel')->collection();
        $this->view("layoutAdmin", [
            "Page"=>"collection",
            "collection"=>$collection,
        ]);
    }

    function getCollection(){
        $collection = $this->model('collectionModel')->collection();
        $success = array('data' => '1','collection'=>$collection);
        return print_r(json_encode($success));
    }

    function signup(){
        $this->view("layout", [
            "Page"=>"signup",
        ]);
    }

    function checkLogin(){
        $user = $_POST["user"];
        $pwd = $_POST["password"];
        $check = $this->model('userAdminModel')->checkLogin($user);
        if (password_verify($pwd, $check[0]['password'])) {
            $success = array('data' => '1');
            $_SESSION["user"]=$check[0]['id'];
            return print_r(json_encode($success));
        }
    }

    function createCollectionProduct(){
        $this->view("layoutAdmin", [
            "Page"=>"createCollectionProduct",
        ]);
    }

    function collectionProductCreate(){
        $title = $_POST["title"];
        $content = $_POST["content"];
        $description = $_POST["description"];
        $slug = $this->convert_handle($_POST["title"]);
        $this->model('collectionProductModel')->createCollectionProduct($title, $slug, $content, $description);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }

    function collectionProductEdit(){
        $id = $_POST["id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $description = $_POST["description"];
        $slug = $_POST["slug"];
        $this->model('collectionProductModel')->updateCollectionProduct($id, $title, $slug, $content, $description);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }

    function editPostAdmin(){
        $id = $_POST["id"];
        $title = $_POST["title"];
        $content = $_POST["content"];
        $parent_id = $_POST["parent_id"];
        $this->model('PostModel')->updatePost($id, $title, $content, $parent_id);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }

    function editCollectionProduct($id) {
        $CollectionProduct = $this->model('collectionProductModel')->findCollectionProduct($id);
        $this->view("layoutAdmin", [
            "Page"=>"editCollectionProduct",
            "CollectionProduct"=>$CollectionProduct[0],
        ]);
    }

    function editPost($id) {
        $editPost = $this->model('PostModel')->findPost($id);
        $this->view("layoutAdmin", [
            "Page"=>"editPost",
            "post"=>$editPost[0],
        ]);
    }

    function delete() {
        $id = $_POST["id"];
        $type = $_POST["type"];
        $this->model('collectionProductModel')->delete($id, $type);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }

    function cancel() {
        $this->model('otherModel')->cancel($_POST['id']);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }

    function changeStatus() {
        $this->model('otherModel')->changeStatus($_POST['id'], $_POST['status']);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }

    function deleteVariant() {
        $this->model('ProductModel')->deleteVariant($_POST['id']);
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }

    function billLog() {
        $billLog = $this->model('otherModel')->billLog();
        $this->view("layoutAdmin", [
            "Page"=>"billLog",
            "billLog"=>$billLog,
        ]);
    }

    function convert_handle($str)
    {
        $str = trim($str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'a', $str);
        $str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'e', $str);
        $str = preg_replace("/(??|??|???|???|??)/", 'i', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'o', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'u', $str);
        $str = preg_replace("/(???|??|???|???|???)/", 'y', $str);
        $str = preg_replace("/(??)/", 'd', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'A', $str);
        $str = preg_replace("/(??|??|???|???|???|??|???|???|???|???|???)/", 'E', $str);
        $str = preg_replace("/(??|??|???|???|??)/", 'I', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???|??|???|???|???|???|???)/", 'O', $str);
        $str = preg_replace("/(??|??|???|???|??|??|???|???|???|???|???)/", 'U', $str);
        $str = preg_replace("/(???|??|???|???|???)/", 'Y', $str);
        $str = preg_replace("/(??)/", 'D', $str);
        $str = str_replace(' ', '-', $str);
        $str = str_replace('.', '-', $str);
        $str = strtolower($str);
        $str = preg_replace('/[^A-Za-z0-9-]+/', '-', $str);
        $str = str_replace('&', '-', $str);
        $str = str_replace('"', '-', $str);
        $str = str_replace('--', '-', $str);
        $str = str_replace('--', '-', $str);
        $str = str_replace('--', '-', $str);
        $str = str_replace('--', '-', $str);
        if (substr($str, -1) == '-') $str = substr($str, 0, -1);
        return $str;
    }
    
}
?>