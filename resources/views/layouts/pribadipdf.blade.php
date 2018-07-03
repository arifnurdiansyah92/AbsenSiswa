<html>
    <head>
        <title>PDF</title>
        <style>

            table {
                width: 100%;
                margin-left: auto;
                margin-right: auto;
            }
            table, th, tr, td{
                border: 1px solid black;
                border-collapse: collapse;
            }
            th{
                padding: 10px;
                text-align: center;
                font-family: 'tahoma';
            }
            th, td{
                padding: 10px;
            }
            .kanan{
                text-align: right;
            }
        </style>
    </head>
    <body>
        <div id="header">
            <h1 align="center">LAPORAN ABSENSI SISWA KELAS {{$resource->tingkat_kelas.'-'.$resource->jurusan." ".$resource->nama_kelas}}</h1>
            <p class="kanan">{{ $tanggal }}</p>
        </div>
        <div id="content">
            <table id="absensi" class="table table-bordred table-striped">
                <thead>
                    <tr>
                        <th width="3%" class="text-center">No</th>
                        <th width="20%">NIS</th>
                        <th width="50%">Nama Siswa</th>
                        <th  width="20%">Alfa</th>
                        <th width="20%">Izin</th>
                        <th width="20%">Sakit</th>
                    </tr>
                </thead>

                <tbody id="isi">
                    @foreach ($resource->siswa as  $index => $res)
                    <tr>
                        <td align="center">{{ $index+1 }}</td>
                        <td>{{ $res->nis}}</td>
                        <td>{{ $res->nama}}</td>
                        <td align="center">{{ count(App\Absensi::where(['siswa_id'=>$res->id_siswa, 'status'=>'Alfa'])->where('tanggal','>','2017-11-29')->get()) }}</td>
                        <td align="center">{{ count(App\Absensi::where(['siswa_id'=>$res->id_siswa, 'status'=>'Izin'])->get()) }}</td>
                        <td align="center">{{ count(App\Absensi::where(['siswa_id'=>$res->id_siswa, 'status'=>'Sakit'])->get()) }}</td>

                    </tr>

                    @endforeach
                </tbody>

            </table>

        </div>
    </body>
</html>