<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use App\Mahasiswa;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
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

    
    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
        $this->middleware('guest:mahasiswa');
    }

    
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            
        ]);
    }
   
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function validatorMahasiswa(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string', 'max:40'],
            'email' => ['required', 'string', 'max:50', 'unique:mahasiswa'],
            'password' => ['required', 'string', 'min:8', 'max:40', 'confirmed'],
            'beasiswa' => ['required']
        ]);
    }

    public function showMahasiswaRegisterForm()
    {
        return view('register', ['url' => 'mahasiswa']);
    }
    
    protected function createMahasiswa(Request $request)
    {
        $this->validatorMahasiswa($request->all())->validate();
        $admin = Mahasiswa::create([
            'nama' => $request['nama'],
            'email' => $request['email'],
            'password' => Hash::make($request['password']),
            'beasiswa' => $request['beasiswa']
        ]);
        return redirect()->intended('login/mahasiswa')->with('sukses', 'Akun berhasil dibuat!');
    }
}
