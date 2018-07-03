<?php

namespace App\Http\Controllers;

use App\User;
use App\Siswa;
use App\Absensi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class UserController extends Controller
{
    function index(){
        if(Auth::user()->akses=="Siswa" or Auth::user()->akses=="Ortu"){
            if(Auth::user()->akses=="Siswa"){
                $resource = Siswa::where('nis', Auth::user()->username)->firstOrFail();
            }else{
                $resource = Siswa::where('id_siswa', Auth::user()->id_siswa)->firstOrFail();
            }
            $alfa=Absensi::where(['siswa_id'=>$resource->id_siswa])->where('status','Alfa')->count();
            $izin=Absensi::where(['siswa_id'=>$resource->id_siswa])->where('status','Izin')->count();
            $sakit=Absensi::where(['siswa_id'=>$resource->id_siswa])->where('status','Sakit')->count();
            $absen=array(['alfa'=>$alfa,'izin'=>$izin,'sakit'=>$sakit]);
            return view('siswa/data',['resource'=>$resource, 'absen'=>$absen]);
        }
    }
}
