<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use App\SuperUserModel;
use App\Walas;
use App\Http\Requests;

class AuthController extends Controller
{

    public function index() {
        // $data = Walas::select('nama_lengkap', 'password')->get();
        // $no = 1;
        // foreach ($data as $key) {
        //     echo $no++ . "   " . bcrypt($key->password) . '<br>';
        // }
        // die();
        return view('login.index');
    }


    public function postLogin(Request $request) {

        $dataLogin = [
            'username' => $request['username'], 
            'password' => $request['password']
        ];

        $cekAdmin = SuperUserModel::select('username', 'password', 'id')
                    ->where('username', $request['username'])
                    ->where('password', $request['password'])
                    ->first();
        $cekWalas = Walas::select('username', 'password', 'id')
                    ->where('username', $request['username'])
                    ->where('password', $request['password'])
                    ->first();                      
        // dd(auth('walas')->attempt($dataLogin));
        if (auth('admin')->attempt($dataLogin)) {

            Session::put('admin', $cekAdmin->id);

            return redirect()->route('dashboard.index');
        }elseif(auth('walas')->attempt($dataLogin)) {

            Session::put('walas', $cekWalas->id);
            return redirect()->route('dashboard.index');
        }else{
            return redirect()->back()->with('msg', 'Maaf Username / Password Salah !');
        }
    }

    public function Logout() {
        Auth::logout();
        return redirect()->route('auth.login');
    }
}
