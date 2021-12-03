
<link rel="stylesheet" href="./public/js/select2/dist/css/select2.min.css">
<div class="breadcrumb">
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item">Admin</li>
        <li class="breadcrumb-item">User</li>
    </ol>
</div>
<div class="page-main">
    <div class="card">
        <div class="card-header">
            <div class="card-header-left">
                Danh Sách User
            </div>
            <div class="card-header-right"><button class="btn btn-block btn-primary active" id="createPost"
                    type="button" aria-pressed="true"><li style="list-style: none"><a class="openModelUser"style="color:#fff;text-decoration:none;font-size: 11px;">Create User </a></li></button></div>
        </div>
        <div class="card-body">
            <table id="tablePost" class="table table-resposive table-striped table-bordered text-center">
            <thead class="thead-dark">
                <tr class="table-primary">
                    <th></th>
                    <th>Tên</th>
                    <th>Email</th>
                    <th>Chức vụ</th>
                    <th>Ngày Tạo</th>
                    <th>Phân Quyền</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($data['users'] as $key => $value) : ?>
                    <tr>
                        <th scope="row"><?= $key+1 ?></th>
                        <td><?= $value['fullname'] ?></td>
                        <td><?= $value['email'] ?></td>
                        <?php  if($value['role'] == -1) :?>
                            <td>Customer</td>
                        <?php  elseif($value['role'] == 0) :?>
                            <td>Staff</td>
                        <?php else:?>
                            <td>Admin</td>
                        <?php endif;?>
                        <td><?= $value['created_at'] ?></td>
                        <td><a class="editUser" data-id="<?= $value['id'] ?>"><i class="fas fa-edit icon-table-edit"></i></a>
                            <i class="fas fa-trash-alt icon-table-delete" data-id="<?= $value['id'] ?>" data-title="<?= $value['fullname']?>" data-type="user_admin"></i>
                        </td>
                    </tr>
                    <?php endforeach; ?>
            </tbody>
        </table>
        <div class="d-flex justify-content-end p-e-5 c-b">
            <!-- {{$user->appends(['sort' => 'votes'])->links()}} -->
         </div>
        </div>
    </div>
    <table></table>
</div>
<div class="modal fade" id="UserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create user</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row m-b-2">
                      <label class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="username" placeholder="Please username">
                      </div>
                    </div>
                    <div class="form-group row m-b-2">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="password" placeholder="Please password">
                        </div>
                      </div>
                      <div class="form-group row m-b-2">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="email" placeholder="please email">
                        </div>
                      </div>
      
                    <div class="form-group row m-b-2">
                        <label  class="col-sm-2 col-form-label">Access</label>
                        <div class="col-sm-10">
                            <select id="selectUser" name="selectUser">
                                <option value="-2" selected>Please access for account</option>
                                <option value="0">Staff</option>
                                <option value="1">Admin</option>
                            </select>
                        </div>
                    </div>
                  </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalUser">Đóng</button>
                <button type="button" class="btn btn-primary"id="saveModalUser" >Lưu</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="UserModalEdit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit user</h5>
            </div>
            <div class="modal-body">
                <form>
                    <div class="form-group row m-b-2">
                      <label class="col-sm-2 col-form-label">Username</label>
                      <div class="col-sm-10">
                        <input type="text" class="form-control" id="usernameEdit" placeholder="Please username">
                      </div>
                    </div>
                    <div class="form-group row m-b-2">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="passwordEdit" placeholder="Please password">
                        </div>
                      </div>
                      <div class="form-group row m-b-2">
                        <label class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" id="emailEdit" placeholder="please email">
                        </div>
                      </div>
      
                    <div class="form-group row m-b-2">
                        <label  class="col-sm-2 col-form-label">Access</label>
                        <div class="col-sm-10">
                            <select id="selectUserEdit" name="selectUserEdit">
                                <option value=-2 >Please access for account</option>
                                <option value=0 >Staff</option>
                                <option value=1 >Admin</option>
                            </select>
                        </div>
                    </div>
                  </form> 
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closeModalUserEdit">Đóng</button>
                <button type="button" class="btn btn-primary"id="saveModalUserEdit" >Lưu</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript" src="/public/js/components/user.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="/public/js/select2/dist/js/select2.min.js"></script>
