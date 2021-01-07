<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Lampiran;

class LampiranMahasiswaController extends Controller
{

    public function index()
    {
        $id = auth()->guard('mahasiswa')->user()->id;
        $lampiran = Lampiran::where('id_user', $id)->get();
       
        return view('mahasiswa.lampiran.index', compact('lampiran'));
    }


    public function create()
    {
        return view('mahasiswa.lampiran.add');
    }

    public function store(Request $request)
    {
        $id_user = $request['id_user'];
        $cek = Lampiran::where('id_user', $id_user)->count();
        
        if ($cek == 0) {

            //kk
            $kk = 'kk' . $id_user . '.' . $request->kk->extension();
            $request->kk->move(public_path('files'), $kk);

            //ktp
            $ktp = 'ktp' . $id_user . '.' . $request->ktp->extension();
            $request->ktp->move(public_path('files'), $ktp);

            //km
            $km = 'km' . $id_user . '.' . $request->km->extension();
            $request->km->move(public_path('files'), $km);

            //tn
            $tn = 'tn' . $id_user . '.' . $request->tn->extension();
            $request->tn->move(public_path('files'), $tn);

            //rek
            $rek = 'rek' . $id_user . '.' . $request->rek->extension();
            $request->rek->move(public_path('files'), $rek);

            //ttb
            $ttb = 'ttb' . $id_user . '.' . $request->ttb->extension();
            $request->ttb->move(public_path('files'), $ttb);

            //ak
            $ak = 'ak' . $id_user . '.' . $request->ak->extension();
            $request->ak->move(public_path('files'), $ak);

            //ap
            $ap = 'ap' . $id_user . '.' . $request->ap->extension();
            $request->ap->move(public_path('files'), $ap);

            //bn
            $bn = 'bn' . $id_user . '.' . $request->bn->extension();
            $request->bn->move(public_path('files'), $bn);

            //kak
            $kak = 'kak' . $id_user . '.' . $request->kak->extension();
            $request->kak->move(public_path('files'), $kak);

            //sp
            $sp = 'sp' . $id_user . '.' . $request->sp->extension();
            $request->sp->move(public_path('files'), $sp);

            //pi
            $pi = 'pi' . $id_user . '.' . $request->pi->extension();
            $request->pi->move(public_path('files'), $pi);

            //kkm
            $kkm = 'kkm' . $id_user . '.' . $request->kkm->extension();
            $request->kkm->move(public_path('files'), $kkm);

            $admin = Lampiran::create([
                'id_user' => $request['id_user'],
                'nama' => $request['nama'],
                'kk' => $kk,
                'ktp' => $ktp,
                'km' => $km,
                'tn' => $tn,
                'rek' => $rek,
                'ttb' => $ttb,
                'ak' => $ak,
                'ap' => $ap,
                'bn' => $bn,
                'kak' => $kak,
                'sp' => $sp,
                'pi' => $pi,
                'kkm' => $kkm,
            ]);

            return redirect('lampiran_mhs')->with('tambah', 'Data telah ditambahkan!');
        } else {
            return redirect('lampiran_mhs')->with('error', 'lampiran telah tersedia!');
        }
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
