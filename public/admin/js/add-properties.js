$(document).ready(function () {
    $('#form').submit(function (e) { 
        e.preventDefault(); 
        var url = $(this).attr('data-action');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            type: "post",
            url: url,
            data: new FormData(this),
            dataType: 'JSON',
            contentType: false,
            cache: false,
            processData: false,
            success: function (response) {
                // console.log(response);
                if(response.status == 200){
                    $('.alert-success').removeClass('hide');
                    $('.message').text(response.message);
                }
            }
        }); 
    });
    
    $(document).on('click', '.close', function(){
        location.reload();
    });

    $('#property_type').change(function (e) { 
        e.preventDefault();
        var property_type = $('#property_type').val();
        if(property_type == 'pg'){
            $('.commercial').addClass('hide');
            $('#comtype').addClass('hide');
            // $('.residential').attr('checked');
            $("input[name='residential'][value='residential']").prop("checked", true);
        }else{
            $('.commercial').removeClass('hide')
        }
    });

    $('.commercial').click(function(){
        if($(this).is(':checked') == 1){
        //   var type =  $(this).val();
            $('.lease_ty').removeClass('hide');
            $('#comtype').removeClass('hide');
            $('.commercialtype').removeClass('phide');
            // console.log(type);

        }
    })

    $('.residential').click(function(){
        if($(this).is(':checked') == 1){
          var type =  $(this).val();

            $('#comtype').addClass('hide');
            $('.commercialtype').addClass('phide');
            $('.lease_ty').addClass('hide');
            console.log(type);

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

        if(property == 'Ready to move'){
            $('.Possession').addClass('hide')
            $('.Age').removeClass('hide')

        }else if (property == 'under construction'){
            $('.Age').addClass('hide')
            $('.Possession').removeClass('hide')
        }else{
            $('.Age').addClass('hide');
            $('.Possession').addClass('hide')
        }
        
    });

    $('.pre-list').change(function (e) { 
        e.preventDefault();
        var lease_val = $(this).val();
        console.log(lease_val);
    });
     
   

    $('.property-feature').on('change', function() {
        var selectedValues = $(this).val();
        $('.propert_featureS').val(selectedValues);
    });

    $('.other_rooms').on('change', function() {
        var selectedValues = $(this).val();
        $('.other_room').val(selectedValues);
    });

    $('.amenities').on('change', function() {
        var selectedValues = $(this).val();
        $('.amenitie').val(selectedValues);
    });
    
    $('.society_buildings').on('change', function() {
        var selectedValues = $(this).val();
        $('.society_building').val(selectedValues);
    });

    $('.additional_features').on('change', function() {
        var selectedValues = $(this).val();
        $('.additional_feature').val(selectedValues);
    });

    $('.water_sources').on('change', function() {
        var selectedValues = $(this).val();
        $('.water_source').val(selectedValues);
    });

    $('.overlookings').on('change', function() {
        var selectedValues = $(this).val();
        $('.overlooking').val(selectedValues);
    });

    $('.locations').on('change', function() {
        var selectedValues = $(this).val();
        $('.location').val(selectedValues);
    });

    

});
 
