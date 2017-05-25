<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pelanggaran;
use Session;
use PDF;
use App\Siswa;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class PelanggaranController extends Controller
{
    public function index() {
    	$bulan = date('F');
    	$kelas = Session::get('kelas_id');
    	$pelanggaran = Pelanggaran::select('bulan', 'siswa_id', 'bulan', 'tanggal_pelanggaran', 'bentuk_pelanggaran', 'keterangan', 'id')->where('bulan', $bulan)->where('kelas_id', $kelas)->get();
    	$siswa = Siswa::select('nama_lengkap', 'id', 'kelas_id')->where('kelas_id', $kelas)->get();

    	return view('pelanggaran.index', ['pelanggaran' => $pelanggaran, 'siswa' => $siswa]);
    }

    public function postPelanggaran(Request $request) {
    	$pelanggaran = Pelanggaran::create($request->all());
    	return response()->json($pelanggaran);
    }

    public function editPelanggaran(Request $request) {
        $pelanggaran = Pelanggaran::findOrFail($request->id)->update($request->all());
        return response()->json($pelanggaran);
    }

    public function hapusPelanggaran($id) {
            $pelanggaran = Pelanggaran::findOrFail($id)->delete();
            return redirect()->back()->with('pesan', 'Data berhasil diahpus !');
    }

     public function Pdf() {
        $kelas = Session::get('kelas_id');
        date_default_timezone_set("Asia/Jakarta");
        $bulan = date('F');
        $tahun = date('Y');
        $data = Pelanggaran::with('siswa')
                ->select(
                    'siswa_id',
                    'tanggal_pelanggaran',
                    'bentuk_pelanggaran',
                    'keterangan',
                    'bulan',
                    'tahun'
                )
                ->where('kelas_id', $kelas)
                ->where('bulan', $bulan)
                ->where('tahun', $tahun)
                ->get();
        // dd($data);
        $customPaper = array(0, 0, 600, 890);
        $pdf = PDF::loadView('pelanggaran.pdf', compact('data'))->setPaper($customPaper, 'landscape');
        $bulan = date('F Y');
        return $pdf->stream('pelanggaran Bulan '. $bulan . '.pdf');
    }
}
