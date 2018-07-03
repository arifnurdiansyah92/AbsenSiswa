<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Absensi;
use App\Siswa_Kelas;
use App\Kelas;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    public function index(){
        $resource = Kelas::paginate(10);
        return view('absensi/listkelas', ['resource'=>$resource]);
    }
    public function show($id){
        $resource = Kelas::find($id);
        return view('absensi/absensi',['resource'=>$resource]);
    }
    public function create(Request $request){
       
        for($i=0;$i<count($request->siswa);$i++){
            
            $check = Absensi::where(['siswa_id' => $request->siswa[$i],'kelas_id' => $request->kelas, 'tanggal' => Carbon::now('Asia/Jakarta')->format('Y-m-d')])->get();
            if(count($check)==0 && $request->status[$i] != "Hadir"){
                $absen = new Absensi;
                $absen->siswa_id = $request->siswa[$i];
                $absen->kelas_id = $request->kelas;
                $absen->tanggal = Carbon::now('Asia/Jakarta')->format('Y-m-d');
                $absen->status = $request->status[$i];
                $absen->keterangan = $request->status[$i];
                $absen->save();

            }


        }
        return redirect('/absensi');
    }
}
