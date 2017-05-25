<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Siswa extends Model
{
    protected $table = 'tbl_siswa';

    protected $fillable = [
             'id',
    	'kelas_id',
    	'nama_lengkap',
    	'jenis_kelamin'
    ];
    public $timestamps = false;
    public function kelas() {
    	return $this->belongsTo('App\Kelas');
    }

    public function pelanggaran() {
        return $this->hasMany('App\Pelanggaran');
    }

    public function spp() {
    	return $this->hasMany('App\Spp');
    }

    public function absensi() {
        return $this->hasMany('App\Absensi');
    }
}
