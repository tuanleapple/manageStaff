<?php

require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class collectionProductModel extends DB{
    public function collectionProduct(){
        $qr = "SELECT * FROM collectionProduct";
        return $this->conn->query($qr)->fetchAll();
    }
}
?>