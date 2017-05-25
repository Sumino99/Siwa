<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $table = 'tbl_kelas';

    protected $fillable = ['nama_kelas', 'nama_gedung', 'id'];

    public $timestamps = false;
//blic function spp() {
//    return $this->hasMany('App\Spp');
//}
//public function  walas() {
//    return $this->hasMany('App\Walas');
//}
}
