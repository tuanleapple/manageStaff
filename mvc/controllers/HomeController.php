<?php

// http://localhost/live/Home/Show/1/2


class HomeController extends BaseController {

        // Must have SayHi()
    function SayHi(){
        $type = 'ALL COLLECTION';
        $product = $this->model('productModel')->product();
        $collection = $this->model('collectionModel')->collection();
        $collection_product = $this->model('collectionProductModel')->collectionProduct();
        $this->view("layout", [
            "Page"=>"main",
            "product"=> $product,
            "collection"=> $collection,
            "collectionProduct"=> $collection_product,
            "type" => $type 
        ]);
    }
    function view404(){
        $this->view("page404", []);
    }
    function products(){
        $this->view("layout", [
            "Page"=>"page",
            "Number"=> 1,
            "Mau"=>"red",
            "SoThich"=>["A", "B", "C"],
                "SV" => 'testing' 
        ]);
    }

    function carts(){
        $this->view("layout", [
            "Page"=>"cart",
            "Number"=> 1,
            "Mau"=>"red",
            "SoThich"=>["A", "B", "C"],
                "SV" => 'testing' 
        ]);
    }

    function checkout(){
        $this->view("layout", [
            "Page"=>"checkout",

        ]);
    }
    function login(){
        $this->view("layout", [
            "Page"=>"login",

        ]);
    }
    function signup(){
        $this->view("layout", [
            "Page"=>"signup",
        ]);
    }
    
}
?>