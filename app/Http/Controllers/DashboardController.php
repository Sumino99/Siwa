<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use Session;
use App\Siswa;
use App\Sarpras;
use App\Pelanggaran;
use App\Spp;
use App\Walas;
use App\Kelas;
use App\Http\Requests;

class DashboardController extends Controller
{
    public function index() {
    	return view('dashboard.index');
    }

    public function profile($username) {
            $walas = Walas::with('kelas')->where('username', $username)->first();
            return view('dashboard.profile', ['walas' => $walas]);
    }

    public function pdf() {
        $kelas_id = Session::get('kelas_id');
        $bulan = date('F');
        $tahun = date('Y');
        $siswa = Siswa::with(['kelas', 'spp', 'pelanggaran'])->where('kelas_id', $kelas_id)->get();
        $pelanggaran = Pelanggaran::where(['kelas_id' => $kelas_id, 'bulan' => $bulan, 'tahun' => $tahun])->groupBy('siswa_id')->get();
        $sarpras = Sarpras::with('kelas')->where(['kelas_id' => $kelas_id, 'bulan' => $bulan, 'tahun' => $tahun])->get();
        $spp = Spp::where(['kelas_id' => $kelas_id, 'tahun' => $tahun, 'status' => 'menunggak'])->select('bulan_tunggak')->get();
        $data1 = $spp->filter(function($value, $key) {
            if ($value['bulan_tunggak'] == 1) {
                return $value;
            }else {
                return 0;
            }
        });
        $data2 = $spp->filter(function($value, $key) {
            if ($value['bulan_tunggak'] > 1) {
                return $value;
            }else {
                return 0;
            }
        });
        // dd(count($data1));
        $L = Siswa::where('jenis_kelamin', 'L')->where('kelas_id', $kelas_id)->get();
        $P = Siswa::where('jenis_kelamin', 'P')->where('kelas_id', $kelas_id)->get();
        $customPaper = array(0, 0, 560, 950);
        $pdf = PDF::loadView('dashboard.pdf', [
                    'siswa' => $siswa,
                    'L' => $L,
                    'P' => $P,
                    'pelanggaran' => $pelanggaran,
                    'data1'   =>  $data1,
                    'data2'   =>  $data2,
                    'sarpras'   =>  $sarpras,
        ])->setPaper($customPaper);
        return $pdf->stream('laporan walas.pdf');
    }
}
