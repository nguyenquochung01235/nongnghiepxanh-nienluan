$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".btn_img_1").click(function(){
    $("#img_1").click()
});
$(".btn_img_2").click(function(){
    $("#img_2").click()
});
$(".btn_img_3").click(function(){
    $("#img_3").click()
});

$("#img_1").change(function(){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/forum/upload/img',
        success: function (results) {
            if (results.error === false) {
                $('img.btn_img_1').attr("src",results.url);
                $('#img_1').attr("value",results.url);

            } else {
                alert('Upload File Lỗi');
            }
        }
    });
})
$("#img_2").change(function(){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/forum/upload/img',
        success: function (results) {
            if (results.error === false) {
                $('img.btn_img_2').attr("src",results.url);
                $('#img_2').attr("value",results.url);

            } else {
                alert('Upload File Lỗi');
            }
        }
    });
})
$("#img_3").change(function(){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/forum/upload/img',
        success: function (results) {
            if (results.error === false) {
                $('img.btn_img_3').attr("src",results.url);
                $('#img_3').attr("value",results.url);

            } else {
                alert('Upload File Lỗi');
            }
        }
    });
})

