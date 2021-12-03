<?php
require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class productModel extends DB{
    public function product(){
        $qr = "SELECT * FROM product ORDER BY product.created_at DESC";
        return $this->conn->query($qr)->fetchAll();
    }
    public function pagination($page) {
        $sql = 'SELECT * FROM product ORDER BY product.created_at DESC';
        $per_page_html = '';
        if ($page == 1) {
            $page = 1;
        } else {
            $page = $page;
        }

        $start=0;
        $start=($page-1) * ROW_PER_PAGE;
        $limit=" limit " . $start . "," . ROW_PER_PAGE;
        $pagination_statement = $this->conn->prepare($sql);
        $pagination_statement->execute();
    
        $row_count = $pagination_statement->rowCount();

        if (!empty($row_count)) {
            $per_page_html .= "<div style='margin:20px 0px;'>";
            $page_count=ceil($row_count/ROW_PER_PAGE);
            if ($page_count>1) {
                for ($i=1; $i<=$page_count; $i++) {
                    if ($i == $page) {
                        $per_page_html .= '<button class="btn btn-block btn-outline-dark active" type="button" aria-pressed="true" disabled><a href="/page/'.$i.'" style="text-decoration:none">'.$i.'</a></button>';
                    } else {
                        $per_page_html .= '<button class="btn btn-block btn-outline-dark" type="button" aria-pressed="true"><a href="/page/'.$i.'" style="text-decoration:none">'.$i.'</a></button>';
                    }
                }
            }
            $per_page_html .= "</div>";
        }
        $array_p = array();
        $array_p[] = $per_page_html;
        $query = $sql.$limit;
        $pdo_statement = $this->conn->prepare($query);
        $pdo_statement->execute();
        $result = $pdo_statement->fetchAll();
        $array_p[] = $result;
        return $array_p;
    }
    public function productAdmin(){
        $qr = "SELECT product.*,(SELECT SUM(quality) FROM variant WHERE product_id = product.id) AS qualityProduct FROM product ORDER BY product.created_at DESC ";
        return $this->conn->query($qr)->fetchAll();
    }
    public function productTitle($request){
        $qr = "SELECT product.*,(SELECT SUM(quality) FROM variant WHERE product_id = product.id) AS qualityProduct FROM product WHERE product.slug LIKE '$request%' ORDER BY created_at DESC limit 1";
        return $this->conn->query($qr)->fetchAll();
    }
    public function productRelated($id, $collection){
        $qr = "SELECT product.* FROM product WHERE collection_id = $collection AND id != $id  ORDER BY created_at DESC limit 4";
        return $this->conn->query($qr)->fetchAll();
    }
    public function variant($product_id){
        $qr = "SELECT v.id,v.product_id,v.quality,(SELECT title FROM attribute WHERE attribute.ID = v.attribute_id) AS title FROM variant AS v WHERE v.product_id = '$product_id'";
        return $this->conn->query($qr)->fetchAll();
    }

    public function city() {
        $qr = "SELECT * FROM city";
        return $this->conn->query($qr)->fetchAll();
    }
    public function district($id) {
        $qr = "SELECT * FROM district WHERE city_id = '$id'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function ward($id) {
        $qr = "SELECT * FROM ward WHERE district_id = '$id'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function qualityPlus($id, $quality) {
        $qr = "UPDATE cart SET quality = '$quality' WHERE id = '$id'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function billLog() {
        $qr = "";
        return $this->conn->query($qr)->fetchAll();
    }

    public function createProducts($body) {
        $title = $body['title'];
        $slug = $this->convert_handle($body['title']);
        $collection_id = $body['collection'];
        $description = $body['description'];
        $image = $body['first_image'];
        $price = $body['price'];
        $product_gender = $body['gender'];
        $display = $body['display'];
        $list_image = json_encode($body['image']);
        $highlights = $body['highlight'];
        $meta_title = $body['meta_title'];
        $created_at = date("Y-m-d h:i:s");
        $qr = "INSERT INTO product (title,slug,collection_id,image,price,product_gender,description,display,list_image,highlights,meta_title,created_at, updated_at)
        VALUES ('$title','$slug','$collection_id','$image' ,'$price','$product_gender' , '$description','$display','$list_image' ,'$highlights','$meta_title', '$created_at', '$created_at' )";
        $this->conn->query($qr)->fetchAll();
        $qr = "SELECT * FROM product where title = '$title' AND slug = '$slug'";
        $check = $this->conn->query($qr)->fetchAll();
        $product = $check[0]['id'];
        for ($i = 0; $i < count($body['size']) ;$i++) {
            $attribute_id = $body['size'][$i];
            $quality = $body['quality'][$i];
            $qr = "INSERT INTO variant (product_id,attribute_id,quality,created_at, updated_at)
            VALUES ('$product','$attribute_id','$quality', '$created_at', '$created_at' )";
            $this->conn->query($qr)->fetchAll();
        }

        return $check[0];
    }

    function convert_handle($str)
    {
        $str = trim($str);
        $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        $str = preg_replace("/(đ)/", 'd', $str);
        $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        $str = preg_replace("/(Đ)/", 'D', $str);
        $str = str_replace(' ', '-', $str);
        $str = str_replace('.', '-', $str);
        $str = strtolower($str);
        $str = preg_replace('/[^A-Za-z0-9-]+/', '-', $str);
        $str = str_replace('&', '-', $str);
        $str = str_replace('"', '-', $str);
        $str = str_replace('--', '-', $str);
        $str = str_replace('--', '-', $str);
        $str = str_replace('--', '-', $str);
        $str = str_replace('--', '-', $str);
        if (substr($str, -1) == '-') $str = substr($str, 0, -1);
        return $str;
    }
}
?>