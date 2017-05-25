<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

// Auth
Route::get('/login',
[
	'uses' =>'LoginController@login',
	'as'	 => 'login'
]);
Route::get('/logout', [
	'uses'	=> 'LoginController@Logout',
	'as'	=> 'logout'
]);
Route::post('/dologin',[
	'uses' => 'LoginController@dologin',
	'as'	 => 'dologin'
]);


// Dashboard
Route::group(['prefix' => 'dashboard'], function() {

	Route::get('/', [
		'uses'	=>	'DashboardController@index',
		'as'	=>	'dashboard.index',
		'middleware' => 'NotLogin'
	]);

	Route::get('/profile/{username}', [
		'uses'	=> 'DashboardController@profile',
		'as'	=>	'dashboard.profile',
		'middleware'	=>	'walas'
	]);

	Route::get('/laporanUtama', [
		'uses'	=>	'DashboardController@pdf',
		'as'	=>	'dashboard.pdf',
		'middleware' => 'walas'
	]);

	// siswa
	Route::get('/siswa', [
		'uses'	=>	'SiswaController@index',
		'as'	=>	'siswa.index',
		'middleware' => 'walas'
	]);

	Route::get('/siswa/detail/{id}', [
		'uses'	=>	'SiswaController@detail',
		'as'	=>	'siswa.detail',
		'middleware' => 'walas'
	]);

	// admin siswa
	Route::get('/admin/siswa', [
		'uses'	=>	'SiswaController@adminIndex',
		'as'	=>	'siswa.adminIndex',
		'middleware' => 'admin'
	]);

	Route::post('/admin/siswa/update', [
		'uses'	=>	'SiswaController@updateSiswa',
		'as'	=>	'siswa.update',
		'middleware' => 'admin'
	]);

	Route::post('/admin/siswa', [
		'uses'	=>	'SiswaController@tambahSiswa',
		'middleware' => 'admin'
	]);

	Route::get('/admin/siswa/hapus/{id}', [
		'uses'	=>	'SiswaController@hapusSiswa',
		'as'	=>	'siswa.delete',
		'middleware' => 'admin'
	]);

	Route::get('/admin/siswa/export/{type}', [
		'uses'	=>	'SiswaController@exportSiswa',
		'as'	=>	'siswa.export',
		'middleware' => 'admin'
	]);

	Route::post('/admin/siswa/import', [
		'uses'	=>	'SiswaController@importSiswa',
		'as'	=>	'siswa.import',
		'middleware' => 'admin'
	]);

	Route::get('/admin/siswa/LaporanSiswa', [
		'uses'	=>	'SiswaController@pdfSiswa',
		'as'	=>	'siswa.pdf',
		'middleware'	=>	'admin'
	]);

	// Absensi
	Route::get('/absensi', [
		'uses'	=>	'AbsensiController@index',
		'as'	=>	'absensi.index',
		'middleware' => 'walas'
	]);

	Route::post('/absensi', [
		'uses'	=>	'AbsensiController@postAbsensi',
		'middleware' => 'walas'
	]);

	Route::get('/absensi/LaporanAbsensi', [
		'uses'	=>	'AbsensiController@pdf',
		'as'	=>	'absensi.pdf',
		'middleware' => 'walas'
	]);

	Route::get('/absensi/listAbensi', [
		'uses'	=>	'AbsensiController@listAbsensi',
		'as'	=>	'absensi.list',
		'middleware'	=>	'walas'
	]);

	Route::get('/absensi/listDetail/{bulan}/{tahun}', [
		'uses'	=>	'AbsensiController@listDetail',
		'as'	=>	'absensi.listDetail',
		'middleware'	=>	'walas'
	]);


	// Sarpras
	Route::get('/sarpras', [
		'uses'	=> 'SarprasController@index',
		'as'	=> 'sarpras.index',
		'middleware' => 'walas'
	]);

	Route::post('/sarpras', [
		'uses'	=> 'SarprasController@tambahSarpras',
		'middleware' => 'walas'
	]);



	// Literasi
	Route::get('/literasi', [
		'uses'	=>	'LiterasiController@index',
		'as'	=>	'literasi.index',
		'middleware' => 'walas'
	]);

	Route::post('/literasi', [
		'uses'	=>	'LiterasiController@postLiterasi',
		'middleware' => 'walas'
	]);

	Route::get('/literasi/LaporanLiterasi', [
		'uses'	=>	'LiterasiController@pdfLiterasi',
		'as'	=>	'literasi.pdf',
		'middleware'	=>	'walas'
	]);

	// KBM
	Route::get('/kbm', [
		'uses'	=> 'KbmController@index',
		'as'	=>	'kbm.index',
		'middleware' => 'walas'
	]);

	Route::get('/kbm/laporanKbm', [
		'uses'	=> 'KbmController@pdf',
		'as'	=>	'kbm.pdf',
		'middleware' => 'walas'
	]);

	Route::post('/kbm', [
		'uses'	=> 'KbmController@postKbm',
		'middleware' => 'walas'
	]);

	Route::get('/kbm/idMapel', [
		'uses'	=>	'KbmController@idMapel',
		'as'	=>	'kbm.id_mapel',
		'middleware' => 'walas'
	]);

	Route::get('/kbm/kodeGuru', [
		'uses'	=>	'KbmController@kodeGuru',
		'as'	=>	'kbm.kode_guru',
		'middleware' => 'walas'
	]);

	Route::get('/spp', [
		'uses'	=>	'SPPController@index',
		'as'	=>	'spp.index',
		'middleware' => 'walas'
	]);

	Route::post('/spp/update', [
		'uses'	=>	'SPPController@editSpp',
		'as'	=>	'spp.update',
		'middleware' => 'walas'
	]);

	Route::post('/spp', [
		'uses'	=>	'SPPController@postSpp',
		'middleware' => 'walas'
	]);

	Route::get('/sppp/hapus/{id}', [
		'uses'	=>	'SPPController@hapusSpp',
		'as'	=>	'spp.delete',
		'middleware'	=>	'walas'
	]);

	// Pelanggaran
	Route::get('/pelanggaran', [
		'uses'	=>	'PelanggaranController@index',
		'as'	=>	'pelanggaran.index',
		'middleware' => 'walas'
	]);

	Route::post('/pelanggaran', [
		'uses'	=>	'PelanggaranController@postPelanggaran'
	]);

	Route::post('/pelanggaran/update', [
		'uses'	=>	'PelanggaranController@editPelanggaran',
		'as'	=>	'pelanggaran.update'
	]);

	Route::get('/pelanggaran/LaporanPelanggaran', [
		'uses'	=>	'PelanggaranController@Pdf',
		'as'	=>	'pelanggaran.pdf'
	]);

	Route::get('/pelanggaran/hapus/{id}', [
		'uses'	=>	'PelanggaranController@hapusPelanggaran',
		'as'	=>	'pelanggaran.delete',
		'middleware'	=>	'walas'
	]);

	//    Walas
	    Route::get('/admin/walas', [
	        'uses'  =>  'WalasController@index',
	        'as'    =>  'walas.index',
	        'middleware'  => 'admin'
	    ]);

	    Route::get('/admin/walas/export/{type}', [
	        'uses'  =>  'WalasController@exportWalas',
	        'as'    =>  'walas.export',
	        'middleware'  => 'admin'
	    ]);

	    Route::post('/admin/walas/import', [
	        'uses'  =>  'WalasController@importWalas',
	        'as'    =>  'walas.import',
	        'middleware'  => 'admin'
	    ]);

	    Route::get('/admin/walas/LaporanWalas', [
	    	'uses'	=> 'WalasController@pdfWalas',
	    	'as'	=> 'walas.pdf',
	    	'middleware'	=>  'admin'
	    ]);

	    Route::post('/admin/walas', [
	        'uses'  =>  'WalasController@tambahWalas'
	    ]);

	    Route::get('/admin/walas/detail/{id}', [
	        'uses'  =>  'WalasController@detailWalas',
	        'as'    =>  'walas.detail',
	        'middleware'  => 'admin'
	    ]);

	    Route::post('/admin/walas/detail/{id}', [
	       'uses'   =>  'WalasController@updateWalas',
	        'as'    =>  'walas.update',
	        'middleware'   =>   'admin'
	    ]);

	    Route::get('/admin/walas/detail/{id}/hapus', [
	        'uses'   =>  'WalasController@deleteWalas',
	        'as'    =>  'walas.delete',
	        'middleware'   =>   'admin'
	    ]);
	 // Mapel
	Route::get('/admin/mapel', [
		'uses'	=>	'MapelController@index',
		'as'	=>	'mapel.index',
		'middleware'	=>	'admin'
	]);

	Route::get('/admin/mapel/hapus/{id}', [
		'uses'	=>	'MapelController@hapusMapel',
		'as'	=>	'mapel.delete',
		'middleware'	=>	'admin'
	]);

	Route::post('/admin/mapel', [
		'uses'	=>	'MapelController@tambahMapel',
		'middleware'	=>	'admin'
	]);

	Route::post('/admin/mapel/update', [
		'uses'	=>	'MapelController@editMapel',
		'as'	=>	'mapel.update',
		'middleware'	=>	'admin'
	]);

	Route::get('/admin/mapel/export/{type}', [
		'uses'	=>	'MapelController@exportMapel',
		'as'	=>	'mapel.export',
		'middleware'	=>	'admin'
	]);

	Route::post('/admin/mapel/import', [
		'uses'	=>	'MapelController@importSiswa',
		'as'	=>	'mapel.import',
		'middleware'	=>	'admin'
	]);

	Route::get('/admin/mapel/LaporanMapel', [
		'uses'	=>	'MapelController@pdfMapel',
		'as'	=>	'mapel.pdf',
		'middleware'	=>	'admin'
	]);

	// Kelas
	Route::get('/admin/kelas', [
		'uses'	=>	'KelasController@index',
		'as'	=>	'kelas.index',
		'middleware'	=>	'admin'
	]);

	Route::post('/admin/kelas', [
		'uses'	=>	'KelasController@tambahKelas',
		'middleware'	=>	'admin'
	]);

	Route::get('/admin/kelas/export/{type}', [
		'uses'	=>	'KelasController@exportKelas',
		'as'	=>	'kelas.export',
		'middleware'	=>	'admin'
	]);

	Route::post('/admin/kelas/import', [
		'uses'	=>	'KelasController@importKelas',
		'as'	=>	'kelas.import',
		'middleware'	=>	'admin'
	]);

	Route::get('/admin/kelas/LaporanKelas', [
		'uses'	=>	'KelasController@pdfKelas',
		'as'	=>	'kelas.pdf',
		'middleware'	=>	'admin'
	]);

	Route::post('/admin/kelas/update', [
		'uses'	=>	'KelasController@editKelas',
		'as'	=>	'kelas.update',
		'middleware'	=>	'admin'
	]);

	Route::get('/admin/kelas/hapus//{id}', [
		'uses'	=>	'KelasController@hapusKelas',
		'as'	=>	'kelas.delete',
		'middleware'	=>	'admin'
	]);

	// Guru
	Route::get('/admin/guru', [
		'uses'	=>	'GuruController@index',
		'as'	=>	'guru.index',
		'middleware'	=>	'admin'
	]);

	Route::post('/admin/guru', [
		'uses'	=>	'GuruController@tambahGuru',
		'middleware'	=>	'admin'
	]);

	Route::get('/admin/guru/hapus/{id}', [
		'uses'	=>	'GuruController@hapusGuru',
		'as'	=>	'guru.delete',
		'middleware'	=>	'admin'
	]);

	Route::post('/admin/guru/update', [
		'uses'	=>	'GuruController@editGuru',
		'as'	=>	'guru.update',
		'middleware'	=>	'admin'
	]);

	Route::get('/admin/guru/export/{type}', [
		'uses'	=>	'GuruController@exportGuru',
		'as'	=>	'guru.export',
		'middleware'	=>	'admin'
	]);

	Route::post('/admin/guru/import', [
		'uses'	=>	'GuruController@importGuru',
		'as'	=>	'guru.import',
		'middleware'	=>	'admin'
	]);

	Route::get('/admin/guru/LaporanGuru', [
		'uses'	=>	'GuruController@pdfGuru',
		'as'	=>	'guru.pdf',
		'middleware'	=>	'admin'
	]);
	// Route::get('/admin/guru/detail/{kode_guru}', [
	// 	'uses'	=>	'GuruController@detailGuru',
	// 	'as'	=>	'guru.detail',
	// 	'middleware'	=>	'admin'
	// ]);

	// Route::post('/admin/guru/detail/{kodeGuru}/update', [
	// 	'uses'	=>	'GuruController@updateGuru',
	// 	'as'	=>	'guru.update',
	// 	'middleware'	=>	'admin'
	// ]);
});
