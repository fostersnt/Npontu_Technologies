setTimeout(() => {
    
    $('.alert-success').fadeOut(5000, function() {
        //$('.alert').remove();
        $('.alert-success').css({
            'visibility' : 'hidden'
        });
    });
    //
}, 1000);