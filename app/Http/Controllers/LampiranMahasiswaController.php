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
        $id = auth()->guard('mahasiswa')->user()->id;
        $lampiran = Lampiran::where('id_user', $id)->count();
        if ($lampiran > 0) {
            return redirect('lampiran_mhs')->with('error', 'lampiran telah tersedia!');
        } else {
            return view('mahasiswa.lampiran.add');
        }
    }

    public function store(Request $request)
    {
        $id_user = $request['id_user'];
        $cek = Lampiran::where('id_user', $id_user)->count();
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('His');

        if ($cek == 0) {

            //kk
            $kk = 'kk' . $id_user . $waktu . '.' . $request->kk->extension();
            $request->kk->move(public_path('files'), $kk);

            //ktp
            $ktp = 'ktp' . $id_user . $waktu . '.' . $request->ktp->extension();
            $request->ktp->move(public_path('files'), $ktp);

            //km
            $km = 'km' . $id_user . $waktu . '.' . $request->km->extension();
            $request->km->move(public_path('files'), $km);

            //tn
            $tn = 'tn' . $id_user . $waktu . '.' . $request->tn->extension();
            $request->tn->move(public_path('files'), $tn);

            //rek
            $rek = 'rek' . $id_user . $waktu . '.' . $request->rek->extension();
            $request->rek->move(public_path('files'), $rek);

            //ttb
            $ttb = 'ttb' . $id_user . $waktu . '.' . $request->ttb->extension();
            $request->ttb->move(public_path('files'), $ttb);

            //ak
            $ak = 'ak' . $id_user . $waktu . '.' . $request->ak->extension();
            $request->ak->move(public_path('files'), $ak);

            //ap
            $ap = 'ap' . $id_user . $waktu . '.' . $request->ap->extension();
            $request->ap->move(public_path('files'), $ap);

            //bn
            $bn = 'bn' . $id_user . $waktu . '.' . $request->bn->extension();
            $request->bn->move(public_path('files'), $bn);

            //kak
            $kak = 'kak' . $id_user . $waktu . '.' . $request->kak->extension();
            $request->kak->move(public_path('files'), $kak);

            //sp
            $sp = 'sp' . $id_user . $waktu . '.' . $request->sp->extension();
            $request->sp->move(public_path('files'), $sp);

            //pi
            $ambil_pi = $request['pi'];
            if ($ambil_pi != null) {
                $pi = 'pi' . $id_user . $waktu . '.' . $request->pi->extension();
                $request->pi->move(public_path('files'), $pi);
            } else {
                $pi = '-';
            }

            //kkm
            $ambil_kkm = $request['kkm'];
            if ($ambil_kkm != null) {
                $kkm = 'kkm' . $id_user . $waktu . '.' . $request->kkm->extension();
                $request->kkm->move(public_path('files'), $kkm);
            } else {
                $kkm = '-';
            }

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
        $lampiran = Lampiran::find($id);
        return view('mahasiswa.lampiran.edit', compact('lampiran'));
    }


    public function update(Request $request, $id)
    {
        $id_user = $request['id_user'];
        $nama = $request['nama'];
        date_default_timezone_set('Asia/Jakarta');
        $waktu = date('His');

        //kk
        $kk = $request['kk'];
        if ($kk != null) {
            $kk = 'kk' . $id_user . $waktu . '.' . $request->kk->extension();
            $request->kk->move(public_path('files'), $kk);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'kk' => $kk
            ]);
        }

        //ktp
        $ktp = $request['ktp'];
        if ($ktp != null) {
            $ktp = 'ktp' . $id_user . $waktu . '.' . $request->ktp->extension();
            $request->ktp->move(public_path('files'), $ktp);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'ktp' => $ktp
            ]);
        }

        //km
        $km = $request['km'];
        if ($km != null) {
            $km = 'km' . $id_user . $waktu . '.' . $request->km->extension();
            $request->km->move(public_path('files'), $km);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'km' => $km
            ]);
        }

        //tn
        $tn = $request['tn'];
        if ($tn != null) {
            $tn = 'tn' . $id_user . $waktu . '.' . $request->tn->extension();
            $request->tn->move(public_path('files'), $tn);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'tn' => $tn
            ]);
        }

        //rek
        $rek = $request['rek'];
        if ($rek != null) {
            $rek = 'rek' . $id_user . $waktu . '.' . $request->rek->extension();
            $request->rek->move(public_path('files'), $rek);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'rek' => $rek
            ]);
        }

        //ttb
        $ttb = $request['ttb'];
        if ($ttb != null) {
            $ttb = 'ttb' . $id_user . $waktu . '.' . $request->ttb->extension();
            $request->ttb->move(public_path('files'), $ttb);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'ttb' => $ttb
            ]);
        }

        //ak
        $ak = $request['ak'];
        if ($ak != null) {
            $ak = 'ak' . $id_user . $waktu . '.' . $request->ak->extension();
            $request->ak->move(public_path('files'), $ak);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'ak' => $ak
            ]);
        }

        //ap
        $ap = $request['ap'];
        if ($ap != null) {
            $ap = 'ap' . $id_user . $waktu . '.' . $request->ap->extension();
            $request->ap->move(public_path('files'), $ap);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'ap' => $ap
            ]);
        }

        //bn
        $bn = $request['bn'];
        if ($bn != null) {
            $bn = 'bn' . $id_user . $waktu . '.' . $request->bn->extension();
            $request->bn->move(public_path('files'), $bn);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'bn' => $bn
            ]);
        }

        //kak
        $kak = $request['kak'];
        if ($kak != null) {
            $kak = 'kak' . $id_user . $waktu . '.' . $request->kak->extension();
            $request->kak->move(public_path('files'), $kak);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'kak' => $kak
            ]);
        }

        //sp
        $sp = $request['sp'];
        if ($sp != null) {
            $sp = 'sp' . $id_user . $waktu . '.' . $request->sp->extension();
            $request->sp->move(public_path('files'), $sp);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'sp' => $sp
            ]);
        }

        //pi
        $pi = $request['pi'];
        if ($pi != null) {
            $pi = 'pi' . $id_user . $waktu . '.' . $request->pi->extension();
            $request->pi->move(public_path('files'), $pi);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'pi' => $pi
            ]);
        }

        //kkm
        $kkm = $request['kkm'];
        if ($kkm != null) {
            $kkm = 'kkm' . $id_user . $waktu . '.' . $request->kkm->extension();
            $request->kkm->move(public_path('files'), $kkm);
            $admin = Lampiran::whereId($id)->update([
                'id_user' => $id_user,
                'nama' => $nama,
                'kkm' => $kkm
            ]);
        }

        return redirect('lampiran_mhs')->with('sunting', 'Data telah diubah!');
    }


    public function destroy($id)
    {
        //
    }

    public function download(Request $request, $file)
    {
        $nama_file = public_path() . '/files/' . $file;
        return response()->download($nama_file, $file);
    }
}
