@extends('layouts.app-loginauth')
@section('template_title')
    {{ __('cookies') }} aceptar cookies
@endsection
@section('content')
<div class="container-fluid">
    <div class="row justify-content">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Política de cookies</div>

                <div class="card-body">
                    @isset($mensaje)
                        <div class="alert alert-danger">{{ $mensaje }}</div>
                    @endisset
                    <p>Este sitio web utiliza cookies para mejorar su experiencia. ¿Acepta el uso de cookies?</p>
                    <form method="GET" action="/set-cookie" style="display: inline-block;">
                        <button type="submit" class="btn btn-primary">Aceptar</button>
                    </form>
                    <form method="GET" action="/delete-cookie" style="display: inline-block;">
                        <button type="submit" class="btn btn-danger">Rechazar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection