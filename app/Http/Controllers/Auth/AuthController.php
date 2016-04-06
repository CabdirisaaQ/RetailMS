<?php

namespace Retailms\Http\Controllers\Auth;

use Auth;
use Validator;
use Retailms\Models\User;
use Illuminate\Http\Request;
use Retailms\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/';

    /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('guest', ['except' => 'logout']);
    }


   public function getSignin()
   {
    return view('auth.signin');
   }

   public function postSignin(Request $request)
   {
        $this->validate($request, [
            'username' =>  'required',
            'password'  =>  'required',
        ]);

     
        if (!Auth::attempt($request->only(['username', 'password']))) {
            return redirect()->back()->with('info', 'Wad ku guuldaraysatay, Fadlan iskuday mar kale.');
        }

        return redirect()->route('home');
      
   }

   public function getSignout()
   {
     Auth::logout();
     return redirect()->route('home');
   }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
       /* return Validator::make($data, [
            'fname'         => 'required|max:255',
            'lname'         => 'required|max:255',
            'username'      => 'required|username|max:255|unique:users',
            'employment'    => 'required|max:255',
            'permission'    => 'required|max:255',
            'password'      => 'required|confirmed|min:6',
        ]);*/
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'fname'      => $data['fname'],
            'lname'      => $data['lname'],
            'username'   => $data['username'],
            'employment' => $data['employment'],
            'permission' => $data['permission'],
            'password'   => bcrypt($data['password']),
        ]);
    }
}
