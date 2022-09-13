<?php

namespace App\Http\Controllers;

use App\Http\Requests\ForgotFormRequest;
use App\Http\Requests\LoginFormRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            return redirect()->route('member.home');
        } else {
            return view('auth.formlogin');
        }
    }

    public function register()
    {
        return view('auth.register');
    }

    public function forget()
    {
        return view('auth.forget');
    }
    public function forgetpass(ForgotFormRequest $request)
    {
        $user = User::where('email', '=', $request->email)->first();
        if ($user != null && $user->role != 1) {

            $params = $request->all();
            $params['password'] = Hash::make($request->password);

            $user->update($params);

            return view('auth.formlogin');
        }

        return view('auth.formlogin');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            return redirect()->route('member.home');
        } else {
            return view('auth.formlogin');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('loginform');
    }

    public function store(LoginFormRequest $request)
    {
        $params = $request->all();
        $params['password'] = Hash::make($request->password);
        $data = new User();
        $data->fill($params)->save();
        $login = [
            'email' => $request->email,
            'password' => $request->password,
        ];
        if (Auth::attempt($login)) {
            return redirect()->route('home');
        } else {
            return redirect()->route('register.form');
        }
    }
}
