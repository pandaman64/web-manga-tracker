<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $feed = Laminas\Feed\Reader\Reader::import('https://shonenjumpplus.com/atom');
    return view('welcome', ['items' => $feed]);
});

Route::get('/redirect', function (Request $request) {
    $to = $request->query('to');
    $read = $request->session()->get('read', []);
    $read[] = $to;
    $request->session()->put('read', $read);
    return redirect($to);
});
