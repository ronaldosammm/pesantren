<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
// halaman login
public function login()
    {
return view('login');
    }

// proses login
public function process(Request $request)
{
$credentials = $request->validate([
'email' => 'required|email',
'password' => 'required'
    ]);
if (Auth::attempt($credentials)) {
$request->session()->regenerate();
return redirect('/admin');
    }
return back()->with('error', 'Email atau password salah');
}

// halaman daftar
public function register()
    {
return view('register');
    }

// proses daftar
public function registerProcess(Request $request)
{
$validated = $request->validate([
'name' => 'required|string|max:255',
'email' => 'required|email|unique:users,email',
'password' => 'required|min:8|confirmed'
    ], [
'email.unique' => 'Email ini sudah terdaftar. Silakan login.'
    ]);

$user = User::create([
'name' => $validated['name'],
'email' => $validated['email'],
'password' => Hash::make($validated['password'])
    ]);

return redirect('/login')->with('success', 'Akun berhasil dibuat. Silakan login.');
}

// logout
public function logout(Request $request)
    {
Auth::logout();
$request->session()->invalidate();
$request->session()->regenerateToken();
return redirect('/login');
    }
}