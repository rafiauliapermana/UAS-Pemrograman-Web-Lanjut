<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Penerimaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PenerimaanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaPenerimaan = Penerimaan::all();

        $data = [
            'title' => 'Penerimaan',
            'semuaPenerimaan' => $semuaPenerimaan
        ];

        return view('admin.pages.penerimaan', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(
            [
                'kode_penerimaan' => 'required',
                'tanggal_penerimaan' => 'required',
                'catatan_penerimaan' => 'required',
                'status_penerimaan' => 'required',
                'berkas_penerimaan' => 'required|mimes:pdf,doc,docx',
            ]
        );

        if ($request->hasFile('berkas_penerimaan')) {
            $uploadBerkas = $this->uploadFile($request->file('berkas_penerimaan'));
            if ($uploadBerkas) {
                $input = [
                    'kode_penerimaan' => $request->input('kode_penerimaan'),
                    'tanggal_penerimaan' => $request->input('tanggal_penerimaan'),
                    'catatan_penerimaan' => $request->input('catatan_penerimaan'),
                    'status_penerimaan' => $request->input('status_penerimaan'),
                    'berkas_penerimaan' => $uploadBerkas,
                ];

                $tambah = Penerimaan::create($input);

                if ($tambah) {
                    return redirect('admin/penerimaan')->with('success', 'Berhasil menambahkan data penerimaan.');
                } else {
                    return redirect('admin/penerimaan')->with('error', 'Gagal menambahkan data penerimaan.');
                }
            }
            return redirect('admin/penerimaan')->with('error', 'Gagal menambahkan data penerimaan.');
        }
        return redirect('admin/penerimaan')->with('error', 'Harus menyertakan berkas penerimaan.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate(
            [
                'kode_penerimaan' => 'required',
                'tanggal_penerimaan' => 'required',
                'catatan_penerimaan' => 'required',
                'status_penerimaan' => 'required',
                'berkas_penerimaan' => 'mimes:pdf,doc,docx',
            ]
        );

        $input = [
            'kode_penerimaan' => $request->input('kode_penerimaan'),
            'tanggal_penerimaan' => $request->input('tanggal_penerimaan'),
            'catatan_penerimaan' => $request->input('catatan_penerimaan'),
            'status_penerimaan' => $request->input('status_penerimaan')
        ];

        if ($request->hasFile('berkas_penerimaan')) {
            $uploadBerkas = $this->uploadFile($request->file('berkas_penerimaan'));
            if ($uploadBerkas) {
                $input['berkas_penerimaan'] = $uploadBerkas;

                $ubah = Penerimaan::findOrFail($id)->update($input);

                if ($ubah) {
                    return redirect('admin/penerimaan')->with('success', 'Berhasil mengubah data penerimaan.');
                } else {
                    return redirect('admin/penerimaan')->with('error', 'Gagal mengubah data penerimaan.');
                }
            }
            return redirect('admin/penerimaan')->with('error', 'Gagal menambahkan data penerimaan.');
        }

        $ubah = Penerimaan::findOrFail($id)->update($input);

        if ($ubah) {
            return redirect('admin/penerimaan')->with('success', 'Berhasil mengubah data penerimaan.');
        } else {
            return redirect('admin/penerimaan')->with('error', 'Gagal mengubah data penerimaan.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $hapus = Penerimaan::findOrFail($id)->delete();
        if ($hapus) {
            return redirect('admin/penerimaan')->with('success', 'Berhasil menghapus data penerimaan.');
        } else {
            return redirect('admin/penerimaan')->with('error', 'Gagal menghapus data penerimaan.');
        }
    }

    public function uploadFile($berkas)
    {
        $direktoriUpload = 'berkas_penerimaan';

        $ekstensi = $berkas->getClientOriginalExtension();
        $namaBerkas = 'berkas_penerimaan_' . date('YmdHis') . $ekstensi;

        // Upload berkas
        if ($berkas->move($direktoriUpload, $namaBerkas)) {
            return $namaBerkas;
        }

        return false;
    }
}
