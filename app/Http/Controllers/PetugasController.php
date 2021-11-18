<?php

namespace App\Http\Controllers;

use App\Models\Complain;
use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PetugasController extends Controller
{
    public function index(){
        $pengaduan = DB::select("CALL getPengaduan_by_status('0') ");

        return view('petugas.home', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function verified(){
        $pengaduan = DB::select("CALL getPengaduan_by_status('proses') ");

        return view('petugas.verified', [
            'pengaduan' => $pengaduan,

        ]);
    }

    public function detail($id){
        $pengaduan = DB::table('complains')->join('masyarakat', 'complains.nik', '=', 'masyarakat.nik')->where([
            'id' => $id,
            'status' => '0'
        ])->get();

        return view('petugas.detail', [
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

        return redirect('petugas/verified')->with('message', 'Aduan telah terverifikasi');
    }

    public function balasan($id){
        $pengaduan = DB::table('complains')->join('masyarakat', 'complains.nik', '=', 'masyarakat.nik')->where([
            'id' => $id,
            'status' => 'proses'
        ])->get();

        return view('petugas.balasan', [
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

        return redirect('petugas/verified')->with('message', 'Tanggapan Berhasil Dikirimkan');
    }

    public function detailPrint($id){
        $pengaduan = DB::table('complains')->join('masyarakat', 'complains.nik', '=', 'masyarakat.nik')->where('id', $id)->get();

        return view('petugas.detail-print', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function response(){
        $pengaduan = DB::table('complains')->join('masyarakat', 'complains.nik', '=', 'masyarakat.nik')->where('status', 'selesai')->get();

        return view('petugas.done', [
            'pengaduan' => $pengaduan,

        ]);
    }
}
