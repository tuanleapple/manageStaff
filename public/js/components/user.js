$(document).ready(function(){
    $('#selectUser').select2({
        width: '100%'
    });
  $('#selectUserEdit').select2({
        width: '100%'
    });
})

$(document).on('click','.openModelUser',function(){
    $('#username').val('')
    $('#password').val('')
    $('#email').val('')
   $('#UserModal').modal('show');
})
$(document).on('click','#closeModalUser',function(){
   $('#UserModal').modal('hide');
})
$(document).on('click','#closeModalUserEdit',function(){
    $('#UserModalEdit').modal('hide');
 })
$(document).on('click','#saveModalUser',function(){
    let data = {};
    data.username = $('#username').val();
    data.password = $('#password').val();
    data.email = $('#email').val();
    data.role = $('#selectUser').find('option:selected').val();
    if(data.username.length == 0 || data.password.length == 0 || data.email.length == 0 || data.role == -2){
        return swal({
            title: "warning!",
            text: "please write full info!",
            icon: "error",
            buttons: false,
        });
    }
    $.ajax({
        type: "POST",
        url: "/createUser",
        data: data,
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data.data == 1) {
                $('#UserModal').modal('hide');
                swal("User", "create user success", "success");
                setTimeout(function(){
                    window.location.href="http://127.0.0.1:8080/users";
                });

            } else {
                swal("User", "creaet user error!!", "error");
            }
        }
    })
})
$(document).on('click','#saveModalUserEdit',function(){
    let data = {};
    data.id = $(this).attr('data-id');
    data.username = $('#usernameEdit').val();
    data.password = $('#passwordEdit').val();
    data.email = $('#emailEdit').val();
    data.role = $('#selectUserEdit').find('option:selected').val();
    if(data.username.length == 0 || data.email.length == 0 || data.role == -2){
        return swal({
            title: "warning!",
            text: "please write full info!",
            icon: "error",
            buttons: false,
        });
    }
    $.ajax({
        type: "POST",
        url: "/editUser",
        data: data,
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data.data == 1) {
                $('#UserModalEdit').modal('hide');
                swal("User", "edit user success", "success");
                setTimeout(function(){
                    window.location.href="http://127.0.0.1:8080/users";
                });
            } else {
                swal("User", "edit user error!!", "error");
            }
        }
    })
})
$(document).on('click','.editUser',function(){
    let data = {};
    data.id = $(this).attr('data-id');
    if(data.id){
        $.ajax({
            type: "POST",
            url: "/findUser",
            cache: false,
            data:data,
            dataType: "json",
            success: async function(data) {
                if (data.data == 1) {
                     $('#usernameEdit').val(data.user.fullname);
                     $('#emailEdit').val(data.user.email);
                     $('#passwordEdit').val('');
                    await $('#selectUserEdit').val(data.user.role).change();
                     $('#saveModalUserEdit').attr('data-id',data.user.id)
                    $('#UserModalEdit').modal('show');
                } else {
                    swal("User", "edit user error!!", "error");
                }
            }
        })
    }
})