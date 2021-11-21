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
        $this->view("layoutAdmin", [
            "Page"=>"product",
            "Number"=> 1,
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
        $this->view("layoutAdmin", [
            "Page"=>"log",

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
        $this->view("layoutAdmin", [
            "Page"=>"collectionProduct",

        ]);
    }

    function collection(){
        $this->view("layoutAdmin", [
            "Page"=>"collection",

        ]);
    }
    function signup(){
        $this->view("layout", [
            "Page"=>"signup",
        ]);
    }
    
}
?>