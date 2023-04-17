@extends('auth.template')

@section('content')

<div class="container border ">

    <div class="text-success" id="messages"></div>

    @csrf
    <!-- nombre -->
    <div class="mb-3">
        <label for="nombre" class="form-label mt-3">Nombre</label>
        <input type="text" class="form-control" id="nombre" aria-describedby="emailHelp" placeholder="Nombre">
        <p class="text-danger" id="nombreError"></p>
    </div>
    <!-- apellidos -->
    <div class="mb-3">
        <label for="apellidos" class="form-label">Apellidos</label>
        <input type="text" class="form-control" id="apellidos" aria-describedby="emailHelp" placeholder="Apellidos">
        <p class="text-danger" id="apellidosError"></p>
    </div>
    <!-- edad -->
    <div class="mb-3">
        <label for="edad" class="form-label">Edad</label>
        <input type="text" class="form-control" id="edad" aria-describedby="emailHelp" placeholder="Edad">
        <p class="text-danger" id="edadError"></p>
    </div>
    <!-- email -->
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" aria-describedby="emailHelp" placeholder="Email">
        <p class="text-danger" id="emailError"></p>
    </div>
    <!-- password -->
    <div class="mb-3">
        <label for="password" class="form-label">Contraseña</label>
        <input type="text" class="form-control" id="password" aria-describedby="emailHelp" placeholder="Contraseña">
        <p class="text-danger" id="passwordError"></p>
    </div>
    <!-- password confirm -->
    <div class="mb-3">
        <label for="password_confirm" class="form-label">Confirma la contraseña</label>
        <input type="text" class="form-control" id="password_confirm" aria-describedby="emailHelp" placeholder="Contraseña">
        <p class="text-danger" id="password_confirmError"></p>
    </div>

    <button id="btn_register" class="btn btn-primary text-center mb-3">Registrarse</button>
</div>

@endsection

@section('scripts')
<script src="{{ url('assets/js/auth/register.js') }}"></script>
@endsection