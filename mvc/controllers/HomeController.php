<?php

// http://localhost/live/Home/Show/1/2


class HomeController extends BaseController {

        // Must have SayHi()
    function SayHi(){
        $this->view("layout", [
            "Page"=>"page",
            "Number"=> 1,
            "Mau"=>"red",
            "SoThich"=>["A", "B", "C"],
            "SV" => 'testing' 
        ]);
    }
    
}
?>