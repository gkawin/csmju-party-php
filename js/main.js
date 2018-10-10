
jQuery(function($) {
    //register modal
    $('#regis-modal').modal('hide');
    $('#payment-modal').modal('hide');
    
    //notification setting    
    setTimeout(function () { 
        $(".notice-autohide").hide( 'blind', {}, 500 );    
    },5000);
    
    $('.notice-clickhide').click(function () { 
        $(this).fadeOut(500); 
    });
    
    //datetime
    $('#input-date').datetimepicker({
        pickSeconds: false,
        language: 'en'
    });
    
    
    
});

