<?php

// http://localhost/live/Home/Show/1/2


class HomeController extends BaseController {

        // Must have SayHi()
    function SayHi(){
        $this->view("layout", [
            "Page"=>"main",
            "Number"=> 1,
            "Mau"=>"red",
            "SoThich"=>["A", "B", "C"],
            "SV" => 'testing' 
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