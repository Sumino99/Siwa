<?php

namespace App\Http\Controllers;

use App\Kelas;
use App\Walas;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Excel;
use PDF;

class WalasController extends Controller
{
    public function index() {
        $walas = Walas::with('kelas')->get()->toArray();
        $kelas = Kelas::all();
        return view('admin.walas.index', ['walas' => $walas, 'kelas' => $kelas]);
    }

    public function tambahWalas(Request $request) {
        $walas = new Walas;
        $walas->nama_lengkap = $request['nama_lengkap'];
        $walas->kelas_id = $request['kelas_id'];
        $walas->username = $request['username'];
        $walas->password = $request['password'];
        $walas->no_hp = $request['no_hp'];
        $walas->save();
        return response()->json($walas);
    }

    public function detailWalas($id) {
        $walas = Walas::findOrFail($id);
        $kelas = Kelas::all();
        return view('admin.walas.detail', ['walas' => $walas, 'kelas' => $kelas]);
    }

    public function updateWalas(Request $request, $id) {
        $walas = Walas::findOrFail($request->id);
        $walas->nama_lengkap = $request->nama_lengkap;
        $walas->username = $request->username;
        $walas->password = $request->password;
        $walas->no_hp = $request->no_hp;
        $walas->kelas_id = $request->kelas_id;
        $walas->save();
        return response()->json($walas);
    }

    public function deleteWalas($id) {
        $walas = Walas::findOrFail($id);
//        dd($walas);
        $walas->delete();
        return redirect()->route('walas.index');
    }

    public function exportWalas($type) {
        Excel::create('Data Wali Kelas', function ($excel) {
            $excel->sheet('Data Walas', function ($sheet) {
                $arr = array();
                $walas = Walas::with('kelas')->select(['nama_lengkap', 'username', 'password', 'no_hp', 'kelas_id'])->get()->toArray();
                foreach ($walas as $data) {
                    $data_arr = array(
                        $data['nama_lengkap'],
                        $data['kelas']['nama_kelas'],
                        $data['username'],
                        $data['password'],
                        $data['no_hp']
                    );
                    array_push($arr, $data_arr);
                }
                $sheet->fromArray($arr, null, 'A1', false, false)->prependRow(array(
                    'Nama Lengkap',
                    'Wali Kelas',
                    'Username',
                    'Password',
                    'No. Hp'
                ));
            });
        })->download($type);

    }

    public function importWalas(Request $request) {
        if ($request->hasFile('import_file')) {
            $path = $request->file('import_file')->getRealPath();
            $data = Excel::load($path, function($render) {
                Walas::select('nama_lengkap', 'kelas_id', 'username', 'password', 'no_hp')->insert($render->toArray());
            });

            if (!$data) {
                return back()->with('pesan', 'Proses Import Gagal !');
            }
        }

        return back()->with('pesan', 'Proses Import Berhasil !');
    }

    public function pdfWalas() {
        $walas = Walas::with('kelas')->get();
        $customPaper = array(0,0,560,920);
        $pdf = PDF::loadView('walas.pdf', ['walas' => $walas])->setPaper($customPaper);
        return $pdf->stream('Laporan Walas.pdf');
    }

}
