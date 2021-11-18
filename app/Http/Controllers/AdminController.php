<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Complain;
use App\Models\Response;

class AdminController extends Controller
{
    public function index(){
        $pengaduan = DB::select("CALL getPengaduan_by_status('0') ");

        return view('admin.home', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function viewPetugas(){
        $petugas = DB::table('petugas')->where('level', 'petugas')->get();

        return view('admin.viewPetugas', [
            'petugas' => $petugas
        ]);
    }

    public function createPetugas(){
        return view('admin.createPetugas');
    }

    public function postPetugas(){
        request()->validate([
            'nama_petugas' => 'required',
            'username' => 'required',
            'password' => 'required',
            'telp' => 'required',
        ]);

        $password = Hash::make(request()->password);
        
        DB::table('petugas')->insert([
            'nama_petugas' => request()->nama_petugas,
            'username' => request()->username,
            'password' => $password,
            'telp' => request()->telp,
            'level' => request()->level
        ]);

        return redirect('admin/petugas')->with('message', 'Berhasil menambahkan petugas baru');
    }

    public function editPetugas($id){
        $petugas = DB::table('petugas')->where('id', $id)->get();

        return view('admin.editPetugas', [
            'petugas' => $petugas
        ]);
    }

    public function updatePetugas($id){
        $data = DB::table('petugas')->where('id', $id)->first();
        if(request()->password == ''){
            DB::table('petugas')->where('id', $id)->update([
                'nama_petugas' => request()->nama_petugas,
                'username' => request()->username,
                'password' => $data->password,
                'telp' => request()->telp,
                'level' => request()->level
              
            ]);
        }else{
            DB::table('petugas')->where('id', $id)->update([
                'nama_petugas' => request()->nama_petugas,
                'username' => request()->username,
                'password' => Hash::make(request()->password),
                'telp' => request()->telp,
                'level' => request()->level
            ]);
        }

        return redirect('admin/petugas')->with('message', 'Berhasil memperbarui data petugas');

    }

    public function destroyPetugas($id){
        DB::table('petugas')->where('id', $id)->delete();

        return redirect('admin/petugas')->with('message', 'Berhasil menghapus data petugas');
    }

    public function verified(){
        $pengaduan = DB::select("CALL getPengaduan_by_status('proses') ");

        return view('admin.verified', [
            'pengaduan' => $pengaduan,

        ]);
    }

    public function detail($id){
        $pengaduan = DB::table('complains')->join('masyarakat', 'complains.nik', '=', 'masyarakat.nik')->where([
            'id' => $id,
            'status' => '0'
        ])->get();

        return view('admin.detail', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function verification($id){
        Complain::where('id', $id)->update([
            'tgl_pengaduan' => request()->tgl_pengaduan,
            'nik' => request()->nik,
            'isi_laporan' => request()->isi_laporan,
            'foto' => request()->foto,
            'status' => request()->status,
        ]);

        return redirect('admin/verified')->with('message', 'Aduan telah terverifikasi');
    }

    public function balasan($id){
        $pengaduan = DB::table('complains')->join('masyarakat', 'complains.nik', '=', 'masyarakat.nik')->where([
            'id' => $id,
            'status' => 'proses'
        ])->get();

        return view('admin.balasan', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function postTanggapan($id){
        request()->validate([
            'tanggapan' => 'required'
        ]);

        Response::create([
            'complain_id' => request()->complain_id,
            'tanggapan' => request()->tanggapan,
            'petugas_id' => request()->petugas_id,
        ]);

        return redirect('admin/response')->with('message', 'Tanggapan Berhasil Dikirimkan');
    }

    public function print($id){
        $pengaduan = DB::table('complains')->join('masyarakat', 'complains.nik', '=', 'masyarakat.nik')->where('id', $id)->get();

        return view('admin.print', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function response(){
        $pengaduan = DB::table('complains')->join('masyarakat', 'complains.nik', '=', 'masyarakat.nik')->where('status', 'selesai')->get();

        return view('admin.done', [
            'pengaduan' => $pengaduan,

        ]);
    }

    
}
