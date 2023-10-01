$(document).ready(function () {
    $('#serch-dropdown').keyup(function (e) {
        if($(this).val().length > 0){
            $('.dropdown-search').removeClass('hide')
        }else{
            $('.dropdown-search').addClass('hide')
        }
        
    });

    updateInput = (value) =>{
        console.log(value);
        $('#serch-dropdown').val(value);
        $('.dropdown-search').addClass('hide');
    }

    $('#serch-head').keyup(function (e) {
        if($(this).val().length > 0){
            $('.head-search').removeClass('hide')
        }else{
            $('.head-search').addClass('hide')
        }
        
    });

    updateInput = (value) =>{
        console.log(value);
        $('#serch-head').val(value);
        $('.head-search').addClass('hide');
    }
});

