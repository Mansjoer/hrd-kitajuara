$('#formLogin').on('submit', function (e) {

    const inputLoginNik = $('#inputLoginNik').val();
    const inputLoginPassword = $('#inputLoginPassword').val();
    const inputLoginRemember = $('#inputLoginRemember').is(':checked');

    e.preventDefault();

    $.ajax({
        type: "POST",
        url: "/auth/login",
        data: {
            nik: inputLoginNik,
            password: inputLoginPassword,
            remember: inputLoginRemember
        },
        dataType: "JSON",
        beforeSend: function() {
            $('#btnSubmitLoginForm').addClass('btn-loading');
        },
        complete: function(){
            setTimeout(() => {
                $('#btnSubmitLoginForm').removeClass('btn-loading');
            }, 2000);
            setTimeout(() => {
                $('#modalLogin').modal('hide');
            }, 2000);
        },
        success: function (response) {
            if(response.success){
                setTimeout(() => {
                    $('#modalLoginSuccess').modal('show');
                }, 2000);
                setTimeout(() => {
                    $('#modalLoginSuccess').modal('hide');
                }, 5000);
                setTimeout(() => {
                    location.reload();
                }, 5500);
            } else {
                setTimeout(() => {
                    $('#modalLoginError').modal('show');
                }, 2000);
                setTimeout(() => {
                    $('#formLogin').trigger('reset');
                    $('#modalLoginError').modal('hide');
                    $('#modalLogin').modal('show');
                }, 5000);
            }
        },
        error: function(response){
            setTimeout(() => {
                $('#modalLoginError').modal('show');
            }, 2000);
            setTimeout(() => {
                $('#formLogin').trigger('reset');
                $('#modalLoginError').modal('hide');
                $('#modalLogin').modal('show');
            }, 5000);
        },
    });
});

$('.toggle-password').on('click', function () {  
    $('.toggle-password-icon').toggleClass('ti-eye ti-eye-off');
    var input = $('#inputLoginPassword');
    if(input.attr('type') == 'password'){
        input.attr('type', 'text');
        $(this).attr('data-bs-original-title', 'Sembunyikan Kata Sandi').tooltip('show');
    } else {
        input.attr('type', 'password');
        $(this).attr('data-bs-original-title', 'Lihat Kata Sandi').tooltip('show');
    }
});