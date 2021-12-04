
<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class otherModel extends DB{
    public function billLog()
    {
        $qr = "SELECT other.*,(SELECT name FROM city WHERE city.id = other.city_id) AS nameCity,(SELECT name FROM district WHERE district.id = other.district_id) AS nameDistrict,(SELECT name FROM ward WHERE ward.id = other.ward_id) AS nameWard FROM other";
        return $this->conn->query($qr)->fetchAll();
    }
    public function cancel($id)
    {
        $qr = "UPDATE other SET status=4 WHERE id='$id'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function changeStatus($id, $status)
    {
        $qr = "UPDATE other SET status= '$status' WHERE id='$id'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function getbill()
    {
        $checkV = [];
        $arr = [];
        $total = 0;
        $post = $_COOKIE['key_post'];
        $qr = "SELECT * FROM cart WHERE cookie_token = '$post' AND payment=1";
        $check = $this->conn->query($qr)->fetchAll();
        if ($check) {
            foreach ($check as $value) {
                $checkV[] = $value['product_id'];
            }
        }
        $ids = join("','", $checkV);
        $qr = "SELECT image,price FROM product WHERE id IN ('$ids')";
        $checkCart = $this->conn->query($qr)->fetchAll();
        if ($checkCart) {
            foreach ($checkCart as $value) {
                $total += $value['price'];
            }
            
        }
        $arr[0] = $checkCart;
        $arr[1] = $total;
        return $arr;
    }

    public function cus()
    {
        $user_client = $_COOKIE['user_client'];
        $qr = "SELECT * FROM customer WHERE id = '$user_client'";
        return $this->conn->query($qr)->fetchAll();
    }
}
?>