<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lampiran;
use App\Mahasiswa;

class LampiranController extends Controller
{
    
    public function index()
    {
        $lampiran = Lampiran::orderBy('id_user', 'desc')->paginate(10);
        return view('lampiran.index', compact('lampiran'));
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
        //
    }

   
    public function destroy($id)
    {
        //
    }
}
