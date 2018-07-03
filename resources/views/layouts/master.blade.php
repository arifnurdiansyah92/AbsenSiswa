<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>@yield('title')</title>
        <link rel="stylesheet" type="text/css" href="{!! asset('css/bootstrap.min.css') !!}">
        <link href="{!! asset('css/font-awesome.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/datepicker3.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/styles.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/daterangepicker.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/select2.min.css') !!}" rel="stylesheet">
        <link href="{!! asset('css/select2-bootstrap.css') !!}" rel="stylesheet">
    </head>
    <body>
        <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span></button>
                    <a class="navbar-brand" href="/">AN <span>Absensi</span></a>
                </div>
            </div><!-- /.container-fluid -->
        </nav>
        <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
            <div class="profile-sidebar">
                <div class="profile-userpic">
                    <img src="{!! asset('img/profil-icon.png') !!}" class="img-responsive" alt="">
                </div>
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">{{Auth::user()->username}}</div>
                    <div class="profile-usertitle-status">Akses : {{Auth::user()->akses}}</div>
                </div>
                <div class="clear"></div>
            </div>
            <ul class="nav menu">
                <li><a href="/"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
                <li><a href="{{ url('/absensi/') }}"><em class="fa fa-calendar">&nbsp;</em> Absensi</a></li>
                @if(Auth::user()->akses=="Admin")
                <li class="parent "><a data-toggle="collapse" href="#sub-item-1">
                    <em class="fa fa-cogs">&nbsp;</em> Manajemen Data <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right"><em class="fa fa-angle-down"></em></span>
                    </a>
                    <ul class="children collapse" id="sub-item-1">
                        <li><a class="" href="{{ url('/admin/kelas')}}">
                            <span class="fa fa-angle-right">&nbsp;</span> Kelas <span class="label label-info">{{App\Kelas::all()->count()}}</span>
                            </a></li>
                        <li><a class="" href="{{ url('/admin/siswa')}}">
                            <span class="fa fa-angle-right">&nbsp;</span> Siswa <span class="label label-info">{{App\Siswa::all()->count()}}</span>
                            </a></li>
                        <li><a class="" href="{{ url('/admin/akun')}}">
                            <span class="fa fa-angle-right">&nbsp;</span> Akun <span class="label label-info">{{App\Kelas::all()->count()}}</span>
                            </a></li>

                    </ul>
                </li>
                @endif
                <li><a href="/admin/rekap/kelas"><em class="fa fa-clone">&nbsp;</em> Rekap Data</a></li>
                <li><a href="/logout"><em class="fa fa-power-off">&nbsp;</em> Logout</a></li>
            </ul>
        </div><!--/.sidebar-->
        @yield('content')
        <script src="{!! asset('js/jquery-3.2.1.min.js') !!}"></script>
        <script src="{!! asset('js/bootstrap.min.js') !!}"></script>
        <script src="{!! asset('js/bootstrap-datepicker.js') !!}"></script>
        <script src="{!! asset('js/chart-data.js') !!}"></script>
        <script src="{!! asset('js/easypiechart.js') !!}"></script>
        <script src="{!! asset('js/easypiechart-data.js') !!}"></script>
        <script src="{!! asset('js/custom.js') !!}"></script>
        <script src="{!! asset('js/checkall.js') !!}"></script>
        <script src="{!! asset('js/crud-ajax.js') !!}"></script>
        <script src="{!! asset('js/moment-local.min.js') !!}"></script>
        <script src="{!! asset('js/select2.min.js') !!}"></script>
        <script src="{!! asset('js/daterangepicker.js') !!}"></script>
        <script>
            $(document).ready(function() {
                $('select').select2();
            });
        </script>
        @yield('js')
    </body>
</html>