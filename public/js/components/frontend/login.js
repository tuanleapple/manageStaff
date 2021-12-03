$(document).on('click','#open_popup_send_email',function(){
    $('#getPassword').modal('show');
})
$(document).on('click','#send_email_cancel',function(){
    $('#getPassword').modal('hide');
})
$(document).on('click','#login_submit',function(){
    let data = {}
    data.email = $('input#email').val();
    data.password = $('input#password').val();
    $('#login_submit img').css('display','block');
    $.ajax({
        type: "POST",
        url: "/checkLoginClient",
        data: data,
        dataType: "json",          
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        cache: false,
        success: function (data) {
            if (data.data == 1) {
                $('#login_submit img').css('display','none');
                setTimeout(function(){
                    window.location.href="http://127.0.0.1:8080/account";
                  },400); 
            } else {
                alert('Sever Đã có Lỗi !!!');
            }
        }
    })
    
})