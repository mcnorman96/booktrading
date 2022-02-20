<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

const apiUrl = 'http://127.0.0.1:8000/api/';

class UsersController extends Controller
{
    public function login() {
        return view('/users/login');
    }

    public function loginCredentials() {
        $email = request('email');
        $password = request('password');
        
        $response = Http::post(apiUrl . 'users/login', [
            'email' => $email,
            'password' => $password,
        ]);

        $user = $response->json();

        $status = $response->status();

        if ($status == 403) {
            return redirect('/users/login')->with('message', 'Login failed');
        }

        session_start();

        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];
        $_SESSION['user_id'] = $user['id'];

        return redirect('/');
    }

    public function logout() {
        session_start();

        session_destroy();

        return redirect('/');
    }

    public function register() {
        return view('/users/register');
    }

    public function registerCredentials() {
        $name = request('name');
        $phone = request('phone');
        $city = request('city');
        $email = request('email');
        $password = request('password');

        $response = Http::post(apiUrl . 'users/register', [
            'email' => $email,
            'password' => $password,
            'name' => $name,
            'city' => $city,
            'phone' => $phone,
        ]);

        $user = $response->json();

        $status = $response->status();

        if ($status == 403) {
            return redirect('/users/register')->with('message', 'Registration failed');
        }

        session_start();

        $_SESSION['logged_in'] = true;
        $_SESSION['email'] = $user['email'];
        $_SESSION['name'] = $user['name'];

        return redirect('/');
    }
}
