<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
//use Auth;
use Illuminate\Support\Facades\Auth;
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
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    protected function login(Request $request)
    {
        // dd(request()->all());
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $user_role = Auth::user()->role;
            switch ($user_role) {
                case 0:
                    return redirect('/superadmin/home');
                    break;
                case 1:
                    return redirect('/admin/home');
                    break;
                case 2:
                    return redirect('/home');
                    break;
                case 3:
                    return redirect('/collector/home');
                    break;
                default:
                    Auth::logout();
                    return redirect('/login')->with('error', 'oops something went wrong');

            }

        } else {
            return redirect('login')->with('error', 'The credentials do not match our records');
        }

    }
}
