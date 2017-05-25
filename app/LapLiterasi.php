<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LapLiterasi extends Model
{
	protected $table = 'tbl_lapliterasi';

	protected $fillable = [
		'guru_id',
		'bahan_literasi',
		'total_literasi',
		'tdk_ada_literasi',
		'persentase_mengajar',
		'bulan',
		'tahun',
	];

	public function guru() {
		return $this->belongsTo('App\Guru');
	}
}
