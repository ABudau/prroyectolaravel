<?php

namespace App\Http\Controllers;

use App\Models\RolUser;
use Illuminate\Http\Request;

/**
 * Class RolUserController
 * @package App\Http\Controllers
 */
class RolUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rolUsers = RolUser::paginate();

        return view('rol-user.index', compact('rolUsers'))
            ->with('i', (request()->input('page', 1) - 1) * $rolUsers->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $rolUser = new RolUser();
        return view('rol-user.create', compact('rolUser'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(RolUser::$rules);

        $rolUser = RolUser::create($request->all());

        return redirect()->route('rol-user.index')
            ->with('success', 'RolUser created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $rolUser = RolUser::find($id);

        return view('rol-user.show', compact('rolUser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $rolUser = RolUser::find($id);

        return view('rol-user.edit', compact('rolUser'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  RolUser $rolUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, RolUser $rolUser)
    {
        request()->validate(RolUser::$rules);

        $rolUser->update($request->all());

        return redirect()->route('rol-user.index')
            ->with('success', 'RolUser updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $rolUser = RolUser::find($id)->delete();

        return redirect()->route('rol-user.index')
            ->with('success', 'RolUser deleted successfully');
    }
}
