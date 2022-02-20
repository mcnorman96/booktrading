<?php

namespace App\Http\Controllers;

use App\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    public function login() {
        $email = request('email');
        $password = request('password');

        $users = User::where('email', $email)->get();

        $foundUser = null;

        foreach($users as $user) {
            $isMatched = password_verify($password, $user->password);

            if($isMatched) {
                $foundUser = $user;
                break;
            }
        }

        if ($foundUser != null) {
            return response()->json($foundUser, 200);
        } else {
            return abort(403, 'Unauthorized action.');
        }
    }

    public function register() {
        $name = \request('name');
        $phone = \request('phone');
        $city = \request('city');
        $email = \request('email');
        $password = \request('password');

        $user = new User();

        $user->name = $name;
        $user->phone = $phone;
        $user->city = $city;
        $user->email = $email;
        $user->password = Hash::make($password);

        try{
            $user->save();

            return response()->json($user, 200);
        }
        catch(exception $error) {
            return abort(403, 'Unauthorized action.');
        }
    }
}
