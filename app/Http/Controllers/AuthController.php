<?php

namespace App\Http\Controllers;

use App\User;
use App\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class AuthController extends Controller
{
    function showForm(){

        return view('auth/login');
    }
    function lists(){
        $resource = User::paginate(10);
        return view('admin/akun', ['resource'=>$resource]);
    }
    function delete($id){
        User::find($id)->delete();
        session()->flash('notif', array('success' => true, 'msgaction' => 'Hapus Data Berhasil!'));
        return redirect('/admin/akun');
    }
    function login(Request $req){
        if (Auth::attempt(['username' => $req['username'], 'password' => $req['password']], true)) {
            return redirect('/');         
        }   
    }
    function logout(){
        if(Auth::check()){
            Auth::logout();
        }
        return redirect('/');
    }
    function daftar(){
        $siswa = Siswa::get();
        return view('auth/register',['siswa'=>$siswa]);
    }
    public function prosesDaftar(Request $request){
        $check = User::where(['username' => $request->username])->get();
        if($check->count()>0){
            session()->flash('notif', array('success' => false, 'msgaction' => 'Tambah Data Gagal, Username Telah Ada!'));
            return redirect('/register');
        }
        else{
            $Akun = new User;
            $Akun->username = $request->username;
            $Akun->akses = $request->akses;
            if($request->akses=="Ortu"){
                $Akun->id_siswa = $request->id_siswa;    
            }
            $Akun->password = bcrypt($request->password);
            if($Akun->save()){
                session()->flash('notif', array('success' => true, 'msgaction' => 'Tambah Data Berhasil!'));
            }
            else{
                session()->flash('notif', array('success' => false, 'msgaction' => 'Tambah Data Gagal, Silahkan Ulangi!'));
            }
            return redirect('/admin/akun');
        }
    }
}
