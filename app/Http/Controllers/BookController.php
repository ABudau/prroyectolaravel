<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;

// use Barryvdh\DomPDF\Facade\Pdf;
/**
 * Class BookController
 * @package App\Http\Controllers
 */
class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        // $authors = Author::all();
        $books = Book::with('categories.subcategory','authors')->paginate();
        return view('book.index', compact('books'))
            ->with('i', (request()->input('page', 1) - 1) * $books->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $book = new Book();
        $categories = Category::pluck('Nombre', 'id');
        // $authors = Author::all();
        $authors = Author::selectRaw("CONCAT(Nombre, ' ', Apellidos) as full_name, id")->pluck('full_name', 'id');
        
        return view('book.create', compact('book', 'categories','authors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ISBN' => 'required|unique:books',
            'titulo' => 'required',
            'editorial' => 'required',
            'numero_paginas' => 'required|integer',
            'portada' => 'required|image',
            'categories' => 'nullable|array',
            'categories.*' => 'exists:categories,id'
            ]);


        $bookData = $request->all();
        if ($request->hasFile('portada')) {
        $bookData['portada'] = $request->file('portada')->store('portadas', 'public');
        // $bookData['portada'] = $request->file('portada');

        }
       
        $book = Book::create($bookData);
        $book->categories()->attach($request->input('categories'));
        $book->authors()->attach($request->input('authors'));
       
        return redirect()->route('books.index')
        ->with('success', 'Libro creado con éxito.');


    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('book.show', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // $book = Book::find($id);

        // return view('book.edit', compact('book'));
        $book = Book::find($id);
        $categories = Category::pluck('Nombre', 'id');
        // $authors = Author::all();
        $authors = Author::selectRaw("CONCAT(Nombre, ' ', Apellidos) as full_name, id")->pluck('full_name', 'id');

        return view('book.edit', compact('book', 'categories','authors'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Book $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {

        $request->validate([
            'ISBN' => 'required|unique:books,ISBN,' . $book->id,
            'titulo' => 'sometimes|required',
            'editorial' => 'sometimes|required',
            'numero_paginas' => 'sometimes|required|integer',
            'portada' => 'sometimes|required|image',
            'categories' => 'sometimes|required|array',
            'categories.*' => 'exists:categories,id'
            ]);

        $bookData = $request->all();
        if ($request->hasFile('portada')) {
            $bookData['portada'] = $request->file('portada')->store('portadas', 'public');
        }

        $book->update($bookData);
        if ($request->has('categories')) {
            $book->categories()->sync($request->input('categories', []));
           }
        if ($request->has('authors')) {
            $book->authors()->sync($request->input('authors', []));
        }

        // $book->categories()->sync($request->input('categories', []));

        return redirect()->route('books.index')
        ->with('success', 'Libro actualizado con éxito');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $book = Book::find($id)->delete();

        return redirect()->route('books.index')
            ->with('success', 'Book deleted successfully');
    }


}
