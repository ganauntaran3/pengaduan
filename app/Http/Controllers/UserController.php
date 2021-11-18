<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Complain;
use App\Models\Response;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index(){
        $key = request()->session()->get('key');
        $pengaduan = Complain::where('nik', $key)->get();
        return view('user.home', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function pengaduan(){
        return view('user.pengaduan');
    }

    public function postAduan(){
        request()->validate([
            'isi_laporan' => 'required',
            'foto' => 'required|mimes:png,jpg,jpeg|max:2048'
        ]);
           
        DB::beginTransaction();

        try{
            $img = request()->file('foto');
            $img_name = time()."-".$img->getClientOriginalName();
            $dir = "img";
            $img->move($dir, $img_name);

            Complain::create([
                'nik' => request()->nik,
                'isi_laporan' => request()->isi_laporan,
                'foto' => $img_name,
                'status' => request()->status,
            ]);

            DB::commit();
            return redirect('/')->with('message', 'Berhasil mengirimkan aduan');
        }catch (\Exception $e){
            DB::rollBack();
        }
        
    }

    public function tanggapan($id){
        $tanggapan = Response::where('complain_id', $id)->get();

        return view('user.tanggapan', [
            'tanggapan' => $tanggapan
        ]);
    }

    public function editPengaduan($id){
        $pengaduan = Complain::where('id', $id)->get();
        return view('user.pengaduan-edit', [
            'pengaduan' => $pengaduan
        ]);
    }

    public function updatePengaduan($id){
        $pengaduan = Complain::where('id', $id)->first();

        if(request()->has('foto')){

            request()->validate([
                'isi_laporan' => 'required',
                'foto' => 'required|mimes:png,jpg,jpeg|max:2048'
            ]);

           File::delete('img/'. $pengaduan->foto);

           $img = request()->file('foto');
            $img_name = time()."-".$img->getClientOriginalName();
            $dir = "img";
            $img->move($dir, $img_name);

            $pengaduan->update([
                'tgl_pengaduan' => request()->tgl_pengaduan,
                'nik' => request()->nik,
                'isi_laporan' => request()->isi_laporan,
                'foto' => $img_name,
                'status' => request()->status,
            ]);

        }else{
            $pengaduan->update([
                'tgl_pengaduan' => request()->tgl_pengaduan,
                'nik' => request()->nik,
                'isi_laporan' => request()->isi_laporan,
                'foto' => $pengaduan->foto,
                'status' => request()->status,
            ]);
        }

        return redirect('/')->with('message', 'Berhasil Mengupdate Data Pengaduan');
    }
}
