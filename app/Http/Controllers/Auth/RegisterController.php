<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Usuario;
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
            'usr_codigo' => ['required', 'string', 'max:250'],
            'usr_nome' => ['required', 'string', 'max:250'],
            'usr_funcao' => ['required', 'string', 'max:150'],
            'usr_senha' => ['required', 'string', 'min:8', 'confirmed'],
            'usr_bloqueado' => ['boolean'],
            'usr_telefone' => ['string', 'max:11'],
            'usr_email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios']
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
        return Usuario::create([
            'usr_codigo' => $data['usr_codigo'],
            'usr_nome' => $data['usr_nome'],
            'usr_funcao' => $data['usr_funcao'],
            'usr_senha' => Hash::make($data['usr_senha']),
            'usr_bloqueado' => false,
            'usr_telefone' => $data['usr_telefone'],
            'usr_email' => $data['usr_email']
        ]);
    }
}
