$(document).ready(function () {
    if(localStorage.getItem('theme') === null){
        localStorage.setItem('theme', 'light');
    };

    if(localStorage.getItem('theme') === 'light'){
        $('body').attr('data-bs-theme', '');
        $('#themeIcon').removeClass('ti-sun');
        $('#themeIcon').addClass('ti-moon');
        $('#buttonChangeTheme').attr('data-bs-original-title', 'Mode Gelap');
    } else {
        $('body').attr('data-bs-theme', 'dark');
        $('#themeIcon').removeClass('ti-moon');
        $('#themeIcon').addClass('ti-sun');
        $('#buttonChangeTheme').attr('data-bs-original-title', 'Mode Terang');
    };

    $('#buttonChangeTheme').on('click', function () {  
        $('#themeIcon').toggleClass('ti-moon ti-sun');
        if(localStorage.getItem('theme') === 'light'){
            localStorage.setItem('theme', 'dark');
            $('body').attr('data-bs-theme', 'dark');
            $('#buttonChangeTheme').attr('data-bs-original-title', 'Mode Terang').tooltip('show');
        } else {
            localStorage.setItem('theme', 'light');
            $('body').attr('data-bs-theme', '');
            $('#buttonChangeTheme').attr('data-bs-original-title', 'Mode Gelap').tooltip('show');
        };
    });
});