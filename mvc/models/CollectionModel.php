
 
<?php

require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class collectionModel extends DB{
    public function collection(){
        $qr = "SELECT * FROM collection";
        return $this->conn->query($qr)->fetchAll();
    }
    public function createCollection($title,$des,$handle) {
        $created_at = date("Y-m-d h:i:s");
        $qr = "INSERT INTO collection (title, description,parent_id, slug,type,created_at, updated_at)
        VALUES ('$title','$des', '0', '$handle','category', '$created_at', '$created_at')";
        return $this->conn->query($qr)->fetchAll();
    }
    public function updateCollection($id,$title,$des,$handle) {
        $created_at = date("Y-m-d h:i:s");
        $qr = "UPDATE collection SET title ='$title', description = '$des', parent_id = '0', slug = '$handle',type ='category', created_at = '$created_at', updated_at = '$created_at' WHERE id = '$id'";
        return $this->conn->query($qr)->fetchAll();
    }
}
?>