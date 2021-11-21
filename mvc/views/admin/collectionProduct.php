<link rel="stylesheet" href="./public/js/select2/dist/css/select2.min.css">
<div class="breadcrumb">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Danh Mục Sản Phẩm</li>
    </ol>
</div>
<div class="page-main">
    <div class="card">      
        <div class="card-header">
            <div class="card-header-left">
                Danh Mục Sản Phẩm
            </div>
            <div class="card-header-right"><button class="btn btn-block btn-primary active" id="createCollection"
                    type="button" aria-pressed="true">
                    <li style="list-style: none"><a href="/admin/collectionProduct/create" style="color:#fff;text-decoration:none" >Tạo Danh Mục </a></li>
                    </button></div>
        </div>
        <div class="card-body">
            <table id="tableCollection" class="table table-resposive table-hover table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr class="table-primary">
                    <th>Số thứ tự</th>
                    <th>Title</th>
                    <th>Đường dẫn link</th>
                    <th>Chức Năng</th>
                </tr>
                @foreach($collectionProduct as $key => $value)
                <tr>
                    <th scope="row">{{$collectionProduct->firstItem() +$key}}</th>
                    <td>{{$value['title']}}</td>
                    <td>{{$value['slug']}}</td>
                    <td><a href="/admin/collectionProduct/edit/{{$value['id']}}"><i class="fas fa-edit icon-table-edit"></i></a>
                        <i class="fas fa-trash-alt icon-table-delete" data-id="{{$value['id']}}" data-title="{{$value['title']}}"></i>
                    </td>
                </tr>
            @endforeach
            </thead>
            <tbody></tbody>
        </table>
        </div>
       <div class="d-flex justify-content-end p-e-5 c-b">
           {{$collectionProduct->appends(['sort' => 'votes'])->links()}}
        </div>
    </div>
    
</div>

<script type="text/javascript" src="./public/js/components/collectionProduct.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="./public/js/select2/dist/js/select2.min.js"></script>
