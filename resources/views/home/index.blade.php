@extends("home.templeate")

@section('content')


<!-- Esta directiva funciona para mostrar un contenido a las personas que estan logueadas. -->
@auth
<h1>Estas logueado {{ auth()->user()->nombre ?? auth()->user()->email }}</h1>
@endauth

<!-- Esta directiva funciona para mostrar un contenido a las personas que no estan logueadas. -->
@guest
<h1>No estas logueado</h1>
<p>Para ver todo el contenido <a href="{{ route('login') }}">inicia sesión</a></p>
@endguest

@endsection