
@extends('adminlte::page')
@section('template_title')
    Category
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Categorias') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('categories.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Nueva Categoria') }}
                                </a>
                                <a href="{{ route('categoria.pdf') }}" class="btn btn-info btn-sm float-right"  data-placement="left">
                                  {{ __('Descargar PDF') }}
                                </a>
                              </div>
                        </div>
                    </div>
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success">
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>Id</th>
                                        
										<th>Categoria</th>
										<!-- <th>Subcategoria</th> -->


                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($categories as $category)
                                        <tr>
                                            
                                            <td>{{$category->id}} </td>
											<td>{{ $category->Nombre }}</td>
											
                                            <!-- @if ($category->subcategory)
                                                
                                                <td>{{ $category->subcategory->Nombre }}</td>
                                            @else
                                                <td>No tiene subcategoría</td>
                                            @endif -->
                                            <td>
                                                <form action="{{ route('categories.destroy',$category->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('categories.show',$category->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('categories.edit',$category->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $categories->links() !!}
            </div>
        </div>
    </div>
@endsection
