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
                <div class="panel-heading">Daftar Guru</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table id="absensi" class="table table-bordred table-striped">
                                <thead>
                                    <tr>
                                        <input type="text" name="search" class="form-control" placeholder="Cari...">
                                    </tr>
                                    <tr>
                                        <th width="2%"><input type="checkbox" id="checkall" /> </th>
                                        <th width="3%" class="text-center">No</th>
                                        <th width="20%">NIP</th>
                                        <th width="20%">Nama Guru</th>
                                        <th width="15%" class="text-center">Jenis Kelamin</th>
                                        <th width="20%" class="text-center">Status</th>
                                        <th width="5%" colspan="2" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody id="isi">
                                    @foreach ($resource as $index => $res)
                                    <tr>
                                        <td><input type="checkbox" class="checkthis" /></td>
                                        <td class="text-center">{{ $index+1 }}</td>
                                        <td>{{ $res->nip}}</td>
                                        <td>{{ $res->nama}}</td>
                                        <td class="text-center">@if($res->jenis_kelamin=="L"){{ "Laki-Laki" }}@else{{ "Perempuan" }}@endif</td>
                                        <td class="text-center">{{$res->status}}</td>
                                        <td class="text-center"><p data-placement="top" data-toggle="tooltip" title="Edit"><button data-aksi="guru" data-nama="{{$res->nama}}" data-id="{{$res->id_guru}}" data-status="{{$res->status}}" data-jk="{{$res->jenis_kelamin}}" data-nip="{{$res->nip}}" class="edit-button btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                        <td class="text-center"><p data-placement="top" data-toggle="tooltip" title="Delete"><button data-aksi="guru" data-id="{{$res->id_guru}}" class="delete-button btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p></td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination pull-right">
                            {!! $resource->render() !!}
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

<!-- Modal CRUD Content -->

<!-- Edit Modal -->
<div id="edit" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title" id="title-modal">Modal Header</h4>
            </div>
            <form action="/guru/" method="post">
                <input type="hidden" name="id_guru" id="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="number" name="nip" class="form-control" id="nip" placeholder="NIP">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama">Nama Guru</label>
                                <input type="text" name="nama" class="form-control" id="nama" placeholder="Nama Guru">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control" id="jk" name="jk">
                                    <option selected disabled>--Pilih Jenis Kelamin--</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <br>
                                <label class="radio-inline">
                                    <input id="aktif" type="radio" id="aktif" name="status" value="Aktif" checked>Aktif
                                </label>
                                <label class="radio-inline">
                                    <input id="tidak_aktif" type="radio" id="tidak_aktif" name="status" value="Tidak Aktif">Tidak Aktif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-info btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-edit"></span> Update Data</button>
                </div>
                {!! csrf_field() !!}
                {{ method_field('PUT') }}
            </form>
        </div>
    </div>
</div>
<!--/Edit Modal -->

<!-- Add Modal -->
<div id="add" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Tambah Data Guru</h4>
            </div>
            <form action="/guru/" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nip">NIP</label>
                                <input type="number" name="nip" class="form-control" placeholder="NIP">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nama">Nama Guru</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Guru">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select class="form-control" id="jk" name="jk">
                                    <option selected disabled>--Pilih Jenis Kelamin--</option>
                                    <option value="L">Laki-Laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="control-label">Status</label>
                                <br>
                                <label class="radio-inline">
                                    <input id="aktif" type="radio" name="status" value="Aktif" checked>Aktif
                                </label>
                                <label class="radio-inline">
                                    <input id="tidak_aktif" type="radio" name="status" value="Tidak Aktif">Tidak Aktif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-info btn-lg" style="width: 100%;"><span class="glyphicon glyphicon-plus"></span> Tambah Data</button>
                </div>
                {!! csrf_field() !!}
            </form>
        </div>
    </div>
</div>
<!--/add Modal -->

<!-- Delete modal -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="delete-form" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true"><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></button>
                    <h4 class="modal-title custom_align" id="Heading">Delete this entry</h4>
                </div>
                <div class="modal-body">

                    <div class="alert alert-danger"><span class="glyphicon glyphicon-warning-sign"></span> Yakin ingin menghapus data ini?</div>

                </div>
                <div class="modal-footer ">
                    <button type="submit" class="btn btn-success" ><span class="glyphicon glyphicon-ok-sign"></span> Yes</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> No</button>
                </div>
                {!! csrf_field() !!}
                {{ method_field('DELETE') }}
            </form>
        </div>
        <!-- /.modal-content --> 
    </div>
    <!-- /.modal-dialog --> 
</div>
<!--/Delete modal -->

@endsection
@section('js')
<script>
    $('input[name="search"]').keyup(function(){
        $.ajax({
            type : 'POST', 
            data :{
                key : $(this).val(),
                _method : 'POST',
                _token : $('meta[name="csrf-token"]').attr('content')
            },
            url  : '/guru/search/', 
            success : function(html){
                $('#isi').html(html)
            }
        });  
    })

</script>
@endsection