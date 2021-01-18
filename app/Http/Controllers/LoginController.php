<?php

namespace App\Http\Controllers;

use App\Helpers\_Helper;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class LoginController extends Controller
{
    public function store(Request $request)
    {
        if( $user = User::whereName($request->name)->first() ){
            _Helper::clearUser($user);
            $this->login($user);
        } else {
            $this->makeUser($request);
        }
        return redirect()->route('game');
    }

    public function login(User $user)
    {
        Auth::login($user);
    }

    public function makeUser($request)
    {
       $user = new User();
       $user->name = $request->name;
       $user->email = Str::random(7) . '@test.mail';
       $user->password = Hash::make('password');
       $user->save();

       Auth::login($user);
       return $user;
    }


}
