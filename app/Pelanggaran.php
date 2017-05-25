<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pelanggaran extends Model
{
    protected $table = 'tbl_pelanggaran';

    protected $fillable = [
             'id',
    	'bulan',
    	'siswa_id',
    	'tanggal_pelanggaran',
    	'bentuk_pelanggaran',
    	'keterangan',
    	'tahun',
    	'kelas_id',
    ];

    public $timestamps = false;

    public function siswa() {
    	return $this->belongsTo('App\Siswa');
    }
}
