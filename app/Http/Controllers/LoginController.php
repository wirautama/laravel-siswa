<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login_proses(Request $request)
    {
        $request->validate([
            'email' => 'required|email|',
            'password' => 'required'
        ]);

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (Auth::attempt($data)) {
            request()->session()->regenerateToken();
            alert()->success('Login Berhasil', 'Selamat Datang');

            return redirect('/admin/dashboard')->withSuccess('Kamu telah berhasil masuk');
        } else {
            alert()->error('Login Gagal', 'Maaf username atau password anda tidak terdaftar di database kami.');
            return back()->with('error', 'Gagal Login')->onlyInput('email');
        }
    }

    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        // example:
        alert()->success('Logout Berhasil', 'Terima kasih atas kunjungan anda :)');
        return redirect()->route('login');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function register_proses(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'level' => 'required',
            'email' => 'required|email:dns|unique:users,email',
            'password' => 'required|confirmed|min:8',
            'avatar' => 'image|file|mimes:jpeg,png,jpg,gif,svg|max:1024'
            // 'password2' => 'required|min:8'
        ]);
        $avatar = $request->file('avatar');
        $filename = date('Y-m-d') . $avatar->getClientOriginalName();
        $path = 'avatar-user/' . $filename;

        Storage::disk('public')->put($path, file_get_contents($avatar));


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'password' => password_hash($request->password, PASSWORD_DEFAULT),
            'avatar' => $filename,
        ]);

        event(new Registered($user));
        Auth::login($user);

        alert()->success('Register Berhasil', 'Silahkan verifikasi email anda untuk melanjutkan');
        return redirect('/email/verify');

        // User::create($data);
        // return redirect('login')->with('success', 'Registrasi Berhasil! Silahkan Login');
    }
}
