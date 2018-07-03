@extends('layouts.master')
@section('title','Daftar Akun')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ url('register') }}">
                        {{ csrf_field() }}
                        <div id="siswa_username" class="form-group" hidden>
                            <label for="name" class="col-md-4 control-label">Username (NIS)</label>
                            <div class="col-md-6">
                                <select name="username" class="form-control">
                                    @foreach($siswa as $sis)
                                    <option value="{{$sis->id_siswa}}">{{$sis->nis." - ".$sis->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div id="username" class="form-group{{ $errors->has('username') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Username</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control" name="username" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('username'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('username') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('akses') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Akses</label>
                            <div class="col-md-6">
                                <select name="akses" id="akses" class="form-control">
                                    <option>Admin</option>
                                    <option>Piket</option>
                                    <option>Siswa</option>
                                    <option>Ortu</option>
                                </select>
                            </div>
                        </div>
                        <div class="siswa_id form-group" hidden>
                            <label for="name" class="col-md-4 control-label">Siswa</label>
                            <div class="col-md-6">
                                <select name="id_siswa" class="form-control">
                                    @foreach($siswa as $sis)
                                    <option value="{{$sis->id_siswa}}">{{$sis->nis." - ".$sis->nama}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                <span class="help-block">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@section('js')
<script>
    $('#akses').change(function(){
        if($('#akses').val()=="Ortu"){
            $('.siswa_id').show();
            $('#siswa_username').hide();
            $('#username').show();
        }else if($('#akses').val()=="Siswa"){
            $('#siswa_username').show();
            $('.siswa_id').hide();
            $('#username').hide();
        }else{
            $('.siswa_id').hide();
            $('#username').show();
            $('#siswa_username').hide();
        }
    });
</script>
@endsection
