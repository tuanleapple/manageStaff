
$(document).on('click','.menu-click',async function(){
    setTimeout(function(){
        $('.header .header-left .logo-header').find('p.title-hearder').toggleClass('hidden-sm');
        $('.nav-main .nav-left .menu .menu-item').find('a').toggleClass('hidden-sm');
        $('.header .header-left').css('width','5%');
        $('.header .header-right').css('widh','95%');
        $('.main-content').css('margin-left','60px');
        $('.nav-main').css('width','60px');
        $('.nav-left .menu-left .menu-item').addClass('rem-icon');
        $('.nav-left .menu-left .menu-item a .title_nav_left').toggleClass('hidden-sm');
        },500)
    await $('.menu-click').addClass('menu-hidden');
    $('.menu-hidden').removeClass('menu-click')
})
$(document).on('click','.menu-hidden',async function(){
    setTimeout(function(){
        $('.header .header-left .logo-header').find('p.title-hearder').toggleClass('hidden-sm');
        $('.nav-main .nav-left .menu .menu-item').find('a').toggleClass('hidden-sm');
        $('.header .header-left').css('width','250px')
        $('.header .header-right').css('width','calc(100% -250px)')
        $('.nav-left .menu-left .menu-item').removeClass('rem-icon');
        $('.nav-left .menu-left .menu-item a .title_nav_left').toggleClass('hidden-sm');
        $('.main-content').css('margin-left','250px')
        $('.nav-main').css('width','250px')
        },500)
    await $('.menu-hidden').addClass('menu-click');
    $('.menu-click').removeClass('menu-hidden')
})

$(document).on('click','.icon-table-delete',function(){
    let data = {};
    data.id = $(this).attr('data-id');
    data.type = $(this).attr('data-type');
    data.title = $(this).attr('data-title');
    let title = $(this).attr('data-title');
    if (data.id) {
        swal({
            title: "Cảnh Báo",
            text: "Bạn có chắc muốn xoá "  + data.title + " này không ??",
            icon: "warning",
            dangerMode: true,
            buttons: {
                cancel: "Cancel",
                ok: "OK"
            },
        }).then(function (isConfirm) {
            if (!isConfirm) return;
            $.ajax({
                url: '/delete',
                type: "post",
                data:data,
                dataType: "json",
            }).done(function (data) {
                if (data.data == 1) {
                    swal("Danh Mục", "Xoá "+ title +" Thành Công", "success");
                    setTimeout(function(){
                        window.location.href= window.location.href;
                      },400); 

                } else {
                    swal("Danh Mục", "Đã có lỗi sảy ra !!", "error");
                }

            });
        });
    }
})