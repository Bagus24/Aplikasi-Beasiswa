<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use Illuminate\Support\Facades\Hash;

class AkunMahasiswaController extends Controller
{
    
    public function index()
    {
        $id = auth()->guard('mahasiswa')->user()->id;
        $mahasiswa = Mahasiswa::find($id);
        return view('mahasiswa.akun.index', compact('mahasiswa'));
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
        $admin = Mahasiswa::whereId($id)->update([
            'password' => Hash::make($request['password']),
        ]);
        
        return redirect('home/mahasiswa')->with('sunting', 'Data telah diubah!');
    }

    
    public function destroy($id)
    {
        //
    }
}
