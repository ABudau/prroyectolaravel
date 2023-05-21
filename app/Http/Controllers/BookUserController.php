<?php

namespace App\Http\Controllers;

use App\Models\BookUser;
use Illuminate\Http\Request;

/**
 * Class BookUserController
 * @package App\Http\Controllers
 */
class BookUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookUsers = BookUser::paginate();

        return view('book-user.index', compact('bookUsers'))
            ->with('i', (request()->input('page', 1) - 1) * $bookUsers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bookUser = new BookUser();
        return view('book-user.create', compact('bookUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(BookUser::$rules);

        $bookUser = BookUser::create($request->all());

        return redirect()->route('book-users.index')
            ->with('success', 'BookUser created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bookUser = BookUser::find($id);

        return view('book-user.show', compact('bookUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bookUser = BookUser::find($id);

        return view('book-user.edit', compact('bookUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  BookUser $bookUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BookUser $bookUser)
    {
        request()->validate(BookUser::$rules);

        $bookUser->update($request->all());

        return redirect()->route('book-users.index')
            ->with('success', 'BookUser updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $bookUser = BookUser::find($id)->delete();

        return redirect()->route('book-users.index')
            ->with('success', 'BookUser deleted successfully');
    }
}
