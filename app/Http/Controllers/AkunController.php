<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AkunController extends Controller
{
    
    public function index()
    {
        $id = Auth::user()->id;
        $admin = User::find($id);
        return view('akun.index', compact('admin'));
    }

    
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        //
    }

    

    
    public function update(Request $request, $id)
    {
        $admin = User::whereId($id)->update([
            'name' => $request['name'],
            'email' => $request['email']
        ]);
        return redirect('home')->with('sunting', 'Data telah diubah!');
    }

    
    public function destroy($id)
    {
        //
    }

    public function editPass (Request $request, $id) 
    {
        
        $admin = User::whereId($id)->update([
            'password' => Hash::make($request['password']),
        ]);
        return redirect('home')->with('sunting', 'Data telah diubah!');
    }
}
