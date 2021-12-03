<div class="breadcrumb">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Product</li>
    </ol>
</div>
<div class="page-main">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left">
                <span>Product</span>
            </div>
            <div class="card-header-right"><button class="btn btn-block btn-primary active" id="createCollection"
                type="button" aria-pressed="true">
                <li style="list-style: none"><a href="/createProduct" style="color:#fff;text-decoration:none" >Create Product </a></li>
                </button></div>
        </div>
        <div class="card-body">
            <table id="tableLog" class="table table-resposive table-striped table-bordered text-center l-heght">
            <thead class="thead-dark">
                <tr class="table-primary">
                    <th></th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Slug</th>
                    <th>Price</th>
                    <th>Quality</th>
                    <th>Display</th>
                    <th>Highlights</th>
                    <th>Create</th>
                    <th>Tools</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['products'] as $key => $value) :?>
                <tr>
                    <td><?= $key+1 ?> </td>
                    <td>
                        <?php if(strlen($value['image']) != 0) : ?>
                            <a class="img_table"><img src="/public/upload/product/<?= $value['image'] ?>" alt=<?= $value['image'] ?></a>
                        <?php  else : ?>
                            <a class="img_table"><img src="/public/images/default_image.png" alt='No Image'></a>
                        <?php  endif; ?>
                       
                    </td>
                    <td><?= $value['title'] ?></td>
                    <td><?= $value['slug'] ?></td>
                    <td><?= $value['price'] ?></td>
                    <td><?= $value['qualityProduct'] ?></td>
                    <td>
                        <?php if ($value['display'] == 1) : ?>
                            <input class="form-check-input" type="checkbox" onclick="checkDisplay(<?= $value['id'] ?>)" name="display"  checked>
                        <?php else :?>
                            <input class="form-check-input" type="checkbox" onclick="checkDisplay({{$value->id}})"  name="display">
                        <?php endif ;?>
                    </td>
                    <td>
                        <?php if ($value['highlights'] == 1) : ?>
                            <input class="form-check-input" type="checkbox" onclick="checkHighlight(<?= $value['id'] ?>)" name="highlights"  checked>
                        <?php else :?>
                            <input class="form-check-input" type="checkbox" onclick="checkHighlight(<?= $value['id'] ?>)" name="highlights" >
                        <?php endif ;?>
                    </td>
                  
                     <td><?= $value['created_at'] ?></td>
                    <td><a href="/editProduct/<?= $value['id'] ?>"><i class="fas fa-edit icon-table-edit"></i></a>
                        <i class="fas fa-trash-alt icon-table-delete" data-id="<?= $value['id'] ?>" data-title="<?= $value['title']?>" data-type="product"></i>
                    </td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end p-e-5 c-b">
            <!-- Tổng số product trả về : {{ $product->total() }} -->
         </div>
         <div class="d-flex justify-content-end p-e-5">
             <!-- {{ $product->links() }} -->
         </div>
        </div>
    </div>
    <table></table>
</div>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="./public/js/components/product.js"></script>
<script type="text/javascript">
    function checkDisplay(e){
        if(e){
            let data = {};
            data.id = e;
            data.type = $('input[name="display"]:checkbox:not(":checked")').length;
            if(data.type == 2){
                data.type =0;
            }
            $.ajax({
            type: 'POST',
            url: '/admin/product/changeDisplay',
            data: data,
            cache: false,
            success: function (data) {
                if (data.data == 1) {
                    swal('Change display', 'Change Display', 'success');
                }
            },
            });
        }
    }

    function checkHighlight(e){
        let data = {};
            data.id = e;
            data.type = $('input[name="highlights"]:checkbox:not(":checked")').length;
            if(data.type == 2){
                data.type =1;
            }else{
                data.type =0;
            }
            $.ajax({
            type: 'POST',
            url: '/admin/product/changeHighlight',
            data: data,
            cache: false,
            success: function (data) {
                if (data.data == 1) {
                    swal('Change Highlight', 'Change Highlight', 'success');
                }
            },
            });
        
    }
</script>