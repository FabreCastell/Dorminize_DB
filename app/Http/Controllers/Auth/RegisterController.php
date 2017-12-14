<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Owner;
use App\Client;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

use Illuminate\Http\Request;

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

    protected function authenticated(Request $request, $user)
    {
    if ( $user->status == "owner" ) {// do your magic here
        return redirect('/');
    }
        return redirect('/clients');
    }
    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    //protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');

    }

    // public function postRegister(Request $request)
    // {
    //    $validator = $this->registrar->validator($request->all());
    //    if ($validator->fails())
    //    {
    //        $this->throwValidationException(
    //            $request, $validator
    //        );
    //    }
    //    $this->auth->login($this->registrar->create($request->all()));
    //    dd($request);     
    //    // Now you can redirect!
       
    //    return redirect('/plan');
    // }

    


    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'ssn' => 'required|string|max:255|unique:users',
            'status' => 'required|string|max:255',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        if($data['status'] == "owner")
        {
            $owner = Owner::create([
                'ssn' => $data['ssn'],
                'name' => $data['name'],
            ]);
        }elseif($data['status'] == "client")
        {
            $client = Client::create([
                'ssn' => $data['ssn'],
                'name' => $data['name'],
                'job' => $data['job'],
                'previous_address' => $data['previous_address'],
            ]);
        }
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'ssn' => $data['ssn'],
            'status' => $data['status'],
        ]);
    }
}
