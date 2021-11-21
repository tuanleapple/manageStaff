
<link rel="stylesheet" href="./public/js/select2/dist/css/select2.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css">
<div class="breadcrumb">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Bài Viết</li>
        <li class="breadcrumb-item">Tạo Bài Viết</li>
    </ol>
</div>
<div class="page-main-create">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left-item">
                Tạo Bài Viết
            </div>
            <div class="card-header-right-item">
                <button class="btn btn-block btn-primary active" id="createPost" type="button"
                    aria-pressed="true">
                    <li style="list-style: none"><a style="color:#fff;text-decoration:none" >Tạo Bài Viết </a></li>
                </button>
                <button class="btn btn-block btn-primary active" type="button"
                    aria-pressed="true">
                    <li style="list-style: none"><a style="color:#fff;text-decoration:none;" href="/admin/post">Huỷ</a></li>
                </button>
            </div>
        </div>
        <div class="card-body">
            <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Tiêu Đề<span><strong style="color:red"> *</strong></span></label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" placeholder="Tên Bài Viết" name="title">
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label  class="col-sm-2 col-form-label">Danh Mục Cha</label>
                <div class="col-sm-10">
                  
                    <select class="selectCollection" name="selectCollection" name="collection[]" multiple="multiple">
                        <option value="-1" disabled>Vui lòng chọn danh mục cha</option>
                    </select>
                </div>
            </div>
            <div class="form-group row m-g-1">
                <label  class="col-sm-2 col-form-label">Thẻ Tag</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" data-role="tagsinput" name="hashtag" multiple="multiple">
                </div>
            </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Hình ảnh<span><strong style="color:red"> *</strong></span></label>
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
                <label class="col-sm-2 col-form-label">Nội Dung<span><strong style="color:red"> *</strong></span></label>
                <div class="col-sm-10">
                    <textarea type="text" id="contentPost" class="form-control" rows="6" cols="50"></textarea>
                </div>
              </div>
             
        </div>
    </div>
</div>

<script type="text/javascript" src="./public/js/select2/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="./public/js/components/createPost.js"></script>

