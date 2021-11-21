<?php
class productModel extends DB {

    public function product(){
        $qr = "SELECT * FROM product";
        return mysqli_query($this->con, $qr);
    }

}
?>