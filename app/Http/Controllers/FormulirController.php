<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Formulir;
use App\Mahasiswa;

class FormulirController extends Controller
{

    public function index()
    {

        $formulir = Formulir::orderBy('updated_at', 'desc')->paginate(10);

        return view('formulir.index', compact('formulir'));
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
