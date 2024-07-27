<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

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

Route::get('/auth/google/redirect', function () {
    return Socialite::driver('google')->redirect();
});

Route::get('/auth/google/callback', function () {
    $googleUser = Socialite::driver('google')->user();

    $user = User::query()->firstOrCreate(
        ['email' => $googleUser->getEmail()],
        [
            'name' => $googleUser->getName(),
            'provider' => 'google',
            'provider_id' => $googleUser->getId(),
        ]
    );
    Auth::login($user);
    return redirect()->intended();
});
