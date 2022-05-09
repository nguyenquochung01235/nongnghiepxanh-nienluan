$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$("#search-sop").keyup(function () { 
    var search_value =  $("#search-sop").val();    
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        datatype: 'JSON',
        data: {search_value},
        url: '/administrator/sop/search',
        success: function (result){
            let list =  $('#list-sop').find('li').remove().end();
            if (result) {
                if(search_value.length == 0){
                    $('#list-sop').find('li').remove();
                }else{
                    for(i = 0; i< result.length; i++){
                        var nameSop = result[i].sop_name;
                        var idSop = result[i].sop_id;

                        list.append(`<li><input onclick = "getValueSop('sop_`+idSop+`','`+nameSop+`')" id="sop_`+idSop+`" type="checkbox" value="`+idSop+`">`+nameSop+`</li>`);
                    }
                }     
            } else {
                alert('Xin vui lòng thử lại');
            }
        }
    })
});

function getValueSop(selector, text) { 
    if($("#"+selector).is(":checked")){
       var val =  $("#"+selector).val()
        $("#data-sop").append(`<li><input type="checkbox" checked name="data_sop[]" id="selector" value="`+val+`">`+text+`</li>`);
    }
 }