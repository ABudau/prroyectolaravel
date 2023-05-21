@extends('layouts.app-loginauth')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    
                    <form action="/register" method="POST">
                        @csrf
                        <h1>REGISTRO</h1>
                        @include('layouts.partials.messages')
                            <div class="mb-3">
                                <label for="nameuser" class="form-label">Nombre</label>
                                <input type="text" name="nombre" class="form-control" id="nameuser" >
                                <!-- <div id="emailHelp" class="form-text">Nunca compartas tus claves de acceso</div> -->
                            </div>
                            <div class="mb-3">
                                <label for="apelluser" class="form-label">Apellidos</label>
                                <input type="text" name="apellidos" class="form-control" id="apelluser" >
                                <!-- <div id="emailHelp" class="form-text">Nunca compartas tus claves de acceso</div> -->
                            </div>
                            <div class="mb-3">
                                <label for="direccion" class="form-label">Dirección</label>
                                <input type="text" name="direccion" class="form-control" id="direccion" >
                                <!-- <div id="emailHelp" class="form-text">Nunca compartas tus claves de acceso</div> -->
                            </div>
                            <div class="mb-3">
                                <label for="ciudad" class="form-label">Ciudad</label>
                                <input type="text" name="ciudad" class="form-control" id="ciudad" >
                                <!-- <div id="emailHelp" class="form-text">Nunca compartas tus claves de acceso</div> -->
                            </div>
                            <div class="mb-3">
                                <label for="provincia" class="form-label">Provincia</label>
                                <input type="text" name="provincia" class="form-control" id="provincia" >
                                <!-- <div id="emailHelp" class="form-text">Nunca compartas tus claves de acceso</div> -->
                            </div>
                            <div class="mb-3">
                                <label for="codigo_postal" class="form-label">Código Postal</label>
                                <input type="text" name="codigo_postal" class="form-control" id="codigo_postal" >
                                <!-- <div id="emailHelp" class="form-text">Nunca compartas tus claves de acceso</div> -->
                            </div>
                            <div class="mb-3">
                                <label for="telefono" class="form-label">Teléfono</label>
                                <input type="number" name="telefono" class="form-control" id="telefono" >
                                <!-- <div id="emailHelp" class="form-text">Nunca compartas tus claves de acceso</div> -->
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Nombre de Usuario</label>
                                <input type="text" name="username" class="form-control" id="username">
                            </div> 
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Correo electrónico</label>
                                <input type="email" name="email" class="form-control" id="exampleInputEmail1">
                                <!-- <div id="emailHelp" class="form-text">Nunca compartas tus claves de acceso</div> -->
                            </div>
                            <div class="mb-3">
                                <label for="fechanacimineto" class="form-label">Fecha Nacimiento</label>
                                <input type="date" name="fecha_nacimiento" class="form-control" id="fechanacimineto">
                            </div>        
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Introduce una contraseña</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>        
                            <div class="mb-3">
                                <label for="exampleInputPassword2" class="form-label">Confirma la contraseña</label>
                                <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword2">
                            </div>
                            <div class="mb-3">
                            <a href="/login">Iniciar Sesión</a>
                            </div>
                            <button type="submit" class="btn btn-primary">Registrarse</button>
                        </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection