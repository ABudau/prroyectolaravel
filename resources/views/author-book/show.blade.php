@extends('layouts.app')

@section('template_title')
    {{ $authorBook->name ?? "{{ __('Show') Author Book" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Author Book</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('author-books.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Id Autor:</strong>
                            {{ $authorBook->id_autor }}
                        </div>
                        <div class="form-group">
                            <strong>Id Libro:</strong>
                            {{ $authorBook->id_libro }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
