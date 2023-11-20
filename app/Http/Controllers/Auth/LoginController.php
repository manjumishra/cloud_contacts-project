<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    
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

     
    protected $maxAttempts = 3; // Default is 5
    protected $decayMinutes = 1; // Default is 1
   
    
    protected function credentials(Request $request)
    {
        if(is_numeric($request->get('email')))
        {
            return ['phonenumber'=>$request->get('email'),'password'=>$request->get('password')];
        }
        return $request->only($this->username(), 'password');
    }
   
    
}
