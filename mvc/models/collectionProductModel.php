<?php

require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class collectionProductModel extends DB{
    public function collectionProduct(){
        $qr = "SELECT * FROM collectionProduct";
        return $this->conn->query($qr)->fetchAll();
    }
    //admin 
    public function attributeGender() {
        $qr = "SELECT * FROM attribute WHERE type = 'gender'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function attributeSize() {
        $qr = "SELECT * FROM attribute WHERE type = 'size'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function findCollectionProduct($id) {
        $qr = "SELECT * FROM collectionProduct WHERE id = '$id'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function createCollectionProduct($title,$slug,$content,$description) {
        $created_at = date("Y-m-d h:i:s");
        $qr = "INSERT INTO collectionProduct (title,title_en,slug,slug_en,parent_id,image,content,content_en,description,description_en,meta_title,meta_title_en,created_at, updated_at)
        VALUES ('$title','','$slug' ,'' ,0 ,'','$content' ,'', '$description','','' ,'', '$created_at', '$created_at')";
        return $this->conn->query($qr)->fetchAll();
    }
    public function updateCollectionProduct($id,$title,$slug,$content,$description) {
        $created_at = date("Y-m-d h:i:s");
        $qr = "UPDATE collectionProduct SET title ='$title',content ='$content',slug ='$slug',description = '$description', created_at = '$created_at', updated_at = '$created_at' WHERE id = '$id'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function delete($id, $type) {
        $qr = "DELETE FROM $type WHERE id = '$id'";
        return $this->conn->query($qr)->fetchAll();
    }
    
}
?>