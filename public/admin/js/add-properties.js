$(document).ready(function () {
    $('#property_type').change(function (e) { 
        e.preventDefault();
        var property_type = $('#property_type').val();
        if(property_type == 'pg'){
            $('.commercial').addClass('hide');
            $('#comtype').addClass('hide');
            $('.residential').attr('checked');
        }else{
            $('.commercial').removeClass('hide')
        }
    });

    $('.commercial').click(function(){
        if($(this).is(':checked') == 1){
            $('#comtype').removeClass('hide')
            $('.commercialtype').removeClass('phide')

        }else{
            $('#comtype').addClass('hide');
            $('.commercialtype').addClass('phide')

        }
    })

    $('.residential').click(function(){
        if($(this).is(':checked') == 1){
            $('#comtype').addClass('hide');
            $('.commercialtype').addClass('phide')


        }else{
            $('#comtype').removeClass('hide');
            $('.commercialtype').removeClass('phide')


        }
    })
    
    
       
    $('.properties_type').change(function (e) { 
        e.preventDefault();
        var properties_type = $('#properties_type').val();
        if(properties_type != ''){
            $('.plocated').removeClass('hide');
        }else{
            $('.plocated').addClass('hide');
        }
    });

     

    $('.availability').change(function (e) { 
        e.preventDefault();
        var property = $('.availability').val();

        // if(property == 'Ready to move'){
        //     $('.Age').removeClass('hide');
        // }else(property == 'under construction'){
        //     $('.Possession').removeClass('hide');
        // }
    });
    
});
 
