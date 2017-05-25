<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use App\Absensi;
use PDF;
use App\Siswa;
use Session;
use App\Http\Requests;

class AbsensiController extends Controller
{
    public function index() {
    	$kelas_id = Session::get('kelas_id');
    	$siswa = Siswa::select('nama_lengkap', 'kelas_id', 'id')->where('kelas_id', $kelas_id)->get();
    	return view('absensi.index', ['siswa' => $siswa]);
    }

    public function listAbsensi() {
        $kelas_id = Session::get('kelas_id');
        $absensi = Absensi::select('bulan','tahun', 'kelas_id')->where('kelas_id', $kelas_id)->groupBy(['bulan', 'tahun'])->get();
        return view('absensi.list', ['absensi' => $absensi]);
    }

    public function listDetail($bulan,$tahun) {
        $kelas_id = Session::get('kelas_id');
        $absensi = Absensi::where(['bulan' => $bulan, 'tahun' => $tahun, 'kelas_id' => $kelas_id])->get();
        // dd($absensi);
        return view('absensi.listDetail', ['absensi' => $absensi]);
    }

    public function postAbsensi(Request $request) {
    	$data = $request->all();
    	$data = $request->except(['_token',  'MyTable_length']);

    	for ($i=0; $i <count($request['siswa_id']) ; $i++) {
    		$absensi = new Absensi;

    		$absensi->kelas_id = $request['kelas_id'];
    		$absensi->siswa_id = $data['siswa_id'][$i];
    		$absensi->sakit = $data['sakit'][$i];
    		$absensi->ijin = $data['ijin'][$i];
    		$absensi->absen = $data['absen'][$i];
                         $absensi->jumlah = $data['sakit'][$i] +  $data['ijin'][$i] + $data['absen'][$i];
    		$absensi->keterangan = $data['keterangan'][$i];
    		$absensi->bulan = $request['bulan'];
    		$absensi->tahun = $request['tahun'];
            // echo "<pre>"; echo $absensi;
            $absensi->save();

    	}
        // dd(count($absensi));

    	return redirect()->route('absensi.index')->with('msg', 'Data Berhasil disimpan !');
    }

    public function Pdf() {
        date_default_timezone_set("Asia/Jakarta");
        $bulan = date('F');
        $tahun = date('Y');
        $kelas_id = Session::get('kelas_id');

        $data = Absensi::with(['siswa', 'kelas'])
                ->select(
                    'siswa_id',
                    'kelas_id',
                    'sakit',
                    'ijin',
                    'absen',
                    'jumlah',
                    'keterangan',
                    'bulan',
                    'tahun'
                )
                ->where('kelas_id', $kelas_id)
                ->where('bulan', $bulan)
                ->where('tahun', $tahun)
                ->get();

        $custompaper = array(0,0,560,920);
        $pdf = PDF::loadView('absensi.pdf', compact('data'))->setPaper($custompaper);
        $bulan = date('F Y');
        return $pdf->stream('absensi Bulan '. $bulan . '.pdf');
    }
}
