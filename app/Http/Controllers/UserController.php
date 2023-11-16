<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function showLoginForm()
    {
        return view('login');
    }
    public function showRegisterForm()
    {
        return view('register');
    }
    public function handleLogin(Request $request)
    {
        $valdidator = Validator::make($request->only('email', 'password'), [
            'email' => 'required|email|max:255',
            'password' => 'required|min:5',
        ]);
        if ($valdidator->fails()) {
            return redirect()->back()->withErrors($valdidator, 'error');
        }
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            Alert::success('Success', 'Logged in successfully');
            return redirect('/');
        } else {
            Alert::error('Error', 'Please check your email or password again');
            return redirect('/login');
        }
    }
    public function handleRegister(Request $request)
    {
        $valdidator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users|max:255',
            'password' => 'required|min:5',
            'confirm' => 'required|same:password'
        ]);
        if ($valdidator->fails()) {
            return redirect()->back()->withErrors($valdidator, 'error')->withInput();
        }
        $data = [
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ];
        User::create($data);
        Alert::success('Success', 'Sign Up Success');
        return redirect('/login');
    }
    public function handleLogout()
    {
        Auth::logout();
        return redirect()->back();
    }
}
