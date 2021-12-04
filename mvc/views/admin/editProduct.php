
<link rel="stylesheet" href="http://127.0.0.1:8080/public/js/select2/dist/css/select2.min.css">
<script type="text/javascript" src="http://127.0.0.1:8080/public/js/components/productCreate.js"></script>
<div class="breadcrumb">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Product</li>
        <li class="breadcrumb-item">Edit Product</li>
    </ol>
</div>
<div class="page-main-create">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left-item">
                Edit Product
            </div>
            <div class="card-header-right-item">
                <button class="btn btn-block btn-primary active" id="editCollectionProduct" data-id={{$product['id']}} type="button"
                    aria-pressed="true">
                    <li style="list-style: none"><a style="color:#fff;text-decoration:none" >Lưu</a></li>
                </button>
                <button class="btn btn-block btn-primary active" type="button"
                    aria-pressed="true">
                    <li style="list-style: none"><a style="color:#fff;text-decoration:none;" href="/product">Huỷ</a></li>
                </button>
            </div>
        </div>
        <div class="card-body">
             <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Title<span><strong style="color:red"> *</strong></span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"name="title" id="title" value="<?= $data['product'][0]['title'];  ?>" />
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label  class="col-sm-2 col-form-label">Collection</label>
                <div class="col-sm-10">
                    <select id="selectCollection" name="selectCollection">
                        <option value="-1">Please choose parent collecion ...</option>
                        <?php foreach($data['product'][1] as $value) : ?>
                            <?php if($value['id'] == $data['product'][0]['collection_id']) :?>
                                <option value=<?= $value['id']?> selected ><?= $value['title']?></option>
                            <?php else:?>
                                <option value=<?= $value['id']?>><?= $value['title']?></option>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Image<span></label>
                <div class="col-sm-10">
                    <form class="form-feature-product" enctype="multipart/form-data">
                        <input class="form-control" type="file" name="images[]" multiple/>
                    </form>
                    <div class="image_upload">
                        <?php foreach(json_decode($data['product'][0]['list_image']) as $value) : ?>
                            <div class="item" data-getImage=<?= $value?>><a class="image_a_upload">
                                <img src="http://127.0.0.1:8080/public/upload/product/<?= $value?>" style="padding: 0.25rem;"/></a><i class="fas fa-times item-icon" data-image=<?= $value?>></i>
                            </div>
                        <?php endforeach;?>
                    </div>
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea type="text" id="description" class="form-control" rows="6" cols="50" value="<?= $data['product'][0]['description'] ?>" ><?= $data['product'][0]['description'] ?></textarea>
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <select id="selectGender" name="selectGender">
                        <option value="-1" checked>Please choose gender ...</option>
                        <?php foreach($data['product'][2] as $value) : ?>
                            <?php if($value['id'] == $data['product'][0]['product_gender']) :?>
                                <option value=<?= $value['id']?> selected ><?= $value['title']?></option>
                            <?php else:?>
                                <option value=<?= $value['id']?>><?= $value['title']?></option>
                            <?php endif;?>
                        <?php endforeach;?>
                    </select>
                </div>
        
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Size</label>
                <div class="col-sm-9">
                    <select id="selectSize" name="selectSize">
                        <option value="-1" selected disabled>Please choose size ...</option>
                        <?php if(!empty($data['product'][5])) : ?>
                            <?= $data['product'][5] ?>
                        <?php else:?>
                            <?php foreach($data['product'][3] as $value) : ?>
                                <option value="<?= $value['id']?>"><?= $value['title']?></option>
                            <?php endforeach;?>
                        <?php endif;?>
                    </select>
                </div>
                <div class="col-sm-1"><button type="button" class="btn btn-block btn-dart " id="plus-size" type="button" aria-pressed="true"><i class="fas fa-plus"></i></button></div>
              </div>
                <div class="form-group row m-g-1 attribute-size">
                    <label class="col-sm-2 col-form-label attribute-title">
                        <span>Các Size Đã Chọn : </span>
                        <?php foreach($data['product'][4] as $value) : ?>
                        <span class="attribute-<?= $value['title']?> span-attribute" ><?= $value['title']?></span>
                        <?php endforeach;?>
                    </label>
                    <div class="col-sm-10 attribute-size-info">
                        <div class="row attribute-size-info-row">
                            <div class="col-sm-2 size">Size </div><div class="col-sm-10 quality-size"> Số Lượng</div>
                            <?php foreach($data['product'][4] as $value) : ?>
                            <div class="attribute-info-<?= $value['title']?> atribute-info-css"><div class="row"><div class="col-sm-2"><label><?= $value['title']?></label></div><div class="col-sm-8"><input class="input-size-quality" placeholder="Vui Lòng nhập số lượng của size tương ứng " value="<?= $value['quality']?>" data-size-attribute="<?= $value['attribute_id']?>"/></div><div class=" col-sm-2 delete-icon" data-delete-size="<?= $value['title']?>" data-variant="<?= $value['id']?>" data-id="<?= $value['attribute_id']?>"><i class="fas fa-trash-alt"></i></div></div></div>
                            <?php endforeach;?>
                        </div>
                    </div>
                </div>
                <div class="form-group row m-g-1 attribute-size d-none">
                    <label class="col-sm-2 col-form-label attribute-title">
                        <span>Các Size Đã Chọn : </span>
                    </label>
                    <div class="col-sm-10 attribute-size-info">
                        <div class="row attribute-size-info-row"></div>
                    </div>
                </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Price (vnd)</label>
                <div class="col-sm-10">
                    <input type="text" id="price" class="form-control" value="<?= $data['product'][0]['price'];  ?>"/>
                </div>
              </div>
        
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Display</label>
                <div class="col-sm-10">
                <?php if ((int)$data['product'][0]['display'] == 1) :  ?>
                        <input class="form-check-input" type="checkbox" value="" id="checkdisplay" checked>
                    <?php else: ?>
                        <input class="form-check-input" type="checkbox" value="" id="checkdisplay">
                     <?php endif; ?> 
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Highlights</label>
                <div class="col-sm-10">
                <?php if ((int)$data['product'][0]['highlights'] == 1) :  ?>
                    <input class="form-check-input" type="checkbox" value="" id="checkhighlight" checked>
                    <?php else: ?>
                        <input class="form-check-input" type="checkbox" value="" id="checkhighlight" >
                        <?php endif; ?> 
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">meta-title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control meta-title"name="meta-title" value="<?= $data['product'][0]['meta_title'];  ?>">
                </div>
            </div>
              <div class="form-group row m-g-1">
                <div class="button-card">
                    <button class="btn btn-block btn-primary active" id="editCollectionProduct" data-id="<?= $data['product'][0]['id'];  ?>" type="button"
                        aria-pressed="true">
                        <li style="list-style: none"><a style="color:#fff;text-decoration:none" >Lưu</a></li>
                    </button>
                    <button class="btn btn-block btn-primary active" type="button"
                        aria-pressed="true">
                        <li style="list-style: none"><a style="color:#fff;text-decoration:none;" href="/product">Huỷ</a></li>
                    </button>
                </div>
              </div>
        </div>
    </div>
</div>
<div class="modal fade" id="SizeModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tạo Size</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row m-b-2">
                      <label class="col-sm-2 col-form-label">Thuộc tính Size</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="titleSize" placeholder="Thuộc tính Size">
                      </div>
                    </div>
                  </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalSize">Đóng</button>
                <button type="button" class="btn btn-primary"id="saveModalSize" >Lưu</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="http://127.0.0.1:8080/public/js/select2/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
