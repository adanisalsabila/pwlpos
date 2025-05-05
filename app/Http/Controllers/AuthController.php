<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator; // Import class Validator
use App\Models\UserModel; // Import class UserModel
use Illuminate\Support\Facades\Hash; // Import class Hash

class AuthController extends Controller
{
    public function login()
    {
        if (Auth::check()) { // jika sudah login, maka redirect ke halaman home
            return redirect('/');
        }
        return view('auth.login');
    }
    public function postlogin(Request $request)
    {
        if ($request->ajax() || $request->wantsJson()) {
            $credentials = $request->only('username', 'password');
            if (Auth::attempt($credentials)) {
                return response()->json([
                    'status' => true,
                    'message' => 'Login Berhasil',
                    'redirect' => url('/')
                ]);
            }
            return response()->json([
                'status' => false,
                'message' => 'Login Gagal'
            ]);
        }
        return redirect('login');
    }

    public function showRegistrationForm()
    {
        return view('auth.register'); // Pastikan ini sesuai dengan lokasi file register.blade.php Anda
    }

    /**
     * Memproses data registrasi user baru.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Set validation rules
        $validator = Validator::make($request->all(), [
            'username' => 'required|unique:m_user,username', // Mengacu pada tabel 'm_user' dan kolom 'username'
            'nama' => 'required',
            'password' => ['required', 'min:5', 'confirmed'],
            'level_id' => 'required|exists:m_level,level_id', // Asumsi ada tabel 'm_level' dengan primary key 'level_id'
        ]);

        // If validation fails
        if ($validator->fails()) {
            return redirect('/register')
                        ->withErrors($validator)
                        ->withInput();
            // Jika ini adalah permintaan API, Anda bisa mengembalikan JSON error:
            // return response()->json($validator->errors(), 422);
        }

        // Create new user
        $user = UserModel::create([
            'level_id' => $request->level_id,
            'username' => $request->username,
            'nama' => $request->nama,
            'password' => Hash::make($request->password), // Gunakan Hash::make untuk mengenkripsi password
        ]);

        // Optionally log the user in after registration
        // Auth::login($user);
        // return redirect('/home'); // Redirect ke halaman setelah registrasi

        // Jika ini adalah permintaan API, Anda bisa mengembalikan JSON success:
        return redirect('/login')->with('success', 'Registrasi berhasil. Silakan login.');
        // return response()->json(['success' => true, 'user' => $user], 201);
    }

    /**
     * Menampilkan form login.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        return view('auth.login'); // Pastikan ini sesuai dengan lokasi file login.blade.php Anda
    }

    /**
     * Memproses data login user.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }
}