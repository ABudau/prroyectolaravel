<div class="box box-info padding-1">
    <div class="box-body">
    {{ Form::open(['route' => 'books.store', 'enctype' => 'multipart/form-data']) }}
        <div class="form-group">
            {{ Form::label('portada', 'Portada') }}
            {{ Form::file('portada', ['class' => 'form-control' . ($errors->has('portada') ? ' is-invalid' : '')]) }}
            {!! $errors->first('portada', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('ISBN') }}
            {{ Form::text('ISBN', $book->ISBN, ['class' => 'form-control' . ($errors->has('ISBN') ? ' is-invalid' : ''), 'placeholder' => 'Isbn']) }}
            {!! $errors->first('ISBN', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('titulo') }}
            {{ Form::text('titulo', $book->titulo, ['class' => 'form-control' . ($errors->has('titulo') ? ' is-invalid' : ''), 'placeholder' => 'Titulo']) }}
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('editorial') }}
            {{ Form::text('editorial', $book->editorial, ['class' => 'form-control' . ($errors->has('editorial') ? ' is-invalid' : ''), 'placeholder' => 'Editorial']) }}
            {!! $errors->first('editorial', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('numero_paginas') }}
            {{ Form::text('numero_paginas', $book->numero_paginas, ['class' => 'form-control' . ($errors->has('numero_paginas') ? ' is-invalid' : ''), 'placeholder' => 'Numero Paginas']) }}
            {!! $errors->first('numero_paginas', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('authors', 'Autores') }}
            {{ Form::select('authors[]', $authors, null, ['class' => 'form-control' . ($errors->has('authors') ? ' is-invalid' : ''), 'multiple' => true]) }}
            {!! $errors->first('authors', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('categories', 'Categorías') }}
            {{ Form::select('categories[]', $categories, null, ['class' => 'form-control' . ($errors->has('categories') ? ' is-invalid' : ''), 'multiple' => true]) }}
            {!! $errors->first('categories', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        {{ Form::close() }}
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>