<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use mysql_xdevapi\Exception;

class ProviderController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }
    public function callback($provider)
    {
        try {


        $SocialUser = Socialite::driver($provider)->stateless()->user();

        $user = User::where('email', $SocialUser->email)->first();
        if($user){
            Auth::login($user);
        }else {
            $user = User::updateOrCreate([
                'id' => $SocialUser->id,
            ], [
                'name' => $SocialUser->name,
                'email' => $SocialUser->email,
                'prenom' => $SocialUser->name,
                'password' => Hash::make($SocialUser->email),
                'telephone' => '',
                'status' => true,
                'email_verified_at' => now(),
            ]);

            Auth::login($user);
        }

        return redirect('/');
        }catch (Exception){
            return redirect('/');
        }
    }
}
