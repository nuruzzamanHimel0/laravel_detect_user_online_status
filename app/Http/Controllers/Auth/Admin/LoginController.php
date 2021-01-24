<?php

namespace App\Http\Controllers\Auth\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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
    protected $redirectTo = '/';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:admin')->except('logout');
    }
//    orerried.........
    public function showLoginForm()
    {
//        dd('show login');
        return view('auth.Admin.login');
    }
    public function logout(Request $request)
    {
        $this->guard('admin')->logout();

        $request->session()->invalidate();

        return $this->loggedOut($request) ?: redirect()->route('home');
    }
    public function login(Request $request)
    {

//        dd('submit');
        // Login Validation......
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);


        // user must be login
        if(Auth::guard('admin')->attempt(['email'=> $request->email,'password'=>$request->password], $request->remember))
        {
            dd('login');
            // Login Now....
            return redirect()->intended(route('home'));
        }
        else{
            dd('not login');
            session()->flash('error','Invalid Login !!');
            return redirect()->route('admin.login');
        }




    }

}
