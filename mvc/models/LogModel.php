
<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class LogModel extends DB{
    public function add($module,$message, $data)
    {
        $sesion = $_SESSION['user'];
        $created_at = date("Y-m-d h:i:s");
        $qr = "INSERT INTO log (user_id, module, message, data,created_at, updated_at)
        VALUES ('$sesion','$module', '$message', '$data', '$created_at', '$created_at')";
        return $this->conn->query($qr)->fetchAll();
    }
}
?>