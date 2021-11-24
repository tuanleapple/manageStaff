<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class productModel extends DB{
    public function product(){
        $qr = "SELECT * FROM product";
        return $this->conn->query($qr)->fetchAll();
    }
    public function productAdmin(){
        $qr = "SELECT p.id,p.title,p.display,p.slug,p.price,p.highlights,p.created_at,p.image,SUM(variant.quality) AS qualityProduct  FROM product AS p INNER JOIN variant ON variant.product_id = p.id ORDER BY created_at DESC";
        return $this->conn->query($qr)->fetchAll();
    }
}
?>