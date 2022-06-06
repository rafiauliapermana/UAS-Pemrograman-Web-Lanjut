<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Berkas;
use App\Models\Pengumuman;
use Illuminate\Http\Request;

class BerkasController extends Controller
{
    public function index()
    {
        $semuaBerkas = Berkas::with('pengumuman')->get();
        $data = [
            'title' => 'Berkas',
            'semuaBerkas' => $semuaBerkas
        ];

        return view('admin.pages.berkas', $data);
    }

    public function buatPengumuman(Request $request, $id)
    {
        request()->validate(
            [
                'tanggal' => 'required',
                'waktu' => 'required',
                'pelaksanaan_ujian' => 'required',
                'tempat' => 'required'
            ]
        );

        $input = $request->only('tanggal', 'waktu', 'pelaksanaan_ujian', 'tempat');

        $buat = Pengumuman::updateOrCreate(['id_berkas' => $id], $input);
        if ($buat) {
            return redirect('admin/berkas')->with('success', 'Berhasil membuat pengumuman.');
        } else {
            return redirect('admin/berkas')->with('error', 'Gagal membuat pengumuman.');
        }
    }
}
