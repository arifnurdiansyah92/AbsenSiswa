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
                <div class="panel-heading">Daftar Data</div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-xs-4 col-md-4 col-lg-4 no-padding">
                            <div class="panel panel-blue panel-widget border-right">
                                <div class="row no-padding">
                                    <div class="large">{{ count(App\Kelas::get()) }}</div>
                                    <div><a href="{{url('/admin/rekap/kelas')}}" class="text-muted">Kelas</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-4 col-lg-4 no-padding">
                            <div class="panel panel-orange panel-widget border-right">
                                <div class="row no-padding">
                                    <div class="large">{{ count(App\Siswa::get()) }}</div>
                                    <div><a class="text-muted"href="#">Siswa</a></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-4 col-md-4 col-lg-4 no-padding">
                            <div class="panel panel-orange panel-widget border-right">
                                <div class="row no-padding">
                                    <div class="large">{{ count(App\Absensi::get()) }}</div>
                                    <div><a href="#" class="text-muted">Absensi</a></div>
                                </div>
                            </div>
                        </div>
                    </div><!--/.row-->
                </div>
            </div>
            <div class="col-sm-12">
                <p class="back-link">&copy; <?php echo date('Y') ?> Arif Nurdiansyah</p>
            </div>
        </div><!--/.row-->
    </div>
</div>
@endsection