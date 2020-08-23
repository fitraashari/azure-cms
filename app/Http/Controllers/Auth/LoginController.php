<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function login(Request $request){
        $this->validate($request, [
            'username'=>'required|string',//validasi form username, datap berisi username atau email
            'password'=>'required|string|min:6'
        ]);

        //lakukan pengecekan username atau email
        $loginType = filter_var($request->username, FILTER_VALIDATE_EMAIL)?'email':'username';
        
        //tampung informasi login 
        $login=[
            $loginType=>$request->username,
            'password'=>$request->password
        ];

        //proses login
        if(auth()->attempt($login)){
            //jika berhasil redirek ke halaman home
            return redirect()->route('home')->with('success', 'Welcome '.auth()->user()->name.'!');
        }
        //jika salah maka kemabli ke halaman login dan tampilakn error
        // return redirect()->route('login')->with(['error'=>'Email/Password Salah!']);
        return redirect()->route('login')->with('errors', 'Login Failed, Please Check Username/Password');
    }
}
