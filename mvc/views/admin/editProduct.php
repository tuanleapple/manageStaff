
<link rel="stylesheet" href="./public/js/select2/dist/css/select2.min.css">
<script type="text/javascript" src="./public/js/components/productCreate.js"></script>
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
                    <li style="list-style: none"><a style="color:#fff;text-decoration:none;" href="/admin/product">Huỷ</a></li>
                </button>
            </div>
        </div>
        <div class="card-body">
             <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Title<span><strong style="color:red"> *</strong></span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"name="title" id="title" value="{{$product['title']}}" />
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label  class="col-sm-2 col-form-label">Collection</label>
                <div class="col-sm-10">
                    <select id="selectCollection" name="selectCollection">
                        <option value="-1">Please choose parent collecion ...</option>
                        @foreach($collectionProduct as $key => $value)
                            @if($value['id'] == $product['collection_id'])
                                <option value={{$value['id']}} selected>{{$value['title']}}</option>
                            @else
                                <option value={{$value['id']}}>{{$value['title']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
            </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Image<span></label>
                <div class="col-sm-10">
                    <form class="form-feature-product" enctype="multipart/form-data">
                        @csrf
                        <input class="form-control" type="file" name="images[]" multiple/>
                    </form>
                    <div class="image_upload">
                        @foreach(json_decode($product['list_image']) as $key => $value)
                            <div class="item" data-getImage={{$value}}><a class="image_a_upload">
                                <img src="/upload/product/{{$value}}" style="padding: 0.25rem;"/></a><i class="fas fa-times item-icon" data-image={{$value}}></i>
                            </div>
                        @endforeach
                    </div>
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea type="text" id="description" class="form-control" rows="6" cols="50" value="{{$product['description']}}">{{$product['description']}}</textarea>
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Gender</label>
                <div class="col-sm-10">
                    <select id="selectGender" name="selectGender">
                        <option value="-1" checked>Please choose gender ...</option>
                        @foreach($gender as $key => $value)
                            @if($value['id'] == $product['product_gender'])
                                <option value={{$value['id']}} selected>{{$value['title']}}</option>
                            @else
                                <option value={{$value['id']}}>{{$value['title']}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
        
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Size</label>
                <div class="col-sm-9">
                    <select id="selectSize" name="selectSize">
                        <option value="-1" selected disabled>Please choose size ...</option>
                        @if(!empty($optionCheck))
                            {!! $optionCheck !!}
                        @else
                            @if(!empty($size))
                            @foreach($size as $key => $value)
                            <option value={{$value['id']}} data-size="{{$value['title']}}">{{$value['title']}}</option>
                            @endforeach
                            @endif
                        @endif
                    </select>
                </div>
                <div class="col-sm-1"><button type="button" class="btn btn-block btn-dart " id="plus-size" type="button" aria-pressed="true"><i class="fas fa-plus"></i></button></div>
              </div>
              @if(!empty($variant))
                <div class="form-group row m-g-1 attribute-size">
                    <label class="col-sm-2 col-form-label attribute-title">
                        <span>Các Size Đã Chọn : </span>
                        @foreach($variant  as $value)
                        <span class="attribute-{{$value['title']}} span-attribute" >{{$value['title']}}</span>
                        @endforeach
                    </label>
                    <div class="col-sm-10 attribute-size-info">
                        <div class="row attribute-size-info-row">
                            <div class="col-sm-2 size">Size </div><div class="col-sm-10 quality-size"> Số Lượng</div>
                            @foreach($variant  as $value)
                            <div class="attribute-info-{{$value['title']}} atribute-info-css"><div class="row"><div class="col-sm-2"><label>{{$value['title']}}</label></div><div class="col-sm-8"><input class="input-size-quality" placeholder="Vui Lòng nhập số lượng của size tương ứng " value="{{$value['quality']}}" data-size-attribute="{{$value['id']}}"/></div><div class=" col-sm-2 delete-icon" data-delete-size="{{$value['title']}}" data-variant="{{$value['id']}}" data-id="{{$value['attribute_id']}}"><i class="fas fa-trash-alt"></i></div></div></div>
                            @endforeach
                        </div>
                    </div>
                </div>
              @else
                <div class="form-group row m-g-1 attribute-size d-none">
                    <label class="col-sm-2 col-form-label attribute-title">
                        <span>Các Size Đã Chọn : </span>
                    </label>
                    <div class="col-sm-10 attribute-size-info">
                        <div class="row attribute-size-info-row"></div>
                    </div>
                </div>
              @endif
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Price (vnd)</label>
                <div class="col-sm-10">
                    <input type="text" id="price" class="form-control" value="{{$product['price']}}"/>
                </div>
              </div>
        
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Display</label>
                <div class="col-sm-10">
                    @if ($product['display'] == 1)
                        <input class="form-check-input" type="checkbox" value="" id="checkdisplay" checked>
                    @else
                        <input class="form-check-input" type="checkbox" value="" id="checkdisplay">
                    @endif   
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Highlights</label>
                <div class="col-sm-10">
                    @if ($product['highlights'] == 1)
                    <input class="form-check-input" type="checkbox" value="" id="checkhighlight" checked>
                    @else
                        <input class="form-check-input" type="checkbox" value="" id="checkhighlight" >
                    @endif 
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">meta-title</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control meta-title"name="meta-title" value={{$product['meta_title']}}>
                </div>
            </div>
              <div class="form-group row m-g-1">
                <div class="button-card">
                    <button class="btn btn-block btn-primary active" id="editCollectionProduct" data-id={{$product['id']}} type="button"
                        aria-pressed="true">
                        <li style="list-style: none"><a style="color:#fff;text-decoration:none" >Lưu</a></li>
                    </button>
                    <button class="btn btn-block btn-primary active" type="button"
                        aria-pressed="true">
                        <li style="list-style: none"><a style="color:#fff;text-decoration:none;" href="/admin/product">Huỷ</a></li>
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

<script type="text/javascript" src="./public/js/select2/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
