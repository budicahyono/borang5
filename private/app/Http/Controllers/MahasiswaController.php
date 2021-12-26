<?php namespace App\Http\Controllers;


use App\tbmhsregulers;
use App\tbmhsnonregulers;
use App\tbprestasimahasiswas;
use App\tbjumlahmahasiswas;
use App\tblayananmahasiswas;

use App\masterprodis;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;

class MahasiswaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	
	// mahasiswa index =========================================================================	
	public function index()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$mahasiswareg = tbmhsregulers::where('idprodi', '=', $prodi)->get(); 
			$mahasiswanonreg = tbmhsnonregulers::where('idprodi', '=', $prodi)->get(); 
			$prestasimhs = tbprestasimahasiswas::where('idprodi', '=', $prodi)->get(); 
			$jumlahmhs = tbjumlahmahasiswas::where('idprodi', '=', $prodi)->get(); 
			$layananmhs = tblayananmahasiswas::where('idprodi', '=', $prodi)->get(); 
		} else if ($level == "fakultas") {
			$mahasiswareg = tbmhsregulers::where('idprodi', 'like', $prodi.'%')->get(); 
			$mahasiswanonreg = tbmhsnonregulers::where('idprodi', 'like', $prodi.'%')->get(); 
			$prestasimhs = tbprestasimahasiswas::where('idprodi', 'like', $prodi.'%')->get(); 
			$jumlahmhs = tbjumlahmahasiswas::where('idprodi', 'like', $prodi.'%')->get(); 
			$layananmhs = tblayananmahasiswas::where('idprodi', 'like', $prodi.'%')->get(); 			
		} else if ($level == "admin") {
			$mahasiswareg = tbmhsregulers::all();
			$mahasiswanonreg = tbmhsnonregulers::all ();
			$prestasimhs = tbprestasimahasiswas::all ();
			$jumlahmhs = tbjumlahmahasiswas::all ();
			$layananmhs = tblayananmahasiswas::all();
		}	
		
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st3.mahasiswa', compact('menu', 'menu2','mahasiswareg','mahasiswanonreg','prestasimhs','jumlahmhs','layananmhs','Akses','buka'));
		}
		
	}
	
	
	
	
	
	// mahasiswa reguler =========================================================================	
	
	public function addmahasiswareg()
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
		
		Session::set('tab_mhs','mahasiswareg');
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st3.formmahasiswareg', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
		
	}
	
	public function savemahasiswareg()
	{
		Session::set('tab_mhs','mahasiswareg');
		$mahasiswareg = new tbmhsregulers;
		$input	  = Input::all();
		$validator = Validator::make($input, tbmhsregulers::$rules, tbmhsregulers::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
 		$idprodi 				= Input::get('idprodi');
 		$tahunAkademik 			= Input::get('tahunAkademik');
 		$dayaTampung			= Input::get('dayaTampung');
 		$calonMahasiswaIkut		= Input::get('calonMahasiswaIkut');
 		$calonMahasiswaLulus	= Input::get('calonMahasiswaLulus');
 		$mahasiswaBaruReguler	= Input::get('mahasiswaBaruReguler');
 		$mahasiswaBaruTransfer	= Input::get('mahasiswaBaruTransfer');
 		$totalMahasiswaReguler	= Input::get('totalMahasiswaReguler');
 		$totalMahasiswaTransfer	= Input::get('totalMahasiswaTransfer');
 		$mahasiswaLulusReguler	= Input::get('mahasiswaLulusReguler');
 		$mahasiswaLulusTransfer	= Input::get('mahasiswaLulusTransfer');
 		$ipkLulusMinimum		= Input::get('ipkLulusMinimum');
 		$ipkLulusRerata			= Input::get('ipkLulusRerata');
 		$ipkLulusMaksimum		= Input::get('ipkLulusMaksimum');
 		$persenIPK1				= Input::get('persenIPK1');
 		$persenIPK2				= Input::get('persenIPK2');
 		$persenIPK3				= Input::get('persenIPK3');
 		

 		$mahasiswareg->idprodi 					= $idprodi;
 		$mahasiswareg->tahunAkademik			= $tahunAkademik;
 		$mahasiswareg->dayaTampung				= $dayaTampung;
 		$mahasiswareg->calonMahasiswaIkut		= $calonMahasiswaIkut;
 		$mahasiswareg->calonMahasiswaLulus		= $calonMahasiswaLulus;
 		$mahasiswareg->mahasiswaBaruReguler		= $mahasiswaBaruReguler;
 		$mahasiswareg->mahasiswaBaruTransfer	= $mahasiswaBaruTransfer;
 		$mahasiswareg->totalMahasiswaReguler	= $totalMahasiswaReguler;
 		$mahasiswareg->totalMahasiswaTransfer	= $totalMahasiswaTransfer;
 		$mahasiswareg->mahasiswaLulusReguler	= $mahasiswaLulusReguler;
 		$mahasiswareg->mahasiswaLulusTransfer	= $mahasiswaLulusTransfer;
 		$mahasiswareg->ipkLulusMinimum			= $ipkLulusMinimum;
 		$mahasiswareg->ipkLulusRerata			= $ipkLulusRerata;
 		$mahasiswareg->ipkLulusMaksimum			= $ipkLulusMaksimum;
 		$mahasiswareg->persenIPK1				= $persenIPK1;
 		$mahasiswareg->persenIPK2				= $persenIPK2;
 		$mahasiswareg->persenIPK3				= $persenIPK3;
 		
 		$mahasiswareg->save();
 		return redirect('mahasiswa')
			->with('status-mhsreg', 'Data telah berhasil disimpan');

	}
	
	public function delmahasiswareg($id)
	{
		Session::set('tab_mhs','mahasiswareg');
		$mahasiswareg = tbmhsregulers::find($id);
		$mahasiswareg->delete();
		//redirect
		return redirect('mahasiswa')
			->with('status-mhsreg', 'Data telah berhasil dihapus');
	
 		
	}
	
	
	public function editmahasiswareg($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$mahasiswareg = tbmhsregulers::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$mahasiswareg = tbmhsregulers::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$mahasiswareg = tbmhsregulers::where('id',$id)->get(); 
		}	
		
		Session::set('tab_mhs','mahasiswareg');
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st3.editmahasiswareg', compact('mahasiswareg','menu','menu2','Akses','buka', 'level'));

		}
	
	}

	public function updatemahasiswareg()
	{
		Session::set('tab_mhs','mahasiswareg');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbmhsregulers::$rules, tbmhsregulers::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		DB:: table('tbmhsregulers')->where('id', $id)->update(array(
	 		'tahunAkademik' 			=> Input::get('tahunAkademik'),
	 		'dayaTampung'				=> Input::get('dayaTampung'),
	 		'calonMahasiswaIkut'		=> Input::get('calonMahasiswaIkut'),
	 		'calonMahasiswaLulus'		=> Input::get('calonMahasiswaLulus'),
	 		'mahasiswaBaruReguler'		=> Input::get('mahasiswaBaruReguler'),
	 		'mahasiswaBaruTransfer'		=> Input::get('mahasiswaBaruTransfer'),
	 		'totalMahasiswaReguler'		=> Input::get('totalMahasiswaReguler'),
	 		'totalMahasiswaTransfer'	=> Input::get('totalMahasiswaTransfer'),
	 		'mahasiswaLulusReguler'		=> Input::get('mahasiswaLulusReguler'),
	 		'mahasiswaLulusTransfer'	=> Input::get('mahasiswaLulusTransfer'),
	 		'ipkLulusMinimum'			=> Input::get('ipkLulusMinimum'),
	 		'ipkLulusRerata'			=> Input::get('ipkLulusRerata'),
	 		'ipkLulusMaksimum'			=> Input::get('ipkLulusMaksimum'),
	 		'persenIPK1'				=> Input::get('persenIPK1'),
	 		'persenIPK2'				=> Input::get('persenIPK2'),
	 		'persenIPK3'				=> Input::get('persenIPK3')));

		return redirect('mahasiswa')
			->with('status-mhsreg', 'Data telah berhasil diedit');

	}

	public function detailmahasiswareg($id) {
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$mahasiswareg = tbmhsregulers::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$mahasiswareg = tbmhsregulers::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$mahasiswareg = tbmhsregulers::where('id',$id)->get(); 
		}	
		
		Session::set('tab_mhs','mahasiswareg');
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st3.detailmahasiswareg', compact('mahasiswareg','menu','menu2','Akses','buka', 'level'));

		}
	}
	
	
	
	
	
	// mahasiswa non reguler =========================================================================	
	
	public function addmahasiswanonreg()
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
		
		Session::set('tab_mhs','mahasiswanonreg');
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st3.formmahasiswanonreg', compact('masterprodis','menu','menu2','Akses','buka','level'));
			
		}
		
	}
	
	public function savemahasiswanonreg()
	{	
		Session::set('tab_mhs','mahasiswanonreg');
		$mahasiswanonreg = new tbmhsnonregulers;
		$input	  = Input::all();
		$validator = Validator::make($input, tbmhsnonregulers::$rules, tbmhsnonregulers::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
 		$idprodi 					= Input::get('idprodi');
 		$tahunAkademik				= Input::get('tahunAkademik');
 		$dayaTampung				= Input::get('dayaTampung');
 		$calonMahasiswaIkut			= Input::get('calonMahasiswaIkut');
 		$calonMahasiswaLulus		= Input::get('calonMahasiswaLulus');
 		$mahasiswaBaruNonReguler	= Input::get('mahasiswaBaruNonReguler');
 		$mahasiswaBaruTransfer		= Input::get('mahasiswaBaruTransfer');
 		$totalMahasiswaNonReguler	= Input::get('totalMahasiswaNonReguler');
 		$totalMahasiswaTransfer		= Input::get('totalMahasiswaTransfer');
 		

 		$mahasiswanonreg->idprodi					= $idprodi;
 		$mahasiswanonreg->tahunAkademik				= $tahunAkademik;
 		$mahasiswanonreg->dayaTampung				= $dayaTampung;
 		$mahasiswanonreg->calonMahasiswaIkut		= $calonMahasiswaIkut;
 		$mahasiswanonreg->calonMahasiswaLulus		= $calonMahasiswaLulus;
 		$mahasiswanonreg->mahasiswaBaruNonReguler	= $mahasiswaBaruNonReguler;
 		$mahasiswanonreg->mahasiswaBaruTransfer		= $mahasiswaBaruTransfer;
 		$mahasiswanonreg->totalMahasiswaNonReguler	= $totalMahasiswaNonReguler;
 		$mahasiswanonreg->totalMahasiswaTransfer	= $totalMahasiswaTransfer;
 		
 		$mahasiswanonreg->save();

 		return redirect('mahasiswa')
			->with('status-mhsnonreg', 'Data telah berhasil disimpan');
 		
	}

	public function delmahasiswanonreg($id)
	{
		Session::set('tab_mhs','mahasiswanonreg');
		$mahasiswanonreg = tbmhsnonregulers::find($id);
		$mahasiswanonreg->delete();
		//redirect
		return redirect('mahasiswa')
			->with('status-mhsnonreg', 'Data telah berhasil dihapus');
	
 		
	}

	public function editmahasiswanonreg($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$mahasiswanonreg = tbmhsnonregulers::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$mahasiswanonreg = tbmhsnonregulers::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$mahasiswanonreg = tbmhsnonregulers::where('id',$id)->get(); 
		}	
		
		Session::set('tab_mhs','mahasiswanonreg');
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st3.editmahasiswanonreg', compact('mahasiswanonreg','menu','menu2','Akses','buka', 'level'));

		}
	
	}

	public function updatemahasiswanonreg()
	{
		Session::set('tab_mhs','mahasiswanonreg');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbmhsnonregulers::$rules, tbmhsnonregulers::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		DB:: table('tbmhsnonregulers')->where('id', $id)->update(array(
	 		'tahunAkademik'				=> Input::get('tahunAkademik'),
	 		'dayaTampung'				=> Input::get('dayaTampung'),
	 		'calonMahasiswaIkut'		=> Input::get('calonMahasiswaIkut'),
	 		'calonMahasiswaLulus'		=> Input::get('calonMahasiswaLulus'),
	 		'mahasiswaBaruNonReguler'	=> Input::get('mahasiswaBaruNonReguler'),
	 		'mahasiswaBaruTransfer'		=> Input::get('mahasiswaBaruTransfer'),
	 		'totalMahasiswaNonReguler'	=> Input::get('totalMahasiswaNonReguler'),
	 		'totalMahasiswaTransfer'	=> Input::get('totalMahasiswaTransfer')));

		return redirect('mahasiswa')
			->with('status-mhsnonreg', 'Data telah berhasil diedit');

	}

	public function detailmahasiswanonreg($id) {
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$mahasiswanonreg = tbmhsnonregulers::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$mahasiswanonreg = tbmhsnonregulers::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$mahasiswanonreg = tbmhsnonregulers::where('id',$id)->get(); 
		}	
		
		Session::set('tab_mhs','mahasiswanonreg');
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st3.detailmahasiswanonreg', compact('mahasiswanonreg','menu','menu2','Akses','buka', 'level'));

		}
	}
	
	
	
	
	
	
	// prestasi mahasiswa =========================================================================	

	public function addprestasimhs()
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
		
		Session::set('tab_mhs','prestasimhs');
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st3.formprestasimahasiswa', compact('masterprodis','menu','menu2','Akses','buka','level'));
			
		}
		
	}
	
	public function saveprestasimhs(){

		Session::set('tab_mhs','prestasimhs');		
		$prestasimhs = new tbprestasimahasiswas;
		$input	  = Input::all();
		$validator = Validator::make($input, tbprestasimahasiswas::$rules, tbprestasimahasiswas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

 		$idprodi		= Input::get('idprodi');
 		$namaKegiatan	= Input::get('namaKegiatan');
 		$waktu			= date('Y-m-d', strtotime(Input::get('waktu')));
 		$tingkat		= Input::get('tingkat');
 		$prestasi 		= Input::get('prestasi');
 		
 		
 		$prestasimhs->idprodi		= $idprodi;
 		$prestasimhs->namaKegiatan	= $namaKegiatan;
 		$prestasimhs->waktu			= $waktu;
 		$prestasimhs->tingkat		= $tingkat;
 		$prestasimhs->prestasi 		= $prestasi;
 		
 		$prestasimhs->save();

 		
 		return redirect('mahasiswa')
			->with('status-prestasimhs', 'Data telah berhasil disimpan');

 		
	}
	
	public function delprestasimhs ($id)
	{
		Session::set('tab_mhs','prestasimhs');
		$prestasimhs = tbprestasimahasiswas::find($id);
		$prestasimhs->delete();
		//redirect
		return redirect('mahasiswa')
			->with('status-prestasimhs', 'Data telah berhasil dihapus');

	}

	public function editprestasimhs($id)
	{
			// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$prestasimhs = tbprestasimahasiswas::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$prestasimhs = tbprestasimahasiswas::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$prestasimhs = tbprestasimahasiswas::where('id',$id)->get(); 
		}	
		
		Session::set('tab_mhs','prestasimhs');
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st3.editprestasimhs', compact('prestasimhs','menu','menu2','Akses','buka', 'level'));

		}
	
	}

	public function updateprestasimhs()
	{
		Session::set('tab_mhs','prestasimhs');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbprestasimahasiswas::$rules, tbprestasimahasiswas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		
		DB:: table('tbprestasimahasiswas')->where('id', $id)->update(array(
	 		'namaKegiatan'	=> Input::get('namaKegiatan'),
	 		'waktu'			=> date('Y-m-d', strtotime(Input::get('waktu'))),
	 		'tingkat'		=> Input::get('tingkat'),
	 		'prestasi' 		=> Input::get('prestasi')));

		return redirect('mahasiswa')
			->with('status-prestasimhs', 'Data telah berhasil diedit');

	}

	
	
	
	// jumlah mahasiswa =========================================================================	
	
	public function addjumlahmhs()
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
		
		Session::set('tab_mhs','jumlahmhs');
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st3.formjumlahmahasiswa', compact('masterprodis','menu','menu2','Akses','buka','level'));
			
		}
		
	}
	
	public function savejumlahmhs()
	{
		Session::set('tab_mhs','jumlahmhs');		
		$jumlahmhs = new tbjumlahmahasiswas;
		$input	  = Input::all();
		$validator = Validator::make($input, tbjumlahmahasiswas::$rules, tbjumlahmahasiswas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
 		$idprodi				= Input::get('idprodi');
 		$angkatan				= Input::get('angkatan');
 		$tahunAkademikBerjalan	= Input::get('tahunAkademikBerjalan');
 		$jumlah 				= Input::get('jumlah'); 
 		$jumlahLulusan 			= Input::get('jumlahLulusan'); 		
 		
 		$jumlahmhs->idprodi					=$idprodi;
 		$jumlahmhs->angkatan				=$angkatan;
 		$jumlahmhs->tahunAkademikBerjalan	=$tahunAkademikBerjalan;
 		$jumlahmhs->jumlah					=$jumlah;
 		$jumlahmhs->jumlahLulusan			=$jumlahLulusan;
 		
 		
 		$jumlahmhs->save();

 		return redirect('mahasiswa')
			->with('status-jumlahmhs', 'Data telah berhasil disimpan');
 		
	}

	public function deljumlahmhs($id)
	{
		Session::set('tab_mhs','jumlahmhs');
		$jumlahmhs = tbjumlahmahasiswas::find($id);
		$jumlahmhs->delete();
		//redirect
		return redirect('mahasiswa')
			->with('status-jumlahmhs', 'Data telah berhasil dihapus');

	}

	public function editjumlahmhs($id)
	{
				// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$jumlahmhs = tbjumlahmahasiswas::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$jumlahmhs = tbjumlahmahasiswas::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$jumlahmhs = tbjumlahmahasiswas::where('id',$id)->get(); 
		}	
		
		Session::set('tab_mhs','jumlahmhs');
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st3.editjumlahmhs', compact('jumlahmhs','menu','menu2','Akses','buka', 'level'));

		}
		
	
	}

	public function updatejumlahmhs()
	{
		Session::set('tab_mhs','jumlahmhs');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbjumlahmahasiswas::$rules, tbjumlahmahasiswas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		DB:: table('tbjumlahmahasiswas')->where('id', $id)->update(array(
	 		'angkatan'				=> Input::get('angkatan'),
	 		'tahunAkademikBerjalan'	=> Input::get('tahunAkademikBerjalan'),
	 		'jumlah' 				=> Input::get('jumlah'),
	 		'jumlahLulusan' 		=> Input::get('jumlahLulusan'))); 	

		return redirect('mahasiswa')
			->with('status-jumlahmhs', 'Data telah berhasil diedit');

	}
	
	
	
	
	
	
	// layanan mahasiswa =========================================================================	
	
	public function addlayananmhs()
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
		
		Session::set('tab_mhs','layananmhs');
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st3.formlayananmahasiswa', compact('masterprodis','menu','menu2','Akses','buka','level'));
			
		}
			
			
		
	}

	public function savelayananmhs()
	{
		Session::set('tab_mhs','layananmhs');		
		$layananmhs = new tblayananmahasiswas;
		$input	  = Input::all();
		$validator = Validator::make($input, tblayananmahasiswas::$rules, tblayananmahasiswas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
 		$idprodi		= Input::get('idprodi');
 		$jenisKegiatan	= Input::get('jenisKegiatan');
 		$isiKegiatan	= Input::get('isiKegiatan');
 		 		
 		$layananmhs->idprodi		=$idprodi;
 		$layananmhs->jenisKegiatan	=$jenisKegiatan;
 		$layananmhs->isiKegiatan	=$isiKegiatan;
 		
 		$layananmhs->save();

 		return redirect('mahasiswa')
			->with('status-layananmhs', 'Data telah berhasil disimpan');
 		
	}

	public function dellayananmhs ($id)
	{
		Session::set('tab_mhs','layananmhs');
		$layananmhs = tblayananmahasiswas::find($id);
		$layananmhs->delete();
		//redirect
		return redirect('mahasiswa')
			->with('status-layananmhs', 'Data telah berhasil dihapus');
	}
	
	public function editlayananmhs($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$layananmhs = tblayananmahasiswas::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$layananmhs = tblayananmahasiswas::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$layananmhs = tblayananmahasiswas::where('id',$id)->get(); 
		}	
		
		Session::set('tab_mhs','layananmhs');
		$menu = "st3"; //nama menu
		$menu2 = "mahasiswa"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st3.editlayananmhs', compact('layananmhs','menu','menu2','Akses','buka', 'level'));

		}
		
	
	}

	public function updatelayananmhs()
	{
		Session::set('tab_mhs','layananmhs');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tblayananmahasiswas::$rules, tblayananmahasiswas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		DB:: table('tblayananmahasiswas')->where('id', $id)->update(array(
 			'jenisKegiatan'	=> Input::get('jenisKegiatan'),
 			'isiKegiatan'	=> Input::get('isiKegiatan'))); 	

		return redirect('mahasiswa')
			->with('status-layananmhs', 'Data telah berhasil diedit');
		

	}

}