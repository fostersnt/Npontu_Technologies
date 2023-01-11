<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function dashboard()
    {
        if (Auth::user() && Auth::user()->status == 'Admin') {
            return view('admin.Dashboard');
        }
    }

    public function get_users()
    {
        $data = User::all();

        return view('users.index', compact('data'));
    }

    public function delete_user($id)
    {
        $data = User::find($id);
        //$data->delete();

        return redirect('users')->with('message', "Hey! I don't want to delete any user");
    }

    public function loginCheck(Request $req)
    {
        //$data = ['name' => 'Foster', 'age' => 21];
        //dd($data);
        $req -> validate([
                'email' => 'required|email',
                'password' => 'required|min:3|max:10',
            ],
            [
                'password.max' => 'Password should not exceed 10 characters'
            ]
        );

        $credential = $req->only('email', 'password');
        if (Auth::attempt($credential)) {
            return view('admin.Dashboard');
        }
        else{
            return redirect('login')->with('error', 'Email or Password incorrect');
        }
    }

    public function logout()
    {
        Session::flush();
        Auth::logout();

        return redirect('login');
    }

    public function registerPage()
    {
        return view('auth.register');
    }

    public function register(Request $req)
    {
        $req -> validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|max:10',
            'status' => 'required',
        ],
        [
            'password.max' => 'Password should not exceed 10 characters'
        ]
    );

        $data = $req->all();

        User::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'status' => $data['status'],
        ]);

        return redirect('getUsers')->with('success', 'New user has been registered');
    }
}
