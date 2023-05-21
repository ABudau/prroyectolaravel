<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('id_autor') }}
            {{ Form::text('id_autor', $authorBook->id_autor, ['class' => 'form-control' . ($errors->has('id_autor') ? ' is-invalid' : ''), 'placeholder' => 'Id Autor']) }}
            {!! $errors->first('id_autor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('id_libro') }}
            {{ Form::text('id_libro', $authorBook->id_libro, ['class' => 'form-control' . ($errors->has('id_libro') ? ' is-invalid' : ''), 'placeholder' => 'Id Libro']) }}
            {!! $errors->first('id_libro', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>