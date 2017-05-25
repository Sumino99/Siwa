<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Siswa;
use App\Spp;
use App\Kelas;
use App\Absensi;
use App\Pelanggaran;
use Session;
use Excel;
use PDF;
use App\Http\Requests;

class SiswaController extends Controller
{
    public function index() {
    	$kelas_id = Session::get('kelas_id');
    	$siswa = Siswa::with(['kelas'])->select('nama_lengkap', 'kelas_id', 'jenis_kelamin', 'id')->where('kelas_id', $kelas_id)->get();
    	$L = Siswa::select('jenis_kelamin')
    				->where('kelas_id', $kelas_id)
    				->where('jenis_kelamin', 'L')
    				->get();
    	$P = Siswa::select('jenis_kelamin')
    				->where('kelas_id', $kelas_id)
    				->where('jenis_kelamin', 'P')
    				->get();

    	return view('siswa.index', ['siswa' => $siswa, 'L' => $L, 'P' => $P]);
    }

    public function detail(Request $request, $id) {
    	$siswa = Siswa::with([ 'pelanggaran', 'spp'])->findOrFail($id);
            // dd($siswa['pelanggaran'][0]['bentuk_pelanggaran']);
            $pelanggaran = Pelanggaran::with('siswa')->where('siswa_id', $id)->get();
            $spp = Spp::with('siswa')->where('siswa_id', $id)->get();
            $absensi = Absensi::with('siswa')->where('siswa_id', $id)->get();
            // dd($spp);
    	return view('siswa.detail', ['siswa' => $siswa, 'pelanggaran' => $pelanggaran, 'spp' => $spp, 'absensi' => $absensi]);
    }

    // admin
    public function adminIndex() {
        $siswa = Siswa::select('nama_lengkap', 'kelas_id', 'jenis_kelamin', 'id')->get();
        $kelas = Kelas::all();
        return view('admin.siswa.index', ['siswa' => $siswa, 'kelas' => $kelas]);
    }

    public function tambahSiswa(Request $request) {
        $siswa = Siswa::create($request->all());
        return response()->json($siswa);
    }

    public function updateSiswa(Request $request) {
         $siswa = Siswa::findOrFail($request->id);
        $siswa->nama_lengkap = $request->nama_lengkap;
        $siswa->kelas_id = $request->kelas_id;
        $siswa->jenis_kelamin = $request->jenis_kelamin;
        $siswa->save();
        return response()->json($siswa);
    }

    public function exportSiswa ($type) {
        Excel::create('Data Siswa', function ($excel) {
            $excel->sheet('Data Siswa', function ($sheet) {
                $arr = array();
                $siswa = Siswa::with('kelas')->select('nama_lengkap', 'kelas_id', 'jenis_kelamin')->get()->toArray();
                foreach ($siswa as $data) {
                    $data_arr = array(
                        $data['nama_lengkap'],
                        $data['kelas']['nama_kelas'],
                        $data['jenis_kelamin']
                    );
                    array_push($arr, $data_arr);
                }
                $sheet->fromArray($arr, null, 'A1', false, false)->prependRow(array(
                    'Nama Lengkap',
                    'Kelas',
                    'Jenis_kelamin'
                ));
            });
        })->download($type);
    }

    public function importSiswa(Request $request) {
        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($render) {
                Siswa::select('nama_lengkap', 'kelas_id', 'jenis_kelamin')->insert($render->toArray());
            });

            if (!$data) {
                return back()->with('pesan', 'Proses Import Gagal !');
            }
        }

        return back()->with('pesan', 'Proses Import Berhasil !');
    }

    public function hapusSiswa($id)  {
        $siswa = Siswa::findOrFail($id)->delete();
        return redirect()->back()->with('pesan', 'Data berhasil dihapus !');
    }

    public function pdfSiswa() {
        $siswa = Siswa::with('kelas')->get()->toArray();
        // dd($siswa);
        // for ($i=0; $i <count($siswa) ; $i++) {
        //     echo $siswa[$i]['nama_lengkap']. '<br>';
        // }
        // die();
        $tahun = date('Y');
        $pdf = PDF::loadView('admin.siswa.pdf', ['siswa' => $siswa])->setPaper('a4');
        // $pdf = PDF::render();
        return $pdf->stream('Data siswa Tahun' . $tahun . '.pdf');
    }
}
