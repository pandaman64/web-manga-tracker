<?php

use App\Models\Chapter;
use App\Models\UserAction;
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
    $chapter_ids = $chapters->map(function (Chapter $chapter) {
        return $chapter->id;
    });
    $viewed_chapters = UserAction::query()
        ->where('user_id', Auth::id())
        ->wherein('chapter_id', $chapter_ids)
        ->where('action', 'view')
        ->get('chapter_id')
        ->map(function (UserAction $action) { return $action->chapter_id; })
        ->unique();
    return view('welcome', ['chapters' => $chapters, 'viewed_chapters' => $viewed_chapters]);
});

Route::get('/view', function (Request $request) {
    /** @var Chapter $chapter */
    $chapter = Chapter::query()->find($request->query('chapter_id'));
    /** @var User|null $user */
    $user = Auth::user();
    if (!is_null($user)) {
        $action = new UserAction([
            'user_id' => $user->id,
            'chapter_id' => $chapter->id,
            'action' => 'view',
        ]);
        $action->save();
    }
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
