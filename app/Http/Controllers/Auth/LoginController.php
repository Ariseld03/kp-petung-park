<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/beranda';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login(Request $request)
    {   
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:8',
        ]);

        // Cek apakah email ada di database
        $user = \App\Models\Staff::where('email', $request->email)->first();
        if (!$user) {
            // Jika email tidak ditemukan
            return redirect()->back()->withErrors([
                'email' => 'Email tidak ditemukan dalam sistem kami.'
            ])->withInput();
        }

        // Autentikasi pengguna dengan email dan password
        if (!Auth::attempt($request->only('email', 'password'))) {
            // Jika password salah
            return redirect()->back()->withErrors([
                'password' => 'Password yang Anda masukkan salah.'
            ])->withInput();
        }

        // Jika autentikasi berhasil, simpan data pengguna di session
        $user = Auth::user();
        session(['user_role' => $user->position]); // Menyimpan role pengguna
        session(['user_name' => $user->name]); // Menyimpan nama pengguna

        // Redirect ke halaman yang dituju
        return redirect()->intended($this->redirectTo);
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

}
