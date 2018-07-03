@extends('layouts.withoutnav')
@section('title', 'AN Absensi | Panduan')
@section('content')
<div class="jumbotron text-center">
    <h1>Panduan</h1> 
    <p>Panduan AN Absensi</p> 
</div>
<div class="jumbotron">
    <div class="container">
        <div class="row">
            <div class="col-lg-10">
                <h3>Login</h3>
                <p>Anda bisa login dengan mengklik tombol di Portal Login</p>
                <img src="{{asset('img/panduan-1.png')}}">
                <p>Setelah diklik, anda akan diarahkan ke form login</p>
                <img src="{{asset('img/panduan-2.png')}}">
                <ol>
                    <li>Masukkan Username & Password</li>
                    <li>Klik tombol login</li>
                </ol>
                Akun default
                <blockquote>
                    <b>Username : admin </b>
                    <b>Password : admin</b>
                </blockquote>
                <br>
                <h3>Manajemen Data</h3>
                <p>Untuk dapat melakukan manajemen data, anda harus login dengan akses <b>admin</b>!</p>
                <p>Setelah Anda Login maka anda akan melihat tampilan berikut disebelah kanan anda</p>
                <img src="{{asset('img/panduan-3.png')}}">
                <p>Kliklah data yang ingin anda atur</p>
                <p>Misalkan Kelas</p>
                <ol>
                    <li>Tambah Data
                        <p>Untuk menambah data, kliklah tombol "+" seperti digambar</p>
                        <img src="{{asset('img/panduan-4.png')}}">
                        <p>Maka akan muncul popup yang berisikan kolom mengenai data tersebut, dalam hal ini adalah kelas</p>
                        <img src="{{asset('img/panduan-5.png')}}">
                    </li>
                    <li>Edit Data</li>
                        <p>Untuk mengedit data, kliklah ikon pensil pada data yang anda ingin edit</p>
                        <img src="{{asset('img/panduan-6.png')}}">
                        <p>Maka akan muncul popup form edit</p>
                        <p>Klik tombol Update, jika selesai</p>
                    <li>Hapus Data</li>
                        <p>Untuk menghapus cukup klik ikon tempat sampah pada data yang ingin dihapus</p>
                </ol>
                <br>
                <h3>Absen & Rekap</h3>
                <p>Untuk absen anda harus masuk dengan akun yang memiliki akses Admin atau Piket</p>
                <p>Kliklah tombol "Absensi"</p>
                <p>Dan pilih kelas yang ingin di-absen</p>
                <p>Untuk rekap, pilih menu rekap</p>
                <p>Lalu pilih kelas yang ingin direkap</p>
            </div>
        </div>
    </div>
</div>
@endsection