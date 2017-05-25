<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kelas;
use PDF;
use Excel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class KelasController extends Controller
{
    public function index() {
        $kelas = Kelas::select('id','nama_kelas', 'nama_gedung')->get();
        return view('admin.kelas.index', ['kelas' => $kelas]);
    }

    public function editKelas(Request $request) {
        $kelas = Kelas::findOrFail($request->id);
        $kelas->nama_kelas = $request['nama_kelas'];
        $kelas->save();
        return response()->json($kelas);
    }

    public function tambahKelas(Request $request) {
        $kelas = Kelas::create($request->all());
        return response()->json($kelas);
    }

    public function hapusKelas($id) {
        $kelas = Kelas::findOrFail($id)->delete();
        return redirect()->back()->with('pesan', 'Data berhasil dihapus ?');
    }

    public function exportKelas($type) {
            Excel::create('Data Kelas', function ($excel) {
            $excel->sheet('Data Kelas', function ($sheet) {
                $arr = array();
                $kelas = Kelas::select(['nama_kelas'])->get()->toArray();
                foreach ($kelas as $data) {
                    $data_arr = array(
                        $data['nama_kelas'],
                    );
                    array_push($arr, $data_arr);
                }
                $sheet->fromArray($arr, null, 'A1', false, false)->prependRow(array(
                    'nama_kelas',
                ));
            });
        })->download($type);
    }

    public function importKelas(Request $request) {
        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($render) {
                Kelas::select('nama_kelas')->insert($render->toArray());
            });

            if (!$data) {
                return back()->with('pesan', 'Proses Import Gagal !');
            }
        }

        return back()->with('pesan', 'Proses Import Berhasil !');
    }

    public function pdfKelas() {
        $kelas = Kelas::select('nama_kelas')->get();
        $pdf = PDF::loadView('admin.kelas.pdf', ['kelas' => $kelas])->setPaper('a4');
        return $pdf->stream('Laporan Kelas.pdf');
    }
}
