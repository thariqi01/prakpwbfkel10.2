<?php

namespace App\Http\Controllers\Auth;

use Brian2694\Toastr\Facades\Toastr;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Auth\Events\Registered;

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
            'name' => [ 'required', 'string', 'min:5', 'max:255', 'regex:/^[a-zA-Z\s\.]*$/'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'tgl_lahir'=>['required', 'date'],
            'password' => ['required', 'string', 'min:8', 'confirmed']            
        ],[
            'name.required' => 'Masukkan nama anda.',
            'name.min' => 'Nama tidak boleh kurang dari 5 karakter.',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',
            'name.regex' => 'Format nama anda salah.',
            'email.required' => 'Masukkan email anda.',
            'email.unique' => 'Email sudah digunakan.',
            'tgl_lahir.required' => 'Masukkan tanggal lahir anda.',                    
            'password.required' => 'Masukkan password anda.',    
            'password.min' => 'Password tidak boleh kurang dari 5 karakter',
        ]);
        
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'tgl_lahir'=>$data['tgl_lahir'],
            'password' => Hash::make($data['password']),            
        ]);
    }

    public function register(Request $request)
    {        
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));
        
        return redirect()->route('login');
    }
}
