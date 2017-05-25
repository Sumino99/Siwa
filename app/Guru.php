<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
   protected $table = 'tbl_guru';

   protected $fillable = ['id','nama_guru', 'kode_guru', 'mapel_id'];

   public $timestamps = false;

   public function mapel() {
        return $this->belongsTo('App\Mapel');
   }
}
