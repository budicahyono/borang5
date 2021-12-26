<?php namespace App\Http\Controllers;

use App\tbkegiatandosens;
use App\tbaktivitasmengajars;
use App\tbtenagaahlis;
use App\tbtugasbelajars;
use App\tbprestasidosens;
use App\tborganisasiprofesis;
use App\tbpendidikandosens;
use App\tbupayatenagakependidikans;
use App\tbaktivitasdosenmengajars;

use App\masterprodis;
use App\masterdosens;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;

class DosenController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
		

	public function index()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
			$kegiatandosen = tbkegiatandosens::where('idprodi', '=', $prodi)->get(); 
			$aktivitasmengajar = tbaktivitasmengajars::where('idprodi', '=', $prodi)->get(); 
			$kegiatantenagaahli = tbtenagaahlis::where('idprodi', '=', $prodi)->get(); 
			$tugasbelajar = tbtugasbelajars::where('idprodi', '=', $prodi)->get(); 
			$prestasiDos = tbprestasidosens::where('idprodi', '=', $prodi)->get(); 
			$organisasiprof = tborganisasiprofesis::where('idprodi', '=', $prodi)->get(); 
			$pendidikandosen = tbpendidikandosens::where('idprodi', '=', $prodi)->get(); 
			$upaya = tbupayatenagakependidikans::where('idprodi', '=', $prodi)->get(); 
			$aktivitasmengajarsks = tbaktivitasdosenmengajars::where('idprodi', '=', $prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$kegiatandosen = tbkegiatandosens::where('idprodi', 'like', $prodi.'%')->get(); 
			$aktivitasmengajar = tbaktivitasmengajars::where('idprodi', 'like', $prodi.'%')->get(); 
			$kegiatantenagaahli = tbtenagaahlis::where('idprodi', 'like', $prodi.'%')->get(); 
			$tugasbelajar = tbtugasbelajars::where('idprodi', 'like', $prodi.'%')->get(); 
			$prestasiDos = tbprestasidosens::where('idprodi', 'like', $prodi.'%')->get(); 
			$organisasiprof = tborganisasiprofesis::where('idprodi', 'like', $prodi.'%')->get(); 
			$pendidikandosen = tbpendidikandosens::where('idprodi', 'like', $prodi.'%')->get(); 
			$upaya = tbupayatenagakependidikans::where('idprodi', 'like', $prodi.'%')->get(); 
			$aktivitasmengajarsks = tbaktivitasdosenmengajars::where('idprodi', 'like', $prodi.'%')->get(); 	
		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();
			$kegiatandosen = tbkegiatandosens::all();
			$aktivitasmengajar = tbaktivitasmengajars::all ();
			$kegiatantenagaahli = tbtenagaahlis::all ();
			$tugasbelajar = tbtugasbelajars::all ();
			$prestasiDos = tbprestasidosens::all();
			$organisasiprof =tborganisasiprofesis::all();
			$pendidikandosen=tbpendidikandosens::all();
			$upaya = tbupayatenagakependidikans::all();
			$aktivitasmengajarsks = tbaktivitasdosenmengajars::all();
		}	
		
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st4.datadosen', compact('menu', 'menu2','kegiatandosen','aktivitasmengajar','kegiatantenagaahli','tugasbelajar','prestasiDos','organisasiprof','pendidikandosen','upaya','aktivitasmengajarsks','masterprodis','Akses','buka'));
		}
		
	}

	


