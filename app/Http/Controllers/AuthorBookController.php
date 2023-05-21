<?php

namespace App\Http\Controllers;

use App\Models\AuthorBook;
use Illuminate\Http\Request;

/**
 * Class AuthorBookController
 * @package App\Http\Controllers
 */
class AuthorBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authorBooks = AuthorBook::paginate();

        return view('author-book.index', compact('authorBooks'))
            ->with('i', (request()->input('page', 1) - 1) * $authorBooks->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authorBook = new AuthorBook();
        return view('author-book.create', compact('authorBook'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(AuthorBook::$rules);

        $authorBook = AuthorBook::create($request->all());

        return redirect()->route('author-books.index')
            ->with('success', 'AuthorBook created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $authorBook = AuthorBook::find($id);

        return view('author-book.show', compact('authorBook'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authorBook = AuthorBook::find($id);

        return view('author-book.edit', compact('authorBook'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  AuthorBook $authorBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AuthorBook $authorBook)
    {
        request()->validate(AuthorBook::$rules);

        $authorBook->update($request->all());

        return redirect()->route('author-books.index')
            ->with('success', 'AuthorBook updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $authorBook = AuthorBook::find($id)->delete();

        return redirect()->route('author-books.index')
            ->with('success', 'AuthorBook deleted successfully');
    }
}
