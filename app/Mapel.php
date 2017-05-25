<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    protected $table = 'tbl_mapel';

    protected $fillable = ['id','mata_pelajaran', 'jam_mapel'];

    public $timestamps = false;
}
