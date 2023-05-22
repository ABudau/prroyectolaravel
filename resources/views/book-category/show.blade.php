@extends('adminlte::page')
@section('template_title')
    {{ $bookCategory->name ?? "{{ __('Show') Book Category" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Book Category</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('book-categories.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Book Id:</strong>
                            {{ $bookCategory->book_id }}
                        </div>
                        <div class="form-group">
                            <strong>Category Id:</strong>
                            {{ $bookCategory->category_id }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
