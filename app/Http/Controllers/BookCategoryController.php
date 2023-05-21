<?php

namespace App\Http\Controllers;

use App\Models\BookCategory;
use Illuminate\Http\Request;

/**
 * Class BookCategoryController
 * @package App\Http\Controllers
 */
class BookCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookCategories = BookCategory::paginate();

        return view('book-category.index', compact('bookCategories'))
            ->with('i', (request()->input('page', 1) - 1) * $bookCategories->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookCategory = new BookCategory();
        return view('book-category.create', compact('bookCategory'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BookCategory::$rules);

        $bookCategory = BookCategory::create($request->all());

        return redirect()->route('book-categories.index')
            ->with('success', 'BookCategory created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookCategory = BookCategory::find($id);

        return view('book-category.show', compact('bookCategory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookCategory = BookCategory::find($id);

        return view('book-category.edit', compact('bookCategory'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BookCategory $bookCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookCategory $bookCategory)
    {
        request()->validate(BookCategory::$rules);

        $bookCategory->update($request->all());

        return redirect()->route('book-categories.index')
            ->with('success', 'BookCategory updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bookCategory = BookCategory::find($id)->delete();

        return redirect()->route('book-categories.index')
            ->with('success', 'BookCategory deleted successfully');
    }
}
