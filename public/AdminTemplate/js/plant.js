$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});


$("#search-plant").keyup(function () { 
    var search_value =  $("#search-plant").val();    
    $.ajax({
        headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        type: 'post',
        datatype: 'JSON',
        data: {search_value},
        url: '/administrator/plant/search',
        success: function (result){
            let list =  $('#list-plant').find('li').remove().end();
            if (result) {
                if(search_value.length == 0){
                    $('#list-plant').find('li').remove();
                }else{
                    for(i = 0; i< result.length; i++){
                        var plant_name = result[i].plant_name;
                        var plant_id = result[i].plant_id;
                        // list.append('<li><input onclick = "getValue("sop_'+ result[i].sop_id +'",)" id="sop_'+ result[i].sop_id +'" type="checkbox" value="'+ result[i].sop_id +'">'+ result[i].sop_name+'</li>');
                        list.append(`<li><input onclick = "getValuePlant('plant_`+plant_id+`','`+plant_name+`')" id="plant_`+plant_id+`" type="checkbox" value="`+plant_id+`">`+plant_name+`</li>`);
                    }
                }     
            } else {
                alert('Xin vui lòng thử lại');
            }
        }
    })
});

function getValuePlant(selector, text) { 
    if($("#"+selector).is(":checked")){
       var val =  $("#"+selector).val()
        $("#data-plant").append(`<li><input type="checkbox" checked name="data_plant[]" id="selector" value="`+val+`">`+text+`</li>`);
    }
    
 }