<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Session;
use App\Guru;
use App\Mapel;
use App\LapKbm;
use App\Http\Requests;

class KbmController extends Controller
{
   public function index() {
   	$mapel = Mapel::all();
   	return view('kbm.index', ['mapel' => $mapel]);
   }

   public function postKbm(Request $request) {
   	 $kbm = LapKbm::create($request->all());
   	 return response()->json($kbm);
   }

   public function idMapel(Request $request) {
   	// $mapel = Mapel::select('mata_pelajaran', 'id')->where('id', $request->id)->take(100)->get();
   	$guru = Guru::select('mapel_id','nama_guru', 'id', 'kode_guru')->where('mapel_id', $request->id)->get()->toArray();
      $mapel = Mapel::select('id', 'mata_pelajaran', 'jam_mapel')->where('id', $request->id)->first()->toArray();
   	return response()->json(array('guru' => $guru, 'mapel' => $mapel));
   }

   // public function jam_mapel(Request $request) {
   //    $mapel = Mapel::select('id', 'mata_pelajaran', 'jam_mapel')->where('id', $request->id)->first();
   //    return response()->json($mapel);

   // }

   public function kodeGuru(Request $request) {
   	$kode_guru = Guru::select('kode_guru', 'nama_guru')->where('kode_guru', $request->id)->first();
   	return response()->json($kode_guru);
   }

   public function pdf() {
      $idwalas = Session::get('idwalas');
      $bulan = date('F');
      $tahun = date('Y');
      $kbm = LapKbm::with('mapel')->where(['walas_id' => $idwalas, 'bulan' => $bulan, 'tahun' => $tahun])->get();
      // dd($kbm);
      $customPaper = array(0, 0, 500, 1000);
      $pdf = PDF::loadView('kbm.pdf', ['kbm' => $kbm])->setPaper($customPaper, 'landscape');
      return $pdf->stream('Laporan Rekap KBM' . $bulan . '.pdf');
   }

}
