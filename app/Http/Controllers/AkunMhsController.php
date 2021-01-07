<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mahasiswa;
use Illuminate\Support\Facades\Validator;

class AkunMhsController extends Controller
{

    public function index()
    {
        $mahasiswa = Mahasiswa::OrderBy('updated_at', 'desc')->paginate(10);
        return view('akun_mhs.index', compact('mahasiswa'));
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
        $mahasiswa = Mahasiswa::find($id);
        return view('akun_mhs.edit', compact('mahasiswa'));
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nama' => ['required', 'string'],
            'beasiswa' => ['required']
        ]);
    }

    protected function validatorEmail(array $data)
    {
        return Validator::make($data, [
            'email' => ['required', 'string', 'email', 'max:50', 'unique:mahasiswa']
        ]);
    }

    public function update(Request $request, $id)
    {
        $mahasiswa = Mahasiswa::where('id', $id)->first();
        $ambilemail = $mahasiswa['email'];
        $email = $request['email'];
        if ($ambilemail == $email) {
            $this->validator($request->all())->validate();
            $admin = Mahasiswa::whereId($id)->update([
                'nama' => $request['nama'],
                'beasiswa' => $request['beasiswa'],
            ]);
            return redirect('akun_mhs')->with('sunting', 'Data telah diubah!');
        } else {
            $this->validatorEmail($request->all())->validate();
            $this->validator($request->all())->validate();
            $admin = Mahasiswa::whereId($id)->update([
                'nama' => $request['nama'],
                'email' => $request['email'],
                'beasiswa' => $request['beasiswa'],
            ]);
            return redirect('akun_mhs')->with('sunting', 'Data telah diubah!');
        }
    }


    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();
        return redirect('akun_mhs')->with('hapus', 'Data telah dihapus!');
    }
}
