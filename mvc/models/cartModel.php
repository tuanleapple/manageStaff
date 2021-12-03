<?php

require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class cartModel extends DB{
    public function cart(){
        $cookie =  $_COOKIE['key_post'];
        $qr = "SELECT cart.id,cart.payment,cart.product_id,product.image,product.slug,product.price,cart.quality,cart.size,product.title
        FROM cart,product WHERE cookie_token='$cookie' AND cart.payment<1 AND product.id = cart.product_id";
        return $this->conn->query($qr)->fetchAll();
    }

    public function addCart($request)
    {
        $id = $request['id'];
        $size = $request['size'];
        $cookie =  $_COOKIE['key_post'];
        $qr = "SELECT * FROM cart WHERE size = '$size' AND cookie_token = '$cookie' AND product_id = '$id' ";
        $findId =  $this->conn->query($qr)->fetchAll();
        if (!empty($findId)) {
            $cart = $this->updateCart($findId[0]['id'], $findId[0]['product_id'],  $findId[0]['size'], $findId[0]['quality'] + $request['quality'], $findId[0]['price']);
            $check = $this->findCartProduct($cart[0]['product_id']);
            $success = array('data' => '1','update' => '1','cart'=> $check[0]);
            return print_r(json_encode($success));

        } else {
            $cart = $this->createCart($request);
            $check = $this->findCartProduct($cart[0]['product_id']);
            $success = array('data' => '1','update' => '0','cart'=> $check[0]);
            return print_r(json_encode($success));
        }
    }

    public function createCart($request) {
        $product_id = $request['id'];
        $size = $request['size'];
        $price = $request['price'];
        $quality = $request['quality'];
        $cookie =  $_COOKIE['key_post'];
        $created_at = date("Y-m-d h:i:s");
        $qr = "INSERT INTO cart (product_id, size, quality, price, payment, cookie_token, user_id, created_at, updated_at)
        VALUES ('$product_id', '$size', '$quality', '$price', 0, '$cookie', NULL, '$created_at', '$created_at')";
        $this->conn->query($qr)->fetchAll();
        $qr = "SELECT * FROM cart WHERE size = '$size' AND cookie_token = '$cookie' AND product_id = '$product_id' ";
        return $this->conn->query($qr)->fetchAll();

    }
    public function findOneCart($id)
    {
        $qr = "SELECT * FROM cart WHERE id = '$id'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function findCartProduct($id)
    {
        $qr = "SELECT * FROM cart,product WHERE cart.product_id = '$id' AND cart.product_id = product.id ";
        return $this->conn->query($qr)->fetchAll();
    }
    public function updateCart($id, $product_id, $size, $quality,$price) {
        $cookie =  $_COOKIE['key_post'];
        $created_at = date("Y-m-d h:i:s");
        $qr = "UPDATE cart SET price = '$price',product_id ='$product_id', size = '$size', quality = '$quality', price = NULL , payment = 0, cookie_token = '$cookie', user_id = NULL, created_at = '$created_at', updated_at = '$created_at' WHERE id = '$id'";
        $this->conn->query($qr)->fetchAll();
        $qr = "SELECT * FROM cart WHERE size = '$size' AND cookie_token = '$cookie' AND product_id = '$product_id' ";
        return $this->conn->query($qr)->fetchAll();
    }
}
?>