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
