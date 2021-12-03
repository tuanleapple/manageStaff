
 
<?php

require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class cityModel extends DB{
    public function product(){
        $qr = "SELECT * FROM city";
        return $this->conn->query($qr)->fetchAll();
    }
}
?>