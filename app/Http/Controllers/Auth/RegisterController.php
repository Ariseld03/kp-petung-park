<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    protected $redirectTo = '/login';

    public function __construct()
    {
        $this->middleware('guest');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:staffs'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'position' => ['required', 'string'],
            'date_of_birth' => ['required', 'date'],
            'gender' => ['required', 'string'],
            'phone_number' => ['required', 'numeric'],
            'status' => ['required', 'tinyinteger'],
            'gallery_id' => ['required', 'integer'],
        ]);
    }

    protected function create(array $data)
    {
        return Staff::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'position' => $data['role'],
            'date_of_birth' => $data['tanggalLahir'],
            'gender' => $data['gender'],
            'phone_number' => $data['nomorHp'],
            'status' => $data['status'],
            'gallery_id' => $data['fotoProfil'],
        ]);
    }

    // Menambahkan metode register
    public function register(Request $request)
    {
        // Validasi input
        $this->validator($request->all())->validate();

        // Buat user baru
        $user = $this->create($request->all());

        // Autentikasi pengguna setelah registrasi
        Auth::login($user);

        // Redirect setelah registrasi berhasil
        return redirect($this->redirectTo);
    }
}
