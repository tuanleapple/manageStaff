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
        $products = $this->model('productModel')->productAdmin();
        $this->view("layoutAdmin", [
            "Page"=>"product",
            "products"=> $products,
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
        $log = $this->model('LogModel')->logs();
        $this->view("layoutAdmin", [
            "Page"=>"log",
            "logs"=> $log,
        ]);
    }
    function editProduct($id){
        $collectionProduct = $this->model('collectionProductModel')->collectionProduct();
        $gender = $this->model('collectionProductModel')->attributeGender();
        $size = $this->model('collectionProductModel')->attributeSize();
        $this->view("layoutAdmin", [
            "Page"=>"editProduct",
            "collectionProduct"=>$collectionProduct,
            "gender"=> $gender,
            "size"=>$size,
        ]);
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
        $moduleLog = 'create_collection';
        $messageLog = 'Tạo mới danh muc '.$_POST['title'];
        $this->model('LogModel')->add($moduleLog, $messageLog, json_encode($_POST['title']));
        $success = array('data' => '1');
        return print_r(json_encode($success));
    }
    function editCollection(){
        $id = $_POST['id'];
        $title = $_POST['title'];
        $des = $_POST['des'];
        $handle = $this->convert_handle($title);
        $this->model('collectionModel')->updateCollection($id, $title, $des, $handle);
        $moduleLog = 'edit_collection';
        $messageLog = 'Chỉnh sửa danh muc '.$_POST['title'];
        $this->model('LogModel')->add($moduleLog, $messageLog, json_encode($_POST['title']));
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
        $imageFolder = "public/upload/post/";
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
            if (!in_array(strtolower(pathinfo($temp['name'], PATHINFO_EXTENSION)), array("gif", "jpg", "png"))) {
                header("HTTP/1.1 400 Invalid extension.");
                return;
            }
            
            // Accept upload if there was no origin, or if it is an accepted origin
            $filetowrite = $imageFolder . $temp['name'];
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
    function billLog() {
        $CollectionProduct = $this->model('collectionProductModel')->findCollectionProduct($id);
        $this->view("layoutAdmin", [
            "Page"=>"billLog",
            "CollectionProduct"=>$CollectionProduct[0],
        ]);
    }
    function convert_handle($str)
    {
        $str = trim($str);
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
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