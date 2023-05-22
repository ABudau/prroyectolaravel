@extends('layouts.app-login')
@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Login') }}</div>

                <div class="card-body">
                    <form action="/login" method="POST">
                        @csrf
                        <h1>LOGIN</h1>
                        @include('layouts.partials.messages')
                            <div class="mb-3">
                                <label for="exampleInputEmail1" class="form-label">Username / Correo electrónico</label>
                                <input type="text" name="username" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                                <!-- <div id="emailHelp" class="form-text">Nunca compartas tus claves de acceso</div> -->
                            </div>
                            <div class="mb-3">
                                <label for="exampleInputPassword1" class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" id="exampleInputPassword1">
                            </div>
                            <div class="mb-3">
                            <a href="/register">Crear Cuenta</a>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection