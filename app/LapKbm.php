<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LapKbm extends Model
{
    protected $table = 'tbl_lapkbm';

    protected $fillable = [
    	'mapel_id',
    	'kode_guru',
    	'jumlah_jp',
    	'tm',
    	'dp',
    	'tat',
    	'total_jk',
    	'jumlah_je',
    	'persentase_je',
    	'bulan',
    	'tahun',
            'walas_id'
    ];

    public function mapel() {
        return $this->belongsTo('App\Mapel');
    }

    public function guru() {
        return $this->belongsTo('App\Guru');
    }
}
