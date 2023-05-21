<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
// use App\Http\Requests\LoginRequest;
// use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Auth;
// use App\Http\Controllers\Admin\HomeController
class HomeController extends Controller
{
    public function index(){
   
        return view('admin.index'); 
    }
    //
}
