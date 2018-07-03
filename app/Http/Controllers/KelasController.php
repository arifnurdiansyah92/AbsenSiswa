<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;

class KelasController extends Controller
{
    public function index(){
        $resource = Kelas::paginate(10);
        return view('Admin/kelas', ['resource'=>$resource]);
    }
    public function create(Request $request){
        $check = Kelas::where(['tingkat_kelas' => $request->tingkat_kelas, 'jurusan' => $request->jurusan, 'nama_kelas' => $request->nama_kelas, 'tahun_masuk' => $request->tahun_masuk, 'tahun_keluar' => $request->tahun_keluar])->get();
        if($check->count()>0){
            session()->flash('notif', array('success' => false, 'msgaction' => 'Tambah Data Gagal, Data Telah Ada!'));
            return redirect('/admin/kelas');
        }
        else{
            $Kelas = new Kelas;
            $Kelas->tingkat_kelas = $request->tingkat_kelas;
            $Kelas->jurusan = $request->jurusan;
            $Kelas->nama_kelas = $request->nama_kelas;
            $Kelas->kuota = $request->kuota;
            $Kelas->tahun_masuk = $request->tahun_masuk;
            $Kelas->tahun_keluar = $request->tahun_keluar;
            if($Kelas->save()){
                session()->flash('notif', array('success' => true, 'msgaction' => 'Tambah Data Berhasil!'));
            }
            else{
                session()->flash('notif', array('success' => false, 'msgaction' => 'Tambah Data Gagal, Silahkan Ulangi!'));
            }
            return redirect('/admin/kelas');
        }

    }
    public function update(Request $request){
        $kelas = Kelas::find($request->id_kelas);
        $kelas->tingkat_kelas = $request->tingkat_kelas;
        $kelas->jurusan = $request->jurusan;
        $kelas->nama_kelas = $request->nama_kelas;
        $kelas->kuota = $request->kuota;
        $kelas->tahun_masuk = $request->tahun_masuk;
        $kelas->tahun_keluar = $request->tahun_keluar;
        if($kelas->save()){
            session()->flash('notif', array('success' => true, 'msgaction' => 'Edit Data Berhasil!'));
            return redirect('/admin/kelas');
        }else{
            session()->flash('notif', array('success' => false, 'msgaction' => 'Edit Data Gagal, Silahkan Ulangi!'));
            return redirect('/admin/kelas');
        }
    }
    public function delete($id){
        Kelas::find($id)->delete();
        session()->flash('notif', array('success' => true, 'msgaction' => 'Hapus Data Berhasil!'));
        return redirect('/admin/kelas');
    }
    public function show($id){
        $resource = Kelas::find($id);
        return view('Admin/detail_kelas', ['resource'=>$resource]);
    }
}
