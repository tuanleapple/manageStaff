
<link rel="stylesheet" href="./public/js/select2/dist/css/select2.min.css">
<div class="breadcrumb">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Danh Mục</li>
        <li class="breadcrumb-item">Tạo Danh Mục</li>
    </ol>
</div>
<div class="page-main-create">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left-item">
                Tạo Danh Mục
            </div>
            <div class="card-header-right-item">
                <button class="btn btn-block btn-primary active" id="createCollectionProduct" type="button"
                    aria-pressed="true">
                    <li style="list-style: none"><a style="color:#fff;text-decoration:none" >Lưu</a></li>
                </button>
                <button class="btn btn-block btn-primary active" type="button"
                    aria-pressed="true">
                    <li style="list-style: none"><a style="color:#fff;text-decoration:none;" href="/admin/collectionProduct">Huỷ</a></li>
                </button>
            </div>
        </div>
        <div class="card-body">
             <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Title<span><strong style="color:red"> *</strong></span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control"name="title">
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Title-en</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="title_en">
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label  class="col-sm-2 col-form-label">Danh Mục Cha</label>
                <div class="col-sm-10">
                    <select id="selectCollection" name="selectCollection">
                        <option value="-1" checked>Vui lòng chọn danh mục cha</option>
                        @foreach($collectionProduct as $key => $value)
                            <option value={{$value['id']}}>{{$value['title']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Hình ảnh<span></label>
                <div class="col-sm-10">
                    <form class="form-feature-product">
                        @csrf
                        <img src="/images/default_image.png" style="width: 15rem;height: 14rem;margin-bottom: 1rem;"/>
                        <input type="hidden" name="image"/>
                        <input class="form-control" type="file" name="post-image"/>
                    </form>
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Content-vi</label>
                <div class="col-sm-10">
                    <textarea type="text" id="content-vi" class="form-control" rows="6" cols="50"></textarea>
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Content-en</label>
                <div class="col-sm-10">
                    <textarea type="text" id="content-en" class="form-control" rows="6" cols="50"></textarea>
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Description-vi</label>
                <div class="col-sm-10">
                    <textarea type="text" id="description-vi" class="form-control" rows="6" cols="50"></textarea>
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Description-en</label>
                <div class="col-sm-10">
                    <textarea type="text" id="description-en" class="form-control" rows="6" cols="50"></textarea>
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">meta-title-vi</label>
                <div class="col-sm-10">
                    <textarea type="text" id="meta-title-vi" class="form-control" rows="6" cols="50"></textarea>
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">meta-title-en</label>
                <div class="col-sm-10">
                    <textarea type="text" id="meta-title-en" class="form-control" rows="6" cols="50"></textarea>
                </div>
              </div>
              <div class="form-group row m-g-1">
                <div class="button-card">
                    <button class="btn btn-block btn-primary active" id="createCollectionProduct" type="button"
                        aria-pressed="true">
                        <li style="list-style: none"><a style="color:#fff;text-decoration:none" >Lưu</a></li>
                    </button>
                    <button class="btn btn-block btn-primary active" type="button"
                        aria-pressed="true">
                        <li style="list-style: none"><a style="color:#fff;text-decoration:none;" href="/admin/collectionProduct">Huỷ</a></li>
                    </button>
                </div>
              </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="./public/js/select2/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="./publicjs/components/collectionProductCreate.js"></script>
