$('#search-bar').keyup(function(){
    var value = $(this).val().toLowerCase();
    $('.data').each(function(){
        var search = $(this).text().toLowerCase();
        if(search.indexOf(value) > -1){
            $(this).show();
        }else{
            $(this).hide();
        }
    });
});
