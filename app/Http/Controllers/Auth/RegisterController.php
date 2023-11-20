<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use GuzzleHttp\Psr7\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
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
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required','alpha_num', 'min:8',],
             'phonenumber'=>['required',],
            'confirm_password' => ['required','alpha_num', 'min:8','same:password'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    // protected function create(array $data)
    protected function create(array $data)
    {
        return User::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'phonenumber' => $data['phonenumber'],
            'password' => Hash::make($data['password']),
            'confirm_password' =>Hash::make($data['confirm_password']),
        ]);
        // $data=new User();
        // $data->firstname=$req->firstname;
        // $data->lastname=$req->lastname;
        // $data->email=$req->email;
        // $data->phonenumber=$req->phonenumber;
        // $data->password=Hash::make($data->password);
        // $data->confirm_password=Hash::make($data->confirm_password);
        // if($data->save()){
        //     return view('auth.login');
        // }
        // else
        // return back()->with('error','You are not registered ');
      
    }
}
