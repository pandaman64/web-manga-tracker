<?php

use App\Models\Chapter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;

Route::get('/', function () {
    $chapters = Chapter::query()
        ->orderBy('feed_updated_at', 'desc')
        ->limit(50)
        ->with('publisher')
        ->get();
    return view('welcome', ['chapters' => $chapters]);
});

Route::get('/view', function (Request $request) {
    /** @var Chapter $chapter */
    $chapter = Chapter::query()->find($request->query('chapter_id'));
    $read = $request->session()->get('read', []);
    $read[] = $chapter->id;
    $request->session()->put('read', $read);
    return redirect($chapter->permalink);
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
