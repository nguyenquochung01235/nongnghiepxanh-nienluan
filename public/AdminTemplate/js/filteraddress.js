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
                    if (result) {
                        districtSelectBox.append('<option value="">Tất cả các quận huyện</option>');
                        for(i = 0; i< result.length; i++){
                            districtSelectBox.append('<option value="'+ result[i].district_id +'">'+ result[i].district_name+'</option>');
                        }
                    } else {
                        alert('Xin vui lòng thử lại');
                    }
            }
        })
    
    
});
