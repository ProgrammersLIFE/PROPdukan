$(document).ready(function () {
    var url = $(this).attr('data-action');

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
                if(response.status == 200){
                    $('.alert-success').removeClass('hide');
                    $('.message').text(response.message);
                        getcat();
                }
            }
        }); 
    });

    $(document).on('click', '.close', function(){
        location.reload();
    });


    $('#properties_type').change(function(e){
        e.preventDefault();
        var type = $(this).val();
        if(type == 'Land'){
            $('.Dimensions').removeClass('hide');
            $('.bedroom').addClass('hide');
            $('.apartment').addClass('hide');
        }else if(type == 'Plot/Land'){
            $('.Dimensions').removeClass('hide');
            $('.bedroom').addClass('hide');
            $('.apartment').addClass('hide');
        }else{
            $('.bedroom').removeClass('hide');
            $('.apartment').removeClass('hide');
            $('.Dimensions').addClass('hide');
        }

        if ($('.commercial').is(':checked') == true) {
            $('.kind_t').text('What kind of'  + ' '+type+' ' +   'is it ?');
            $.ajax({
                type: "get",
                url: 'kindget',
                data: {data:type},
                dataType: 'JSON',
                success: function (response) {
                    $('.kinds_type').html(response.data);
                    
                }
            }); 
        }
        
    })


    $('#property_type').change(function (e) { 
        e.preventDefault();
        var property_type = $('#property_type').val();
        if(property_type == 'pg'){
            $('.commercial').addClass('hide');
            $('#comtype').addClass('phide');
            $("input[name='residential'][value='residential']").prop("checked", true);
        }else{
            $('.commercial').removeClass('hide')
        }
    });

    $('.commercial').click(function(){
        if($(this).is(':checked') == 1){
            $('.lease_ty').removeClass('hide');
            $('#comtype').removeClass('phide');
            $('.commercialtype').removeClass('phide');

        }
    })

    $('.residential').click(function(){
        if($(this).is(':checked') == 1){
          var type =  $(this).val();

            $('#comtype').addClass('phide');
            $('.commercialtype').addClass('phide');
            $('.lease_ty').addClass('hide');

        }else{
            $('#comtype').removeClass('phide');
            $('.commercialtype').removeClass('phide')
        }
    })

    $('.change-type').click(function(){
        let id = $(this).val();
        $.ajax({
            type: "get",
            url:"ptype",
            data: {p_type:id},
            dataType: 'JSON',
            success: function (response) {
                $('.properties_type').html(response.data);
            }
        });
    });

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
        $('.propert_features').val(selectedValues);
    });

    $('.other_room').on('change', function() {
        var selectedValues = $(this).val();
        $('.other_rooms').val(selectedValues);
    });

    $('.amenitie').on('change', function() {
        var selectedValues = $(this).val();
        $('.amenities').val(selectedValues);
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
 
