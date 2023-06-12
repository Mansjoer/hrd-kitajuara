$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});

document.querySelectorAll('.tomSelect').forEach((el) => {
    let settings = {
        
        create: false,
    };
    new TomSelect(el, settings);
});

jQuery(document).ready(function() {
    $('#loader').fadeOut('slow', function () {  
        $('#mainPage').fadeIn('slow');
    });
});