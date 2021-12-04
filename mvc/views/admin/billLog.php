<div class="breadcrumb">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Bill</li>
    </ol>
</div>
<div class="page-main">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left">
                Bill
            </div>
        </div>
        <div class="card-body">
            <table id="tableCollection" class="table table-resposive table-hover table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr class="table-primary">
                    <th>stt</th>
                    <th>image</th>
                    <th>Full Name</th>
                    <th>Địa chỉ</th>
                    <th>Tax</th>
                    <th>Tổng Cộng</th>
                    <th>Ngày Tạo</th>
                    <th>Trạng Thái</th>
                    <th>Chức Năng</th>
                </tr>
                <?php foreach($data['billLog'] as $key => $value) : ?>
                    <tr>
                        <td><?= $key+1 ?></td>
                        <td>
                        <?php if(!empty(json_decode($value['product_image']))) : ?>
                            <?php foreach (json_decode($value['product_image']) as $image) :?>
                            <a class="img_table"><img src="/public/upload/product/<?= $image ?>" alt=<?= $image?></a>
                            <?php endforeach; ?>
                        <?php  else : ?>
                            <a class="img_table"><img src="/public/images/default_image.png" alt='No Image'></a>
                        <?php  endif; ?>
                        </td>
                        <td><?= $value['customer_name']?></td>
                        <td><?= $value['info'] ?> - <?= $value['nameWard'] ?> - <?= $value['nameDistrict'] ?> - tỉnh <?= $value['nameCity'] ?></td>
                        <td><?= $value['tax']?></td>
                        <td><?= number_format($value['total_price'],0,'',',')?><u class="format_d">đ</u></td>
                        <td><?= $value['created_at']?></td>
                        <td>
                            <?php if($value['status'] == 1) :?>
                                <span>Chờ Xác Nhận</span>
                                <?php elseif($value['status'] == 2) :?>
                                <span>Lấy Hàng</span>
                                <?php elseif($value['status'] == 3) :?>
                                <span>Hoàn Thành</span>
                                <?php else :?>
                                <span>Huỷ Bỏ</span>
                            <?php endif; ?>
                        </td>
                        <td><i class="fas fa-edit icon-table-edit" data-id="<?= $value['id']?>" data-status="<?= $value['status']?>"></i>
                            <i class="fas fa-trash-alt icon-cancel" data-id="<?= $value['id']?>"></i>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </thead>
            <tbody></tbody>
        </table>
        </div>
        <div class="d-flex justify-content-end p-e-5 c-b">
        </div>
        <div class="d-flex justify-content-end p-e-5">
        </div>
    </div>
    
</div>
<script type="text/javascript" src="http://127.0.0.1:8080/public/js/components/bill.js"></script>