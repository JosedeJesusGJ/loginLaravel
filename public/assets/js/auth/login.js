$("#btn_login").click(function () {


  $.ajax({
    url: "/login",
    type: "POST",
    data: {
      email: $('#email').val(),
      password: $('#password').val(),
      _token: $('input[name="_token"]').val()
    },
    success: function (response) {

      console.log(response);
      // if (response.success) {
      //   // Redirigir al usuario a la página de inicio después del inicio de sesión
      //   window.location.href = "{{ route('home') }}";
      // } else {
      //   // Mostrar un mensaje de error
      //   alert('Email o password incorrecto');
      // }
    },
    error: function () {
      // Mostrar un mensaje de error
      alert('Error al iniciar sesión');
    }
  });

});