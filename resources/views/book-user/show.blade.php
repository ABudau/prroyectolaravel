@extends('adminlte::page')
@section('template_title')
    {{ $bookUser->name ?? "{{ __('Show') Book User" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Book User</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('book-users.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Usuario:</strong>
                            {{ $bookUser->id_usuario }}
                        </div>
                        <div class="form-group">
                            <strong>Id Libro:</strong>
                            {{ $bookUser->id_libro }}
                        </div>
                        <div class="form-group">
                            <strong>Puntuacion:</strong>
                            {{ $bookUser->puntuacion }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $bookUser->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $bookUser->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Descuento:</strong>
                            {{ $bookUser->descuento }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
