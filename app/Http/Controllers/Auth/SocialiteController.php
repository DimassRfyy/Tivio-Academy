<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function redirect() {
        return Socialite::driver('google')->redirect();
    }

    public function callback() {
    $googleUser = Socialite::driver('google')->user();

    $registeredUser = User::where('google_id', $googleUser->getId())->first();

    if ($registeredUser) {
        Auth::login($registeredUser);

        return redirect()->route('dashboard');
    } else {
        $user = User::updateOrCreate([
            'google_id' => $googleUser->getId(),
        ], [
            'name' => $googleUser->getName(),
            'email' => $googleUser->getEmail(),
            'password' => bcrypt($googleUser->getId()),
            'occupation' => 'Student',
            'photo' => $googleUser->getAvatar(),
            'google_token' => $googleUser->token,
            'google_refresh_token' => $googleUser->refreshToken,
        ]);
        
        $user->assignRole('student');

        event(new Registered($user));

        Auth::login($user);
    
        return redirect(route('dashboard', absolute: false));
    }
    }
}
