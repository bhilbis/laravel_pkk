<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    use AuthenticatesUsers;
    public function showLogin(){
        return view('page.login');
    }

    public function loginOnly(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // Jika otentikasi berhasil
            return redirect()->intended('products'); // Ganti dengan halaman yang sesuai
        }

        // Redirect ke halaman cart setelah login
        return redirect()->route('login')->with('error', 'Invalid data match');
    }

    public function doLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Logout Successfully');
    }

    public function showRegistrationForm()
    {
        return view('page.register');
    }

    public function register(Request $request)
    {
        // Validasi data registrasi
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:5|confirmed',
        ]);
        
        event(new Registered($user = $this->create($request->all())));

        auth()->login($user);

        return redirect()->route('login')->with('success', 'Your account has been registered and you are now logged in.');
    }
    protected function create(array $data)
    {
    return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => bcrypt($data['password']),
    ]);
    }
}
