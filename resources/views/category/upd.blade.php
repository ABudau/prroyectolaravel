<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('Nombre') }}
            {{ Form::text('Nombre', $category->Nombre, ['class' => 'form-control' . ($errors->has('Nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
        @if ($category->subcategoria)
                {{ Form::label('Subcategoria') }}
                {{ Form::text('Nombre',  $category->subcategoria->Nombre, ['class' => 'form-control' . ($errors->has('id_subcategoria') ? ' is-invalid' : ''), 'placeholder' => 'Id Subcategoria']) }}
                {!! $errors->first('Nombre', '<div class="invalid-feedback">:message</div>') !!}
            @endif
            {{ Form::label('id_subcategoria') }}
            {{ Form::text('id_subcategoria', $category->Nombre, ['class' => 'form-control' . ($errors->has('id_subcategoria') ? ' is-invalid' : ''), 'placeholder' => 'Id Subcategoria']) }}
            {!! $errors->first('id_subcategoria', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>