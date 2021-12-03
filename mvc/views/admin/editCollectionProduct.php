
<link rel="stylesheet" href="http://127.0.0.1:8080/public/js/select2/dist/css/select2.min.css">
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
                Chỉnh sửa Danh Mục
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
                <label class="col-sm-2 col-form-label">Content</label>
                <div class="col-sm-10">
                    <textarea type="text" id="content-vi" class="form-control" rows="6" cols="50"></textarea>
                </div>
              </div>
              <div class="form-group row m-g-1">
                <label class="col-sm-2 col-form-label">Description</label>
                <div class="col-sm-10">
                    <textarea type="text" id="description-vi" class="form-control" rows="6" cols="50"></textarea>
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

<script type="text/javascript" src="http://127.0.0.1:8080/public/js/select2/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="http://127.0.0.1:8080/public/js/components/collectionProductCreate.js"></script>
