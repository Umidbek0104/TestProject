<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function loginPage()
    {
        $roles=Role::all();
        return view('Avtarizatsiya.login',compact('roles'));
    }



    public function login(Request $request)
        {
            $credentials = $request->only('email', 'password');

            // Login qilishga urinish
            if (Auth::attempt($credentials)) {
                // Foydalanuvchi muvaffaqiyatli login qildi
                $user = Auth::user();

                // Rolega qarab yo‘naltirish
                if ($user->role === 'admin') {
                    return redirect()->route('admin.dashboard');
                }  elseif ($user->role === 'user') {
                    return redirect()->route('page.index');
                } else {
                    Auth::logout(); // noma'lum rol — chiqib ketadi
                    return redirect()->route('page.index')->withErrors(['msg' => 'Nomaʼlum rol']);
                }
            }
            return redirect()->back()->withErrors(['msg' => 'Email yoki parol noto‘g‘ri'])->withInput();

        }
    public function registerPage()
    {
        $roles=Role::all();
        return view('Avtarizatsiya.register',compact('roles'));
    }
    public function register(Request $request){
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'user', // bu yerda role qo‘shilmoqda
        ]);

        Auth::login($user);

        return redirect()->route('page.index'); // ro‘yxatdan o‘tgan foydalanuvchilar sahifasi
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('page.index');
    }
}
