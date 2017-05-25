<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Spp extends Model
{
    protected $table = 'tbl_spp';

    protected $fillable = [
    	'siswa_id',
    	'kelas_id',
    	'bulan_tunggak',
    	'keterangan',
    	'status',
    	'bulan',
    	'tahun',
    ];

    public function siswa() {
    	return $this->belongsTo('App\Siswa');
    }

    public function kelas() {
    	return $this->belongsTo('App\Kelas');
    }
}
