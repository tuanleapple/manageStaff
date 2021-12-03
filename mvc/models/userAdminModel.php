
<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class userAdminModel extends DB{
    public function user_admin(){
        $qr = "SELECT * FROM user_admin";
        return $this->conn->query($qr)->fetchAll();
    }

    public function checkLogin($email){
        $qr = "SELECT * FROM user_admin WHERE email = '$email'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function checkLoginClient($email){
        $qr = "SELECT * FROM customer WHERE email = '$email'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function createUser($res) {
        $user = $res['username'];
        $password = password_hash($res['password'], PASSWORD_DEFAULT);
        $email = $res['email'];
        $role = $res['role'];
        $created_at = date("Y-m-d h:i:s");
        $qr = "INSERT INTO user_admin (fullname,password,email,role,created_at, updated_at)
        VALUES ('$user','$password' ,'$email' ,'$role','$created_at', '$created_at')";
        return $this->conn->query($qr)->fetchAll();
    }
    public function findUser($id){
        $qr = "SELECT * FROM user_admin WHERE id = '$id'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function editUser($res) {
        $id = $res['id'];
        $user = $res['username'];
        $email = $res['email'];
        $role = $res['role'];
        $created_at = date("Y-m-d h:i:s");
        if ($res['password']) {
            $password = password_hash($res['password'], PASSWORD_DEFAULT);
            $qr = "UPDATE user_admin SET fullname = '$user', email = '$email', role = '$role', password = '$password' WHERE id = '$id'";
        } else {
            $qr = "UPDATE user_admin SET fullname = '$user', email = '$email', role = '$role' WHERE id = '$id'";
        }
        return $this->conn->query($qr)->fetchAll();
    }
}
?>