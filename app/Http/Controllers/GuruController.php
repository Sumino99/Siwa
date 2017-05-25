<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mapel;
use App\Guru;
use PDF;
use Excel;
use App\Http\Requests;
use App\Http\Controllers\Controller;

class GuruController extends Controller
{
    public function index() {
        $guru = Guru::with('mapel')->get()->toArray();
        // dd($guru);
        $mapel = Mapel::all();
        return view('admin.guru.index', ['guru' => $guru, 'mapel' => $mapel]);
    }

    public function tambahGuru(Request $request) {
        $guru = Guru::create($request->all());
        return response()->json($guru);
    }

    public function editGuru(Request $request) {
        $guru = Guru::findOrFail($request->id);
        $guru->kode_guru = $request['kode_guru'];
        $guru->nama_guru = $request['nama_guru'];
        $guru->mapel_id = $request['mapel_id'];
        $guru->save();
        return response()->json($guru);
    }

    public function hapusGuru(Request $request, $id) {
        $guru = Guru::findOrFail($id)->delete();
        return redirect()->back()->with('pesan', 'Data berhasil di hapus !');
    }

    public function exportGuru ($type) {
        Excel::create('Data Guru', function ($excel) {
            $excel->sheet('Data Guru', function ($sheet) {
                $arr = array();
                $guru = Guru::with('mapel')->select('nama_guru', 'kode_guru', 'mapel_id')->get()->toArray();
                foreach ($guru as $data) {
                    $data_arr = array(
                        $data['nama_guru'],
                        $data['mapel']['mata_pelajaran'],
                        $data['kode_guru'],
                    );
                    array_push($arr, $data_arr);
                }
                $sheet->fromArray($arr, null, 'A1', false, false)->prependRow(array(
                    'Nama Guru',
                    'Mata Pelajaran',
                    'Kode Guru'
                ));
            });
        })->download($type);
    }

    public function importGuru(Request $request) {
        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($render) {
                Guru::select('nama_guru', 'mapel_id', 'kode_guru')->insert($render->toArray());
            });

            if (!$data) {
                return back()->with('pesan', 'Proses Import Gagal !');
            }
        }

        return back()->with('pesan', 'Proses Import Berhasil !');
    }

    public function pdfGuru() {
        $guru = Guru::with('mapel')->get()->toArray();
        // dd($siswa);
        // for ($i=0; $i <count($siswa) ; $i++) {
        //     echo $siswa[$i]['nama_lengkap']. '<br>';
        // }
        // die();
        $tahun = date('Y');
        $pdf = PDF::loadView('admin.guru.pdf', ['guru' => $guru])->setPaper('a4');
        // $pdf = PDF::render();
        return $pdf->stream('Data guru Tahun' . $tahun . '.pdf');
    }

    // public function detailGuru($kode_guru) {
    //     $guru = Guru::with('mapel')->where('kode_guru', $kode_guru)->first();
    //     $mapel = Guru::with('mapel')->where('kode_guru', $kode_guru)->get();
    //     $mata_pelajaran = Mapel::select('id', 'mata_pelajaran')->get();
    //     return view('admin.guru.detail', ['guru' => $guru, 'mapel' => $mapel, 'mata_pelajaran' => $mata_pelajaran]);
    // }

    // public function updateGuru(Request $request, $kode_guru) {
    //         // $guru = Guru::find($kode_guru);
    //         // dd(count($request['mapel_id']));
    //         if (count($request->mapel_id) > 1 ) {
    //             foreach ($request->mapel_id  as $key => $value) {
    //                 $guru = Guru::where('kode_guru', '=',$kode_guru);
    //                 $data = array(
    //                     'nama_guru'    =>       $request['nama_guru'],
    //                     'kode_guru'    =>        $request['kode_guru'],
    //                     'mapel_id'    =>           $value,
    //                 );
    //                 $guru->update($data);
    //             }
    //                 return redirect()->back();
    //         }else{
    //                 $data = array(
    //                     'nama_guru'    =>       $request['nama_guru'],
    //                     'kode_guru'    =>        $request['kode_guru'],
    //                     'mapel_id'    =>           $request['mapel_id'],
    //                 );
    //                 $guru->update($data);
    //                 return redirect()->back();
    //         }
    //         return redirect()->back();
    // }
}
