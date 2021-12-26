<?php namespace App\Http\Controllers;

use App\tbmekanismes;
use App\tbevaluasilulusans;
use App\tbalumnis;

use App\masterprodis;
use App\masterjeniskemampuans;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;

class LulusanController extends Controller {

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
			$mekanisme = tbmekanismes::where('idprodi', '=', $prodi)->get(); 
			$evaluasilulusan = tbevaluasilulusans::where('idprodi', '=', $prodi)->get(); 
			$alumni = tbalumnis::where('idprodi', '=', $prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$mekanisme = tbmekanismes::where('idprodi', 'like', $prodi.'%')->get(); 
			$evaluasilulusan = tbevaluasilulusans::where('idprodi', 'like', $prodi.'%')->get(); 
			$alumni = tbalumnis::where('idprodi', 'like', $prodi.'%')->get(); 
		} else if ($level == "admin") {
			$mekanisme = tbmekanismes::all();
			$evaluasilulusan = tbevaluasilulusans::all ();
			$alumni = tbalumnis::all();
			$masterprodis = masterprodis::all();
			
		}

				
		
		$menu = "st3"; //nama menu
		$menu2 = "lulusan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st3.lulusan', compact('menu', 'menu2','masterprodis','mekanisme','evaluasilulusan','alumni','Akses','buka'));
		}
		
	}
	
	
	
	
	// mekanisme =========================================================================	
	
	public function addmekanisme()
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
		
		Session::set('tab_lulus','mekanisme');
		$menu = "st3"; //nama menu
		$menu2 = "lulusan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st3.formmekanisme', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
		
		
		
	}

	public function savemekanisme(){

		Session::set('tab_lulus','mekanisme');
		$mekanismeevaluasi = new tbmekanismes;
		$input	  = Input::all();
		$validator = Validator::make($input, tbmekanismes::$rules, tbmekanismes::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
 		$idprodi				= Input::get('idprodi');
 		$mekanisme				= Input::get('mekanisme');
 		
 		$mekanismeevaluasi->idprodi		= $idprodi;
 		$mekanismeevaluasi->mekanisme	= $mekanisme;
 		
 		$mekanismeevaluasi->save();

 		return redirect('lulusan')
			->with('status-mekanisme', 'Data telah berhasil disimpan');
 		
	}

	public function delmekanisme($id)
	{
		Session::set('tab_lulus','mekanisme');
		$mekanismeevaluasi = tbmekanismes::find($id);
		$mekanismeevaluasi->delete();
		
		return redirect('lulusan')
			->with('status-mekanisme', 'Data telah berhasil dihapus');

	}

	public function editmekanisme($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$mekanismeevaluasi = tbmekanismes::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$mekanismeevaluasi = tbmekanismes::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$mekanismeevaluasi = tbmekanismes::where('id',$id)->get(); 
		}	
		
		Session::set('tab_lulus','mekanisme');
		$menu = "st3"; //nama menu
		$menu2 = "lulusan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st3.editmekanisme', compact('mekanismeevaluasi','menu','menu2','Akses','buka', 'level'));

		}
		
	
	
	}

	public function updatemekanisme()
	{
		Session::set('tab_lulus','mekanisme');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbmekanismes::$rules, tbmekanismes::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		DB:: table('tbmekanismes')->where('id', $id)->update(array(
	 		'mekanisme'			=> Input::get('mekanisme')));
	 		
		return redirect('lulusan')
			->with('status-mekanisme', 'Data telah berhasil diedit');

	}
	
	
	
	
	
	
	
	// evaluasi lulusan =========================================================================	
	
	public function addevaluasilulusan()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		$masterjeniskemampuans = masterjeniskemampuans::all();	
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_lulus','evaluasi');
		$menu = "st3"; //nama menu
		$menu2 = "lulusan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st3.formevaluasilulusan', compact('masterprodis','masterjeniskemampuans','menu','menu2','Akses','buka','level'));
		}
		
		
	}

	

	public function saveevaluasilulusan(){

		Session::set('tab_lulus','evaluasi');
		$evaluasilulusan = new tbevaluasilulusans;
		$input	  = Input::all();
		$validator = Validator::make($input, tbevaluasilulusans::$rules, tbevaluasilulusans::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi					= Input::get('idprodi');
 		$jenisKemampuan				= Input::get('jenisKemampuan');
 		$tanggapanSangatBaik		= Input::get('tanggapanSangatBaik');
 		$tanggapanBaik				= Input::get('tanggapanBaik');
 		$tanggapanCukup				= Input::get('tanggapanCukup');
 		$tanggapanKurang			= Input::get('tanggapanKurang');
 		$tindakLanjut				= Input::get('tindakLanjut');
 		
 		$evaluasilulusan->idprodi					= $idprodi;
 		$evaluasilulusan->jenisKemampuan			= $jenisKemampuan;
 		$evaluasilulusan->tanggapanSangatBaik		= $tanggapanSangatBaik;
		$evaluasilulusan->tanggapanBaik				= $tanggapanBaik;
		$evaluasilulusan->tanggapanCukup			= $tanggapanCukup;
		$evaluasilulusan->tanggapanKurang			= $tanggapanKurang;
		$evaluasilulusan->tindakLanjut				= $tindakLanjut; 		
 		
 		$evaluasilulusan->save();

 		return redirect('lulusan')
			->with('status-evaluasi', 'Data telah berhasil disimpan');
 		
	}


	public function delevaluasilulusan($id)
	{
		Session::set('tab_lulus','evaluasi');
		$evaluasilulusan = tbevaluasilulusans::find($id);
		$evaluasilulusan->delete();
		
		return redirect('lulusan')
			->with('status-evaluasi', 'Data telah berhasil dihapus');

	}



	public function editevaluasilulusan($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		$masterjeniskemampuans = masterjeniskemampuans::all();	
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$evaluasilulusan = tbevaluasilulusans::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$evaluasilulusan = tbevaluasilulusans::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$evaluasilulusan = tbevaluasilulusans::where('id',$id)->get(); 
		}	
		
		Session::set('tab_lulus','evaluasi');
		$menu = "st3"; //nama menu
		$menu2 = "lulusan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st3.editevaluasilulusan', compact('evaluasilulusan','masterjeniskemampuans','menu','menu2','Akses','buka', 'level'));

		}
		
		
	
	}

	public function updateevaluasilulusan()
	{
		Session::set('tab_lulus','evaluasi');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbevaluasilulusans::$rules, tbevaluasilulusans::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		DB:: table('tbevaluasilulusans')->where('id', $id)->update(array(
	 		'jenisKemampuan'			=> Input::get('jenisKemampuan'),
	 		'tanggapanSangatBaik'		=> Input::get('tanggapanSangatBaik'),
	 		'tanggapanBaik'				=> Input::get('tanggapanBaik'),
	 		'tanggapanCukup'			=> Input::get('tanggapanCukup'),
	 		'tanggapanKurang'			=> Input::get('tanggapanKurang'),
	 		'tindakLanjut'				=> Input::get('tindakLanjut')));

		return redirect('lulusan')
			->with('status-evaluasi', 'Data telah berhasil diedit');

	}
	
	
	
	
	
	// alumni =========================================================================	
	
	public function addalumni()
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
		
		Session::set('tab_lulus','alumni');
		$menu = "st3"; //nama menu
		$menu2 = "lulusan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st3.formalumni', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
		
	}

	public function savealumni(){
		
		Session::set('tab_lulus','alumni');
		$alumni = new tbalumnis;
		$input	  = Input::all();
		$validator = Validator::make($input, tbalumnis::$rules, tbalumnis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
 		$idprodi 				= Input::get('idprodi');
 		$waktuTungguLulusan 	= Input::get('waktuTungguLulusan');
 		$kerjaSesuaiBidang		= Input::get('kerjaSesuaiBidang');
 		$himpunanAlumni			= Input::get('himpunanAlumni');

 		$alumni->idprodi 					= $idprodi;
 		$alumni->waktuTungguLulusan			= $waktuTungguLulusan;
 		$alumni->kerjaSesuaiBidang			= $kerjaSesuaiBidang;
 		$alumni->himpunanAlumni				= $himpunanAlumni;
 		
 		$alumni->save();

 		return redirect('lulusan')
			->with('status-alumni', 'Data telah berhasil disimpan');
 		
	}

	public function delalumni($id)
	{
		Session::set('tab_lulus','alumni');
		$alumni = tbalumnis::find($id);
		$alumni->delete();
		//redirect
		return redirect('lulusan')
			->with('status-alumni', 'Data telah berhasil dihapus');

	}

	public function editalumni($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$alumni = tbalumnis::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$alumni = tbalumnis::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$alumni = tbalumnis::where('id',$id)->get(); 
		}	
		
		Session::set('tab_lulus','alumni');
		$menu = "st3"; //nama menu
		$menu2 = "lulusan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st3.editalumni', compact('alumni','menu','menu2','Akses','buka', 'level'));

		}
		
		
	
	}

	public function updatealumni()
	{
		Session::set('tab_lulus','alumni');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbalumnis::$rules, tbalumnis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

		DB:: table('tbalumnis')->where('id', $id)->update(array(
	 		'waktuTungguLulusan' 	=> Input::get('waktuTungguLulusan'),
	 		'kerjaSesuaiBidang'		=> Input::get('kerjaSesuaiBidang'),
	 		'himpunanAlumni'		=> Input::get('himpunanAlumni')));

		return redirect('lulusan')
			->with('status-alumni', 'Data telah berhasil diedit');

	}

}
