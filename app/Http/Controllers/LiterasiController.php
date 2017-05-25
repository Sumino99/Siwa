<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\LapLiterasi;
use App\Guru;
use PDF;
use App\Http\Requests;

class LiterasiController extends Controller
{
    public function index() {
    	$guru = Guru::select('nama_guru', 'id')->groupBy('nama_guru')->get();
    	return view('literasi.index', ['guru' => $guru]);
    }

    public function postLiterasi(Request $request) {
    	$lapLiterasi = LapLiterasi::create($request->all());
    	return response()->json($lapLiterasi);
    }

     public function pdfLiterasi() {
        $bulan = date('F');
        $tahun = date('Y');
        $literasi = LapLiterasi::with('guru')->where(['bulan' => $bulan, 'tahun' => $tahun])->get();
        // dd($literasi);
        $tahun = date('Y');
        $pdf = PDF::loadView('literasi.pdf', ['literasi' => $literasi])->setPaper('a4');
        // $pdf = PDF::render();
        return $pdf->stream('Data literasi Tahun' . $tahun . '.pdf');
    }
}