// kegiatan dosen =========================================================================	
	
	public function addkegiatandosen()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
			
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_dosen','datadosen');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st4.formdatadosen', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
	
	}
	
	public function savekegiatandosen()
	{
		Session::set('tab_dosen','datadosen');
		$kegiatan = new tbkegiatandosens;
		$input	  = Input::all();
		$validator = Validator::make($input, tbkegiatandosens::$rules, tbkegiatandosens::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

		$idprodi= Input::get('idprodi');
		$Tahun = Input::get('Tahun');
 		$nip= Input::get('nip');
 		$jeniskeg= Input::get('jenisKegiatan');
 		$namaKegiatan= Input::get('namaKegiatan');
 		$tempat= Input::get('tempat');
 		$waktu= Input::get('waktu');
 		$sebagai= Input::get('sebagai');

 		$kegiatan->idprodi = $idprodi;
 		$kegiatan->Tahun = $Tahun;
 		$kegiatan->nip = $nip;
 		$kegiatan->jenisKegiatan = $jeniskeg;
 		$kegiatan->namaKegiatan = $namaKegiatan;
 		$kegiatan->tempat = $tempat;
 		$kegiatan->waktu = $waktu;
 		$kegiatan->sebagai = $sebagai;
 		$kegiatan->save();

 		return redirect('datadosen')
			->with('status-datadosen', 'Data telah berhasil disimpan');
 		
	}
	
	public function delkegiatandosen($id)
	{
		Session::set('tab_dosen','datadosen');
		$kegiatan = tbkegiatandosens::find($id);
		$kegiatan->delete();

		//redirect
		return redirect('datadosen')
			->with('status-datadosen', 'Data telah berhasil dihapus');
	}
	
	public function editkegiatandosen($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$kegiatan = tbkegiatandosens::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$kegiatan = tbkegiatandosens::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$kegiatan = tbkegiatandosens::where('id',$id)->get(); 
		}	
		
		Session::set('tab_dosen','datadosen');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st4.editkegiatandosen', compact('kegiatan','menu','menu2','Akses','buka', 'level'));

		}	
		
	}
	
	public function updatekegiatandosen()
	{
		Session::set('tab_dosen','datadosen');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbkegiatandosens::$rules, tbkegiatandosens::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
 		

 		DB::table('tbkegiatandosens')->where('id', $id)->update(array(
 				 
 				  'Tahun' => Input::get('Tahun'),
                  'nip' => Input::get('nip'),
                  'jenisKegiatan' => Input::get('jenisKegiatan'),
                  'namaKegiatan' => Input::get('namaKegiatan'),
                  'tempat' => Input::get('tempat'),
                  'waktu' => Input::get('waktu'),
                  'sebagai' => Input::get('sebagai')

            ));
 		return redirect('datadosen')
			->with('status-datadosen', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	
	
	// aktivitas mengajar dosen =========================================================================	
	
	public function addaktivitasmengajar()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
			
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_dosen','aktivitas');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st4.formaktivitasmengajar', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
			
			
		
	}
	
	public function addaktivitasmengajarsks()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
			
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_dosen','aktivitas');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st4.formaktivitasmengajarsks', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
			
		
		
	}
	
	
	public function saveaktivitasmengajar()
	{
		Session::set('tab_dosen','aktivitas');
		$aktivitas = new tbaktivitasmengajars;
		$input	  = Input::all();
		$validator = Validator::make($input, tbaktivitasmengajars::$rules, tbaktivitasmengajars::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
	

 		$idprodi= Input::get('idprodi');
 		$nip= Input::get('nip');
 		$tahunaka= Input::get('tahunAkademik');
 		$idmatakuliah= Input::get('idmatakuliah');
 		$jumlahKel= Input::get('jumlahKelas');
 		$jumlahRen= Input::get('jumlahRencanaPertemuan');
 		$jumlahRea= Input::get('jumlahRealisasiPertemuan');

 		$aktivitas->idprodi = $idprodi;
 		$aktivitas->nip = $nip;
 		$aktivitas->tahunAkademik = $tahunaka;
 		$aktivitas->idmatakuliah = $idmatakuliah;
 		$aktivitas->jumlahKelas = $jumlahKel;
 		$aktivitas->jumlahRencanaPertemuan = $jumlahRen;
 		$aktivitas->jumlahRealisasiPertemuan = $jumlahRea;
 		$aktivitas->save();

 		return redirect('datadosen')
			->with('status-aktivitas', 'Data telah berhasil disimpan');
 		
	}


	public function saveaktivitasmengajarsks()
	{
		Session::set('tab_dosen','aktivitas');
		$aktivitassks = new tbaktivitasdosenmengajars;
		$input	  = Input::all();
		$validator = Validator::make($input, tbaktivitasdosenmengajars::$rules, tbaktivitasdosenmengajars::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
		

 		$idprodi= Input::get('idprodi');
 		$tahunAkademik= Input::get('tahunAkademik');
 		$nip= Input::get('nip');
 		$sks_PSsendiri= Input::get('sks_PSsendiri');
 		$sks_PSLainPTsendiri = Input::get('sks_PSLainPTsendiri');
 		$sks_PTLain= Input::get('sks_PTLain');
 		$sks_penelitian =Input::get('sks_penelitian');
 		$sks_Pengabdian =Input::get('sks_Pengabdian');
 		$sks_man_PSsendiri =Input::get('sks_man_PSsendiri');
 		$sks_man_PTlain =Input::get('sks_man_PTlain');
 		
 		$aktivitassks->idprodi = $idprodi;
 		$aktivitassks->tahunAkademik = $tahunAkademik;
 		$aktivitassks->nip = $nip;
 		$aktivitassks->sks_PSsendiri = $sks_PSsendiri;
 		$aktivitassks->sks_PSLainPTsendiri = $sks_PSLainPTsendiri;
 		$aktivitassks->sks_PTLain = $sks_PTLain;
 		$aktivitassks->sks_penelitian = $sks_penelitian;
 		$aktivitassks->sks_Pengabdian = $sks_Pengabdian;
 		$aktivitassks->sks_man_PSsendiri = $sks_man_PSsendiri;
 		$aktivitassks->sks_man_PTlain = $sks_man_PTlain;
 		$aktivitassks->save();

 		
 		return redirect('datadosen')
			->with('status-aktivitas', 'Data telah berhasil disimpan');
	}
	
	public function delaktivitasmengajar($id)
	{
		Session::set('tab_dosen','aktivitas');
		$aktivitas = tbaktivitasmengajars::find($id);
		$aktivitas->delete();

		//redirect
		return redirect('datadosen')
			->with('status-aktivitas', 'Data telah berhasil dihapus');
	}

	public function delaktivitasmengajarsks($id)
	{
		Session::set('tab_dosen','aktivitas');
		$aktivitassks = tbaktivitasdosenmengajars::find($id);
		$aktivitassks->delete();

		//redirect
		return redirect('datadosen')
			->with('status-aktivitas', 'Data telah berhasil dihapus');
	}
	
	public function editaktivitasmengajar($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$aktivitas = tbaktivitasmengajars::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$aktivitas = tbaktivitasmengajars::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$aktivitas = tbaktivitasmengajars::where('id',$id)->get(); 
		}	
		
		Session::set('tab_dosen','aktivitas');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st4.editaktivitasmengajar', compact('aktivitas','menu','menu2','Akses','buka', 'level'));

		}
		
	}

	public function editaktivitasmengajarsks($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$aktivitassks = tbaktivitasdosenmengajars::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$aktivitassks = tbaktivitasdosenmengajars::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$aktivitassks = tbaktivitasdosenmengajars::where('id',$id)->get(); 
		}	
		
		Session::set('tab_dosen','aktivitas');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st4.editaktivitasmengajarsks', compact('aktivitassks','menu','menu2','Akses','buka', 'level'));

		}
		
		

	}
	
	public function updateaktivitasmengajar()
	{
		Session::set('tab_dosen','aktivitas');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbaktivitasmengajars::$rules, tbaktivitasmengajars::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
 		

 		DB::table('tbaktivitasmengajars')->where('id', $id)->update(array(

                  'tahunAkademik' => Input::get('tahunAkademik'),
                  'jumlahKelas' => Input::get('jumlahKelas'),
                  'jumlahRencanaPertemuan' => Input::get('jumlahRencanaPertemuan'),
                  'jumlahRealisasiPertemuan' => Input::get('jumlahRealisasiPertemuan')

            ));
 		return redirect('datadosen')
			->with('status-aktivitas', 'Data telah berhasil diedit');
 	}


 	public function updateaktivitasmengajarsks()
	{
		Session::set('tab_dosen','aktivitas');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbaktivitasdosenmengajars::$rules, tbaktivitasdosenmengajars::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
 		

 		DB::table('tbaktivitasdosenmengajars')->where('id', $id)->update(array(
 				  'tahunAkademik' => Input::get('tahunAkademik'),
                  'sks_PSsendiri' => Input::get('sks_PSsendiri'),
                  'sks_PSLainPTsendiri' => Input::get('sks_PSLainPTsendiri'),
                  'sks_PTLain' => Input::get('sks_PTLain'),
                  'sks_penelitian' => Input::get('sks_penelitian'),
                  'sks_Pengabdian' => Input::get('sks_Pengabdian'),
                  'sks_man_PSsendiri' => Input::get('sks_man_PSsendiri'),
                  'sks_man_PTlain' => Input::get('sks_man_PTlain')


            ));
 		return redirect('datadosen')
			->with('status-aktivitas', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	

	// kegiatantenagaahli -=============================================================

	public function addkegiatantenagaahli()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
			
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_dosen','tenaga');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st4.formkegiatantenagaahli', compact('masterprodis','menu','menu2','Akses','buka','level'));
			
		}

		
	}

	public function savekegiatantenagaahli()
	{
		Session::set('tab_dosen','tenaga');
		$tenagaahli = new tbtenagaahlis;
		$input	  = Input::all();
		$validator = Validator::make($input, tbtenagaahlis::$rules, tbtenagaahlis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$Tahun = Input::get('Tahun');
 		$namatenaga= Input::get('namaTenagaAhli');
 		$namakeg= Input::get('namaKegiatan');
 		$waktu= Input::get('waktu');
 		
 		$tenagaahli->idprodi = $idprodi;
 		$tenagaahli->Tahun = $Tahun;
 		$tenagaahli->namaTenagaAhli = $namatenaga;
 		$tenagaahli->namaKegiatan = $namakeg;
 		$tenagaahli->waktu = $waktu;
 		$tenagaahli->save();

 		return redirect('datadosen')
			->with('status-tenaga', 'Data telah berhasil disimpan');
 		
	}
	
	public function delkegiatantenagaahli($id)
	{
		Session::set('tab_dosen','tenaga');
		$tenagaahli = tbtenagaahlis::find($id);
		$tenagaahli->delete();

		//redirect
		return redirect('datadosen')
			->with('status-tenaga', 'Data telah berhasil dihapus');
	}
	
	public function editkegiatantenagaahli($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$tenagaahli = tbtenagaahlis::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tenagaahli = tbtenagaahlis::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$tenagaahli = tbtenagaahlis::where('id',$id)->get(); 
		}	
		
		Session::set('tab_dosen','tenaga');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st4.editkegiatantenagaahli', compact('tenagaahli','menu','menu2','Akses','buka', 'level'));

		}
		

	}
	
	public function updatekegiatantenagaahli()
	{
		Session::set('tab_dosen','tenaga');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbtenagaahlis::$rules, tbtenagaahlis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
 	

 		DB::table('tbtenagaahlis')->where('id', $id)->update(array(
 				  'Tahun' => Input::get('Tahun'),
                  'namaTenagaAhli' => Input::get('namaTenagaAhli'),
                  'namaKegiatan' => Input::get('namaKegiatan'),
                  'waktu' => Input::get('waktu')

            ));
 		return redirect('datadosen')
			->with('status-tenaga', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	
	
	
	// tugas belajar -=============================================================

	public function addtugasbelajar()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
			
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_dosen','tugasbelajar');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st4.formtugasbelajar', compact('masterprodis','menu','menu2','Akses','buka','level'));
			
		}

		return View::make('admin.formtugasbelajar')->with('data',$masterdosen)->with('data2',$masterprodis);
				
		
	}
	
	public function savetugasbelajar()
	{
		Session::set('tab_dosen','tugasbelajar');
		$tugas = new tbtugasbelajars;
		$input	  = Input::all();
		$validator = Validator::make($input, tbtugasbelajars::$rules, tbtugasbelajars::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$Tahun = Input::get('Tahun');
 		$nip= Input::get('nip');
 		$jenjang= Input::get('jenjang');
 		$bidangstudi= Input::get('bidangStudi');
 		$perguruan= Input::get('perguruanTinggi');
 		$negara= Input::get('negara');
 		$tahun= Input::get('tahunMulai');
 		
 		$tugas->idprodi = $idprodi;
 		$tugas->Tahun = $Tahun;
 		$tugas->nip = $nip;
 		$tugas->jenjang = $jenjang;
 		$tugas->bidangStudi = $bidangstudi;
 		$tugas->perguruanTinggi = $perguruan;
 		$tugas->negara = $negara;
 		$tugas->tahunMulai = $tahun;
 		$tugas->save();

 		return redirect('datadosen')
			->with('status-tugasbelajar', 'Data telah berhasil disimpan');
 		
	}
	
	public function deltugasbelajar($id)
	{
		Session::set('tab_dosen','tugasbelajar');
		$tugas = tbtugasbelajars::find($id);
		$tugas->delete();

		//redirect
		return redirect('datadosen')
			->with('status-tugasbelajar', 'Data telah berhasil dihapus');
	}
	
	public function edittugasbelajar($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$tugas = tbtugasbelajars::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tugas = tbtugasbelajars::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$tugas = tbtugasbelajars::where('id',$id)->get(); 
		}	
		
		Session::set('tab_dosen','tugasbelajar');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st4.edittugasbelajar', compact('tugas','menu','menu2','Akses','buka', 'level'));

		}
		

	}
	
	public function updatetugasbelajar()
	{
		Session::set('tab_dosen','tugasbelajar');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbtugasbelajars::$rules, tbtugasbelajars::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
 		

 		DB::table('tbtugasbelajars')->where('id', $id)->update(array(
 				  'Tahun' => Input::get('Tahun'),
                  'nip' => Input::get('nip'),
                  'jenjang' => Input::get('jenjang'),
                  'bidangStudi' => Input::get('bidangStudi'),
                  'perguruanTinggi' => Input::get('perguruanTinggi'),
                  'negara' => Input::get('negara'),
                  'tahunMulai' => Input::get('tahunMulai')

            ));
 		return redirect('datadosen')
			->with('status-tugasbelajar', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	
	
	
	//prestasidosen ============================================================
	
	public function addprestasidosen()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
			
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_dosen','prestasi');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st4.formprestasidosen', compact('masterprodis','menu','menu2','Akses','buka','level'));
			
		}

		
	}

	public function saveprestasidosen()
	{
		Session::set('tab_dosen','prestasi');
		$prestasi = new tbprestasidosens;
		$input	  = Input::all();
		$validator = Validator::make($input, tbprestasidosens::$rules, tbprestasidosens::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

		$idprodi= Input::get('idprodi');
		$Tahun= Input::get('Tahun');
 		$nip= Input::get('nip');
 		$prestasiDos= Input::get('prestasi');
 		$waktu= Input::get('waktu');
 		$tingkat= Input::get('tingkat');
 		
 		$prestasi->idprodi = $idprodi;
 		$prestasi->Tahun = $Tahun;
 		$prestasi->nip = $nip;
 		$prestasi->prestasi = $prestasiDos;
 		$prestasi->waktu = $waktu;
 		$prestasi->tingkat = $tingkat;
 		$prestasi->save();

 		return redirect('datadosen')
			->with('status-prestasi', 'Data telah berhasil disimpan');
 		
	}
	
	public function delprestasidosen($id)
	{
		Session::set('tab_dosen','prestasi');
		$prestasi = tbprestasidosens::find($id);
		$prestasi->delete();

		//redirect
		return redirect('datadosen')
			->with('status-prestasi', 'Data telah berhasil dihapus');
	}
	
	public function editprestasidosen($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$prestasi = tbprestasidosens::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$prestasi = tbprestasidosens::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$prestasi = tbprestasidosens::where('id',$id)->get(); 
		}	
		
		Session::set('tab_dosen','prestasi');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st4.editprestasidosen', compact('prestasi','menu','menu2','Akses','buka', 'level'));

		}
		
		

	}

	public function updateprestasidosen()
	{
		Session::set('tab_dosen','prestasi');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbprestasidosens::$rules, tbprestasidosens::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
 		

 		DB::table('tbprestasidosens')->where('id', $id)->update(array(
 				  'Tahun' => Input::get('Tahun'),
                  'nip' => Input::get('nip'),
                  'prestasi' => Input::get('prestasi'),
                  'waktu' => Input::get('waktu'),
                  'tingkat' => Input::get('tingkat')
                  
            ));
 		return redirect('datadosen')
			->with('status-prestasi', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	
	
	
	
	
	// organisasiprofesi ========================================
	
	public function addorganisasiprofesi()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
			
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_dosen','organisasi');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st4.formorganisasiprofesi', compact('masterprodis','menu','menu2','Akses','buka','level'));
			
		}
			
		
	}

	public function saveorganisasiprofesi()
	{
		Session::set('tab_dosen','organisasi');
		$organisasiprof = new tborganisasiprofesis;
		$input	  = Input::all();
		$validator = Validator::make($input, tborganisasiprofesis::$rules, tborganisasiprofesis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

		$idprodi= Input::get('idprodi');
		$Tahun= Input::get('Tahun');
 		$nip= Input::get('nip');
 		$namaOrg= Input::get('namaOrganisasi');
 		$waktuM= Input::get('waktuMulai');
 		$waktuS= Input::get('waktuSelesai');
 		$tingkat= Input::get('tingkat');
 		
 		$organisasiprof->idprodi = $idprodi;
 		$organisasiprof->Tahun = $Tahun;
 		$organisasiprof->nip = $nip;
 		$organisasiprof->namaOrganisasi = $namaOrg;
 		$organisasiprof->waktuMulai = $waktuM;
 		$organisasiprof->waktuSelesai = $waktuS;
 		$organisasiprof->tingkat = $tingkat;
 		$organisasiprof->save();

 		return redirect('datadosen')
			->with('status-organisasi', 'Data telah berhasil disimpan');
 		
	}
	
	public function delorganisasiprofesi($id)
	{
		Session::set('tab_dosen','organisasi');
		$organisasiprof = tborganisasiprofesis::find($id);
		$organisasiprof->delete();

		//redirect
		return redirect('datadosen')
			->with('status-organisasi', 'Data telah berhasil dihapus');
	}
	
	public function editorganisasiprofesi($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$organisasiprof = tborganisasiprofesis::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$organisasiprof = tborganisasiprofesis::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$organisasiprof = tborganisasiprofesis::where('id',$id)->get(); 
		}	
		
		Session::set('tab_dosen','organisasi');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st4.editorganisasiprofesi', compact('organisasiprof','menu','menu2','Akses','buka', 'level'));

		}
		

	}
	
	public function updateorganisasiprofesi()
	{
		Session::set('tab_dosen','organisasi');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tborganisasiprofesis::$rules, tborganisasiprofesis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
 		

 		DB::table('tborganisasiprofeses')->where('id', $id)->update(array(
 				  'Tahun' => Input::get('Tahun'),
                  'nip' => Input::get('nip'),
                  'namaOrganisasi' => Input::get('namaOrganisasi'),
                  'waktuMulai' => Input::get('waktuMulai'),
                  'waktuSelesai' => Input::get('waktuSelesai'),
                  'tingkat' => Input::get('tingkat')
                  
            ));
 		return redirect('datadosen')
			->with('status-organisasi', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	
	// pendidikan dosen =====================================================
	
	public function addpendidikandosen()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		$keahlian = masterdosens::groupBy('bidangKeahlian')->get();
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_dosen','pendidikan');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st4.formpendidikandosen', compact('masterprodis','keahlian','menu','menu2','Akses','buka','level'));
			
		}
			
		
	}

	public function savependidikandosen()
	{
		Session::set('tab_dosen','pendidikan');
		$pendidikan = new tbpendidikandosens;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpendidikandosens::$rules, tbpendidikandosens::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

		$idprodi		= Input::get('idprodi');
 		$nip			= Input::get('nip');
 		$jenjang		= Input::get('jenjang');
 		$namaSekolah	= Input::get('namaSekolah');
 		$bidkeahlian	= Input::get('bidangKeahlian');
 		$gelar			= Input::get('gelar');
 		
 		$pendidikan->idprodi 		= $idprodi;
 		$pendidikan->nip 			= $nip;
 		$pendidikan->jenjang 		= $jenjang;
 		$pendidikan->namaSekolah 	= $namaSekolah;
 		$pendidikan->bidangKeahlian = $bidkeahlian;
 		$pendidikan->gelar 			= $gelar;
 		$pendidikan->save();

 		return redirect('datadosen')
			->with('status-pendidikan', 'Data telah berhasil disimpan');
 		
	}
	
	public function delpendidikandosen($id)
	{
		Session::set('tab_dosen','pendidikan');
		$pendidikan = tbpendidikandosens::find($id);
		$pendidikan->delete();

		//redirect
		return redirect('datadosen')
			->with('status-pendidikan', 'Data telah berhasil dihapus');
	}
	
	
	public function editpendidikandosen($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		$keahlian = masterdosens::groupBy('bidangKeahlian')->get();
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$pendidikan = tbpendidikandosens::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$pendidikan = tbpendidikandosens::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$pendidikan = tbpendidikandosens::where('id',$id)->get(); 
		}	
		
		Session::set('tab_dosen','pendidikan');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st4.editpendidikandosen', compact('pendidikan','keahlian','menu','menu2','Akses','buka', 'level'));

		}
		
	}
	
	public function updatependidikandosen()
	{
		Session::set('tab_dosen','pendidikan');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbpendidikandosens::$rules, tbpendidikandosens::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

 		DB::table('tbpendidikandosens')->where('id', $id)->update(array(
                  'jenjang' => Input::get('jenjang'),
                  'namaSekolah' => Input::get('namaSekolah'),
                  'bidangKeahlian' => Input::get('bidangKeahlian'),
                  'gelar' => Input::get('gelar')
                  
            ));
 		return redirect('datadosen')
			->with('status-pendidikan', 'Data telah berhasil diedit');
 	}
	
	
	
	
	// upaya =====================================================
	
	public function addupayatenagakependidikan()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_dosen','upaya');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st4.formupayatenagakependidikan', compact('masterprodis','keahlian','menu','menu2','Akses','buka','level'));
			
		}

		
		
	}

	public function saveupayatenagakependidikan()
	{
		Session::set('tab_dosen','upaya');
		$upaya = new tbupayatenagakependidikans;
		$input	  = Input::all();
		$validator = Validator::make($input, tbupayatenagakependidikans::$rules, tbupayatenagakependidikans::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

 		$idprodi= Input::get('idprodi');
 		$upayaTenagaKependidikan= Input::get('upayaTenagaKependidikan');

 		$upaya->idprodi = $idprodi;
 		$upaya->upayaTenagaKependidikan = $upayaTenagaKependidikan;
 		$upaya->save();

 		return redirect('datadosen')
			->with('status-upaya', 'Data telah berhasil disimpan');
 		
	}

	public function delupayatenagakependidikan($id)
	{
		Session::set('tab_dosen','upaya');
		$upaya = tbupayatenagakependidikans::find($id);
		$upaya->delete();

		//redirect
		return redirect('datadosen')
			->with('status-upaya', 'Data telah berhasil dihapus');
	}

	public function editupayatenagakependidikan($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$upaya = tbupayatenagakependidikans::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$upaya = tbupayatenagakependidikans::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$upaya = tbupayatenagakependidikans::where('id',$id)->get(); 
		}	
		
		Session::set('tab_dosen','upaya');
		$menu = "st4"; //nama menu
		$menu2 = "datadosen"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st4.editupayatenagakependidikan', compact('upaya','menu','menu2','Akses','buka', 'level'));

		}
		

	}

	public function updateupayatenagakependidikan()
	{
 		Session::set('tab_dosen','upaya');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbupayatenagakependidikans::$rules, tbupayatenagakependidikans::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		DB::table('tbupayatenagakependidikans')->where('id', $id)->update(array(
                  'upayaTenagaKependidikan' => Input::get('upayaTenagaKependidikan')

            ));
 		return redirect('datadosen')
			->with('status-upaya', 'Data telah berhasil diedit');
 	}

}
