<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Requests;
use DB;
use Input;
use Session;
class LoginController extends Controller
{
  //
    public function login()
    {
      return view('login.index');
    }
    public function dologin(Request $request)
    {
      $user = $request->username;
      $pwd  = $request->password;

      $cekUserAdmin = DB::table('superuser')
                    ->where('username','=',$user)
                    ->where('password','=',$pwd)
                    ->first();
      $cekUserWalas = DB::table('tbl_walas')
                    ->join('tbl_kelas', 'tbl_kelas.id', '=', 'tbl_walas.kelas_id')
                    
                    ->where('username','=',$user)
                    ->where('password','=',$pwd)
                    ->first();
      
      if($cekUserAdmin == true) {
        // dd($cekUserAdmin->id,'kk');
        Session::put('idadmin',$cekUserAdmin->id);
        Session::put('usernameAdmin', $cekUserAdmin->username);
        return redirect()->route('dashboard.index');
        // dd('admin');
      }
      elseif($cekUserWalas == true) {
        Session::put('idwalas',$cekUserWalas->id);
        Session::put('usernameWalas', $cekUserWalas->nama_lengkap);
        Session::put('kelas_id', $cekUserWalas->kelas_id);
        Session::put('nama_kelas', $cekUserWalas->nama_kelas);
        Session::put('username', $cekUserWalas->username);
        Session::put('password', $cekUserWalas->password);
        Session::put('no_hp', $cekUserWalas->no_hp);
        return redirect()->route('dashboard.index');
      }
      else{
        return redirect('/login')->with('msg','User Belum Terdaftar');
      }
    }

    public function Logout() {
      Session::flush();

      return redirect()->route('login');
    }
}
