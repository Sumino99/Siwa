<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'tbl_absensi';

    protected $fillable = [
    	'kelas_id',
    	'siswa_id',
    	'sakit',
    	'ijin',
    	'absen',
            'jumlah',
    	'keterangan',
    	'bulan',
    	'tahun'
    ];

    public function siswa() {
        return $this->belongsTo('App\Siswa');
    }

    public function kelas() {
        return $this->belongsTo('App\Kelas');
    }
}
