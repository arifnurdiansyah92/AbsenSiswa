@extends('layouts.master')
@section('title', 'AN Absensi | Data Kelas')
@section('content')
<?php date_default_timezone_set('Asia/Jakarta');
$date = DATE('d F Y');  ?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Siswa</li>
            <li class="active">Profil</li>
        </ol>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Profil Siswa</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table id="profil" class="table table-bordred">
                                <tr>
                                    <td>Nama Siswa</td>
                                    <td>{{$resource->nama}}</td>
                                </tr>
                                <tr>
                                    <td>Tingkat Kelas</td>
                                    <td>{{$resource->tingkat_kelas}}</td>
                                </tr>
                                <tr>
                                    <td>Jenis Kelamin</td>
                                    <td>@if($resource->jenis_kelamin=="L"){{"Laki-Laki"}}@else{{"Perempuan"}}@endif</td>
                                </tr>
                                <tr>
                                    <td>Kelas</td>
                                    <td>
                                        <ul class="list-group">
                                            <ul class="list-group">
                                                @foreach($resource->kelas as $kelas)
                                                <li class="list-group-item">{{ $kelas->tingkat_kelas."-".$kelas->jurusan. " ".$kelas->nama_kelas}} ({{$kelas->tahun_masuk."/".$kelas->tahun_keluar}})</li>
                                                @endforeach
                                            </ul>
                                        </ul>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Absen Hari Ini ({{$date}}) </td>
                                    @if($resource->absensi->count()==0)
                                    <td>Hadir</td>
                                    @else
                                    @foreach($resource->absensi as $absen)
                                    <td> {{ $absen->pivot->status }} ({{$absen->pivot->keterangan}})</td>
                                    @endforeach
                                    @endif
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-12">
                <p class="back-link">&copy; <?php echo date('Y') ?> Arif Nurdiansyah</p>
            </div>
        </div><!--/.row-->
    </div>
</div>
@endsection