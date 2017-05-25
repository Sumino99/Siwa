<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Walas extends Model
{

    protected $table = 'tbl_walas';

    protected $fillable = [
    	'id',
    	'nama_lengkap',
            'kelas_id',
    	'username',
    	'password',
    	'no_hp',
    ];

    public function kelas() {
        return $this->belongsTo('App\Kelas');
    }
}
