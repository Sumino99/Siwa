<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Siswa;
use App\Spp;
use PDF;
use Session;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class SPPController extends Controller
{
    public function index() {
        $kelas_id = Session::get('kelas_id');
    	$spp = SPP::with(['kelas', 'siswa'])->select('siswa_id', 'status', 'bulan_tunggak', 'keterangan', 'id', 'kelas_id')->where('kelas_id', $kelas_id)->orderBy('created_at')->get();
        $siswa = Siswa::select('nama_lengkap', 'id', 'kelas_id')->where('kelas_id', $kelas_id)->get();
    	return view('spp.index', ['spp' => $spp, 'siswa' => $siswa]);
    }

    public function hapusSpp($id) {
        $spp = SPP::findOrFail($id)->delete();
        return redirect()->back()->with('pesan', 'Data beherasil dahpus !');
    }

    public function postSpp(Request $request) {
    	$spp = SPP::create($request->all());
    	return response()->json($spp);
    }

    public function editSpp(Request $request) {
        $spp = SPP::findOrFail($request->id);
        $spp->bulan_tunggak = $request->bulan_tunggak;
        $spp->keterangan = $request->keterangan;
        $spp->status = $request->status;
        $spp->save();
        return response()->json($spp);
    }


}
