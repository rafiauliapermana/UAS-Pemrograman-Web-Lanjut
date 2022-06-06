<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

use Laravel\Socialite\Facades\Socialite;

use App\Models\Pengguna;

class AuthController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Masuk'
        ];

        if (Auth::check()) {
            $pengguna = Auth::user();
            if ($pengguna->level == 'admin') {
                return redirect()->intended('admin');
            }
            return Redirect('/');
        }

        return view('auth.masuk', $data);
    }

    public function prosesMasuk(Request $request)
    {
        // Validasi Input
        request()->validate(
            [
                'email' => 'required',
                'password' => 'required'
            ]
        );

        $creds = $request->only('email', 'password');

        if (Auth::attempt($creds)) {
            $pengguna = Auth::user();
            if ($pengguna->level == 'admin') {
                return redirect()->intended('admin');
            }
            return Redirect('/');
        }

        return redirect('masuk')
            ->withInput()
            ->with('error', 'Surel atau sandi salah.');
    }

    public function daftar()
    {
        $data = [
            'title' => 'Daftar'
        ];

        if (Auth::check()) {
            $pengguna = Auth::user();
            if ($pengguna->level == 'admin') {
                return redirect()->intended('admin');
            }
            return Redirect('/');
        }

        return view('auth.daftar', $data);
    }

    public function prosesDaftar(Request $request)
    {
        // Validasi Input
        request()->validate(
            [
                'email' => 'required',
                'alamat' => 'required',
                'email' => 'required|email',
                'password' => 'required|min:8',
                'tanggal_lahir' => 'required|date'
            ]
        );

        $creds = $request->only('nama', 'alamat', 'email', 'password', 'tanggal_lahir');

        $cariPengguna = Pengguna::where('email', $creds['email'])->count();

        if ($cariPengguna > 0) {
            return redirect('daftar')
                ->withInput()
                ->with('error', 'Email sudah terdaftar.');
        } else {
            $creds['password'] = Hash::make($creds['password']);
            Pengguna::create($creds);
            return redirect('masuk')->with('success', 'Berhasil mendaftar. Silakan masuk.');
        }
    }

    public function keluar(Request $request)
    {
        $request->session()->flush();
        Auth::logout();
        return Redirect('/');
    }

    // Google Auth
    public function googleLogin()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleHandleCallback()
    {
        try {
            $dataGoogle = Socialite::driver('google')->stateless()->user();
            $pengguna = Pengguna::where('email', $dataGoogle->email)->first();

            if ($pengguna !== null) {
                Auth::login($pengguna);
                if ($pengguna->level == 'admin') {
                    return redirect()->intended('admin');
                }
                return Redirect('/');
            } else {
                $input = [
                    'nama' => $dataGoogle->name,
                    'alamat' => "",
                    'email' => $dataGoogle->email,
                    'password' => 0,
                    'tanggal_lahir' => null,
                    'google_id' => $dataGoogle->id
                ];

                $buatPengguna = Pengguna::Create($input);
                Auth::login($buatPengguna);
                return Redirect('/');
            }
        } catch (\Exception $e) {
            dd($e->getMessage());
        }
    }
}
