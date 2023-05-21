  @extends('layouts.app-login')
  @section('content')
  
  
  <h1 class="container">Home</h1>
<!-- Cuando el usuario se loguea en la página le aparece el mensaje con su nombre -->
    @auth
        <p>BIENVENIDO {{ Auth::user()->nombre }}, HAS ACCEDIDO CORRECTAMENTE</p>

        <p><a href="/logout">Logout</a></p>
    @endauth
<!-- si el usuario accede a la página y quiere ver el contenido se tiene que loguear/registrar para poder hacerlo -->
    @guest
        <p>Para ver el contenido <a href="/login">inicia sesión</a></p>
    @endguest
@endsection