
<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class LogModel extends DB{
    public function logs(){
        $qr = "SELECT log.user_id,log.module,log.message,log.created_at,user_admin.fullname  FROM log INNER JOIN user_admin WHERE log.user_id = user_admin.id ";
        return $this->conn->query($qr)->fetchAll();
    }
    // public static function add($module,$message, $data)
    // {
    //     $sesion = Session::get('user');
    //     $newLog = new self();
    //     $newLog->user_id =  $sesion->id;
    //     $newLog->module = $module;
    //     $newLog->message = $message;
    //     $newLog->data = $data;
    //     $newLog->created_at = date('Y-m-d H:i:s');
    //     $newLog->updated_at = date('Y-m-d H:i:s');
    //     $newLog->save();
    //     return $newLog;
    // }
}
?>