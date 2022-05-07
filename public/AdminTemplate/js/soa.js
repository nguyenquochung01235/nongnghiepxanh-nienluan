$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$("#search-soa").keyup(function () { 
    var search_value =  $("#search-soa").val();    
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        datatype: 'JSON',
        data: {search_value},
        url: '/administrator/soa/search',
        success: function (result){
            let list =  $('#list-soa').find('li').remove().end();
            if (result) {
                if(search_value.length == 0){
                    $('#list-soa').find('li').remove();
                }else{
                    for(i = 0; i< result.length; i++){
                        var nameSoa = result[i].soa_name;
                        var idSoa = result[i].soa_id;
                        // list.append('<li><input onclick = "getValue("sop_'+ result[i].sop_id +'",)" id="sop_'+ result[i].sop_id +'" type="checkbox" value="'+ result[i].sop_id +'">'+ result[i].sop_name+'</li>');
                        list.append(`<li><input onclick = "getValue('soa_`+idSoa+`','`+nameSoa+`')" id="soa_`+idSoa+`" type="checkbox" value="`+idSoa+`">`+nameSoa+`</li>`);
                    }
                }     
            } else {
                alert('Xin vui lòng thử lại');
            }
        }
    })
});

function getValue(selector, text) { 
    if($("#"+selector).is(":checked")){
       var val =  $("#"+selector).val()
        $("#data-soa").append(`<li><input type="checkbox" checked name="data_soa[]" id="selector" value="`+val+`">`+text+`</li>`);
    }
    
 }