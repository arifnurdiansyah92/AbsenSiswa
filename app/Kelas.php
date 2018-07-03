<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Kelas extends Model
{
    protected $table = 'Kelas';
    protected $primaryKey = 'id_kelas';
    protected $fillable = ['tingkat_kelas', 'jurusan', 'nama_kelas', 'kuota', 'tahun_masuk', 'tahun_keluar'];
    public $timestamps = false;
    
    public function Siswa()
    {
        return $this->belongsToMany('App\Siswa', 'siswa_kelas', 'kelas_id', 'siswa_id')->withPivot('id_siswa_kelas');
    }
    public function absen()
    {    
        return $this->belongsToMany('App\Siswa', 'absensi', 'kelas_id', 'siswa_id')->withPivot('status', 'tanggal', 'keterangan')->wherePivot('tanggal', Carbon::now('Asia/Jakarta')->format('Y-m-d'));
    }
}
