<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    

    use AuthenticatesUsers;

    
    protected $redirectTo = RouteServiceProvider::HOME;

    
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:mahasiswa')->except('logout');
    }

    public function showMahasiswaLoginForm()
    {
        return view('login', ['url' => 'mahasiswa']);
    }
    
    public function MahasiswaLogin(Request $request)
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:8'
        ]);
        if (Auth::guard('mahasiswa')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember'))) {
            $user = auth()->guard('mahasiswa')->user();
            return redirect()->intended('/home/mahasiswa');
        }
        // return back()->withInput($request->only('username', 'remember'))->with('error', 'Username atau katasandi salah!');
        return redirect('/login/mahasiswa')->with('gagal', 'Email atau password salah!');
    }
}
