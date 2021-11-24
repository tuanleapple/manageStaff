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
        $this->view("layoutAdmin", [
            "Page"=>"user",
        ]);
    }
    function product(){
        $product = $this->model('productModel')->productAdmin();
        $this->view("layoutAdmin", [
            "Page"=>"product",
            "products"=> $product,
            "Mau"=>"red",
            "SoThich"=>["A", "B", "C"],
                "SV" => 'testing' 
        ]);
    }

    function post(){
        $this->view("layoutAdmin", [
            "Page"=>"post",

        ]);
    }
    function log(){
        $log = $this->model('LogModel')->logs();
        // var_dump($log);die;
        $this->view("layoutAdmin", [
            "Page"=>"log",
            "logs"=> $log,
        ]);
    }
    function editProduct(){
        $this->view("layoutAdmin", [
            "Page"=>"editProduct",
        ]);
    }

    function createProduct(){
        $this->view("layoutAdmin", [
            "Page"=>"createProduct",

        ]);
    }
    function createPost(){
        $this->view("layoutAdmin", [
            "Page"=>"createPost",

        ]);
    }
    function createCollection(){
        $this->view("layoutAdmin", [
            "Page"=>"createCollection",

        ]);
    }

    function collectionProduct(){
        $collectionProduct = $this->model('collectionProductModel')->collectionProduct();
        $this->view("layoutAdmin", [
            "Page"=>"collectionProduct",
            "collectionProduct"=>$collectionProduct,
        ]);
    }

    function collection(){
        $collection = $this->model('collectionModel')->collection();
        $this->view("layoutAdmin", [
            "Page"=>"collection",
            "collection"=>$collection,
        ]);
    }
    function signup(){
        $this->view("layout", [
            "Page"=>"signup",
        ]);
    }
    
}
?>