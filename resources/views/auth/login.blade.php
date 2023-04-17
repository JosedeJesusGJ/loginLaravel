@extends('auth.template')

@section('content')

<div class="container border col-7">
    @csrf
    <div class="mt-3 mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" name="password" id="password">
    </div>
    <button name="" id="btn_login" class="btn btn-primary mb-3" href="#">Iniciar Sesión</button>
</div>

@endsection

@section('scripts')
<script src="{{ url('assets/js/auth/login.js') }}"></script>
@endsection