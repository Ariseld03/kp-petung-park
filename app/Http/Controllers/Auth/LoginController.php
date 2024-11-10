<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;
use Illuminate\Support\Facades\Hash;
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

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
    public function login_process(Request $request)
    {
        $redirectTo = '/beranda';
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $user = Staff::where('email', $request->email)->first();

        if ($user && Hash::check($request->input('password'), $user->password)) {
            // Attempt to authenticate the user (this will also start the session)
            if (Auth::attempt($request->only('email', 'password'))) {
                $request->session()->put('user', Auth::user());
                return redirect()->intended($redirectTo)->with('Berhasil', 'Login Sukses!');
            }
        }
    
        if (!$user) {
            return redirect()->back()->withErrors([
                'email' => 'Email tidak ditemukan dalam sistem kami.'
            ])->withInput();
        }
        return redirect()->back()->withErrors(['Password' => 'Kata Sandi yang Anda masukkan salah.'])->withInput();
    }

    public function login()
    {
        return view('auth.login');
    }
    public function logout(Request $request)
    {
        // Logout the user
        Auth::logout();

        // Invalidate the session to clear session data
        $request->session()->invalidate();

        // Regenerate the CSRF token to prevent CSRF attacks
        $request->session()->regenerateToken();

        // Redirect to the login page with a logout success message
        return redirect()->route('login')->with('Berhasil', 'Anda berhasil keluar!');
    }
}
