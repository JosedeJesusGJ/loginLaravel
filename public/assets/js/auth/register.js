$('#btn_register').click(function () {
    $.ajax({
        url: '/register',
        method: 'POST',
        data: {
            nombre: $('#nombre').val(),
            apellidos: $('#apellidos').val(),
            edad: $('#edad').val(),
            email: $('#email').val(),
            password: $('#password').val(),
            password_confirm: $('#password_confirm').val(),
            _token: $('input[name="_token"]').val()
        },
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
                // alert('Datos enviados correctamente');
                $('#messages').html(response.message);
            } else {
                mostrarErrores(response.errors);
            }
        }
    });

    function mostrarErrores(errors) {
        // muestra los nuevos errores debajo de los inputs correspondientes
        $.each(errors, function (key, value) {
            $('#' + key + 'Error').html('<p>' + value + '</p>');
        });
    }
});


