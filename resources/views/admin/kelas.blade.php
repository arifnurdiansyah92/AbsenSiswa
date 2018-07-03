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
                <div class="panel-heading">Daftar Kelas</div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table id="absensi" class="table table-bordred table-striped">
                                <thead>
                                    <tr>
                                        <th width="2%"><input type="checkbox" id="checkall" /> </th>
                                        <th width="3%" class="text-center">No</th>
                                        <th width="60%">Nama Kelas</th>
                                        <th width="5%" class="text-center">Kuota</th>
                                        <th width="10%" class="text-center">Tahun Ajaran</th>
                                        <th width="5%" colspan="2" class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($resource as $index => $res)
                                    <tr>
                                        <td><input type="checkbox" class="checkthis" /></td>
                                        <td class="text-center">{{ $index+1 }}</td>
                                        @if($res->nama_kelas > 1)
                                        <td><a href="{{url('admin/kelas/'.$res->id_kelas)}}">{{ $res->tingkat_kelas.'-'.$res->jurusan." ".$res->nama_kelas }}</a></td>
                                        @else
                                        <td><a href="{{url('admin/kelas/'.$res->id_kelas)}}">{{ $res->tingkat_kelas.'-'.$res->jurusan}}</a></td>
                                        @endif
                                        <td class="text-center">{{$res->kuota}}</td>
                                        <td class="text-center">{{$res->tahun_masuk."/".$res->tahun_keluar}}</td>
                                        <td class="text-center"><p data-placement="top" data-toggle="tooltip" title="Edit"><button data-aksi="kelas" data-id="{{$res->id_kelas}}" data-tingkat="{{$res->tingkat_kelas}}" data-jurusan="{{$res->jurusan}}" data-nama="{{$res->nama_kelas}}" data-kuota="{{$res->kuota}}" data-tahunmasuk="{{$res->tahun_masuk}}" data-tahunkeluar="{{$res->tahun_keluar}}" class="edit-button btn btn-primary btn-xs" data-title="Edit" data-toggle="modal" data-target="#edit" ><span class="glyphicon glyphicon-pencil"></span></button></p></td>
                                        <td class="text-center"><p data-placement="top" data-toggle="tooltip" title="Delete"><button  data-aksi="kelas" data-id={{$res->id_kelas}} class="delete-button btn btn-danger btn-xs" data-title="Delete" data-toggle="modal" data-target="#delete"><span class="glyphicon glyphicon-trash"></span></button></p></td>
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
            <form action="/kelas/" method="post">
                <input type="hidden" name="id_kelas" id="id">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tingkat_kelas">Tingkat Kelas</label>
                                <select class="form-control" id="tingkat_kelas" name="tingkat_kelas">
                                    <option selected disabled>-Pilih Tingkat Kelas-</option>
                                    <option>X</option>
                                    <option>XI</option>
                                    <option>XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control" id="jurusan" name="jurusan">
                                    <option selected disabled>-Pilih Jurusan-</option>
                                    <option>RPL</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nomor_kelas">Nomor Kelas</label>
                                <input class="form-control" type="number" min="1" id="nama_kelas" placeholder="Nomor Kelas" name="nama_kelas">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="kuota">Kuota</label>
                                <input type="number" name="kuota" id="kuota" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="tahun_masuk">Tahun Masuk</label>
                            <input class="form-control" type="number" name="tahun_masuk" id="tahun_masuk" length=4>
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="tahun_keluar">Tahun Keluar</label>
                            <input class="form-control" type="number" name="tahun_keluar" id="tahun_keluar" length=4>
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
                <h4 class="modal-title">Tambah Data Kelas</h4>
            </div>
            <form action="/kelas/" method="post">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="tingkat_kelas">Tingkat Kelas</label>
                                <select class="form-control" name="tingkat_kelas">
                                    <option selected disabled>-Pilih Tingkat Kelas-</option>
                                    <option>X</option>
                                    <option>XI</option>
                                    <option>XII</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="jurusan">Jurusan</label>
                                <select class="form-control" name="jurusan">
                                    <option>-Pilih Jurusan-</option>
                                    <option>RPL</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="nomor_kelas">Nomor Kelas</label>
                                <input class="form-control" type="number" min="1" placeholder="Nomor Kelas" name="nama_kelas">
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label for="kuota">Kuota</label>
                                <input type="number" name="kuota" class="form-control" placeholder="Kuota Kelas">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-6 form-group">
                            <label for="tahun_masuk">Tahun Masuk</label>
                            <input class="form-control" type="number" name="tahun_masuk" length=4 placeholder="Tahun Masuk">
                        </div>
                        <div class="col-lg-6 form-group">
                            <label for="tahun_keluar">Tahun Keluar</label>
                            <input class="form-control" type="number" name="tahun_keluar" disabled length=4 placeholder="Tahun Keluar">
                            <input class="form-control" type="hidden" name="tahun_keluar" length=4>
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