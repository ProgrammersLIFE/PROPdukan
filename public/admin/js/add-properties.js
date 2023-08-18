$(document).ready(function () {
    $('#property_type').change(function (e) { 
        e.preventDefault();
        var property_type = $('#property_type').val();
        if(property_type == 'pg'){
            $('.commertial').addClass('hide');
        }else{
            $('.commertial').removeClass('hide')
        }
        
    });
});