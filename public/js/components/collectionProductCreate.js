$(document).ready(function () {
    $('#selectCollection').select2({
        width: '100%'
    });
    
})
$(document).on('click','#createCollectionProduct',function(){
    let data ={};
    data.title = $('input[name="title"]').val();
    data.content = $('#content-vi').val();
    data.description = $('#description-vi').val();
    if(data.title.length ==0){
        return swal({
            title: "Cảnh Báo!",
            text: "Vui Lòng Nhập Tiêu Đề!",
            icon: "error",
            buttons: false,
        });
    }
    $.ajax({
        type:'POST',
        url:'/collectionProductCreate',
        data:data,
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data.data == 1) {
                swal("Danh Mục", "Thêm Danh Mục Thành Công", "success");
                setTimeout(function(){
                  window.location.href="http://127.0.0.1:8080/collectionProduct";
              }); 
            } else {
                swal("Danh Mục", "Đã có lỗi sảy ra !!", "error");
            }
        }
    })
})
$(document).on('click','#editCollectionProduct',function(){
    let data ={};
    data.id=$(this).attr('data-id');
    data.title = $('input[name="title"]').val();
    data.slug = $('input[name="link"]').val();
    data.content = $('#content-vi').val();
    data.description = $('#description-vi').val();
    if(data.title.length ==0){
        return swal({
            title: "Cảnh Báo!",
            text: "Vui Lòng Nhập Tiêu Đề!",
            icon: "error",
            buttons: false,
        });
    }
    $.ajax({
        type:'POST',
        url:'/collectionProductEdit',
        data:data,
        dataType: "json",
        cache: false,
        success: function (data) {
            if (data.data == 1) {
                swal("Danh Mục", "Chỉnh Danh Mục Thành Công", "success");
                setTimeout(function(){
                  window.location.href="http://127.0.0.1:8080/collectionProduct";
              }); 
            } else {
                swal("Danh Mục", "Đã có lỗi sảy ra !!", "error");
            }
        }
    })
})

