<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
class CookieController extends Controller
{
    public function showHome(Request $request) {
        if ($request->hasCookie('aceptarcookie')) {
            return view('home.index');
        } else {
            return view('layouts.aceptar_cookies');
        }
    }

    public function setCookie(Request $request) {
        $response = new Response(redirect('/'));
        $response->withCookie(cookie('aceptarcookie', 1, 60));
        return $response;
    }

    public function getCookie(Request $request) {
        $value = $request->cookie('aceptarcookie');
        return response()->json(['valor' => $value]);
    }

    public function deleteCookie(Request $request) {
        $response = new Response(view('layouts.aceptar_cookies', ['mensaje' => 'Debes aceptar las cookies para usar esta página.']));
        $response->withCookie(cookie()->forget('aceptarcookie'));
        return $response;
    }
    //
}
