<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use Spatie\Permission\Models\Role;

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
    // protected function validator(array $data)
    // {
    //     return Validator::make($data, [
    //         'name' => ['required', 'string', 'max:25'],
    //         'surname' => ['required', 'string', 'max:25'],
    //         'role' => ['required', 'string', 'max:1'],
    //         'email' => ['required', 'string', 'email', 'max:25', 'unique:users'],
    //         'password' => ['required', 'string', 'min:8', 'confirmed'],
    //         'confirmed' => ['required', 'string', 'min:8']
    //     ]);
    // }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function register(Request $request)
    {
        $user = new User();
        $all_roles = Role::all();

        $user->name = $request->get('name');
        $user->surname = $request->get('surname');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $user->assignRole( $request->get('role') );
        
        if( $user->save() )
        {
            $message = 'User Registered successfully. Please sign in';
            return view('auth.register', 
                        compact(['message', 'all_roles']));
        }
        else
        {
            $message = 'Failed to create user. Please try again';
            return view('auth.register', 
                        compact(['message', 'all_roles']));
        }

    }

    protected function showRegistrationForm()
    {
        $all_roles = Role::all();
        return view('auth.register', 
                    compact(['all_roles']));
    }
}
