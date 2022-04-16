$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

function removeRow(id, url) {
    if (confirm('Xóa mà không thể khôi phục. Bạn có chắc ?')) {
        $.ajax({
            type: 'delete',
            datatype: 'JSON',
            data: { id },
            url: url,
            success: function (result) {
                if (result.error === false) {
                    alert(result.message);
                    location.reload();
                } else {
                    alert('Xóa lỗi vui lòng thử lại');
                }
            }
        })
    }
}

function getJobByDepartmentAjax() {
    var selectBox = document.getElementById("department");
    var department_id = selectBox.options[selectBox.selectedIndex].value;
        $.ajax({
            type: 'post',
            datatype: 'JSON',
            data: {department_id},
            url: '/administrator/job/getjobbydepartment',
            success: function (result) {
               let jobElement =  $('#job').find('option').remove().end();
                if (result) {
                    for(i = 0; i< result.length; i++){
                        jobElement.append('<option value="'+ result[i].job_id +'">'+ result[i].job_name+'</option>');
                        
                        $('#salary').val( new Intl.NumberFormat().format(result[0].job_salary) + ' VNĐ');
                    }
                } else {
                    alert('Xin vui lòng thử lại');
                }
            }
        })
}

function getSalaryOfJob() {
    var selectBox = document.getElementById("job");
    var job_id = selectBox.options[selectBox.selectedIndex].value;
        $.ajax({
            type: 'post',
            datatype: 'JSON',
            data: {job_id},
            url: '/administrator/job/getsalaryofjob',
            success: function (result){
                console.log(result);
                if (result) {
                        $('#salary').val(new Intl.NumberFormat().format(result[0].job_salary) + ' VNĐ');      
                } else {
                    alert('Xin vui lòng thử lại');
                }
            }
        })
}


$('#upload').change(function () {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    var admin_id = document.getElementById("admin_id").value;
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/administrator/upload/'+admin_id+'/img',
        success: function (results) {
            if (results.error === false) {
                $('#admin_avatar').attr("src",results.url);
                $('#avatar').attr("value",results.url);

            } else {
                alert('Upload File Lỗi');
            }
        }
    });
});


$("#admin_avatar").hover(
    function() {
        $('#admin_avatar').attr("src","https://banner2.cleanpng.com/20180601/tzk/kisspng-photographic-film-computer-icons-single-lens-refle-infograph-5b110294a41fe8.0090855615278414286723.jpg");   
     }, function() {
        $('#admin_avatar').attr("src",$('#avatar').val());
    }
  );

$("#admin_avatar").click(function () {
    $('#upload').click();
});




$('#upload_new_img').change(function () {
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/administrator/news/add/upload/img',
        success: function (results) {
            if (results.error === false) {
                console.log(results);
                $('#img_news').attr("src",results.url);
                $('#news_img').attr("value",results.url);

            } else {
                alert('Upload File Lỗi');
            }
        }
    });
});



$('#provinceSelectBox').change(function () {
    let province_id =  $('#provinceSelectBox').val()
    $.ajax({
        type: 'post',
        datatype: 'JSON',
        data: {province_id},
        url: '/administrator/district/getDistrictOfProvince',
        success: function (result){
            let districtSelectBox =  $('#districtSelectBox').find('option').remove().end();
                if (result) {
                    for(i = 0; i< result.length; i++){
                        districtSelectBox.append('<option value="'+ result[i].district_id +'">'+ result[i].district_name+'</option>');
                    }
                } else {
                    alert('Xin vui lòng thử lại');
                }
        }
    })
});




$("#land_img_1").change(function(){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/administrator/land/upload/img',
        success: function (results) {
            if (results.error === false) {
                $('#img_land_1').attr("src",results.url);
                $('#land_img_1').attr("value",results.url);
                $('#land_img_1_link').attr("value",results.url);

            } else {
                alert('Upload File Lỗi');
            }
        }
    });
})
$("#land_img_2").change(function(){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/administrator/land/upload/img',
        success: function (results) {
            if (results.error === false) {
                $('#img_land_2').attr("src",results.url);
                $('#land_img_2').attr("value",results.url);
                $('#land_img_2_link').attr("value",results.url);

            } else {
                alert('Upload File Lỗi');
            }
        }
    });
})
$("#land_img_3").change(function(){
    const form = new FormData();
    form.append('file', $(this)[0].files[0]);
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        processData: false,
        contentType: false,
        type: 'POST',
        dataType: 'JSON',
        data: form,
        url: '/administrator/land/upload/img',
        success: function (results) {
            if (results.error === false) {
                $('#img_land_3').attr("src",results.url);
                $('#land_img_3').attr("value",results.url);
                $('#land_img_3_link').attr("value",results.url);

            } else {
                alert('Upload File Lỗi');
            }
        }
    });
})
