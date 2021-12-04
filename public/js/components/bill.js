$(document).on('click','.icon-cancel',function(){
    let data = {};
    data.id = $(this).attr('data-id');
    if(data.id){
      $.ajax({
        type:'POST',
        url:'/cancel',
        dataType: "json",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:data,
        success:async function (data) {
            if (data.data == 1) {
                setTimeout(function(){
                    window.location.href= window.location.href;
                },400);
            }else{
              alert('Dã có lỗi xảy ra !!!');
            }
        }
    })
    }
})
$(document).on('click','.icon-table-edit',function(){
    let data = {};
    data.id = $(this).attr('data-id');
    data.status = $(this).attr('data-status');
    if (parseInt(data.status) == 2) {
        data.status = 3;
    }
    if (parseInt(data.status) === 1) {
        data.status = 2;
    }
    if(data.id){
      $.ajax({
        type:'POST',
        url:'/changeStatus',
        dataType: "json",
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        data:data,
        success:async function (data) {
            if (data.data == 1) {
                setTimeout(function(){
                    window.location.href= window.location.href;
                },400);
            }else{
              alert('Dã có lỗi xảy ra !!!');
            }
        }
    })
    }
})