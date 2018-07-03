@extends('layouts.master')
@section('title', 'AN Absensi | Data Kelas')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Admin</li>
            <li class="active">Kelas</li>
        </ol>
    </div><!--/.row-->
    @if(session()->exists('notif'))
    @if(session()->get('notif')['success'])
    {!! 
    '<div class="alert alert-success alert-dismissable"> 
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Sukses! </strong>'. session()->get('notif')['msgaction'] .'
    </div>' 
    !!}
    @else
    {!! 
    '<div class="alert alert-danger alert-dismissable"> 
    <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
    <strong>Gagal! </strong>'. session()->get('notif')['msgaction'] .'
    </div>' 
    !!}
    @endif
    @endif
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Data Siswa</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table id="absensi" class="table table-bordred table-striped">
                                <thead>
                                    <tr>
                                        <th width="2%"><input type="checkbox" id="checkall" /> </th>
                                        <th width="3%" class="text-center">No</th>
                                        <th width="30%">NIS</th>
                                        <th width="30%">Nama Siswa</th>
                                        <th width="15%" class="text-center">Jenis Kelamin</th>
                                        <th width="5%" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($resource as $index=>$res)
                                    <tr>
                                        <td><input type="checkbox" class="checkthis" /></td>
                                        <td>{{$index+1}}</td>
                                        <td>{{$res->nis}}</td>
                                        <td>{{$res->nama}}</td>
                                        <td class="text-center">@if($res->jenis_kelamin=="L"){{ "Laki-Laki" }}@else{{ "Perempuan" }}@endif</td>
                                        <td><form action="{{url('/siswakelas/')}}" method="POST"><input type="hidden" name="kelas" value="{{$kelas}}"><input type="hidden" name="siswa" value="{{$res->id_siswa}}"><button class="btn btn-primary" type="submit">Tambahkan Ke Kelas</button>{!! csrf_field() !!}</form></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination pull-right">

                        </ul>
                    </div>
                    <div class="panel-footer">
                        <p data-placement="top" data-toggle="tooltip" title="Add" class="pull-right"><button class="btn btn-primary btn-sm" data-title="Add" data-toggle="modal" data-target="#add" ><span class="glyphicon glyphicon-plus"></span></button></p>
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