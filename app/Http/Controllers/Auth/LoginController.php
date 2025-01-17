<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
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
        // Validate input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->has('remember'); // Check if "remember" is checked

        // Attempt to authenticate the user
        if (Auth::attempt($credentials, $remember)) {
            // Save the remember_token to the user's account if needed
            if ($remember) {
                $user = Auth::user();
                if (is_null($user->remember_token)) {
                    $user->remember_token = bin2hex(random_bytes(64)); // Generate a random token
                    $user->save();
                }
            }

            return redirect()->intended('/beranda')->with('Berhasil', 'Login Sukses!');
        }

        return redirect()->back()->withErrors(['email' => 'Email atau kata sandi salah.'])->withInput();
    }

    public function login()
    {
        return view('auth.login');
    }
    public function logout(Request $request)
    {
        // Logout the user
        $user = Auth::user();
        $user->remember_token = null;
        $user->save();

        Auth::logout();

        // Invalidate the session to clear session data
        $request->session()->invalidate();

        // Regenerate the CSRF token to prevent CSRF attacks
        $request->session()->regenerateToken();

        // Redirect to the login page with a logout success message
        return redirect()->route('login')->with('Berhasil', 'Anda berhasil keluar!');
    }
}
