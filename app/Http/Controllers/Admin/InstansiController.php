<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Instansi;
use Illuminate\Http\Request;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaInstansi = Instansi::all();

        $data = [
            'title' => 'Instansi',
            'semuaInstansi' => $semuaInstansi
        ];


        return view('admin.pages.instansi', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validasi Input
        request()->validate(
            [
                'nama_instansi' => 'required',
                'alamat_instansi' => 'required',
                'no_telp_instansi' => 'required',
                'link_instansi' => 'required'
            ]
        );

        $input = $request->only('nama_instansi', 'alamat_instansi', 'no_telp_instansi', 'link_instansi');

        $tambah = Instansi::create($input);
        if ($tambah) {
            return redirect('admin/instansi')->with('success', 'Berhasil menambahkan data instansi.');
        } else {
            return redirect('admin/instansi')->with('error', 'Gagal menambahkan data instansi.');
        }
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
                'nama_instansi' => 'required',
                'alamat_instansi' => 'required',
                'no_telp_instansi' => 'required',
                'link_instansi' => 'required'
            ]
        );

        $input = $request->only('nama_instansi', 'alamat_instansi', 'no_telp_instansi', 'link_instansi');

        $update = Instansi::findOrFail($id)->update($input);
        if ($update) {
            return redirect('admin/instansi')->with('success', 'Berhasil mengubah data instansi.');
        } else {
            return redirect('admin/instansi')->with('error', 'Gagal mengubah data instansi.');
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
        $hapus = Instansi::findOrFail($id)->delete();
        if ($hapus) {
            return redirect('admin/instansi')->with('success', 'Berhasil menghapus data instansi.');
        } else {
            return redirect('admin/instansi')->with('error', 'Gagal menghapus data instansi.');
        }
    }
}
