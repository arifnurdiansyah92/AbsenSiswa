<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Kelas;
use App\Siswa_Kelas;

class SiswaKelasController extends Controller
{
    public function add($id){
        $resource=Siswa::get();
        return view('Admin/SiswaKelas',['resource'=>$resource, 'kelas'=>$id]);
    }
    public function create(Request $request)
    {
        $check = Siswa_Kelas::where(['kelas_id' => $request->kelas, 'siswa_id' => $request->siswa])->get();
        if($check->count()>0){
            session()->flash('notif', array('success' => false, 'msgaction' => 'Tambah Data Gagal, Data Telah Ada!'));
            return redirect('/admin/kelas');
        }
        else{
            $SK = new Siswa_Kelas;
            $SK->siswa_id = $request->siswa;
            $SK->kelas_id = $request->kelas;
            if($SK->save()){
                session()->flash('notif', array('success' => true, 'msgaction' => 'Tambah Data Berhasil!'));
            }
            else{
                session()->flash('notif', array('success' => false, 'msgaction' => 'Tambah Data Gagal, Silahkan Ulangi!'));
            }
            return redirect('/admin/kelas/'.$request->kelas);
        }
    }
    public function delete($id){
        Siswa_Kelas::find($id)->delete();
        session()->flash('notif', array('success' => true, 'msgaction' => 'Hapus Data Berhasil!'));
        return redirect(url()->previous());
    }
}
