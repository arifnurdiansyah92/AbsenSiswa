@extends('layouts.master')
@section('title', 'AN Absensi | Dashboard')
@section('content')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#">
                <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Absensi</li>
        </ol>
    </div><!--/.row-->      

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Absensi</h1>
        </div>
    </div><!--/.row-->

    <div class="row">
        <div class="col-lg-6">
            <div class="panel panel-default articles">
                <div class="panel-heading">
                    Absensi Terbaru
                    <ul class="pull-right panel-settings panel-button-tab-right">
                        <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                            <em class="fa fa-cogs"></em>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <ul class="dropdown-settings">
                                        <li><a href="#">
                                            <em class="fa fa-cog"></em> Settings 1
                                            </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">
                                            <em class="fa fa-cog"></em> Settings 2
                                            </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">
                                            <em class="fa fa-cog"></em> Settings 3
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body articles-container">
                    <div class="article border-bottom">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-2 col-md-2 date">
                                    <div class="large">30</div>
                                    <div class="text-muted">Jun 2017</div>
                                </div>
                                <div class="col-xs-10 col-md-10">
                                    <h4><a href="#">Absensi Kelas XII-RPL</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div><!--End .article-->

                    <div class="article border-bottom">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-2 col-md-2 date">
                                    <div class="large">28</div>
                                    <div class="text-muted">Jun 2017</div>
                                </div>
                                <div class="col-xs-10 col-md-10">
                                    <h4><a href="#">Absensi Kelas XII-RPL</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div><!--End .article-->

                    <div class="article">
                        <div class="col-xs-12">
                            <div class="row">
                                <div class="col-xs-2 col-md-2 date">
                                    <div class="large">24</div>
                                    <div class="text-muted">Jun 2017</div>
                                </div>
                                <div class="col-xs-10 col-md-10">
                                    <h4><a href="#">Absensi Kelas XII-RPL</a></h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer at sodales nisl. Donec malesuada orci ornare risus finibus feugiat.</p>
                                </div>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div><!--End .article-->
                </div>
            </div><!--End .articles-->
        </div><!--/.col-->
        <div class="col-lg-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Kalender
                    <ul class="pull-right panel-settings panel-button-tab-right">
                        <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown" href="#">
                            <em class="fa fa-cogs"></em>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li>
                                    <ul class="dropdown-settings">
                                        <li><a href="#">
                                            <em class="fa fa-cog"></em> Settings 1
                                            </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">
                                            <em class="fa fa-cog"></em> Settings 2
                                            </a></li>
                                        <li class="divider"></li>
                                        <li><a href="#">
                                            <em class="fa fa-cog"></em> Settings 3
                                            </a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                    </ul>
                    <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span></div>
                <div class="panel-body">
                    <div id="calendar"></div>
                </div>
            </div>
        </div><!--/.col-->
        <div class="col-lg-12">
            <div class="panel panel-primary">
                <div class="panel-heading">Absensi <span class="pull-right">Kelas XII-RPL / 10 Oktober 2017</span></div>
                <div class="panel-body">
                    <div class="table-responsive">
                        <div class="table-responsive">
                            <table id="absensi" class="table table-bordred table-striped">
                                <thead>
                                    <tr>
                                        <th colspan="8" class="text-right">
                                            <a href="#" class="btn btn-warning">Set Jadi Hadir</a>
                                            <a href="#" class="btn btn-warning">Set Jadi Alfa</a>
                                            <a href="#" class="btn btn-warning">Set Jadi Izin</a>
                                            <a href="#" class="btn btn-warning">Set Jadi Sakit</a>
                                        </th>
                                    </tr>
                                    <tr>
                                        <th><input type="checkbox" id="checkall" /> </th>
                                        <th class="text-center">No</th>
                                        <th>NIS</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th colspan="3" class="text-center">Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><input type="checkbox" class="checkthis" /></td>
                                        <td class="text-center">1</td>
                                        <td>151610383</td>
                                        <td>Arif Nurdiansyah</td>
                                        <td>Laki-Laki</td>
                                        <td colspan="3" class="text-center">
                                            <label class="radio-inline">
                                                <input type="radio" name="optradio" checked>Hadir
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" id="alfa" name="optradio">Alfa
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optradio">Izin
                                            </label>
                                            <label class="radio-inline">
                                                <input type="radio" name="optradio">Sakit
                                            </label>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <ul class="pagination pull-right">
                            <li class="disabled"><a href="#"><span class="glyphicon glyphicon-chevron-left"></span></a></li>
                            <li class="active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#"><span class="glyphicon glyphicon-chevron-right"></span></a></li>
                        </ul>
                    </div>
                    <div class="panel-footer">
                        <a class="pull-right btn btn-primary" href="#">Simpan</a>
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