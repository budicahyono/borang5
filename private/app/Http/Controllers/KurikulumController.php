<?php namespace App\Http\Controllers;

use App\tbkompetensis;
use App\tbmkpilihans;
use App\tbpraktikums;
use App\tbpeninjauankurikulums;
use App\tbhasilpeninjauankurikulums;

use App\masterprodis;
use App\masterkurikulums;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;
 
class KurikulumController extends Controller {

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
			$kompetensi = tbkompetensis::where('idprodi', '=', $prodi)->get(); 
			$matkulpil = tbmkpilihans::where('idprodi', '=', $prodi)->get(); 
			$praktikum = tbpraktikums::where('idprodi', '=', $prodi)->get(); 
			$peninjauan = tbpeninjauankurikulums::where('idprodi', '=', $prodi)->get(); 
			$hasil = tbhasilpeninjauankurikulums::where('idprodi', '=', $prodi)->get(); 
		} else	if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$kompetensi = tbkompetensis::where('idprodi', 'like', $prodi.'%')->get(); 
			$matkulpil = tbmkpilihans::where('idprodi', 'like', $prodi.'%')->get(); 
			$praktikum = tbpraktikums::where('idprodi', 'like', $prodi.'%')->get(); 
			$peninjauan = tbpeninjauankurikulums::where('idprodi', 'like', $prodi.'%')->get(); 
			$hasil = tbhasilpeninjauankurikulums::where('idprodi', 'like', $prodi.'%')->get(); 
		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();
			$kompetensi = tbkompetensis::all();
			$matkulpil = tbmkpilihans::all();
			$praktikum = tbpraktikums::all();
			$peninjauan = tbpeninjauankurikulums::all();
			$hasil = tbhasilpeninjauankurikulums::all();
		}	
		
		$menu = "st5"; //nama menu
		$menu2 = "kurikulum"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.kurikulum', compact('menu', 'menu2','kompetensi','matkulpil','praktikum','peninjauan','hasil','Akses','buka'));
		}
		
	}

	

	



	// kompetensi ====================================================================
	public function addkompetensi()
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
		
		Session::set('tab_kurikulum','kompetensi');
		$menu = "st5"; //nama menu
		$menu2 = "kurikulum"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.formkompetensi', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
		
		
	}
	
	public function savekompetensi()
	{
		Session::set('tab_kurikulum','kompetensi');
		$kompetensi = new tbkompetensis;
		$input	  = Input::all();
		$validator = Validator::make($input, tbkompetensis::$rules, tbkompetensis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
 		$idprodi= Input::get('idprodi');
 		$kompetensiU= Input::get('kompetensiUtama');
 		$kompetensiP= Input::get('kompetensiPendukung');
 		$kompetensiL= Input::get('kompetensiLain');
 		

 		$kompetensi->idprodi = $idprodi;
 		$kompetensi->kompetensiUtama = $kompetensiU;
 		$kompetensi->kompetensiPendukung= $kompetensiP;
 		$kompetensi->kompetensiLain = $kompetensiL;
 		$kompetensi->save();

 		return redirect('kurikulum')
			->with('status-kompetensi', 'Data telah berhasil disimpan');
 		
	}
	
	public function delkompetensi($id)
	{
		Session::set('tab_kurikulum','kompetensi');
		$kompetensi = tbkompetensis::find($id);
		$kompetensi->delete();

		//redirect
		return redirect('kurikulum')
			->with('status-kompetensi', 'Data telah berhasil dihapus');
	}
	
	public function editkompetensi($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$kompetensi = tbkompetensis::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$kompetensi = tbkompetensis::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$kompetensi = tbkompetensis::where('id',$id)->get(); 
		}	
		
		Session::set('tab_kurikulum','kompetensi');
		$menu = "st5"; //nama menu
		$menu2 = "kurikulum"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st5.editkompetensi', compact('kompetensi','menu','menu2','Akses','buka', 'level'));

		}	
		
		

	}
	
	public function updatekompetensi()
	{
		Session::set('tab_kurikulum','kompetensi');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbkompetensis::$rules, tbkompetensis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
		
		DB::table('tbkompetenses')->where('id', $id)->update(array(
                  'kompetensiUtama' => Input::get('kompetensiUtama'),
                  'kompetensiPendukung' => Input::get('kompetensiPendukung'),
                  'kompetensiLain' => Input::get('kompetensiLain')               

            ));
 		return redirect('kurikulum')
			->with('status-kompetensi', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	
	// matkulpil =======================================================================
	public function addmatkulpil()
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
		
		Session::set('tab_kurikulum','matkulpil');
		$menu = "st5"; //nama menu
		$menu2 = "kurikulum"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.formmatkulpil', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}

			
		
		
	}
	
	public function savematkulpil()
	{
		Session::set('tab_kurikulum','matkulpil');
		$matkulpil = new tbmkpilihans;
		$input	  = Input::all();
		$validator = Validator::make($input, tbmkpilihans::$rules, tbmkpilihans::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$tahun= Input::get('tahunAkademik');
 		$namaMKP= Input::get('namaMKPilihan');
 		$bbt1= Input::get('bobotsks');
 		$bbt2= Input::get('bobottugas');
 		$idfakultas= Input::get('Unit');
 		$semester= Input::get('Semester');
 		$idmk= Input::get('idmatakuliah');
 		
 		$matkulpil->idprodi = $idprodi;
 		$matkulpil->tahunAkademik = $tahun;
 		$matkulpil->namaMKPilihan = $namaMKP;
 		$matkulpil->bobotsks = $bbt1;
 		$matkulpil->bobottugas = $bbt2;
 		$matkulpil->Unit = $idfakultas;
 		$matkulpil->Semester = $semester;
 		$matkulpil->idmatakuliah= $idmk;
 		$matkulpil->save();

 		return redirect('kurikulum')
			->with('status-matkulpil', 'Data telah berhasil disimpan');
 		
	}
	
	public function delmatkulpil($id)
	{
		Session::set('tab_kurikulum','matkulpil');
		$matkulpil = tbmkpilihans::find($id);
		$matkulpil->delete();

		//redirect
		return redirect('kurikulum')
			->with('status-matkulpil', 'Data telah berhasil dihapus');
	}
	
	public function editmatkulpil($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$matkulpil = tbmkpilihans::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$matkulpil = tbmkpilihans::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$matkulpil = tbmkpilihans::where('id',$id)->get(); 
		}	
		
		Session::set('tab_kurikulum','matkulpil');
		$menu = "st5"; //nama menu
		$menu2 = "kurikulum"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st5.editmatkulpil', compact('matkulpil','menu','menu2','Akses','buka', 'level'));

		}	
		
		

	}
	
	public function updatematkulpil()
	{
		Session::set('tab_kurikulum','matkulpil');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbmkpilihans::$rules, tbmkpilihans::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
 		
		DB::table('tbmkpilihans')->where('id', $id)->update(array(
                  'tahunAkademik' => Input::get('tahunAkademik'),
                  'namaMKPilihan' => Input::get('namaMKPilihan'),
                  'bobotsks' => Input::get('bobotsks'),
                  'bobottugas' => Input::get('bobottugas'),
                  'Unit' => Input::get('Unit'),
                  'Semester' => Input::get('Semester'),
                          

            ));
 		return redirect('kurikulum')
			->with('status-matkulpil', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	
	// praktikum ===========================================================================

	public function addpraktikum()
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
		
		Session::set('tab_kurikulum','praktikum');
		$menu = "st5"; //nama menu
		$menu2 = "kurikulum"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.formpraktikum', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
			

	}
	
	public function savepraktikum()
	{
		Session::set('tab_kurikulum','praktikum');
		$praktikum = new tbpraktikums;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpraktikums::$rules, tbpraktikums::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$idmatakuliah= Input::get('idmatakuliah');
 		$namaPrak= Input::get('namaPraktikum');
 		$judulMod= Input::get('judulModul');
 		$jam= Input::get('jamPelaksanaan');
 		$lokasi= Input::get('lokasi');
 	
 		$praktikum->idprodi = $idprodi;
 		$praktikum->idmatakuliah = $idmatakuliah;
 		$praktikum->namaPraktikum= $namaPrak;
 		$praktikum->judulModul = $judulMod;
 		$praktikum->jamPelaksanaan = $jam;
 		$praktikum->lokasi = $lokasi;
 		$praktikum->save();


 		return redirect('kurikulum')
			->with('status-praktikum', 'Data telah berhasil disimpan');
 		
	}
	
	public function delpraktikum($id)
	{
		Session::set('tab_kurikulum','praktikum');
		$praktikum = tbpraktikums::find($id);
		$praktikum->delete();

		//redirect
		return redirect('kurikulum')
			->with('status-praktikum', 'Data telah berhasil dihapus');
	}
	
	public function editpraktikum($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$praktikum = tbpraktikums::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$praktikum = tbpraktikums::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$praktikum = tbpraktikums::where('id',$id)->get(); 
		}	
		
		Session::set('tab_kurikulum','praktikum');
		$menu = "st5"; //nama menu
		$menu2 = "kurikulum"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st5.editpraktikum', compact('praktikum','menu','menu2','Akses','buka', 'level'));

		}	
		

	}
	
	public function updatepraktikum()
	{
 		Session::set('tab_kurikulum','praktikum');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbpraktikums::$rules, tbpraktikums::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
		
		DB::table('tbpraktikums')->where('id', $id)->update(array(
                  'idmatakuliah' => Input::get('idmatakuliah'),
                  'namaPraktikum' => Input::get('namaPraktikum'),
                  'judulModul' => Input::get('judulModul'),
                  'jamPelaksanaan' => Input::get('jamPelaksanaan'),   
                  'lokasi' => Input::get('lokasi')           

            ));
 		return redirect('kurikulum')
			->with('status-praktikum', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	
	
	// peninjauankurikulum ====================================================================

	public function addpeninjauankurikulum()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		$kurikulum = masterkurikulums::all();	
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_kurikulum','peninjauan');
		$menu = "st5"; //nama menu
		$menu2 = "kurikulum"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.formpeninjauankurikulum', compact('masterprodis','kurikulum','menu','menu2','Akses','buka','level'));
		}
			
		
	}

	public function savepeninjauankurikulum()
	{
		Session::set('tab_kurikulum','peninjauan');
		$peninjauan = new tbpeninjauankurikulums;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpeninjauankurikulums::$rules, tbpeninjauankurikulums::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$tahun= Input::get('Tahun');
 		$idkurikulum= Input::get('idkurikulum');
 		$mekanisme= Input::get('mekanisme');
		
 		$peninjauan->idprodi = $idprodi;
 		$peninjauan->tahun = $tahun;
 		$peninjauan->idkurikulum= $idkurikulum;
 		$peninjauan->mekanisme = $mekanisme;
 		$peninjauan->save();
 		


 		return redirect('kurikulum')
			->with('status-peninjauan', 'Data telah berhasil disimpan');
 		
	}
	
	public function delpeninjauankurikulum($id)
	{
		Session::set('tab_kurikulum','peninjauan');
		$peninjauan = tbpeninjauankurikulums::find($id);
		$peninjauan->delete();

		//redirect
		return redirect('kurikulum')
			->with('status-peninjauan', 'Data telah berhasil dihapus');
	}
	
	public function editpeninjauankurikulum($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		$kurikulum = masterkurikulums::all();	
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$peninjauan = tbpeninjauankurikulums::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$peninjauan = tbpeninjauankurikulums::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$peninjauan = tbpeninjauankurikulums::where('id',$id)->get(); 
		}	
		
		Session::set('tab_kurikulum','peninjauan');
		$menu = "st5"; //nama menu
		$menu2 = "kurikulum"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st5.editpeninjauankurikulum', compact('peninjauan','kurikulum','menu','menu2','Akses','buka', 'level'));

		}	
		
		

	}
	
	public function updatepeninjauankurikulum()
	{
 		Session::set('tab_kurikulum','peninjauan');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbpeninjauankurikulums::$rules, tbpeninjauankurikulums::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	

		DB::table('tbpeninjauankurikulums')->where('id', $id)->update(array(
				  'tahun' => Input::get('tahun'),
                  'idkurikulum' => Input::get('idkurikulum'),
                  'mekanisme' => Input::get('mekanisme')
            ));
 		return redirect('kurikulum')
			->with('status-peninjauan', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	
	// hasilpeninjauan ======================================================================
	
	public function addhasilpeninjauankurikulum()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		$peninjauan = tbpeninjauankurikulums::all();
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_kurikulum','hasil');
		$menu = "st5"; //nama menu
		$menu2 = "kurikulum"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.formhasilpeninjauankurikulum', compact('masterprodis','peninjauan','menu','menu2','Akses','buka','level'));
		}
		
	}

	public function savehasilpeninjauankurikulum()
	{
		Session::set('tab_kurikulum','hasil');
		$hasilpeninjauan = new tbhasilpeninjauankurikulums;
		$input	  = Input::all();
		$validator = Validator::make($input, tbhasilpeninjauankurikulums::$rules, tbhasilpeninjauankurikulums::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

		$idprodi= Input::get('idprodi');
		$idpeninjauan= Input::get('idpeninjauan');
 		$idmatakuliah= Input::get('idmatakuliah');
 		$status= Input::get('statusMK');
 		$perubahan= Input::get('perubahanPada');
 		$isi= Input::get('isiPerubahan');
 		$alasan= Input::get('alasanPeninjauan');
 		$atas= Input::get('atasUsulan');
 		$semester= Input::get('semesterBerlaku');
 		$tahun= Input::get('tahunBerlaku');

 		$hasilpeninjauan->idprodi = $idprodi;
 		$hasilpeninjauan->idpeninjauan = $idpeninjauan;
 		$hasilpeninjauan->idmatakuliah = $idmatakuliah;
 		$hasilpeninjauan->statusMK= $status;
 		$hasilpeninjauan->perubahanPada = $perubahan;
 		$hasilpeninjauan->isiPerubahan = $isi;
 		$hasilpeninjauan->alasanPeninjauan = $alasan;
 		$hasilpeninjauan->atasUsulan= $atas;
 		$hasilpeninjauan->semesterBerlaku = $semester;
 		$hasilpeninjauan->tahunBerlaku = $tahun;
 		$hasilpeninjauan->save();
 		
		return redirect('kurikulum')
			->with('status-hasil', 'Data telah berhasil disimpan');
 		
	}

	public function delhasilpeninjauankurikulum($id)
	{
		Session::set('tab_kurikulum','hasil');
		$hasilpeninjauan = tbhasilpeninjauankurikulums::find($id);
		$hasilpeninjauan->delete();

		//redirect
		return redirect('kurikulum')
			->with('status-hasil', 'Data telah berhasil dihapus');
	}

	public function edithasilpeninjauankurikulum($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		$peninjauan = tbpeninjauankurikulums::all();
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$hasilpeninjauan = tbhasilpeninjauankurikulums::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$hasilpeninjauan = tbhasilpeninjauankurikulums::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$hasilpeninjauan = tbhasilpeninjauankurikulums::where('id',$id)->get(); 
		}	
		
		Session::set('tab_kurikulum','hasil');
		$menu = "st5"; //nama menu
		$menu2 = "kurikulum"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st5.edithasilpeninjauankurikulum', compact('hasilpeninjauan','peninjauan','menu','menu2','Akses','buka', 'level'));

		}	
		

	}

	public function updatehasilpeninjauankurikulum()
	{
 		Session::set('tab_kurikulum','hasil');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbhasilpeninjauankurikulums::$rules, tbhasilpeninjauankurikulums::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
		
		DB::table('tbhasilpeninjauankurikulums')->where('id', $id)->update(array(
                  'statusMK' => Input::get('statusMK'),
                  'perubahanPada' => Input::get('perubahanPada'),
                  'isiPerubahan' => Input::get('isiPerubahan'),
                  'alasanPeninjauan' => Input::get('alasanPeninjauan'),
                  'atasUsulan' => Input::get('atasUsulan'),
                  'semesterBerlaku' => Input::get('semesterBerlaku'),
                  'tahunBerlaku' => Input::get('tahunBerlaku')
            ));
 		return redirect('kurikulum')
			->with('status-hasil', 'Data telah berhasil diedit');
 	}	


}
