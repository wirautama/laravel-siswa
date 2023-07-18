<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\PasswordReset;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class LoginController extends Controller
{
    // LOGIN
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

            return redirect()->route('dashboard')->withSuccess('Kamu telah berhasil masuk');
        } else {
            alert()->error('Login Gagal', 'Maaf username atau password anda tidak terdaftar di database kami.');
            return back()->with('error', 'Gagal Login')->onlyInput('email');
        }
    }

    public function githubLogin()
    {
        return Socialite::driver('github')->redirect();
    }

    public function githubLoginProses()
    {
        $githubUser = Socialite::driver('github')->user();
        $user = User::updateOrCreate([
            'github_id' => $githubUser->id,
        ], [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'password' => password_hash($githubUser->nickname, PASSWORD_DEFAULT),
            'github_token' => $githubUser->token,
            'github_refresh_token' => $githubUser->refreshToken,
        ]);

        Auth::login($user);
        return redirect()->route('dashboard');
    }
    // END LOGIN



    // LOGOUT
    public function logout()
    {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        // example:
        alert()->success('Logout Berhasil', 'Terima kasih atas kunjungan anda :)');
        return redirect()->route('login');
    }

    // END LOGOUT



    // REGISTER
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


        return redirect()->route('verification.notice')->withToastSuccess('Silahkan Verifikasi Email Anda!');
    }

    public function verifIndex()
    {
        return view('auth.verify-email')->withToastSuccess('Silahkan Verifikasi Email Anda!');
    }

    public function verifProses(EmailVerificationRequest $request)
    {
        $request->fulfill();
        return redirect()->route('dashboard')->withToastSuccess('Selamat Datang ' . Auth::user()->name);
    }

    // public function resendVerif(Request $request)
    // {
    //     $request->user()->sendEmailVerificationNotification();
    //     return back()->withToastSuccess('Silahkan Verifikasi Kembali Email Anda');
    // }
    // END REGISTER


    // FORGOT PASSWORD

    public function forgotPassword()
    {
        return view('auth.forgot-password');
    }

    public function forgotProses(Request $request)
    {
        $request->validate(['email' => 'required|email']);

        $status = Password::sendResetLink(
            $request->only('email')
        );

        return $status === Password::RESET_LINK_SENT
            ? back()->withToastSuccess('Silahkan Verifikasi Email Anda')
            : back()->withErrors(['email' => __($status)]);
    }

    public function resetPassword(string $token)
    {
        return view('auth.reset-password', ['token' => $token]);
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'token' => 'required',
            'email' => 'required|email',
            'password' => 'required|min:8|confirmed',
        ]);

        $status = Password::reset(
            $request->only('email', 'password', 'password_confirmation', 'token'),
            function (User $user, string $password) {
                $user->forceFill([
                    'password' => password_hash($password, PASSWORD_DEFAULT)
                ])->setRememberToken(Str::random(60));

                $user->save();

                event(new PasswordReset($user));
            }
        );
        return $status === Password::PASSWORD_RESET
            ? redirect()->route('login')->withToastSuccess(__($status))
            : back()->withErrors(['email' => [__($status)]]);
    }

    // END FORGOT PASSWORD


}
