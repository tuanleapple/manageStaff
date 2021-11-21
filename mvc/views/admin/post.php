<div class="breadcrumb">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Bài Viết</li>
    </ol>
</div>
<div class="page-main">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left">
                Danh Sách Bài Viết
            </div>
            <div class="card-header-right"><button class="btn btn-block btn-primary active" id="createPost"
                    type="button" aria-pressed="true"><li style="list-style: none"><a style="color:#fff;text-decoration:none;font-size: 11px;" href="/admin/createPost">Tạo Bài Viết </a></li></button></div>
        </div>
        <div class="card-body">
            <table id="tablePost" class="table table-resposive table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr class="table-primary">
                    <th></th>
                    <th>Hình ảnh</th>
                    <th>Tiêu đề</th>
                    <th>Danh Mục</th>
                    <th>Tác Giả</th>
                    <th>Ngày Xuất Bản</th>
                    <th>Chức Năng</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
        </div>
    </div>
    <table></table>
</div>

<script type="text/javascript" src="./public/js/components/post.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="./public/js/select2/dist/js/select2.min.js"></script>
