<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Sarpras;
use App\Kelas;
use Session;
use App\Http\Requests;

class SarprasController extends Controller
{
    public function index() {
             $kelas_id = Session::get('kelas_id');
             $sarpras = Sarpras::with('kelas')->where('kelas_id', $kelas_id)->first();
             $kelas = Kelas::where('id', $kelas_id)->first();

    	return view('sarpras.index', ['sarpras' => $sarpras, 'kelas' => $kelas]);
    }

    public function tambahSarpras(Request $request) {
        $sarpras = Sarpras::create($request->all());
        return response()->json($sarpras);
    }
}
