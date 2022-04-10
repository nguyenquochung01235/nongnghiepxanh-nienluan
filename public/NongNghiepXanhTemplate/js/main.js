$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

$(".title-cut").text(function(index, currentText) {
    return currentText.substr(0, 50) + "...";
});
$(".title-cut-2").text(function(index, currentText) {
    return currentText.substr(0, 70) + "...";
});

$(".mota").text(function(index, currentText) {
    return currentText.substr(0, 180) + "...";
});

$(".mota1").text(function(index, currentText) {
    return currentText.substr(0, 120) + "...";
});


$(".btn-tool" ).click(function() {

    $("div.alert").remove();
});

function showReply(id) {
    
    $("#reply-comment-"+id).show();
    // alert('show' + id);
}

function hideReply(id) {
    $("#reply-comment-"+id).hide();
    // alert('hide'+ id);
}


$("#btnShowInfo").click(function() {
    $("#informationUser").show();
    $("#passwordUser").hide();
    $( "#btnShowInfo" ).addClass( "link active" );
    $( "#btnShowPassword" ).removeClass( "link active" );
  });

$("#btnShowPassword").click(function() {
    $("#informationUser").hide();
    $("#passwordUser").show();
    $( "#btnShowPassword" ).addClass( "link active" );
    $( "#btnShowInfo" ).removeClass( "link active" );
  });



  $('#provinceSelectBox').click(function () {
    let province_id =  $('#provinceSelectBox').val()
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        datatype: 'JSON',
        data: {province_id},
        url: '/administrator/district/getDistrictOfProvince',
        success: function (result){
            let districtSelectBox =  $('#districtSelectBox').find('option').remove().end();
            let communeSelectBox =  $('#communeSelectBox').find('option').remove().end();
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

$('#districtSelectBox').click(function () {
    let district_id =  $('#districtSelectBox').val()
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        datatype: 'JSON',
        data: {district_id},
        url: '/administrator/commune/getCommuneOfDistrict',
        success: function (result){
            let communeSelectBox =  $('#communeSelectBox').find('option').remove().end();
                if (result) {
                    for(i = 0; i< result.length; i++){
                        communeSelectBox.append('<option value="'+ result[i].commune_id +'">'+ result[i].commune_name+'</option>');
                    }
                } else {
                    alert('Xin vui lòng thử lại');
                }
        }
    })
});

