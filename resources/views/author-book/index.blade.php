@extends('adminlte::page')
@section('template_title')
    Author Book
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Author Book') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('author-books.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
                                  {{ __('Create New') }}
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
                                        <th>No</th>
                                        
										<th>Id Autor</th>
										<th>Id Libro</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($authorBooks as $authorBook)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $authorBook->id_autor }}</td>
											<td>{{ $authorBook->id_libro }}</td>

                                            <td>
                                                <form action="{{ route('author-books.destroy',$authorBook->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('author-books.show',$authorBook->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('author-books.edit',$authorBook->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $authorBooks->links() !!}
            </div>
        </div>
    </div>
@endsection
