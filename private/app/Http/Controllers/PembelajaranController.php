<?php namespace App\Http\Controllers;

use App\tbprosespembelajarans;
use App\tbpembimbingakademiks;
use App\tbprosespembimbinganakademiks;
use App\tbpembimbinganskripsis;
use App\tbpanduanpembimbinganskripsis;
use App\tbupayaperbaikanpembelajarans;

use App\masterprodis;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;

class PembelajaranController extends Controller {

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
			$prosespembelajaran = tbprosespembelajarans::where('idprodi', '=',$prodi)->get(); 
			$pembimbing = tbpembimbingakademiks::where('idprodi', '=',$prodi)->get(); 
			$pembimbingan = tbprosespembimbinganakademiks::where('idprodi', '=',$prodi)->get(); 
			$bimbingan = tbpembimbinganskripsis::where('idprodi', '=',$prodi)->get(); 
			$panduan = tbpanduanpembimbinganskripsis::where('idprodi', '=',$prodi)->get(); 
			$upaya = tbupayaperbaikanpembelajarans::where('idprodi', '=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$prosespembelajaran = tbprosespembelajarans::where('idprodi', 'like', $prodi.'%')->get(); 
			$pembimbing = tbpembimbingakademiks::where('idprodi', 'like', $prodi.'%')->get(); 
			$pembimbingan = tbprosespembimbinganakademiks::where('idprodi', 'like', $prodi.'%')->get(); 
			$bimbingan = tbpembimbinganskripsis::where('idprodi', 'like', $prodi.'%')->get(); 
			$panduan = tbpanduanpembimbinganskripsis::where('idprodi', 'like', $prodi.'%')->get(); 
			$upaya = tbupayaperbaikanpembelajarans::where('idprodi', 'like', $prodi.'%')->get(); 	
		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();
			$prosespembelajaran = tbprosespembelajarans::all();
			$pembimbing = tbpembimbingakademiks::all ();
			$pembimbingan = tbprosespembimbinganakademiks::all ();
			$bimbingan = tbpembimbinganskripsis::all();
			$panduan = tbpanduanpembimbinganskripsis::all();
			$upaya = tbupayaperbaikanpembelajarans::all();
		}	
		
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.pembelajaran', compact('menu', 'menu2','masterprodis','prosespembelajaran','pembimbing','pembimbingan','bimbingan','panduan','upaya','Akses','buka'));
		}
		
	}


	

	// pembelajaran =====================================================================================
	public function addprosespembelajaran()
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
		
		Session::set('tab_pembelajaran','pembelajaran');
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.formprosespembelajaran', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
		
	}

	public function saveprosespembelajaran()
	{
		Session::set('tab_pembelajaran','pembelajaran');
		$pembelajaran = new tbprosespembelajarans;
		$input	  = Input::all();
		$validator = Validator::make($input, tbprosespembelajarans::$rules, tbprosespembelajarans::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$mekanisme= Input::get('mekanismePenyusunan');
		
 		$lampiran1 = Input::get('lampiranSoal1');
 		$lampiran2 = Input::get('lampiranSoal2');
 		$lampiran3 = Input::get('lampiranSoal3');
 		$lampiran4 = Input::get('lampiranSoal4');
 		$lampiran5 = Input::get('lampiranSoal5');
 		
 		

 		$pembelajaran->idprodi = $idprodi;
 		$pembelajaran->mekanismePenyusunan = $mekanisme;
		
 		$pembelajaran->lampiranSoal1 = $lampiran1;
 		$pembelajaran->lampiranSoal2 = $lampiran2;
 		$pembelajaran->lampiranSoal3 = $lampiran3;
 		$pembelajaran->lampiranSoal4 = $lampiran4;
 		$pembelajaran->lampiranSoal5 = $lampiran5;
		
 		$pembelajaran->save();

 		return redirect('pembelajaran')
			->with('status-pembelajaran', 'Data telah berhasil disimpan');
 		
	}
	
	public function delprosespembelajaran($id)
	{
		Session::set('tab_pembelajaran','pembelajaran');
		$pembelajaran = tbprosespembelajarans::find($id);
		$pembelajaran->delete();

		//redirect
		return redirect('pembelajaran')
			->with('status-pembelajaran', 'Data telah berhasil dihapus');
	}
	
	public function editprosespembelajaran($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$pembelajaran = tbprosespembelajarans::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$pembelajaran = tbprosespembelajarans::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$pembelajaran = tbprosespembelajarans::where('id',$id)->get(); 
		}	
		
		Session::set('tab_pembelajaran','pembelajaran');
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st5.editprosespembelajaran', compact('pembelajaran','menu','menu2','Akses','buka', 'level'));

		}	
		

	}
	
	public function updateprosespembelajaran()
	{
 		Session::set('tab_pembelajaran','pembelajaran');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbprosespembelajarans::$rules, tbprosespembelajarans::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
		
		DB::table('tbprosespembelajarans')->where('id', $id)->update(array(
                  'mekanismePenyusunan' => Input::get('mekanismePenyusunan'),
                  'lampiranSoal1' => Input::get('lampiranSoal1'),
                  'lampiranSoal2' => Input::get('lampiranSoal2'),   
                  'lampiranSoal3' => Input::get('lampiranSoal3'),  
                  'lampiranSoal4' => Input::get('lampiranSoal4'), 
                  'lampiranSoal5' => Input::get('lampiranSoal5')        

            ));
 		return redirect('pembelajaran')
			->with('status-pembelajaran', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	
	
	
	
	// pembimbing akademik ===========================================================================
	
	public function addpembimbingakademik()
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
		
		Session::set('tab_pembelajaran','pembimbing');
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.formpembimbingakademik', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
		
		
	}

	public function savepembimbingakademik()
	{
		Session::set('tab_pembelajaran','pembimbing');
		$pembimbing = new tbpembimbingakademiks;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpembimbingakademiks::$rules, tbpembimbingakademiks::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
 		$idprodi= Input::get('idprodi');
 		$nip= Input::get('nip');
 		$jumlM= Input::get('jumlahMahasiswa');
 		$jumlP= Input::get('jumlahPertemuan');
 	
 		$pembimbing->idprodi=$idprodi;
 		$pembimbing->nip = $nip;
 		$pembimbing->jumlahMahasiswa =$jumlM;
 		$pembimbing->jumlahPertemuan =$jumlP;
 		$pembimbing->save();
 		
 		return redirect('pembelajaran')
			->with('status-pembimbing', 'Data telah berhasil disimpan');
 		
	}
	
	public function delpembimbingakademik($id)
	{
		Session::set('tab_pembelajaran','pembimbing');
		$pembimbingakademik = tbpembimbingakademiks::find($id);
		$pembimbingakademik->delete();

		//redirect
		return redirect('pembelajaran')
			->with('status-pembimbing', 'Data telah berhasil dihapus');
	}
	
	public function editpembimbingakademik($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$pembimbing = tbpembimbingakademiks::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$pembimbing = tbpembimbingakademiks::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$pembimbing = tbpembimbingakademiks::where('id',$id)->get(); 
		}	
		
		Session::set('tab_pembelajaran','pembimbing');
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st5.editpembimbingakademik', compact('pembimbing','menu','menu2','Akses','buka', 'level'));

		}	
		

	}
	
	public function updatepembimbingakademik()
	{
 		Session::set('tab_pembelajaran','pembimbing');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbpembimbingakademiks::$rules, tbpembimbingakademiks::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
		
		DB::table('tbpembimbingakademiks')->where('id', $id)->update(array(
                  'jumlahMahasiswa' => Input::get('jumlahMahasiswa'),
                  'jumlahPertemuan' => Input::get('jumlahPertemuan')               

            ));
 		return redirect('pembelajaran')
			->with('status-pembimbing', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	
	
	
	// pembimbingan ==========================================================================
	
	public function addprosespembimbinganakademik()
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
		
		Session::set('tab_pembelajaran','pembimbingan');
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.formprosespembimbinganakademik', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
			
		
	}
	
	public function saveprosespembimbinganakademik()
	{
		Session::set('tab_pembelajaran','pembimbingan');
		$pembimbing = new tbprosespembimbinganakademiks;
		$input	  = Input::all();
		$validator = Validator::make($input, tbprosespembimbinganakademiks::$rules, tbprosespembimbinganakademiks::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$hal= Input::get('Hal');
 		$penjelasan= Input::get('penjelasan');
 	
 		$pembimbing->idprodi = $idprodi;
 		$pembimbing->Hal = $hal;
 		$pembimbing->penjelasan =$penjelasan;
 		$pembimbing->save();

 		return redirect('pembelajaran')
			->with('status-pembimbingan', 'Data telah berhasil disimpan');
 		
	}
	
	public function delprosespembimbinganakademik($id)
	{
		Session::set('tab_pembelajaran','pembimbingan');
		$prosespembimbingakademik = tbprosespembimbinganakademiks::find($id);
		$prosespembimbingakademik->delete();

		//redirect
		return redirect('pembelajaran')
			->with('status-pembimbingan', 'Data telah berhasil dihapus');
	}
	
	public function editprosespembimbinganakademik($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$pembimbingan = tbprosespembimbinganakademiks::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$pembimbingan = tbprosespembimbinganakademiks::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$pembimbingan = tbprosespembimbinganakademiks::where('id',$id)->get(); 
		}	
		
		Session::set('tab_pembelajaran','pembimbingan');
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st5.editprosespembimbinganakademik', compact('pembimbingan','menu','menu2','Akses','buka', 'level'));

		}	
		

	}
	
	public function updateprosespembimbinganakademik()
	{
		Session::set('tab_pembelajaran','pembimbingan');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbprosespembimbinganakademiks::$rules, tbprosespembimbinganakademiks::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
 		
		DB::table('tbprosespembimbinganakademiks')->where('id', $id)->update(array(
                  'Hal' => Input::get('Hal'),
                  'penjelasan' => Input::get('penjelasan'),       

            ));
 		return redirect('pembelajaran')
			->with('status-pembimbingan', 'Data telah berhasil diedit');
			
 	}
	
	
	
	
	
	
	
	// skripsi ====================================================================

	public function addpembimbinganskripsi()
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
		
		Session::set('tab_pembelajaran','skripsi');
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.formpembimbinganskripsi', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
		
	}
	
	public function savepembimbinganskripsi()
	{
		Session::set('tab_pembelajaran','skripsi');
		$skripsi = new tbpembimbinganskripsis;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpembimbinganskripsis::$rules, tbpembimbinganskripsis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$nip= Input::get('nip');
 		$jumM= Input::get('jumlahMahasiswa');
 		$jumP= Input::get('jumlahPertemuan');
 		$lama= Input::get('lamaPenyelesaian');
 
 		$skripsi->idprodi=$idprodi;
 		$skripsi->nip = $nip;
 		$skripsi->jumlahMahasiswa = $jumM;
 		$skripsi->jumlahPertemuan =$jumP;
 		$skripsi->lamaPenyelesaian =$lama;
 		$skripsi->save();

 		return redirect('pembelajaran')
			->with('status-skripsi', 'Data telah berhasil disimpan');
 		
	}
	
	public function delpembimbinganskripsi($id)
	{
		Session::set('tab_pembelajaran','skripsi');
		$skripsi = tbpembimbinganskripsis::find($id);
		$skripsi->delete();

		//redirect
		return redirect('pembelajaran')
			->with('status-skripsi', 'Data telah berhasil dihapus');
	}
	
	public function editpembimbinganskripsi($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$skripsi = tbpembimbinganskripsis::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$skripsi = tbpembimbinganskripsis::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$skripsi = tbpembimbinganskripsis::where('id',$id)->get(); 
		}	
		
		Session::set('tab_pembelajaran','skripsi');
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st5.editpembimbinganskripsi', compact('skripsi','menu','menu2','Akses','buka', 'level'));

		}
		

	}
	
	public function updatepembimbinganskripsi()
	{
 		Session::set('tab_pembelajaran','skripsi');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbpembimbinganskripsis::$rules, tbpembimbinganskripsis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
		
		DB::table('tbpembimbinganskripses')->where('id', $id)->update(array(
                  'jumlahMahasiswa' => Input::get('jumlahMahasiswa'),
                  'jumlahPertemuan' => Input::get('jumlahPertemuan'),   
                  'lamaPenyelesaian' => Input::get('lamaPenyelesaian')
                           
            ));
 		return redirect('pembelajaran')
			->with('status-skripsi', 'Data telah berhasil diedit');
 	}
	
	
	
	
	
	
	
	
	
	// panduan skripsi =============================================================================
	
	public function addpanduanpembimbinganskripsi()
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
		
		Session::set('tab_pembelajaran','panduan');
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.formpanduanpembimbinganskripsi', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
			
		
	}
	
	public function savepanduanpembimbinganskripsi()
	{
		Session::set('tab_pembelajaran','panduan');
		$panduan = new tbpanduanpembimbinganskripsis;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpanduanpembimbinganskripsis::$rules, tbpanduanpembimbinganskripsis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$ada= Input::get('Panduan');
 		$sosialisasi= Input::get('sosialisasiPanduan');

 		$panduan->idprodi=$idprodi;
 		$panduan->Panduan = $ada;
 		$panduan->sosialisasiPanduan = $sosialisasi;
 		$panduan->save();

 		return redirect('pembelajaran')
			->with('status-panduan', 'Data telah berhasil disimpan');
 		
	}
	
	public function delpanduanpembimbinganskripsi($id)
	{
		Session::set('tab_pembelajaran','panduan');
		$panduan = tbpanduanpembimbinganskripsis::find($id);
		$panduan->delete();

		//redirect
		return redirect('pembelajaran')
			->with('status-panduan', 'Data telah berhasil dihapus');
	}
	
	public function editpanduanpembimbinganskripsi($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$panduan = tbpanduanpembimbinganskripsis::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$panduan = tbpanduanpembimbinganskripsis::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$panduan = tbpanduanpembimbinganskripsis::where('id',$id)->get(); 
		}	
		
		Session::set('tab_pembelajaran','panduan');
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st5.editpanduanpembimbinganskripsi', compact('panduan','menu','menu2','Akses','buka', 'level'));

		}
		

	}
	
	public function updatepanduanpembimbinganskripsi()
	{
 		Session::set('tab_pembelajaran','panduan');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbpanduanpembimbinganskripsis::$rules, tbpanduanpembimbinganskripsis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
		
		
		DB::table('tbpanduanpembimbinganskripses')->where('id', $id)->update(array(
                  'Panduan' => Input::get('Panduan'),
                  'sosialisasiPanduan' => Input::get('sosialisasiPanduan')
                          
            ));
 		return redirect('pembelajaran')
			->with('status-panduan', 'Data telah berhasil diedit');
 	}

	
	
	
	
	
	
	
	
	
	
	// upayaperbaikanpembelajaran ==================================================================

	public function addupayaperbaikanpembelajaran()
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
		
		Session::set('tab_pembelajaran','upaya');
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.formupayaperbaikanpembelajaran', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
			
		
	}

	public function saveupayaperbaikanpembelajaran()
	{
		Session::set('tab_pembelajaran','upaya');
		$upaya = new tbupayaperbaikanpembelajarans;
		$input	  = Input::all();
		$validator = Validator::make($input, tbupayaperbaikanpembelajarans::$rules, tbupayaperbaikanpembelajarans::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$item= Input::get('item');
 		$tindakan= Input::get('tindakanPerbaikan');
 		$hasil= Input::get('hasilPerbaikan');

 		$upaya->idprodi = $idprodi;
 		$upaya->item = $item;
 		$upaya->tindakanPerbaikan = $tindakan;
 		$upaya->hasilPerbaikan = $hasil;
 		$upaya->save();

 		return redirect('pembelajaran')
			->with('status-upaya', 'Data telah berhasil disimpan');
 		
	}

	public function delupayaperbaikanpembelajaran($id)
	{
		Session::set('tab_pembelajaran','upaya');
		$upaya = tbupayaperbaikanpembelajarans::find($id);
		$upaya->delete();

		//redirect
		return redirect('pembelajaran')
			->with('status-upaya', 'Data telah berhasil dihapus');
	}

	public function editupayaperbaikanpembelajaran($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$upaya = tbupayaperbaikanpembelajarans::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$upayan = tbupayaperbaikanpembelajarans::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$upaya = tbupayaperbaikanpembelajarans::where('id',$id)->get(); 
		}	
		
		Session::set('tab_pembelajaran','upaya');
		$menu = "st5"; //nama menu
		$menu2 = "pembelajaran"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st5.editupayaperbaikanpembelajaran', compact('upaya','menu','menu2','Akses','buka', 'level'));

		}
	

	}
	
 	public function updateupayaperbaikanpembelajaran()
	{	
		Session::set('tab_pembelajaran','upaya');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbupayaperbaikanpembelajarans::$rules, tbupayaperbaikanpembelajarans::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
 	
		DB::table('tbupayaperbaikanpembelajarans')->where('id', $id)->update(array(
                  'item' => Input::get('item'),
                  'tindakanPerbaikan' => Input::get('tindakanPerbaikan'),
                  'hasilPerbaikan' => Input::get('hasilPerbaikan')   
                          
            ));
 		return redirect('pembelajaran')
			->with('status-upaya', 'Data telah berhasil diedit');
 	}

}
