<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('blog.login')->with(['title' => 'Login']);
    }

    public function authenticate(Request $request)
    {
        $otentikasi = $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email Harus Diisi',
            'email.email' => 'Masukan Email Yang Valid',
            'password.required' => 'Password Harus Diisi',
        ]);
        if (Auth::attempt($otentikasi)) {
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }
        return back()->with('Gagal', 'Email atau password salah');
        // Logika autentikasi menggunakan data yang telah divalidasi
        // $authenticationData berisi data yang telah lulus validasi
        // $authenticationData['email'] dan $authenticationData['password'] dapat digunakan di sini
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }

}
