
<div class="breadcrumb">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">Lịch sử</li>
    </ol>
</div>
<div class="page-main">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left">
                Lịch sử
            </div>
        </div>
        <div class="card-body">
            <table id="tableLog" class="table table-resposive table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr class="table-primary">
                    <th></th>
                    <th>Module</th>
                    <th>Người Tạo</th>
                    <th>Message</th>
                    <th>Ngày Tạo</th>
                </tr>
            </thead>
            
            <tbody>
                <?php foreach($data['logs'] as $key => $value) :?>
                <tr>
                    <th scope="row"><?= $key+1 ?></th>
                    <td> <?= $value['module'] ?></td>
                    <td> <?= $value['fullname'] ?></td>
                    <td> <?= $value['message'] ?></td>
                    <td> <?= $value['created_at'] ?></td>
                </tr>
                <?php endforeach;?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end p-e-5 c-b">
            Tổng số log trả về : {{ $log->total() }}
         </div>
         <div class="d-flex justify-content-end p-e-5">
             {{ $log->links() }}
         </div>
        </div>
    </div>
    <table></table>
</div>

<script type="text/javascript" src="./public/js/components/log.js"></script>
