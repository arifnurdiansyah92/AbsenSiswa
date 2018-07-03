@extends('layouts.master')
@section('title', 'AN Absensi | Dashboard')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Dashboard</li>
        </ol>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    <blockquote>
                        <p>Selamat Datang {{Auth::user()->username}} !</p>
                    </blockquote>
                </div>
            </div>
        </div>
    </div><!--/.row-->
    <div class="col-sm-12">
        <p class="back-link">&copy; <?php echo date('Y') ?> Arif Nurdiansyah</p>
    </div>
</div><!--/.row-->
<!--/.main-->
@endsection