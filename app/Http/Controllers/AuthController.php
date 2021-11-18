<?php

namespace App\Http\Controllers;

use App\Models\Masyarakat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class AuthController extends Controller
{
    public function index(){
        return view('auth.user.login');
    }

    public function login(){
        return view('auth.admin.login');
    }

    public function register(){
        return view('auth.user.register');
    }

    public function postRegister(){
        request()->validate([
            'nik' => 'required',
            'nama' => 'required',
            'username' => 'max:25',
            'telp' => 'required|numeric',
            'password' => 'required|confirmed',
        ]);

        $password = request()->password;

        $user = DB::table('masyarakat')->insert([
            'nik' => request()->nik,
            'nama' => request()->nama,
            'username' => request()->username,
            'password' => Hash::make($password),
            'telp' => request()->telp,
        ]);

        if($user){
            return redirect('login')->with('message', 'Akun anda telah berhasil dibuat');
        }else{
            return redirect()->back();
        }
    }

    public function postLogin(){
        $data = DB::table('masyarakat')->where('username', request()->username)->first();
        
        if($data){
            $password = Hash::check(request()->password, $data->password);
            if($password){
                session(['key' => $data->nik]);
                session(['identify' => $data->nama]);
                session(['status' => 'user']);

                return redirect('/');

            }else{
                return redirect()->back()->with('message', 'Password yang anda masukkan salah');
            }
        }else{
            return redirect()->back()->with('message', 'Username tidak dapat ditemukan');
        }

        
    }

    public function adminLogin(){
        $data = DB::table('petugas')->where('username', request()->username)->first();
        
        if($data){
            $password = Hash::check(request()->password, $data->password);
            if($password){
                if($data->level == 'petugas'){
                    session(['key' => $data->id]);
                    session(['identify' => $data->nama_petugas]);
                    session(['status' => 'petugas']);

                    return redirect('petugas');
                }elseif($data->level == 'admin'){
                    session(['key' => $data->id]);
                    session(['identify' => $data->nama_petugas]);
                    session(['status' => 'admin']);

                    return redirect()->route('admin.home');
                }

            }else{
                return redirect()->back()->with('message', 'Password yang anda masukkan salah');
            }
        }else{
            return redirect()->back()->with('message', 'Username tidak dapat ditemukan');
        }

    }

    public function logout(){

        $status = request()->session()->get('status');

        if($status == 'admin' || $status == 'petugas'){
            request()->session()->flush();
            return redirect('admin/login');
        }else{
            request()->session()->flush();
            return redirect('login');
        }
        
    }
}
