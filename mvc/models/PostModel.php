
<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class PostModel extends DB{
    public function add($re)
    {
        $title = $re['title'];
        $content = (string)$re['content'];
        $collection_id = $re['parent_id'];
        $created_at = date("Y-m-d h:i:s");
        $qr = "INSERT INTO post ( title, content, collection_id,created_at, updated_at)
        VALUES ('$title','$content', '$collection_id', '$created_at', '$created_at')";
        $pdo_statement = $this->conn->prepare($qr);
        $pdo_statement->execute();
        return $pdo_statement->fetchAll();
    }
    public function getPost()
    {
        $qr = "SELECT post.*,collection.title AS collectionTitle FROM post INNER JOIN collection WHERE collection.id = post.collection_id ";
        return $this->conn->query($qr)->fetchAll();
    }

    public function findPost($id)
    {
        $qr = "SELECT * FROM post WHERE id = '$id' ";
        return $this->conn->query($qr)->fetchAll();
    }
    public function updatePost($id, $title, $content, $parent_id) {
        $qr = "UPDATE post SET title = '$title',content ='$content', collection_id = '$parent_id' WHERE id = '$id'";
        $this->conn->query($qr)->fetchAll();
    }

    public function news($title)
    {
        $qr = "SELECT * FROM post WHERE collection_id = '$title' ";
        return $this->conn->query($qr)->fetchAll();
    }
}
?>