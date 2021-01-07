<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Formulir;
use Illuminate\Support\Facades\Validator;


class FormulirMahasiswaController extends Controller
{

    public function index()
    {
        $id = auth()->guard('mahasiswa')->user()->id;
        $hitung = Formulir::where('id_user', $id)->count();
        $formulir = Formulir::where('id_user', $id)->first();
        return view('mahasiswa.formulir.index', compact('hitung', 'formulir'));
    }


    public function create()
    {
        //
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'id_user' => ['required'],
            'nama' => ['required'],
            'no_ktp' => ['required', 'string', 'max:16', 'unique:formulir'],
            'no_hp' => ['required', 'string', 'max:13'],
            'tempat_lahir' => ['required', 'string'],
            'tgl_lahir' => ['required', 'string', 'max:10'],
            'jk' => ['required', 'string'],
            'agama' => ['required', 'string'],
            'alamat' => ['required'],
            'kec' => ['required', 'string'],
            'desa' => ['required', 'string'],
            'nim' => ['required', 'string'],
            'nama_kampus' => ['required', 'string'],
            'fakultas' => ['required', 'string'],
            'jurusan' => ['required', 'string'],
            'akre_kampus' => ['required', 'string'],
            'akre_prodi' => ['required', 'string'],
            'thn_angkatan' => ['required', 'string'],
            'ipk' => ['required', 'string'],
            'no_rek' => ['required', 'string'],
            'bank' => ['required', 'string'],
            'nama_rek' => ['required', 'string'],
            'nama_ayah' => ['required', 'string'],
            'nama_ibu' => ['required', 'string'],
            'jml_saudara' => ['required', 'string'],
            'pekerjaan_ibu' => ['required', 'string'],
            'pekerjaan_ayah' => ['required', 'string'],
            'foto' => ['required', 'max:2048', 'file', 'image', 'mimes:jpeg,png,jpg'],
        ]);
    }

    public function store(Request $request)
    {
        $this->validator($request->all())->validate();

        $imageName = time() . '.' . $request->foto->extension();

        $request->foto->move(public_path('images'), $imageName);

        $admin = Formulir::create([
            'id_user' => $request['id_user'],
            'nama' => $request['nama'],
            'no_ktp' => $request['no_ktp'],
            'no_hp' => $request['no_hp'],
            'tempat_lahir' => $request['tempat_lahir'],
            'tgl_lahir' => $request['tgl_lahir'],
            'jk' => $request['jk'],
            'agama' => $request['agama'],
            'alamat' => $request['alamat'],
            'kec' => $request['kec'],
            'desa' => $request['desa'],
            'nim' => $request['nim'],
            'nama_kampus' => $request['nama_kampus'],
            'fakultas' => $request['fakultas'],
            'jurusan' => $request['jurusan'],
            'akre_kampus' => $request['akre_kampus'],
            'akre_prodi' => $request['akre_prodi'],
            'thn_angkatan' => $request['thn_angkatan'],
            'ipk' => $request['ipk'],
            'no_rek' => $request['no_rek'],
            'bank' => $request['bank'],
            'nama_rek' => $request['nama_rek'],
            'nama_ayah' => $request['nama_ayah'],
            'nama_ibu' => $request['nama_ibu'],
            'jml_saudara' => $request['jml_saudara'],
            'pekerjaan_ibu' => $request['pekerjaan_ibu'],
            'pekerjaan_ayah' => $request['pekerjaan_ayah'],
            'foto' => $imageName
        ]);

        return redirect('formulir_mhs')->with('tambah', 'Data telah ditambahkan!');
    }


    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $formulir = Formulir::find($id);
        return view('mahasiswa.formulir.edit', compact('formulir'));
    }

    protected function validatorUpdate(array $data)
    {
        return Validator::make($data, [
            'id_user' => ['required'],
            'nama' => ['required'],
            'no_ktp' => ['required', 'string', 'max:16'],
            'no_hp' => ['required', 'string', 'max:13'],
            'tempat_lahir' => ['required', 'string'],
            'tgl_lahir' => ['required', 'string', 'max:10'],
            'jk' => ['required', 'string'],
            'agama' => ['required', 'string'],
            'alamat' => ['required'],
            'kec' => ['required', 'string'],
            'desa' => ['required', 'string'],
            'nim' => ['required', 'string'],
            'nama_kampus' => ['required', 'string'],
            'fakultas' => ['required', 'string'],
            'jurusan' => ['required', 'string'],
            'akre_kampus' => ['required', 'string'],
            'akre_prodi' => ['required', 'string'],
            'thn_angkatan' => ['required', 'string'],
            'ipk' => ['required', 'string'],
            'no_rek' => ['required', 'string'],
            'bank' => ['required', 'string'],
            'nama_rek' => ['required', 'string'],
            'nama_ayah' => ['required', 'string'],
            'nama_ibu' => ['required', 'string'],
            'jml_saudara' => ['required', 'string'],
            'pekerjaan_ibu' => ['required', 'string'],
            'pekerjaan_ayah' => ['required', 'string'],

        ]);
    }

    public function update(Request $request, $id)
    {
        $formulir = Formulir::where('id', $id)->first();
        $ambilno_ktp = $formulir['no_ktp'];
        $no_ktp = $request['no_ktp'];

        if ($no_ktp == $ambilno_ktp) {
            $this->validatorUpdate($request->all())->validate();
            $admin = Formulir::whereId($id)->update([
                'id_user' => $request['id_user'],
                'nama' => $request['nama'],
                'no_ktp' => $request['no_ktp'],
                'no_hp' => $request['no_hp'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tgl_lahir' => $request['tgl_lahir'],
                'jk' => $request['jk'],
                'agama' => $request['agama'],
                'alamat' => $request['alamat'],
                'kec' => $request['kec'],
                'desa' => $request['desa'],
                'nim' => $request['nim'],
                'nama_kampus' => $request['nama_kampus'],
                'fakultas' => $request['fakultas'],
                'jurusan' => $request['jurusan'],
                'akre_kampus' => $request['akre_kampus'],
                'akre_prodi' => $request['akre_prodi'],
                'thn_angkatan' => $request['thn_angkatan'],
                'ipk' => $request['ipk'],
                'no_rek' => $request['no_rek'],
                'bank' => $request['bank'],
                'nama_rek' => $request['nama_rek'],
                'nama_ayah' => $request['nama_ayah'],
                'nama_ibu' => $request['nama_ibu'],
                'jml_saudara' => $request['jml_saudara'],
                'pekerjaan_ibu' => $request['pekerjaan_ibu'],
                'pekerjaan_ayah' => $request['pekerjaan_ayah'],

            ]);

            return redirect('formulir_mhs')->with('edit', 'Data telah diubah!');
        } else {
            $this->validator($request->all())->validate();
            $admin = Formulir::whereId($id)->update([
                'id_user' => $request['id_user'],
                'nama' => $request['nama'],
                'no_ktp' => $request['no_ktp'],
                'no_hp' => $request['no_hp'],
                'tempat_lahir' => $request['tempat_lahir'],
                'tgl_lahir' => $request['tgl_lahir'],
                'jk' => $request['jk'],
                'agama' => $request['agama'],
                'alamat' => $request['alamat'],
                'kec' => $request['kec'],
                'desa' => $request['desa'],
                'nim' => $request['nim'],
                'nama_kampus' => $request['nama_kampus'],
                'fakultas' => $request['fakultas'],
                'jurusan' => $request['jurusan'],
                'akre_kampus' => $request['akre_kampus'],
                'akre_prodi' => $request['akre_prodi'],
                'thn_angkatan' => $request['thn_angkatan'],
                'ipk' => $request['ipk'],
                'no_rek' => $request['no_rek'],
                'bank' => $request['bank'],
                'nama_rek' => $request['nama_rek'],
                'nama_ayah' => $request['nama_ayah'],
                'nama_ibu' => $request['nama_ibu'],
                'jml_saudara' => $request['jml_saudara'],
                'pekerjaan_ibu' => $request['pekerjaan_ibu'],
                'pekerjaan_ayah' => $request['pekerjaan_ayah'],

            ]);

            return redirect('formulir_mhs')->with('edit', 'Data telah diubah!');
        }
    }

    protected function validatorFoto(array $data)
    {
        return Validator::make($data, [
            'foto' => ['required', 'max:2048', 'file','image','mimes:jpeg,png,jpg' ],
        ]);
    }

    public function editFoto(Request $request, $id){
        $this->validatorFoto($request->all())->validate();

        $imageName = time().'.'.$request->foto->extension();  
   
        $request->foto->move(public_path('images'), $imageName);
        $admin = Formulir::whereId($id)->update([
            'foto' => $imageName,
        ]);
        return redirect('formulir_mhs')->with('edit', 'Data telah diubah!')->with('foto',$imageName);
    }


    public function destroy($id)
    {
        //
    }
}
