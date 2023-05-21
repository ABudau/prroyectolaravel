@extends('layouts.app')

@section('template_title')
    Book
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Book') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('books.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                                        <!-- <th>ID</th> -->
                                        <th>Titulo</th>
                                        <th>ISBN</th>
                                       
                                        <th>Editorial</th>
                                        <th>Numero Paginas</th>
                                       
                                        <th>Categorías</th> {{-- Nueva columna --}}
                                        <th>Autor</th>
                                        <th>Portada</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($books as $book)
                                        <tr>
                                            <!-- <td>{{ $book->id}}</td> -->
                                            <td>{{ $book->titulo }}</td>
                                            <td>{{ $book->ISBN }}</td>
                                            <td>{{ $book->editorial }}</td>
                                            <td>{{ $book->numero_paginas }}</td>
                                            <td> {{-- Nueva celda --}}
                                                @foreach ($book->categories as $category)
                                                    {{ $category->Nombre }}
                                                    @if ($category->subcategory)
                                                        ({{ $category->subcategory->Nombre }})
                                                    @endif
                                                    @if (!$loop->last)
                                                        ,
                                                    @endif
                                                @endforeach
                                            </td>
                                            <td>
                                                <ul class="list-group list-group-flush">
                                                    @foreach ($book->authors as $author)
                                                    <li class="list-group-item"> {{$author->nombre}} {{$author->apellidos}}</li>
                                                    @endforeach
                                                </ul>
                                            </td>
                                                <!-- </tr> -->
                                            <td><img class="img-fluid img-thumbnail" src="{{ asset('storage'.'/'.$book->portada) }}" alt="Portada del libro" width="200"></td>
                                            <td>
                                                <form action="{{ route('books.destroy',$book->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('books.show',$book->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('books.edit',$book->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $books->links() !!}
            </div>
        </div>
    </div>
@endsection
