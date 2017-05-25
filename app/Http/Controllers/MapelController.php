<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Excel;
use PDF;
use App\Mapel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class MapelController extends Controller
{
    public function index() {
        $mapel = Mapel::select('id', 'mata_pelajaran', 'jam_mapel')->get();
        return view('admin.mapel.index', ['mapel' => $mapel]);
    }

    public function tambahMapel(Request $request) {
            $mapel = Mapel::create($request->all());
            return response()->json($mapel);
    }

    public function editMapel(Request $request) {
        $mapel = Mapel::findOrFail($request->id);
        $mapel->mata_pelajaran = $request->mata_pelajaran;
        $mapel->jam_mapel = $request->jam_mapel;
        $mapel->save();
        return response()->json($mapel);
    }

    public function hapusMapel($id) {
        $mapel = Mapel::findOrFail($id)->delete();
        return redirect()->back()->with('pesan', 'Data berhasil dihapus !');
    }

    public function exportMapel($type) {
        Excel::create('Data Mata Pelajaran', function ($excel) {
            $excel->sheet('Data Mata Pelajaran', function ($sheet) {
                $arr = array();
                $mapel = Mapel::select(['mata_pelajaran', 'jam_mapel'])->get()->toArray();
                foreach ($mapel as $data) {
                    $data_arr = array(
                        $data['mata_pelajaran'],
                        $data['jam_mapel']
                    );
                    array_push($arr, $data_arr);
                }
                $sheet->fromArray($arr, null, 'A1', false, false)->prependRow(array(
                    'Mata Pelajaran',
                    'Jam Mapel',
                ));
            });
        })->download($type);
    }

    public function importSiswa(Request $request) {
        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($render) {
                Mapel::select('mata_pelajaran', 'jam_mapel')->insert($render->toArray());
            });

            if (!$data) {
                return back()->with('pesan', 'Proses Import Gagal !');
            }
        }

        return back()->with('pesan', 'Proses Import Berhasil !');
    }

    public function pdfMapel() {
        $mapel = Mapel::select('mata_pelajaran', 'jam_mapel')->get();
        $pdf = PDF::loadView('admin.mapel.pdf', ['mapel' => $mapel])->setPaper('a4');
        return $pdf->stream('Data Mapel.pdf');
    }
}
