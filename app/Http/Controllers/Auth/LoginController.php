<?php
namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Staff;
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
        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
           // dd(Auth::user());
            $staff = Staff::where('email', $request->email)->first();
            $user = Auth::user();
            // Save the user data in the session
            $request->session()->put('user', $user);
            return redirect()->intended($redirectTo)->with('success', 'Login successful!');
        }
        // Check if email exists in the database
        if (!$user) {
            // If email not found
            return redirect()->back()->withErrors([
                'email' => 'Email tidak ditemukan dalam sistem kami.'
            ])->withInput();
        }
        return redirect()->back()->withErrors(['password' => 'Password yang Anda masukkan salah.'])->withInput();
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
        return redirect()->route('login')->with('success', 'You have successfully logged out.');
    }
}
