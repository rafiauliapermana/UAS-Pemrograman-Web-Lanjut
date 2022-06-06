<?php

namespace App\Http\Controllers;

use App\Models\Berkas;
use App\Models\Instansi;
use App\Models\Penerimaan;
use App\Models\Pengumuman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use stdClass;

class MainController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home'
        ];

        return view('pages.home', $data);
    }

    public function upload()
    {
        $berkasPengguna = Berkas::where('id_pengguna', Auth::id())->first();
        $data = [
            'title' => 'Upload',
            'berkasPengguna' => $berkasPengguna
        ];

        return view('pages.upload', $data);
    }

    public function uploadBerkas(Request $request)
    {
        request()->validate(
            [
                'ktp' => 'mimes:pdf|max:1024',
                'transkip_nilai' => 'mimes:pdf|max:1024',
                'ijazah' => 'mimes:pdf|max:1024',
                'npwp' => 'mimes:pdf|max:1024',
            ]
        );

        $namaPengguna = Auth::user()->nama;

        if ($request->hasFile('ktp')) {
            $namaKTP = $this->uploadFile($request->file('ktp'), $namaPengguna, 'KTP');
            $input['ktp'] = $namaKTP;
        }
        if ($request->hasFile('transkip_nilai')) {
            $namaTranskipNilai = $this->uploadFile($request->file('transkip_nilai'), $namaPengguna, 'TranskipNilai');
            $input['transkip_nilai'] = $namaTranskipNilai;
        }
        if ($request->hasFile('ijazah')) {
            $namaIjazah = $this->uploadFile($request->file('ijazah'), $namaPengguna, 'Ijazah');
            $input['ijazah'] = $namaIjazah;
        }
        if ($request->hasFile('npwp')) {
            $namaNPWP = $this->uploadFile($request->file('npwp'), $namaPengguna, 'NPWP');
            $input['npwp'] = $namaNPWP;
        }

        $tambah = Berkas::updateOrCreate(['id_pengguna' => Auth::id()], $input);

        if ($tambah) {
            return redirect('upload')->with('success', 'Berhasil upload berkas.');
        } else {
            return redirect('upload')->with('error', 'Gagal upload berkas.');
        }
        return redirect('upload')->with('error', 'Gagal upload berkas.');
    }

    public function penerima()
    {
        $semuaPenerimaan = Penerimaan::all();
        $data = [
            'title' => 'Penerima',
            'semuaPenerimaan' => $semuaPenerimaan
        ];

        return view('pages.penerima', $data);
    }

    public function instansi()
    {
        $semuaInstansi = Instansi::all();
        $data = [
            'title' => 'Daftar Instansi',
            'semuaInstansi' => $semuaInstansi
        ];

        return view('pages.instansi', $data);
    }

    public function pengumuman()
    {
        $berkasPengguna = Berkas::where('id_pengguna', Auth::id())->first();
        if ($berkasPengguna === null) {
            $pengumuman = null;
        } else {
            $pengumumanPengguna = Pengumuman::where('id_berkas', $berkasPengguna->id)->first();

            if ($pengumumanPengguna !== null) {
                $carbonParse = Carbon::parse($pengumumanPengguna->tanggal);

                $pengumuman = new stdClass();
                $pengumuman->hari = $carbonParse->translatedFormat('D');
                $pengumuman->tanggal = $carbonParse->translatedFormat('D M Y');
                $pengumuman->pelaksanaan_ujian = $pengumumanPengguna->pelaksanaan_ujian;
                $pengumuman->tempat = $pengumumanPengguna->tempat;
                $pengumuman->waktu = $pengumumanPengguna->waktu;
            } else {
                $pengumuman = null;
            }
        }

        $data = [
            'title' => 'Pengumuman',
            'pengumuman' => $pengumuman
        ];

        return view('pages.pengumuman', $data);
    }

    public function uploadFile($berkas, $namaPengguna, $jenisBerkas)
    {
        $direktoriUpload = 'berkas_pengguna';

        $ekstensi = $berkas->getClientOriginalExtension();
        $namaBerkas = 'berkas_' . $namaPengguna . '_' . $jenisBerkas . '_' . date('YmdHis') . '.' . $ekstensi;

        // Upload berkas
        if ($berkas->move($direktoriUpload, $namaBerkas)) {
            return $namaBerkas;
        }

        return false;
    }
}
