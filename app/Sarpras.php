<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sarpras extends Model
{
    protected $table = 'tbl_sarpras';

    protected $fillable = [
    	'kelas_id',
    	'keadaan',
    	'sarpras_rusak',
            'bulan',
            'tahun',
    ];

    public $timestamps = false;

    public function kelas() {
        return $this->belongsTo('App\Kelas');
    }
}
