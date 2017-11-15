<?php

namespace App\Http\Controllers\Auth;

use App\Models\Buyer;
use App\Models\User;

use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Storage;

use Carbon\Carbon;

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
    protected $redirectTo = '/home';

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
            'last_name' => 'required|string|max:45',
            'first_name' => 'required|string|max:45',
            'street' => 'required|string|max:255',
            'zipcode' => 'required|string|max:5',
            'city' => 'required|string|max:45',
            'country' => 'required|string|max:45',
            'avatar_file' => 'mimes:jpeg,jpg,png,bmp|nullable',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration and a buyer.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'last_name' => $data['last_name'],
            'first_name' => $data['first_name'],
            'street' => $data['street'],
            'zipcode' => $data['zipcode'],
            'city' => $data['city'],
            'country' => $data['country'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);

        if($_FILES['avatar_file'])
            move_uploaded_file($_FILES['avatar_file']['tmp_name'], Storage::path('avatars').DIRECTORY_SEPARATOR.$user->id.'.jpg');


        Buyer::create([
            'user_id' => $user->id,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        return $user;
    }
}
