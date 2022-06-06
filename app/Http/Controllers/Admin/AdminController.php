<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $semuaAdmin = Pengguna::where('level', 'admin')->get();
        $data = [
            'title' => 'Admin',
            'semuaAdmin' => $semuaAdmin
        ];

        return view('admin.pages.admin', $data);
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
                'nama' => 'required',
                'alamat' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'tanggal_lahir' => 'required|date'
            ]
        );

        $input = $request->only('nama', 'alamat', 'email', 'password', 'tanggal_lahir');

        $input['level'] = 'admin';

        $cariPengguna = Pengguna::where('email', $input['email'])->count();

        if ($cariPengguna > 0) {
            return redirect('admin/admin')
                ->withInput()
                ->with('error', 'Gagal menambahkan admin, email sudah terdaftar.');
        } else {
            $input['password'] = Hash::make($input['password']);
            Pengguna::create($input);
            return redirect('admin/admin')->with('success', 'Berhasil menambahkan admin.');
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
                'nama' => 'required',
                'alamat' => 'required',
                'email' => 'required|email:rfc,dns|unique:pengguna,email,' . $id . ',id',
                'password' => 'min:8',
                'tanggal_lahir' => 'required|date'
            ]
        );

        $input['level'] = 'admin';

        $input = $request->only('nama', 'alamat', 'email', 'password', 'tanggal_lahir');
        if ($request->input('password')) {
            $input['password'] = Hash::make($input['password']);
        }

        $update = Pengguna::findOrFail($id)->update($input);

        if ($update) {
            return redirect('admin/admin')->with('success', 'Berhasil mengubah data admin.');
        } else {
            return redirect('admin/admin')->with('error', 'Gagal mengubah data admin.');
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
        if (Auth::id() == $id) {
            return redirect('admin/admin')->with('error', 'Akun sedang digunakan, tidak dapat dihapus.');
        }
        $hapus = Pengguna::findOrFail($id)->delete();
        if ($hapus) {
            return redirect('admin/admin')->with('success', 'Berhasil menghapus data admin.');
        } else {
            return redirect('admin/admin')->with('error', 'Gagal menghapus data admin.');
        }
    }
}
