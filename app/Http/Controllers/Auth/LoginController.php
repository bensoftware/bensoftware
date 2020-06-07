<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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


    // protected function authenticated(Request $request, $user)
    // {
    //     if ( $user->isAdmin() ) {
    //         return redirect()->route('dashboard');
    //     }
    //     //1:de;2:agent anapej;3:Employeur;4:centre_formation    
    //     switch ($user->sys_types_user_id) {
    //         case '1': $link = '/'; break;
            
    //         default: $link = '/'; break;
    //     }

    //     return redirect($link);
    // }

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
}
