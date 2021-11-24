
 
<?php

require_once $_SERVER['DOCUMENT_ROOT'] .'/mvc/core/DB.php';
class collectionModel extends DB{
    public function collection(){
        $qr = "SELECT * FROM collection";
        return $this->conn->query($qr)->fetchAll();
    }
    // public static function addTag($title)
    // {
    //     $slug =\Str::slug($title);
    //     $collection = Collection::where('slug',$slug)->where('type','tag')->first();
    //     if($collection){
    //         return $collection->id;
    //     }
    //     $collection = new self();
    //     $collection->title = $title;
    //     $collection->slug =  $slug;
    //     $collection->description = "";
    //     $collection->type = "tag";
    //     $collection->created_at = date('Y-m-d H:i:s');
    //     $collection->updated_at = date('Y-m-d H:i:s');
    //     $collection->save();
    //     return $collection->id;

    // }

}
?>