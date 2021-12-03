<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class Cookie_tokenModel extends DB{
    public function Cookie_token($cookie_token,$user_id,$cart_id){
        if(!empty($user_id) || !empty($cart_id)){
            $user_id = $user_id;
            $cart_id = $cart_id;
        } else {
            $user_id = '';
            $cart_id = '';
        }
        $created_at = date("Y-m-d h:i:s");
        $qr = "INSERT INTO cookie_token (token_id, user_id, cart_id, created_at, updated_at)
        VALUES ('$cookie_token', '$user_id', '$cart_id', '$created_at','$created_at')";
        return $this->conn->query($qr)->fetchAll();
    }
}
?>
