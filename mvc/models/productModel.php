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
    public function paginations($page, $id) {
        $sql = "SELECT * FROM product WHERE collection_id = '$id' ORDER BY product.created_at DESC"; 

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
    public function paginationTemplate($page, $qr, $type) {
        $sql = $qr; 
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
                        $per_page_html .= '<button class="btn btn-block btn-outline-dark active" type="button" aria-pressed="true" disabled><a href="/'.$type.'/'.$i.'" style="text-decoration:none">'.$i.'</a></button>';
                    } else {
                        $per_page_html .= '<button class="btn btn-block btn-outline-dark" type="button" aria-pressed="true"><a href="/'.$type.'/'.$i.'" style="text-decoration:none">'.$i.'</a></button>';
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
    public function billLog($body) {
        $cart_id = json_encode($body['cart']);
        $product_image = $this->productImage($body['cart']);
        $customer_id = '';
        $payment_method = 'COD';
        $shipping_price = 0;
        $customer_name = $body['fullname'];
        $status = 1;
        $tax = $body['tax'];
        $total = $this->total($body['cart']);
        $sum_price = $total;
        $total_price = $total;
        $created_at = date('Y-m-d H:i:s');
        $city_id = $body['city'];
        $district_id = $body['district'];
        $ward_id = $body['ward'];
        $info = $body['address'];
        $qr = "INSERT INTO other (product_image,updated_at,ward_id,info,created_at,total_price,city_id,district_id,status,tax,sum_price,cart_id,customer_id,payment_method,shipping_price, customer_name)
        VALUES ('$product_image','$created_at','$ward_id','$info','$created_at','$total_price','$city_id','$district_id','$status','$tax','$sum_price','$cart_id','$customer_id','$payment_method', '$shipping_price', '$customer_name' )";
        return $this->conn->query($qr)->fetchAll();
    }
    public function productImage($cart)
    {
        $checkarr = [];
        $image = [];
        $checkV  = join("','", $cart); 
        $qr = "SELECT product_id FROM cart WHERE id IN ('$checkV')";
        $check = $this->conn->query($qr)->fetchAll();
        foreach ($check as $value) {
            $checkarr[] = $value['product_id'];
        }
        $checkimage = join("','", $checkarr);
        $qr = "SELECT image FROM product WHERE id IN ('$checkimage')";
        $check = $this->conn->query($qr)->fetchAll();
        if ($check) {
            foreach ($check as $value) {
                $image[] = $value['image'];
            }
            return json_encode($image);
        }
        return '';
    }
    public function total($ids) {
        $total = 0;
        $checkV  = join("','", $ids); 
        $qr = "SELECT * FROM cart WHERE id IN ('$checkV')";
        $check = $this->conn->query($qr)->fetchAll();
        foreach($check as $value){
            $this->paymentCart($value['id']);
            $priceTotal = $this->price($value['product_id']);
            $total += $priceTotal[0]['price'] * $value['quality'];
        }
        return $total;
    }
    public function price($id)
    {
        $qr = "SELECT price FROM product WHERE id = '$id'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function paymentCart($id)
    {
        $qr = "UPDATE cart SET payment = 1 WHERE id = '$id'";
        $this->conn->query($qr)->fetchAll();
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

    public function editProducts($body) {
        $id = $body['id'];
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
        $qr = "UPDATE product SET updated_at = '$created_at',highlights = '$highlights',meta_title ='$meta_title',description = '$description',product_gender ='$product_gender', display = '$display',list_image ='$list_image', title = '$title',slug ='$slug', collection_id = '$collection_id' ,image ='$image',price='$price' WHERE id = '$id'";
        $this->conn->query($qr)->fetchAll();
        $qr = "SELECT * FROM product where title = '$title' AND slug = '$slug'";
        $check = $this->conn->query($qr)->fetchAll();
        $product = $check[0]['id'];
        for ($i = 0; $i < count($body['size']) ;$i++) {
            $attribute_id = $body['size'][$i];
            $quality = $body['quality'][$i];
            $this->checkVariant($product, $attribute_id, $quality);
        }
        return $check[0];
    }

    public function checkVariant($product, $attribute_id, $quality) {
        $qr = "SELECT * FROM variant WHERE product_id = '$product' AND attribute_id='$attribute_id'";
        $check =  $this->conn->query($qr)->fetchAll();
        $check = $check[0];
        $created_at = date("Y-m-d h:i:s");
        if (!empty($check)) {
            $qr = "UPDATE variant SET quality='$quality' WHERE product_id='$product' AND attribute_id='$attribute_id'";
            $this->conn->query($qr)->fetchAll();
        } else {
            $qr = "INSERT INTO variant (product_id,attribute_id,quality,created_at, updated_at)
            VALUES ('$product','$attribute_id','$quality', '$created_at', '$created_at' )";
            $this->conn->query($qr)->fetchAll();
        }
    }

    // edit product
    public function productPage($id) {
        $checkV = array();
        $optionCheck = '';
        $product = $this->findProduct($id);
        $product = $product[0];
        $gender = $this->gender();
        $qr = "SELECT variant.*,(SELECT title FROM attribute WHERE attribute.id =variant.attribute_id) AS title FROM variant WHERE variant.product_id = '$id'";
        $variant = $this->conn->query($qr)->fetchAll();
        $collectionProduct = $this->getCollectionProduct();
        if(!empty($variant)){
            $variantCheck = $variant;
            if($variantCheck){
                foreach($variantCheck as $key => $value){
                    $checkV[$key] = $value['attribute_id'];
                }
            }

            $size = $this->sizeArray($checkV);
            $sizeNoCheck = $this->sizeArrayNo($checkV);
            if($size || $sizeNoCheck) {
                foreach($size as $value){
                    $optionCheck .= '<option value="'.$value['id'].'" data-size="'.$value['title'].'" selected disabled >'.$value['title'].'</option>';
                }
                foreach($sizeNoCheck as $value){
                    $optionCheck .= '<option value="'.$value['id'].'" data-size="'.$value['title'].'" >'.$value['title'].'</option>';
                }
            }
            $arr = array();
            $arr[0] = $product;
            $arr[1] = $collectionProduct;
            $arr[2] = $gender;
            $arr[3] = $size;
            $arr[4] = $variant;
            $arr[5] = $optionCheck;
            return $arr;
        }

        $qr = "";
        return $this->conn->query($qr)->fetchAll();
    }
    public function findProduct($id) {
        $qr = "SELECT * FROM product WHERE id = '$id'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function gender() {
        $qr = "SELECT * FROM Attribute WHERE type = 'gender'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function variantCheck($id) {
        $qr = "SELECT attribute_id FROM variant WHERE product_id = '$id'";
        return $this->conn->query($qr)->fetch();
    }
    public function sizeArray($checkV = []) {
        $ids = join("','", $checkV); 
        $qr = "SELECT * FROM Attribute WHERE id IN ('$ids') AND type = 'size'";
        return $this->conn->query($qr)->fetchAll();
    }
    public function getCollectionProduct() {
        $qr = "SELECT * FROM collectionProduct";
        return $this->conn->query($qr)->fetchAll();
    }
    public function deleteVariant($id) {
        $qr = "DELETE FROM variant WHERE id = '$id'";
        return $this->conn->query($qr)->fetchAll();
    }

    public function sizeArrayNo($checkV = []) {
        $ids = join("','", $checkV); 
        $qr = "SELECT * FROM Attribute WHERE id NOT IN ('$ids') AND type = 'size'";
        return $this->conn->query($qr)->fetchAll();
    }
    // helper
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