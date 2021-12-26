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



//ROUTE LOGIN / LOGOUT
Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

//FILTER UNTUK USER YANG MASUK
Route::group(['middleware' => 'auth'], function()
{

	//ROUTE HOME
	Route::get ('/', 'HomeController@index');	


	//ROUTE MANAJEMEN USER
	Route::get('registrasi','UserController@index'); 
	// register
	Route::get('addregistrasi','UserController@add'); 
	Route::post('addregistrasi', 'UserController@save');
	Route::get('delregistrasi/{id}','UserController@delete'); 
	Route::get('editregistrasi/{id}','UserController@edit'); 
	Route::post('editregistrasi','UserController@update');
	Route::get('editpassword','UserController@password');
	Route::post('editpassword','UserController@execute');
	// hak akses
	Route::get('hakakses/{id}','AksesController@hak_akses'); 
	Route::post('hakakses','AksesController@savehak_akses'); 
	Route::get('delhakakses/{id}','AksesController@delhak_akses'); 
	Route::get('superadmin/{id}','AksesController@super_admin'); 
	Route::get('admin/{id}','AksesController@admin_biasa'); 

	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//ROUTES DATA STANDAR
	//ROUTES UNTUK STANDAR 1
	Route::get 	('visimisitujuan', 'VisiMisiController@index');
	Route::get 	('addvisimisitujuan', 'VisiMisiController@add');
	Route::post ('addvisimisitujuan', 'VisiMisiController@save');
	Route::get 	('delvisimisitujuan/{id}', 'VisiMisiController@delete');
	Route::get 	('editvisimisitujuan/{id}', 'VisiMisiController@edit');
	Route::post ('editvisimisitujuan', 'VisiMisiController@update');


	//ROUTES UNTUK STANDAR 2 Tata Pamong
	Route::get ('tatapamong', 'TatapamongController@index');
	Route::get ('addtatapamong', 'TatapamongController@add');
	Route::post('addtatapamong', 'TatapamongController@save');
	Route::get ('deltatapamong/{id}', 'TatapamongController@delete');
	Route::get ('edittatapamong/{id}', 'TatapamongController@edit');
	Route::post ('edittatapamong', 'TatapamongController@update');


	//ROUTES UNTUK STANDAR 2 Umpan Balik
	Route::get ('umpanbalik', 'UmpanbalikController@index');
	Route::get ('addumpanbalik', 'UmpanbalikController@add');
	Route::post('addumpanbalik', 'UmpanbalikController@save');
	Route::get ('delumpanbalik/{id}', 'UmpanbalikController@delete');
	Route::get ('editumpanbalik/{id}', 'UmpanbalikController@edit');
	Route::post ('editumpanbalik', 'UmpanbalikController@update');


	//ROUTES UNTUK STANDAR 2 Keberlanjutan Prodi
	Route::get ('keberlanjutanprodi', 'KeberlanjutanprodiController@index');
	Route::get ('addkeberlanjutanprodi', 'KeberlanjutanprodiController@add');
	Route::post('addkeberlanjutanprodi', 'KeberlanjutanprodiController@save');
	Route::get ('delkeberlanjutanprodi/{id}', 'KeberlanjutanprodiController@delete');
	Route::get ('editkeberlanjutanprodi/{id}', 'KeberlanjutanprodiController@edit');
	Route::post ('editkeberlanjutanprodi', 'KeberlanjutanprodiController@update');


	//ROUTES STANDAR 3 Mahasiswa Reguler
	Route::get ('mahasiswa', 'MahasiswaController@index');
	Route::get ('addmahasiswareg', 'MahasiswaController@addmahasiswareg');
	Route::post('addmahasiswareg', 'MahasiswaController@savemahasiswareg');
	Route::get ('delmahasiswareg/{id}', 'MahasiswaController@delmahasiswareg');
	Route::get ('editmahasiswareg/{id}', 'MahasiswaController@editmahasiswareg');
	Route::post ('editmahasiswareg', 'MahasiswaController@updatemahasiswareg');
	Route::get ('detailmahasiswareg/{id}','MahasiswaController@detailmahasiswareg');


	//ROUTES STANDAR 3 Mahasiswa Non Reguler
	Route::get ('mahasiswanonreg', 'MahasiswaController@indexmahasiswanonreg');
	Route::get ('addmahasiswanonreg', 'MahasiswaController@addmahasiswanonreg');
	Route::post('addmahasiswanonreg', 'MahasiswaController@savemahasiswanonreg');
	Route::get ('delmahasiswanonreg/{id}', 'MahasiswaController@delmahasiswanonreg');
	Route::get ('editmahasiswanonreg/{id}', 'MahasiswaController@editmahasiswanonreg');
	Route::post ('editmahasiswanonreg', 'MahasiswaController@updatemahasiswanonreg');
	Route::get ('detailmahasiswanonreg/{id}','MahasiswaController@detailmahasiswanonreg');


	//ROUTES STANDAR 3 Prestasi Mahasiswa
	Route::get ('prestasimhs', 'MahasiswaController@indexprestasimhs');
	Route::get ('addprestasimhs', 'MahasiswaController@addprestasimhs');
	Route::post('addprestasimhs', 'MahasiswaController@saveprestasimhs');
	Route::get ('delprestasimhs/{id}', 'MahasiswaController@delprestasimhs');
	Route::get ('editprestasimhs/{id}', 'MahasiswaController@editprestasimhs');
	Route::post ('editprestasimhs', 'MahasiswaController@updateprestasimhs');


	//ROUTES STANDAR 3 Jumlah Mahasiswa
	Route::get ('jumlahmhs', 'MahasiswaController@indexjumlahmhs');
	Route::get ('addjumlahmhs', 'MahasiswaController@addjumlahmhs');
	Route::post('addjumlahmhs', 'MahasiswaController@savejumlahmhs');
	Route::get ('deljumlahmhs/{id}', 'MahasiswaController@deljumlahmhs');
	Route::get ('editjumlahmhs/{id}', 'MahasiswaController@editjumlahmhs');
	Route::post ('editjumlahmhs', 'MahasiswaController@updatejumlahmhs');


	//ROUTES STANDAR 3 Layanan Mahasiswa
	Route::get ('addlayananmhs', 'MahasiswaController@addlayananmhs');
	Route::post('addlayananmhs', 'MahasiswaController@savelayananmhs');
	Route::get ('dellayananmhs/{id}', 'MahasiswaController@dellayananmhs');
	Route::get ('editlayananmhs/{id}', 'MahasiswaController@editlayananmhs');
	Route::post ('editlayananmhs', 'MahasiswaController@updatelayananmhs');


	//ROUTES STANDAR 3 Mekanisme
	Route::get ('lulusan', 'LulusanController@index');
	Route::get ('addmekanisme', 'LulusanController@addmekanisme');
	Route::post('addmekanisme', 'LulusanController@savemekanisme');
	Route::get ('delmekanisme/{id}', 'LulusanController@delmekanisme');
	Route::get ('editmekanisme/{id}', 'LulusanController@editmekanisme');
	Route::post ('editmekanisme', 'LulusanController@updatemekanisme');


	//ROUTES STANDAR 3 Evaluasi Lulusan
	Route::get ('addevaluasilulusan', 'LulusanController@addevaluasilulusan');
	Route::post('addevaluasilulusan', 'LulusanController@saveevaluasilulusan');
	Route::get ('delevaluasilulusan/{id}', 'LulusanController@delevaluasilulusan');
	Route::get ('editevaluasilulusan/{id}', 'LulusanController@editevaluasilulusan');
	Route::post ('editevaluasilulusan', 'LulusanController@updateevaluasilulusan');


	//ROUTES STANDAR 3 Alumni
	
	Route::get ('addalumni', 'LulusanController@addalumni');
	Route::post('addalumni', 'LulusanController@savealumni');
	Route::get ('delalumni/{id}', 'LulusanController@delalumni');
	Route::get ('editalumni/{id}', 'LulusanController@editalumni');
	Route::post ('editalumni', 'LulusanController@updatealumni');


	//ROUTES UNTUK STANDAR 4 SDM EVALUASI
	Route::get ('sdm', 'SdmController@index');
	Route::get ('addsdm', 'SdmController@add');
	Route::post('addsdm', 'SdmController@save');
	Route::get ('delsdm/{id}', 'SdmController@delete');
	Route::get ('editsdm/{id}', 'SdmController@edit');
	Route::post('editsdm', 'SdmController@update');

	
	//ROUTES UNTUK STANDAR 4 DATA DOSEN
	Route::get ('datadosen', 'DosenController@index');
	Route::get ('addkegiatandosen', 'DosenController@addkegiatandosen');
	Route::post('addkegiatandosen', 'DosenController@savekegiatandosen');
	Route::get ('delkegiatandosen/{id}', 'DosenController@delkegiatandosen');
	Route::get ('editkegiatandosen/{id}', 'DosenController@editkegiatandosen');
	Route::post('editkegiatandosen', 'DosenController@updatekegiatandosen');


	//ROUTES UNTUK STANDAR 4 AKTIVITAS MENGAJAR
	Route::get ('addaktivitasmengajar', 'DosenController@addaktivitasmengajar');
	Route::post('addaktivitasmengajar', 'DosenController@saveaktivitasmengajar');
	Route::get ('delaktivitasmengajar/{id}', 'DosenController@delaktivitasmengajar');
	Route::get ('editaktivitasmengajar/{id}', 'DosenController@editaktivitasmengajar');
	Route::post ('editaktivitasmengajar', 'DosenController@updateaktivitasmengajar');


	//ROUTES UNTUK STANDAR AKTIVITAS MENGAJAR 1 
	Route::get ('addaktivitasmengajarsks', 'DosenController@addaktivitasmengajarsks');
	Route::post('addaktivitasmengajarsks', 'DosenController@saveaktivitasmengajarsks');
	Route::get ('delaktivitasmengajarsks/{id}', 'DosenController@delaktivitasmengajarsks');
	Route::get ('editaktivitasmengajarsks/{id}', 'DosenController@editaktivitasmengajarsks');
	Route::post ('editaktivitasmengajarsks', 'DosenController@updateaktivitasmengajarsks');


	//ROUTES UNTUK STANDAR 4 KEGIATAN TENAGA AHLI
	Route::get ('addkegiatantenagaahli', 'DosenController@addkegiatantenagaahli');
	Route::post('addkegiatantenagaahli', 'DosenController@savekegiatantenagaahli');
	Route::get ('delkegiatantenagaahli/{id}', 'DosenController@delkegiatantenagaahli');
	Route::get ('editkegiatantenagaahli/{id}', 'DosenController@editkegiatantenagaahli');
	Route::post ('editkegiatantenagaahli', 'DosenController@updatekegiatantenagaahli');


	//ROUTES UNTUK STANDAR 4 TUGAS BELAJAR
	Route::get ('addtugasbelajar', 'DosenController@addtugasbelajar');
	Route::post('addtugasbelajar', 'DosenController@savetugasbelajar');
	Route::get ('deltugasbelajar/{id}', 'DosenController@deltugasbelajar');
	Route::get ('edittugasbelajar/{id}', 'DosenController@edittugasbelajar');
	Route::post ('edittugasbelajar', 'DosenController@updatetugasbelajar');


	//ROUTES UNTUK STANDAR 4 PRESTASI DOSEN
	Route::get ('addprestasidosen', 'DosenController@addprestasidosen');
	Route::post('addprestasidosen', 'DosenController@saveprestasidosen');
	Route::get ('delprestasidosen/{id}', 'DosenController@delprestasidosen');
	Route::get ('editprestasidosen/{id}', 'DosenController@editprestasidosen');
	Route::post('editprestasidosen', 'DosenController@updateprestasidosen');


	//ROUTES UNTUK STANDAR 4 ORGANISASI PROFESI
	Route::get ('addorganisasiprofesi', 'DosenController@addorganisasiprofesi');
	Route::post('addorganisasiprofesi', 'DosenController@saveorganisasiprofesi');
	Route::get ('delorganisasiprofesi/{id}', 'DosenController@delorganisasiprofesi');
	Route::get ('editorganisasiprofesi/{id}', 'DosenController@editorganisasiprofesi');
	Route::post('editorganisasiprofesi', 'DosenController@updateorganisasiprofesi');


	//ROUTES UNTUK STANDAR 4 PENDIDIKAN DOSEN
	Route::get ('addpendidikandosen', 'DosenController@addpendidikandosen');
	Route::post('addpendidikandosen', 'DosenController@savependidikandosen');
	Route::get ('delpendidikandosen/{id}', 'DosenController@delpendidikandosen');
	Route::get ('editpendidikandosen/{id}', 'DosenController@editpendidikandosen');
	Route::post('editpendidikandosen', 'DosenController@updatependidikandosen');

	//ROUTES UNTUK STANDAR 4 UPAYA TENAGA KEPENDIDIKAN
	Route::get ('addupayatenagakependidikan', 'DosenController@addupayatenagakependidikan');
	Route::post('addupayatenagakependidikan', 'DosenController@saveupayatenagakependidikan');
	Route::get ('delupayatenagakependidikan/{id}', 'DosenController@delupayatenagakependidikan');
	Route::get ('editupayatenagakependidikan/{id}', 'DosenController@editupayatenagakependidikan');
	Route::post('editupayatenagakependidikan', 'DosenController@updateupayatenagakependidikan');
	
	
	//ROUTES UNTUK STANDAR 5 KOMPETENSI
	Route::get ('kurikulum', 'KurikulumController@index');
	Route::get ('addkompetensi', 'KurikulumController@addkompetensi');
	Route::post('addkompetensi', 'KurikulumController@savekompetensi');
	Route::get ('delkompetensi/{id}', 'KurikulumController@delkompetensi');
	Route::get ('editkompetensi/{id}', 'KurikulumController@editkompetensi');
	Route::post('editkompetensi', 'KurikulumController@updatekompetensi');


	//ROUTES UNTUK STANDAR 5 MATA KULIAH PILIHAN
	Route::get ('addmatkulpil', 'KurikulumController@addmatkulpil');
	Route::post('addmatkulpil', 'KurikulumController@savematkulpil');
	Route::get ('delmatkulpil/{id}', 'KurikulumController@delmatkulpil');
	Route::get ('editmatkulpil/{id}', 'KurikulumController@editmatkulpil');
	Route::post('editmatkulpil', 'KurikulumController@updatematkulpil');


	//ROUTES UNTUK STANDAR 5 PRATIKUM
	Route::get ('addpraktikum', 'KurikulumController@addpraktikum');
	Route::post('addpraktikum', 'KurikulumController@savepraktikum');
	Route::get ('delpraktikum/{id}', 'KurikulumController@delpraktikum');
	Route::get ('editpraktikum/{id}', 'KurikulumController@editpraktikum');
	Route::post('editpraktikum', 'KurikulumController@updatepraktikum');


	//ROUTES UNTUK STANDAR 5 PENINJAUAN KURIKULUM
	Route::get ('addpeninjauankurikulum', 'KurikulumController@addpeninjauankurikulum');
	Route::post('addpeninjauankurikulum', 'KurikulumController@savepeninjauankurikulum');
	Route::get ('delpeninjauankurikulum/{id}', 'KurikulumController@delpeninjauankurikulum');
	Route::get ('editpeninjauankurikulum/{id}', 'KurikulumController@editpeninjauankurikulum');
	Route::post('editpeninjauankurikulum', 'KurikulumController@updatepeninjauankurikulum');


	//ROUTES UNTUK STANDAR 5 HASIL PENINJAUAN KURIKULUM
	Route::get ('addhasilpeninjauankurikulum', 'KurikulumController@addhasilpeninjauankurikulum');
	Route::post('addhasilpeninjauankurikulum', 'KurikulumController@savehasilpeninjauankurikulum');
	Route::get ('delhasilpeninjauankurikulum/{id}', 'KurikulumController@delhasilpeninjauankurikulum');
	Route::get ('edithasilpeninjauankurikulum/{id}', 'KurikulumController@edithasilpeninjauankurikulum');
	Route::post('edithasilpeninjauankurikulum', 'KurikulumController@updatehasilpeninjauankurikulum');


	//ROUTES UNTUK STANDAR 5 PEMBELAJARAN
	Route::get ('pembelajaran', 'PembelajaranController@index');
	Route::get ('addprosespembelajaran', 'PembelajaranController@addprosespembelajaran');
	Route::post('addprosespembelajaran', 'PembelajaranController@saveprosespembelajaran');
	Route::get ('delpembelajaran/{id}', 'PembelajaranController@delprosespembelajaran');
	Route::get ('editprosespembelajaran/{id}', 'PembelajaranController@editprosespembelajaran');
	Route::post('editprosespembelajaran', 'PembelajaranController@updateprosespembelajaran');


	//ROUTES UNTUK STANDAR 5 PEMBIMBING AKADEMIK
	Route::get ('addpembimbingakademik', 'PembelajaranController@addpembimbingakademik');
	Route::post('addpembimbingakademik', 'PembelajaranController@savepembimbingakademik');
	Route::get ('delpembimbingakademik/{id}', 'PembelajaranController@delpembimbingakademik');
	Route::get ('editpembimbingakademik/{id}', 'PembelajaranController@editpembimbingakademik');
	Route::post('editpembimbingakademik', 'PembelajaranController@updatepembimbingakademik');


	//ROUTES UNTUK STANDAR 5 PROSES PEMBIMBINGAN AKADEMIK
	Route::get ('addprosespembimbinganakademik', 'PembelajaranController@addprosespembimbinganakademik');
	Route::post('addprosespembimbinganakademik', 'PembelajaranController@saveprosespembimbinganakademik');
	Route::get ('delprosespembimbinganakademik/{id}', 'PembelajaranController@delprosespembimbinganakademik');
	Route::get ('editprosespembimbinganakademik/{id}', 'PembelajaranController@editprosespembimbinganakademik');
	Route::post('editprosespembimbinganakademik', 'PembelajaranController@updateprosespembimbinganakademik');


	//ROUTES UNTUK STANDAR 5 PEMBIMBINGAN SKRIPSI
	Route::get ('addpembimbinganskripsi', 'PembelajaranController@addpembimbinganskripsi');
	Route::post('addpembimbinganskripsi', 'PembelajaranController@savepembimbinganskripsi');
	Route::get ('delpembimbinganskripsi/{id}', 'PembelajaranController@delpembimbinganskripsi');
	Route::get ('editpembimbinganskripsi/{id}', 'PembelajaranController@editpembimbinganskripsi');
	Route::post('editpembimbinganskripsi', 'PembelajaranController@updatepembimbinganskripsi');


	//ROUTES UNTUK STANDAR 5 PANDUAN PEMBIMBINGAN SKRIPSI
	Route::get ('addpanduanpembimbinganskripsi', 'PembelajaranController@addpanduanpembimbinganskripsi');
	Route::post('addpanduanpembimbinganskripsi', 'PembelajaranController@savepanduanpembimbinganskripsi');
	Route::get ('delpanduanpembimbinganskripsi/{id}', 'PembelajaranController@delpanduanpembimbinganskripsi');
	Route::get ('editpanduanpembimbinganskripsi/{id}', 'PembelajaranController@editpanduanpembimbinganskripsi');
	Route::post('editpanduanpembimbinganskripsi', 'PembelajaranController@updatepanduanpembimbinganskripsi');


	//ROUTES UNTUK STANDAR 5 UPAYA PERBAIKAN PEMBELAJARAN
	Route::get ('addupayaperbaikanpembelajaran', 'PembelajaranController@addupayaperbaikanpembelajaran');
	Route::post('addupayaperbaikanpembelajaran', 'PembelajaranController@saveupayaperbaikanpembelajaran');
	Route::get ('delupayaperbaikanpembelajaran/{id}', 'PembelajaranController@delupayaperbaikanpembelajaran');
	Route::get ('editupayaperbaikanpembelajaran/{id}', 'PembelajaranController@editupayaperbaikanpembelajaran');
	Route::post('editupayaperbaikanpembelajaran', 'PembelajaranController@updateupayaperbaikanpembelajaran');


	//ROUTES UNTUK STANDAR 5 SUASANA AKADEMIK
	Route::get ('suasanaakademik', 'SuasanaAkademikController@index');
	Route::get ('addsuasanaakademik', 'SuasanaAkademikController@add');
	Route::post('addsuasanaakademik', 'SuasanaAkademikController@save');
	Route::get ('delsuasanaakademik/{id}', 'SuasanaAkademikController@delete');
	Route::get ('editsuasanaakademik/{id}', 'SuasanaAkademikController@edit');
	Route::post('editsuasanaakademik', 'SuasanaAkademikController@update');


	//ROUTES UNTUK STANDAR 6 pengelolaandana
	Route::get ('pembiayaan', 'PembiayaanController@index');
	Route::get ('addpengelolaan', 'PembiayaanController@addpengelolaan');
	Route::post('addpengelolaan', 'PembiayaanController@savepengelolaan');
	Route::get ('delpengelolaan/{id}', 'PembiayaanController@delpengelolaan');
	Route::get ('editpengelolaan/{id}', 'PembiayaanController@editpengelolaan');
	Route::post ('editpengelolaan', 'PembiayaanController@updatepengelolaan');


	//ROUTES UNTUK STANDAR 6 SUMBER DANA
	Route::get ('addsumberdana', 'PembiayaanController@addsumberdana');
	Route::post ('addsumberdana', 'PembiayaanController@savesumberdana');
	Route::get ('delsumberdana/{id}', 'PembiayaanController@delsumberdana');
	Route::get ('editsumberdana/{id}', 'PembiayaanController@editsumberdana');
	Route::post ('editsumberdana', 'PembiayaanController@updatesumberdana');


	//ROUTES UNTUK STANDAR 6 Penggunaan DANA
	Route::get ('addpenggunaandana', 'PembiayaanController@addpenggunaandana');
	Route::post ('addpenggunaandana', 'PembiayaanController@savepenggunaandana');
	Route::get ('delpenggunaandana/{id}', 'PembiayaanController@delpenggunaandana');
	Route::get ('editpenggunaandana/{id}', 'PembiayaanController@editpenggunaandana');
	Route::post ('editpenggunaandana', 'PembiayaanController@updatepenggunaandana');


	//ROUTES UNTUK STANDAR 6 Dana penelitian
	Route::get ('adddanapenelitian', 'PembiayaanController@adddanapenelitian');
	Route::post ('adddanapenelitian', 'PembiayaanController@savedanapenelitian');
	Route::get ('deldanapenelitian/{id}', 'PembiayaanController@deldanapenelitian');
	Route::get ('editdanapenelitian/{id}', 'PembiayaanController@editdanapenelitian');
	Route::post ('editdanapenelitian', 'PembiayaanController@updatedanapenelitian');
	Route::get ('detaildanapenelitian/{id}', 'PembiayaanController@detaildanapenelitian');


	//ROUTES UNTUK STANDAR 6 Sarana Prasarana/ruang kerja dosen
	Route::get ('saranaprasarana', 'SaranaprasaranaController@index');
	Route::get ('addsaranaprasarana', 'SaranaprasaranaController@add');
	Route::post('addsaranaprasarana', 'SaranaprasaranaController@save');
	Route::get ('delsaranaprasarana/{idprodi}', 'SaranaprasaranaController@delete');
	Route::get ('editsaranaprasarana/{idprodi}', 'SaranaprasaranaController@edit');
	Route::post ('saranaprasarana', 'SaranaprasaranaController@update');


	//ROUTES UNTUK STANDAR 6 Prasarana
	Route::get ('prasarana', 'SaranaprasaranaController@indexprasarana');
	Route::get ('addprasarana',  'SaranaprasaranaController@addprasarana');
	Route::post('addprasarana', 'SaranaprasaranaController@saveprasarana');
	Route::get ('delprasarana/{idprodi}',  'SaranaprasaranaController@deleteprasarana');
	Route::get ('editprasarana/{idprodi}',  'SaranaprasaranaController@editprasarana');
	Route::post ('prasarana', 'SaranaprasaranaController@updateprasarana');


	//ROUTES UNTUK STANDAR 6 Pustaka
	Route::get ('pustaka', 'SaranaprasaranaController@indexpustaka');
	Route::get ('addpustaka', 'SaranaprasaranaController@addpustaka');
	Route::post('addpustaka', 'SaranaprasaranaController@savepustaka');
	Route::get ('delpustaka/{idprodi}', 'SaranaprasaranaController@deletepustaka');
	Route::get ('editpustaka/{idprodi}', 'SaranaprasaranaController@editpustaka');
	Route::post ('pustaka', 'SaranaprasaranaController@updatepustaka');


	//ROUTES UNTUK STANDAR 6 Jurnal
	Route::get ('jurnal', 'SaranaprasaranaController@indexjurnal');
	Route::get ('addjurnal', 'SaranaprasaranaController@addjurnal');
	Route::post('addjurnal', 'SaranaprasaranaController@savejurnal');
	Route::get ('deljurnal/{idprodi}', 'SaranaprasaranaController@deletejurnal');
	Route::get ('editjurnal/{idprodi}', 'SaranaprasaranaController@editjurnal');
	Route::post ('jurnal', 'SaranaprasaranaController@updatejurnal');


	//ROUTES UNTUK STANDAR 6 Sumber Pustaka
	Route::get ('sumberpustaka', 'SaranaprasaranaController@indexsumberpustaka');
	Route::get ('addsumberpustaka', 'SaranaprasaranaController@addsumberpustaka');
	Route::post('addsumberpustaka', 'SaranaprasaranaController@savesumberpustaka');
	Route::get ('delsumberpustaka/{idlaboratorium}', 'SaranaprasaranaController@deletesumberpustaka');
	Route::get ('editsumberpustaka/{idprodi}', 'SaranaprasaranaController@editsumberpustaka');
	Route::post ('sumberpustaka', 'SaranaprasaranaController@updatesumberpustaka');


	//ROUTES UNTUK STANDAR 6 Peralatan LAB
	Route::get ('peralatanLAB', 'SaranaprasaranaController@indexperalatanLAB');
	Route::get ('addperalatanLAB', 'SaranaprasaranaController@addperalatanLAB');
	Route::post('addperalatanLAB', 'SaranaprasaranaController@saveperalatanLAB');
	Route::get ('delperalatanLAB/{idlaboratorium}', 'SaranaprasaranaController@deleteperalatanLAB');
	Route::get ('editperalatanLAB/{idlaboratorium}', 'SaranaprasaranaController@editperalatanLAB');
	Route::post ('peralatanLAB', 'SaranaprasaranaController@updateperalatanLAB');


	//ROUTES UNTUK STANDAR 6 Sistem Informasi
	Route::get ('sisteminformasi', 'SisteminformasiController@index');
	Route::get ('addsisteminformasi',  'SisteminformasiController@add');
	Route::post('addsisteminformasi', 'SisteminformasiController@save');
	Route::get ('delsisteminformasi/{idprodi}',  'SisteminformasiController@delete');
	Route::get ('editsisteminformasi/{idprodi}',  'SisteminformasiController@edit');
	Route::post ('sisteminformasi', 'SisteminformasiController@update');


	//ROUTES UNTUK STANDAR 6 aksesibilitasdata
	Route::get ('aksesibilitasdata', 'SisteminformasiController@indexaksesibilitasdata');
	Route::get ('addaksesibilitasdata',  'SisteminformasiController@addaksesibilitasdata');
	Route::post('addaksesibilitasdata', 'SisteminformasiController@saveaksesibilitasdata');
	Route::get ('delaksesibilitasdata/{idprodi}',  'SisteminformasiController@deleteaksesibilitasdata');
	Route::get ('editaksesibilitasdata/{idprodi}',  'SisteminformasiController@editaksesibilitasdata');
	Route::post ('aksesibilitasdata', 'SisteminformasiController@updateaksesibilitasdata');


	//ROUTES UNTUK STANDAR 7 penelitian
	Route::get ('penelitian', 'PenelitianController@index');
	Route::get ('addpenelitian',  'PenelitianController@add');
	Route::post('addpenelitian', 'PenelitianController@save');
	Route::get ('delpenelitian/{idprodi}',  'PenelitianController@delete');
	Route::get ('editpenelitian/{idprodi}',  'PenelitianController@edit');
	Route::post ('penelitian', 'PenelitianController@update');


	//ROUTES UNTUK STANDAR 7 penelitian mhs
	Route::get ('mhspenelitian', 'PenelitianController@indexmhspenelitian');
	Route::get ('addmhspenelitian', 'PenelitianController@addmhspenelitian');
	Route::post('addmhspenelitian', 'PenelitianController@savemhspenelitian');
	Route::get ('delpenelitianmhs/{idprodi}', 'PenelitianController@deletemhspenelitian');
	Route::get ('editpenelitianmhs/{idprodi}', 'PenelitianController@editmhspenelitian');
	Route::post ('mhspenelitian', 'PenelitianController@updatemhspenelitian');


	//ROUTES UNTUK STANDAR 7 penelitian dosen
	Route::get ('penelitiandosen', 'PenelitianController@indexpenelitiandosen');
	Route::get ('addpenelitiandosen', 'PenelitianController@addpenelitiandosen');
	Route::post('addpenelitiandosen', 'PenelitianController@savepenelitiandosen');
	Route::get ('delpenelitiandosen/{idprodi}', 'PenelitianController@deletepenelitiandosen');
	Route::get ('editpenelitiandosen/{idprodi}', 'PenelitianController@editpenelitiandosen');
	Route::post ('penelitiandosen', 'PenelitianController@updatepenelitiandosen');


	//ROUTES UNTUK STANDAR 7 haki
	Route::get ('haki', 'PenelitianController@indexhaki');
	Route::get ('addhaki', 'PenelitianController@addhaki');
	Route::post('addhaki', 'PenelitianController@savehaki');
	Route::get ('delhaki/{idprodi}', 'PenelitianController@deletehaki');
	Route::get ('edithaki/{idprodi}', 'PenelitianController@edithaki');
	Route::post ('haki', 'PenelitianController@updatehaki');


	//ROUTES UNTUK STANDAR 7 KERJA SAMA
	Route::get ('kerjasama', 'KerjasamaController@index');
	Route::get ('addkerjasama', 'KerjasamaController@add');
	Route::post('addkerjasama', 'KerjasamaController@save');
	Route::get ('delkerjasama/{idprodi}', 'KerjasamaController@delete');
	Route::get ('editkerjasama/{idprodi}', 'KerjasamaController@edit');
	Route::post ('kerjasama', 'KerjasamaController@update');

	////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//ROUTES DATA MASTER
	//ROUTES UNTUK MASTER BIAYA PENELITIAN
	Route::get ('masterbiaya', 'MasterbiayaController@index');
	Route::get ('addmasterbiaya', 'MasterbiayaController@add');
	Route::post ('addmasterbiaya', 'MasterbiayaController@save');
	Route::get ('masterbiaya/{idbiaya}', 'MasterbiayaController@delete');
	Route::get ('editmasterbiaya/{idbiaya}', 'MasterbiayaController@editmasterbiaya');
	Route::post ('masterbiaya', 'MasterbiayaController@updatemasterbiaya');


	//ROUTES UNTUK MASTER DOSEN
	Route::get ('masterdosen', 'MasterdosenController@index');
	Route::get ('addmasterdosen', 'MasterdosenController@add');
	Route::post ('addmasterdosen', 'MasterdosenController@save');
	Route::get ('masterdosen/{id}', 'MasterdosenController@delete');
	Route::get ('editmasterdosen/{id}', 'MasterdosenController@editmasterdosen');
	Route::post ('masterdosen', 'MasterdosenController@updatemasterdosen');
	Route::get ('detailmasterdosen/{id}', 'MasterdosenController@detail');


	//ROUTES UNTUK MASTER FAKULTAS
	Route::get ('masterfakultas', 'MasterfakultasController@index');
	Route::get ('addmasterfakultas', 'MasterfakultasController@add');
	Route::post ('addmasterfakultas', 'MasterfakultasController@save');
	Route::get ('masterfakultas/{id}', 'MasterfakultasController@delete');
	Route::get ('editmasterfakultas/{id}', 'MasterfakultasController@editmasterfakultas');
	Route::post ('masterfakultas', 'MasterfakultasController@updatemasterfakultas');


	//ROUTES UNTUK MASTER FUNGSIONAL
	Route::get ('masterfungsional', 'MasterfungsionalController@index');
	Route::get ('addmasterfungsional', 'MasterfungsionalController@add');
	Route::post ('addmasterfungsional', 'MasterfungsionalController@save');
	Route::get ('masterfungsional/{idjabatan}', 'MasterfungsionalController@delete');
	Route::get ('editmasterfungsional/{idjabatan}', 'MasterfungsionalController@editmasterfungsional');
	Route::post ('masterfungsional', 'MasterfungsionalController@updatemasterfungsional');


	//ROUTES UNTUK MASTER INSTITUSI
	Route::get ('masterinstitusi', 'MasterinstitusiController@index');
	Route::get ('addmasterinstitusi', 'MasterinstitusiController@add');
	Route::post ('addmasterinstitusi', 'MasterinstitusiController@save');
	Route::get ('masterinstitusi/{idinstitusi}', 'MasterinstitusiController@delete');
	Route::get ('editmasterinstitusi/{idinstitusi}', 'MasterinstitusiController@editmasterinstitusi');
	Route::post ('masterinstitusi', 'MasterinstitusiController@updatemasterinstitusi');


	//ROUTES UNTUK MASTER JENIS PUSTAKA
	Route::get ('masterjenispustaka', 'MasterjenispustakaController@index');
	Route::get ('addmasterjenispustaka', 'MasterjenispustakaController@add');
	Route::post ('addmasterjenispustaka', 'MasterjenispustakaController@save');
	Route::get ('masterjenispustaka/{idjenispustaka}', 'MasterjenispustakaController@delete');
	Route::get ('editmasterjenispustaka/{idjenispustaka}', 'MasterjenispustakaController@editmasterjenispustaka');
	Route::post ('masterjenispustaka', 'MasterjenispustakaController@updatemasterjenispustaka');

	//ROUTES UNTUK MASTER JENIS KEMAMPUAN
	Route::get ('masterjeniskemampuan', 'MasterjeniskemampuanController@index');
	Route::get ('addmasterjeniskemampuan', 'MasterjeniskemampuanController@add');
	Route::post ('addmasterjeniskemampuan', 'MasterjeniskemampuanController@save');
	Route::get ('masterjeniskemampuan/{id}', 'MasterjeniskemampuanController@delete');
	Route::get ('editmasterjeniskemampuan/{id}', 'MasterjeniskemampuanController@editmasterjeniskemampuan');
	Route::post ('masterjeniskemampuan', 'MasterjeniskemampuanController@updatemasterjeniskemampuan');


	//ROUTES UNTUK MASTER KURIKULUM
	Route::get ('masterkurikulum', 'MasterkurikulumController@index');
	Route::get ('addmasterkurikulum', 'MasterkurikulumController@add');
	Route::post ('addmasterkurikulum', 'MasterkurikulumController@save');
	Route::get ('masterkurikulum/{id}', 'MasterkurikulumController@delete');
	Route::get ('editmasterkurikulum/{id}', 'MasterkurikulumController@editmasterkurikulum');
	Route::post ('masterkurikulum', 'MasterkurikulumController@updatemasterkurikulum');


	//ROUTES UNTUK MASTER LABORATORIUM
	Route::get ('masterlaboratorium', 'MasterlaboratoriumController@index');
	Route::get ('addmasterlaboratorium', 'MasterlaboratoriumController@add');
	Route::post ('addmasterlaboratorium', 'MasterlaboratoriumController@save');
	Route::get ('masterlaboratorium/{id}', 'MasterlaboratoriumController@delete');
	Route::get ('editmasterlaboratorium/{id}', 'MasterlaboratoriumController@editmasterlaboratorium');
	Route::post ('masterlaboratorium', 'MasterlaboratoriumController@updatemasterlaboratorium');


	//ROUTES UNTUK MASTER MAHASISWA
	Route::get ('mastermahasiswa', 'MastermahasiswaController@index');
	Route::get ('addmastermahasiswa', 'MastermahasiswaController@add');
	Route::post ('addmastermahasiswa', 'MastermahasiswaController@save');
	Route::get ('mastermahasiswa/{id}', 'MastermahasiswaController@delete');
	Route::get ('editmastermahasiswa/{id}', 'MastermahasiswaController@editmastermahasiswa');
	Route::post ('mastermahasiswa', 'MastermahasiswaController@updatemastermahasiswa');


	//ROUTES UNTUK MASTER MATA KULIAH
	Route::get ('mastermatakuliah', 'MastermatakuliahController@index');
	Route::get ('addmastermatakuliah', 'MastermatakuliahController@add');
	Route::post ('addmastermatakuliah', 'MastermatakuliahController@save');
	Route::get ('mastermatakuliah/{id}', 'MastermatakuliahController@delete');
	Route::get ('editmastermatakuliah/{id}', 'MastermatakuliahController@editmastermatakuliah');
	Route::post ('mastermatakuliah', 'MastermatakuliahController@updatemastermatakuliah');
	Route::get ('detailmastermatakuliah/{id}', 'MastermatakuliahController@detail');


	//ROUTES UNTUK MASTER PRODI
	Route::get ('masterprodi', 'MasterprodiController@index');
	Route::get ('addmasterprodi', 'MasterprodiController@add');
	Route::post ('addmasterprodi', 'MasterprodiController@save');
	Route::get ('delmasterprodi/{id}', 'MasterprodiController@delete');
	Route::get ('editmasterprodi/{id}', 'MasterprodiController@edit');
	Route::post ('editmasterprodi', 'MasterprodiController@update');


	//ROUTES UNTUK MASTER KETENAGAPENDIDIKAN
	Route::get ('masterketenagapendidikan', 'MasterketenagapendidikanController@index');
	Route::get ('addmasterketenagapendidikan', 'MasterketenagapendidikanController@add');
	Route::post ('addmasterketenagapendidikan', 'MasterketenagapendidikanController@save');
	Route::get ('masterketenagapendidikan/{id}', 'MasterketenagapendidikanController@delete');
	Route::get ('editmastertenaga/{id}', 'MasterketenagapendidikanController@editmastertenaga');
	Route::post ('masterketenagapendidikan', 'MasterketenagapendidikanController@updatemastertenaga'); 

	 ///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
	
	
	
	//ROUTES Laporan
	//ROUTES LAPORAN SEMUA STANDAR
	Route::get ('laporanall', 'LaporanAllController@index');
	Route::post ('cetakall', 'LaporanAllController@cetak');
	
	//ROUTES LAPORAN STANDAR 1 -Visi Misi Tujuan-
	Route::get ('laporanvisimisi', 'LaporanvisimisiController@index');
	Route::post ('cetakvisimisi', 'LaporanvisimisiController@cetak');


	//ROUTES LAPORAN STANDAR 2 -Tata Pamong-
	Route::get ('laporantatapamong', 'LaporantatapamongController@index');
	Route::post ('cetaktatapamong', 'LaporantatapamongController@cetak');


	//ROUTES LAPORAN STANDAR 2 -Umpan Balik-
	Route::get ('laporanumpanbalik', 'LaporanumpanbalikController@index');
	Route::post ('cetakumpanbalik', 'LaporanumpanbalikController@cetak');


	//ROUTES LAPORAN STANDAR 2 -Keberlanjutan Prodi-
	Route::get ('laporankeberlanjutanprodi', 'LaporankeberlanjutanprodiController@index');
	Route::post ('cetakkeberlanjutanprodi', 'LaporankeberlanjutanprodiController@cetak');


	//ROUTES LAPORAN STANDAR 3 -mahasiswa-
	Route::get ('laporanmahasiswa', 'LaporanmahasiswaController@index');
	Route::post ('cetakmhsreg', 'LaporanmahasiswaController@cetakmhsreg');
	Route::post ('cetakmhsnonreg', 'LaporanmahasiswaController@cetakmhsnonreg');	
	Route::post ('cetakprestasimhs', 'LaporanmahasiswaController@cetakprestasimhs');
	Route::post ('cetakjumlahmhs', 'LaporanmahasiswaController@cetakjumlahmhs');
	Route::post ('cetaklayananmhs', 'LaporanmahasiswaController@cetaklayananmhs');

	//ROUTES LAPORAN STANDAR 3 -lulusan-
	Route::get ('laporanlulusan', 'LaporanlulusanController@index');
	Route::post ('cetakmekanisme', 'LaporanlulusanController@cetakmekanisme');
	Route::post ('cetakevaluasi', 'LaporanlulusanController@cetakevaluasi');	
	Route::post ('cetakalumni', 'LaporanlulusanController@cetakalumni');


	
	//ROUTES LAPORAN STANDAR 4 -Sistem Seleksi dan Pengembangan-
	Route::get ('laporansistem', 'LaporanSistemController@index');
	Route::post ('cetaksistem', 'LaporanSistemController@cetaksistem');
	Route::post ('cetakmonitoring', 'LaporanSistemController@cetakmonitoring');



	//ROUTES LAPORAN STANDAR 4 -Lap. Data Dosen Tetap Sesuai PS-
	Route::get ('laporandatadosen', 'LaporanDataDosenController@index');
	Route::post ('laporandatadosen', 'LaporanDataDosenController@carilaporandatadosen');


	//ROUTES LAPORAN STANDAR 4 -Lap. Data Dosen Tetap Tidak Sesuai PS-
	Route::get ('laporandatadosen1', 'LaporanDataDosenController@indexlaporandatadosen1');
	Route::post ('laporandatadosen1', 'LaporanDataDosenController@carilaporandatadosen1');


	//ROUTES LAPORAN STANDAR 4 -Lap. Aktivitas Mengajar Dosen Tetap Menurut SKS PS-
	Route::get ('laporandatadosen2', 'LaporanDataDosenController@indexlaporandatadosen2');
	Route::post ('laporandatadosen2', 'LaporanDataDosenController@carilaporandatadosen2');


	//ROUTES LAPORAN STANDAR 4 -Lap. Aktivitas Mengajar Dosen Tetap Sesuai PS-
	Route::get ('laporandatadosen3', 'LaporanDataDosenController@indexlaporandatadosen3');
	Route::post ('laporandatadosen3', 'LaporanDataDosenController@carilaporandatadosen3');


	//ROUTES LAPORAN STANDAR 4 -Lap. Aktivitas Mengajar Dosen Tetap Tidak Sesuai PS-
	Route::get ('laporandatadosen4', 'LaporanDataDosenController@indexlaporandatadosen4');
	Route::post ('laporandatadosen4', 'LaporanDataDosenController@carilaporandatadosen4');


	//ROUTES LAPORAN STANDAR 4 -Lap. Data Dosen Tetap Tidak tetap-
	Route::get ('laporandatadosen5', 'LaporanDataDosenController@indexlaporandatadosen5');
	Route::post ('laporandatadosen5', 'LaporanDataDosenController@carilaporandatadosen5');


	//ROUTES LAPORAN STANDAR 4 -Lap. Aktivitas Mengajar Dosen Tidak Tetap-
	Route::get ('laporandatadosen6', 'LaporanDataDosenController@indexlaporandatadosen6');
	Route::post ('laporandatadosen6', 'LaporanDataDosenController@carilaporandatadosen6');


	//ROUTES LAPORAN STANDAR 4 -Lap. Kegiatan Tenaga Ahli-
	Route::get ('laporandatadosen7', 'LaporanDataDosenController@indexlaporandatadosen7');
	Route::post ('laporandatadosen7', 'LaporanDataDosenController@carilaporandatadosen7');


	//ROUTES LAPORAN STANDAR 4 -Lap. Tugas Belajar-
	Route::get ('laporandatadosen8', 'LaporanDataDosenController@indexlaporandatadosen8');
	Route::post ('laporandatadosen8', 'LaporanDataDosenController@carilaporandatadosen8');


	//ROUTES LAPORAN STANDAR 4 -Lap. Kegiatan Dosen-
	Route::get ('laporandatadosen9', 'LaporanDataDosenController@indexlaporandatadosen9');
	Route::post ('laporandatadosen9', 'LaporanDataDosenController@carilaporandatadosen9');


	//ROUTES LAPORAN STANDAR 4 -Lap. Prestasi Dosen-
	Route::get ('laporandatadosen10', 'LaporanDataDosenController@indexlaporandatadosen10');
	Route::post ('laporandatadosen10', 'LaporanDataDosenController@carilaporandatadosen10');


	//ROUTES LAPORAN STANDAR 4 -Lap. Organisasi Profesi-
	Route::get ('laporandatadosen11', 'LaporanDataDosenController@indexlaporandatadosen11');
	Route::post ('laporandatadosen11', 'LaporanDataDosenController@carilaporandatadosen11');


	//ROUTES LAPORAN STANDAR 4 -Lap. Data Tenaga Kependidikan-
	Route::get ('laporandatadosen12', 'LaporanDataDosenController@indexlaporandatadosen12');
	Route::post ('laporandatadosen12', 'LaporanDataDosenController@carilaporandatadosen12');


	//ROUTES LAPORAN STANDAR 4 -Lap. Upaya Meningkatkan Kualifikasi dan Kompetensi Tenaga Kependidikan-
	Route::get ('laporandatadosen13', 'LaporanDataDosenController@indexlaporandatadosen13');
	Route::post ('laporandatadosen13', 'LaporanDataDosenController@carilaporandatadosen13');


	//ROUTES LAPORAN STANDAR 5 -Lap. Kompetensi Utama-
	Route::get ('laporankurikulum', 'LaporanKurikulumController@index');
	Route::post ('laporankurikulum', 'LaporanKurikulumController@carilaporankurikulum');


	//ROUTES LAPORAN STANDAR 5 -Lap. Kompetensi Pendukung-
	Route::get ('laporankurikulum1','LaporanKurikulumController@indexlaporankurikulum1');
	Route::post ('laporankurikulum1','LaporanKurikulumController@carilaporankurikulum1');


	//ROUTES LAPORAN STANDAR 5 -Lap. Kompetensi Lainnya-
	Route::get ('laporankurikulum2','LaporanKurikulumController@indexlaporankurikulum2');
	Route::post ('laporankurikulum2','LaporanKurikulumController@carilaporankurikulum2');


	//ROUTES LAPORAN STANDAR 5 -Lap. Jumlah SKS PS-
	Route::get ('laporankurikulum3','LaporanKurikulumController@indexlaporankurikulum3');
	Route::post ('laporankurikulum3','LaporanKurikulumController@carilaporankurikulum3');


	//ROUTES LAPORAN STANDAR 5 -Lap. Struktur Kurikulum MK-
	Route::get ('laporankurikulum4','LaporanKurikulumController@indexlaporankurikulum4');
	Route::post ('laporankurikulum4','LaporanKurikulumController@carilaporankurikulum4');


	//ROUTES LAPORAN STANDAR 5 -Lap. Mata Kuliah Pilihan-
	Route::get ('laporankurikulum5','LaporanKurikulumController@indexlaporankurikulum5');
	Route::post ('laporankurikulum5','LaporanKurikulumController@carilaporankurikulum5');


	//ROUTES LAPORAN STANDAR 5 -Lap. Praktikum-
	Route::get ('laporankurikulum6','LaporanKurikulumController@indexlaporankurikulum6');
	Route::post ('laporankurikulum6','LaporanKurikulumController@carilaporankurikulum6');


	//ROUTES LAPORAN STANDAR 5 -Lap. Peninjauan Kurikulum-
	Route::get ('laporankurikulum7','LaporanKurikulumController@indexlaporankurikulum7');
	Route::post ('laporankurikulum7','LaporanKurikulumController@carilaporankurikulum7');


	//ROUTES LAPORAN STANDAR 5 -Lap. Hasil Peninjauan Kurikulum-
	Route::get ('laporankurikulum8','LaporanKurikulumController@indexlaporankurikulum8');
	Route::post ('laporankurikulum8','LaporanKurikulumController@carilaporankurikulum8');


	//ROUTES LAPORAN STANDAR 5 -Lap. Proses Pembelajaran-
	Route::get ('laporanpembelajaran','LaporanPembelajaranController@index');
	Route::post ('laporanpembelajaran','LaporanPembelajaranController@carilaporanpembelajaran');


	//ROUTES LAPORAN STANDAR 5 -Lap. Pembimbing Akademik-
	Route::get ('laporanpembelajaran1','LaporanPembelajaranController@indexlaporanpembelajaran1');
	Route::post ('laporanpembelajaran1','LaporanPembelajaranController@carilaporanpembelajaran1');


	//ROUTES LAPORAN STANDAR 5 -Lap. Proses Pembimbingan Akademik-
	Route::get ('laporanpembelajaran2','LaporanPembelajaranController@indexlaporanpembelajaran2');
	Route::post ('laporanpembelajaran2','LaporanPembelajaranController@carilaporanpembelajaran2');


	//ROUTES LAPORAN STANDAR 5 -Lap. Pembimbingan Tugas Akhir/Skripsi-
	Route::get ('laporanpembelajaran3','LaporanPembelajaranController@indexlaporanpembelajaran3');
	Route::post ('laporanpembelajaran3','LaporanPembelajaranController@carilaporanpembelajaran3');


	//ROUTES LAPORAN STANDAR 5 -Lap. Panduan Pembimbingan Skripsi-
	Route::get ('laporanpembelajaran4','LaporanPembelajaranController@indexlaporanpembelajaran4');
	Route::post ('laporanpembelajaran4','LaporanPembelajaranController@carilaporanpembelajaran4');


	//ROUTES LAPORAN STANDAR 5 -Lap. Upaya Perbaikan Pembelajaran-
	Route::get ('laporanpembelajaran5','LaporanPembelajaranController@indexlaporanpembelajaran5');
	Route::post ('laporanpembelajaran5','LaporanPembelajaranController@carilaporanpembelajaran5');


	//ROUTES LAPORAN STANDAR 5 -Lap. Kebijakan Suasana Akademik-
	Route::get ('laporansuasana','LaporanSuasanaController@index');
	Route::post ('laporansuasana','LaporanSuasanaController@carilaporansuasana');


	//ROUTES LAPORAN STANDAR 5 -Lap. Ketersediaan Sarana Prasarana-
	Route::get ('laporansuasana1','LaporanSuasanaController@indexlaporansuasana1');
	Route::post ('laporansuasana1','LaporanSuasanaController@carilaporansuasana1');


	//ROUTES LAPORAN STANDAR 5 -Lap. Kegiatan Luar Pembelajaran-
	Route::get ('laporansuasana2','LaporanSuasanaController@indexlaporansuasana2');
	Route::post ('laporansuasana2','LaporanSuasanaController@carilaporansuasana2');


	//ROUTES LAPORAN STANDAR 5 -Lap. Interaksi Akademik-
	Route::get ('laporansuasana3','LaporanSuasanaController@indexlaporansuasana3');
	Route::post ('laporansuasana3','LaporanSuasanaController@carilaporansuasana3');


	//ROUTES LAPORAN STANDAR 5 -Lap. Pengembangan Perilaku Kecendekiawan-
	Route::get ('laporansuasana4','LaporanSuasanaController@indexlaporansuasana4');
	Route::post ('laporansuasana4','LaporanSuasanaController@carilaporansuasana4');


	///ROUTES LAPORAN STANDAR 6 -Lap. Pengelolaan Dana-
	Route::get ('laporanpembiayaan', 'LaporanpembiayaanController@index');
	Route::post ('lappembiayaan', 'LaporanpembiayaanController@indexcarilaporanpengelolaandana');


	///ROUTES LAPORAN STANDAR 6 -Lap. Sumber Dana-
	Route::get ('laporansumberdana', 'LaporanpembiayaanController@indexlapsumberdana');
	Route::post ('lapsumberdana', 'LaporanpembiayaanController@indexcarilaporansumberdana');


	///ROUTES LAPORAN STANDAR 6 -Lap. Penggunaan Dana-
	Route::get ('laporanpenggunaandana', 'LaporanpembiayaanController@indexlappenggunaandana');
	Route::post ('lappenggunaandana', 'LaporanpembiayaanController@indexcarilaporanpenggunaandana');


	///ROUTES LAPORAN STANDAR 6 -Lap. Dana Penelitian-
	Route::get ('laporandanapenelitian', 'LaporanpembiayaanController@indexlapdanapenelitian');
	Route::post ('lapdanapenelitian', 'LaporanpembiayaanController@indexcarilaporandanapenelitian');


	///ROUTES LAPORAN STANDAR 6 -Lap. Dana Kegiatan Pelayanan/PKM-
	Route::get ('laporanpkm', 'LaporanpembiayaanController@indexlappkm');
	Route::post ('lappkm', 'LaporanpembiayaanController@indexcarilaporanpkm');


	///ROUTES LAPORAN STANDAR 6 -Lap. Ruang Kerja Dosen-
	Route::get ('laporanprasarana', 'LaporanprasaranaController@index');
	Route::post ('lapprasarana', 'LaporanprasaranaController@indexcarilaprkdosen');


	///ROUTES LAPORAN STANDAR 6 -Lap. Data Prasarana-
	Route::get ('laporandataprasarana', 'LaporanprasaranaController@indexlapdataprasarana');
	Route::post ('lapdataprasarana', 'LaporanprasaranaController@indexcarilapdataprasarana');


	///ROUTES LAPORAN STANDAR 6 -Lap. Data Penunjang-
	Route::get ('laporandatapenunjang', 'LaporanprasaranaController@indexlapdatapenunjang');
	Route::post ('lapdatapenunjang', 'LaporanprasaranaController@indexcarilapdatapenunjang');


	///ROUTES LAPORAN STANDAR 6 -Lap. Pustaka-
	Route::get ('laporanpustaka', 'LaporanprasaranaController@indexlappustaka');
	Route::post ('laporanpustaka', 'LaporanprasaranaController@indexcarilappustaka');


	///ROUTES LAPORAN STANDAR 6 -Lap. Jurnal-
	Route::get ('laporanjurnal', 'LaporanprasaranaController@indexlapjurnal');
	Route::post ('laporanjurnal', 'LaporanprasaranaController@indexcarilapjurnal');


	///ROUTES LAPORAN STANDAR 6 -Lap. Sumber Pustaka-
	Route::get ('laporansumberpustaka', 'LaporanprasaranaController@indexlapsumberpustaka');
	Route::post ('laporansumberpustaka', 'LaporanprasaranaController@indexcarilapsumberpustaka');


	///ROUTES LAPORAN STANDAR 6 -Lap. Peralatan LAB-
	Route::get ('laporanperalatanLAB', 'LaporanprasaranaController@indexlapperalatanLAB');
	Route::post ('laporanperalatanLAB', 'LaporanprasaranaController@indexcarilapperalatanLAB');


	///ROUTES LAPORAN STANDAR 6 -Lap. Sistem Informasi-
	Route::get ('laporansisteminformasi', 'LaporansisteminformasiController@index');
	Route::post ('laporansisteminformasi', 'LaporansisteminformasiController@indexcarilapsisteminformasi');


	//ROUTES LAPORAN STANDAR 6 -Lap. Aksesibilitas-
	Route::get ('laporanaksesibilitas', 'LaporansisteminformasiController@indexlapaksesibilitas');
	Route::post ('laporanaksesibilitas', 'LaporansisteminformasiController@indexcarilapaksesibilitas');


	//ROUTES LAPORAN STANDAR 7 -Lap. Penelitian-
	Route::get ('laporanpenelitian', 'LaporanpenelitianController@index');
	Route::post ('laporanpenelitian', 'LaporanpenelitianController@indexcarilappenelitian');


	//ROUTES LAPORAN STANDAR 7 -Lap. Penelitian Mahasiswa-
	Route::get ('laporanmhspenelitian', 'LaporanpenelitianController@indexlapmhspenelitian');
	Route::post ('laporanmhspenelitian', 'LaporanpenelitianController@indexcarilapmhspenelitian');


	//ROUTES LAPORAN STANDAR 7 -Lap. Penelitian Dosen-
	Route::get ('laporanpenelitiandosen', 'LaporanpenelitianController@indexlappenelitiandosen');
	Route::post ('laporanpenelitiandosen', 'LaporanpenelitianController@indexcarilappenelitiandosen');


	//ROUTES LAPORAN STANDAR 7 -Lap. HAKI-
	Route::get ('laporanhaki', 'LaporanpenelitianController@indexlaphaki');
	Route::post ('laporanhaki', 'LaporanpenelitianController@indexcarilaphaki');


	//ROUTES LAPORAN STANDAR 7 -Lap. Kegiatan PKM-
	Route::get ('laporanpkm', 'LaporanpkmController@index');
	Route::post ('laporanpkm', 'LaporanpkmController@indexcarilaporanpkm');


	//ROUTES LAPORAN STANDAR 7 -Lap. PKM Mahasiswa-
	Route::get ('laporanpkmmhs', 'LaporanpkmController@indexlappenelitianmhs');
	Route::post ('laporanpkmmhs', 'LaporanpkmController@indexcarilappenelitianmhs');


	//ROUTES LAPORAN STANDAR 7 -Lap. Instansi Dalam Negeri-
	Route::get ('laporankerjasama', 'LaporankerjasamaController@index');
	Route::post ('laporankerjasama', 'LaporankerjasamaController@indexcarilapkerjasama');


	//ROUTES LAPORAN STANDAR 7 -Lap. Instansi Luar Negeri -
	Route::get ('laporanluarnegeri', 'LaporankerjasamaController@indexluarnegeri');
	Route::post ('laporanluarnegeri', 'LaporankerjasamaController@indexcarilapluarnegeri');

	
	///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////

	//ROUTES LAMPIRAN
	//ROUTES LAMPIRAN STANDAR 1 SK PRODI
	Route::get ('lampiran1', 'Lampiran1Controller@index');
	Route::get ('addlampiran1', 'Lampiran1Controller@add');
	Route::post ('addlampiran1', 'Lampiran1Controller@save');
	Route::get ('dellampiran1/{id}', 'Lampiran1Controller@delete');
	Route::get ('editlampiran1/{id}', 'Lampiran1Controller@edit');
	Route::post ('editlampiran1', 'Lampiran1Controller@update');
	
	
	//ROUTES LAMPIRAN STANDAR 2 
	Route::get ('lampiran2', 'Lampiran2Controller@index');
	//tatapamong
	Route::get ('addlampirantatapamong', 'Lampiran2Controller@addlampirantatapamong');
	Route::post ('addlampirantatapamong', 'Lampiran2Controller@savelampirantatapamong');
	Route::get ('dellampirantatapamong/{id}', 'Lampiran2Controller@dellampirantatapamong');
	//umpanbalik
	Route::get ('addlampiranumpanbalik/{id}', 'Lampiran2Controller@addlampiranumpanbalik');
	Route::post ('addlampiranumpanbalik', 'Lampiran2Controller@savelampiranumpanbalik');
	Route::get ('dellampiranumpanbalik/{id}', 'Lampiran2Controller@dellampiranumpanbalik');
	
	
	//ROUTES LAMPIRAN STANDAR 3 
	Route::get ('lampiran3', 'Lampiran3Controller@index');
	//mahasiswareg
	Route::get ('addlampiranmhsreg/{id}', 'Lampiran3Controller@addlampiranmhsreg');
	Route::post ('addlampiranmhsreg', 'Lampiran3Controller@savelampiranmhsreg');
	Route::get ('dellampiranmhsreg/{id}', 'Lampiran3Controller@dellampiranmhsreg');
	//layananmhs
	Route::get ('addlampiranlayananmhs/{id}', 'Lampiran3Controller@addlampiranlayananmhs');
	Route::post ('addlampiranlayananmhs', 'Lampiran3Controller@savelampiranlayananmhs');
	Route::get ('dellampiranlayananmhs/{id}', 'Lampiran3Controller@dellampiranlayananmhs');	
	//evaluasi
	Route::get ('addlampiranevaluasilulusan/{id}', 'Lampiran3Controller@addlampiranevaluasilulusan');
	Route::post ('addlampiranevaluasilulusan', 'Lampiran3Controller@savelampiranevaluasilulusan');
	Route::get ('dellampiranevaluasilulusan/{id}', 'Lampiran3Controller@dellampiranevaluasilulusan');		
	//alumni
	Route::get ('addlampiranalumni/{id}', 'Lampiran3Controller@addlampiranalumni');
	Route::post ('addlampiranalumni', 'Lampiran3Controller@savelampiranalumni');
	Route::get ('dellampiranalumni/{id}', 'Lampiran3Controller@dellampiranalumni');			
	
	
	//ROUTES LAMPIRAN STANDAR 4 
	Route::get ('lampiran4', 'Lampiran4Controller@index');
	//ijazah_dosen
	Route::get ('addijazahdosen', 'Lampiran4Controller@addijazahdosen');
	Route::post ('addijazahdosen', 'Lampiran4Controller@saveijazahdosen');
	Route::get ('delijazahdosen/{id}', 'Lampiran4Controller@delijazahdosen');
	//pedoman_sdm
	Route::get ('addpedomansdm', 'Lampiran4Controller@addpedomansdm');
	Route::post ('addpedomansdm', 'Lampiran4Controller@savepedomansdm');
	Route::get ('delpedomansdm/{id}', 'Lampiran4Controller@delpedomansdm');
	//kegiatan_dosen
	Route::get ('addlampirankegiatandosen/{id}', 'Lampiran4Controller@addlampirankegiatandosen');
	Route::post ('addlampirankegiatandosen', 'Lampiran4Controller@savelampirankegiatandosen');
	Route::get ('dellampirankegiatandosen/{id}', 'Lampiran4Controller@dellampirankegiatandosen');	
	//prestasi_dosen
	Route::get ('addlampiranprestasidosen/{id}', 'Lampiran4Controller@addlampiranprestasidosen');
	Route::post ('addlampiranprestasidosen', 'Lampiran4Controller@savelampiranprestasidosen');
	Route::get ('dellampiranprestasidosen/{id}', 'Lampiran4Controller@dellampiranprestasidosen');	
	//org_dosen
	Route::get ('addlampiranorgdosen/{id}', 'Lampiran4Controller@addlampiranorgdosen');
	Route::post ('addlampiranorgdosen', 'Lampiran4Controller@savelampiranorgdosen');
	Route::get ('dellampiranorgdosen/{id}', 'Lampiran4Controller@dellampiranorgdosen');	
	
	
	//ROUTES LAMPIRAN STANDAR 5 
	Route::get ('lampiran5', 'Lampiran5Controller@index');
	//contoh_soal
	Route::get ('addcontohsoal', 'Lampiran5Controller@addcontohsoal');
	Route::post ('addcontohsoal', 'Lampiran5Controller@savecontohsoal');
	Route::get ('delcontohsoal/{id}', 'Lampiran5Controller@delcontohsoal');
	//silabus_sap
	Route::get ('addsilabusdansap/{id}', 'Lampiran5Controller@addsilabusdansap');
	Route::post ('addsilabusdansap', 'Lampiran5Controller@savesilabusdansap');
	Route::get ('delsilabusdansap/{id}', 'Lampiran5Controller@delsilabusdansap');	
	//modul_praktikum
	Route::get ('addlampiranpraktikum/{id}', 'Lampiran5Controller@addlampiranpraktikum');
	Route::post ('addlampiranpraktikum', 'Lampiran5Controller@savelampiranpraktikum');
	Route::get ('dellampiranpraktikum/{id}', 'Lampiran5Controller@dellampiranpraktikum');	
	//dokumen_kurikulum
	Route::get ('addlampirankurikulum/{id}', 'Lampiran5Controller@addlampirankurikulum');
	Route::post ('addlampirankurikulum', 'Lampiran5Controller@savelampirankurikulum');
	Route::get ('dellampirankurikulum/{id}', 'Lampiran5Controller@dellampirankurikulum');	
	//proses pembelajaran
	Route::get ('addlampiranpembelajaran/{id}', 'Lampiran5Controller@addlampiranpembelajaran');
	Route::post ('addlampiranpembelajaran', 'Lampiran5Controller@savelampiranpembelajaran');
	Route::get ('dellampiranpembelajaran/{id}', 'Lampiran5Controller@dellampiranpembelajaran');	
	//panduan skripsi
	Route::get ('addpanduanskripsi/{id}', 'Lampiran5Controller@addpanduanskripsi');
	Route::post ('addpanduanskripsi', 'Lampiran5Controller@savepanduanskripsi');
	Route::get ('delpanduanskripsi/{id}', 'Lampiran5Controller@delpanduanskripsi');	
	
	
	//ROUTES LAMPIRAN STANDAR 6 
	Route::get ('lampiran6', 'Lampiran6Controller@index');
	Route::get ('addlampiran6', 'Lampiran6Controller@add');
	Route::post ('addlampiran6', 'Lampiran6Controller@save');
	Route::get ('dellampiran6/{id}', 'Lampiran6Controller@delete');
	Route::get ('editlampiran6/{id}', 'Lampiran6Controller@edit');
	Route::post ('editlampiran6', 'Lampiran6Controller@update');
	
	//ROUTES LAMPIRAN STANDAR 7 
	Route::get ('lampiran7', 'Lampiran7Controller@index');
	Route::get ('addlampiran7', 'Lampiran7Controller@add');
	Route::post ('addlampiran7', 'Lampiran7Controller@save');
	Route::get ('dellampiran7/{id}', 'Lampiran7Controller@delete');
	Route::get ('editlampiran7/{id}', 'Lampiran7Controller@edit');
	Route::post ('editlampiran7', 'Lampiran7Controller@update');

});






