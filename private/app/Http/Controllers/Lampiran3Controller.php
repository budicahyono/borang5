<?php namespace App\Http\Controllers;

use App\tbmhsregulers;
use App\tblayananmahasiswas;
use App\tbevaluasilulusans;
use App\tbalumnis;
use App\masterprodis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;


class lampiran3Controller extends Controller {

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
		
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
			$tbmhsregulers = tbmhsregulers::where('idprodi','=',$prodi)->get(); 
			$tblayananmahasiswas = tblayananmahasiswas::where('idprodi','=',$prodi)->get(); 
			$tbevaluasilulusans = tbevaluasilulusans::where('idprodi','=',$prodi)->get(); 
			$tbalumnis 			= tbalumnis::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$tbmhsregulers = tbmhsregulers::where('idprodi','like',$prodi.'%')->get(); 
			$tblayananmahasiswas = tblayananmahasiswas::where('idprodi','like',$prodi.'%')->get(); 
			$tbevaluasilulusans = tbevaluasilulusans::where('idprodi','like',$prodi.'%')->get(); 
			$tbalumnis 			= tbalumnis::where('idprodi','like',$prodi.'%')->get(); 

		} else if ($level == "admin") {
			$masterprodis 			= masterprodis::all();
			$tbmhsregulers 			= tbmhsregulers::all(); 
			$tblayananmahasiswas 	= tblayananmahasiswas::all(); 
			$tbevaluasilulusans 	= tbevaluasilulusans::all(); 
			$tbalumnis 				= tbalumnis::all(); 
		}	 	
		
		
		$menu = "lampiran3"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st3.lampiran3', compact('tbmhsregulers','tblayananmahasiswas','tbevaluasilulusans','tbalumnis','masterprodis', 'menu','menu2','Akses'));

			
	}


	// daftar_lulusan
	public function addlampiranmhsreg($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			
			$tbmhsregulers = tbmhsregulers::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			
			$tbmhsregulers = tbmhsregulers::where('id',$id)->where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			
			$tbmhsregulers = tbmhsregulers::where('id',$id)->get();

		}	 	
		Session::set('tab_lampiran3','daftarlulusan');
		$menu = "lampiran3"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st3.formlampiranmhsreg', compact('tbmhsregulers','menu','menu2','Akses','level'));

		
		
	}
	
	public function savelampiranmhsreg(Request $request)
	{
		Session::set('tab_lampiran3','daftarlulusan');
		$file = $request->file('daftar_lulusan');
		
		$data = new tbmhsregulers;
		$input	  = Input::all();
		$validator = Validator::make($input, tbmhsregulers::$rules_dok, tbmhsregulers::$messages_dok);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id = Input::get('id');
 		$daftar_lulusan			= $file->getClientOriginalName();
 		
 		
 		DB:: table('tbmhsregulers')->where('id', $id)->update(array(
		'daftar_lulusan'		=> $daftar_lulusan));
		
		$destinationPath = 'lampiran/daftarlulusan/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
 		
		return redirect('lampiran3')
			->with('statusmhsreg', 'Data telah berhasil disimpan');
	}

	public function dellampiranmhsreg($id)
	{
		Session::set('tab_lampiran3','daftarlulusan');
		$tbmhsregulers = tbmhsregulers::where('id',$id)->get();
		foreach($tbmhsregulers as $value) {
			$daftar_lulusan = $value->daftar_lulusan;
			unlink ("lampiran/daftarlulusan/".$daftar_lulusan);
		}
		DB:: table('tbmhsregulers')->where('id', $id)->update(array(
		'daftar_lulusan'		=> ""));
		
		//redirect
		return redirect('lampiran3')
			->with('statusmhsreg', 'Data telah berhasil dihapus');
	}
	
	
	
	// layanan_mahasiswa
	public function addlampiranlayananmhs($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			
			$tblayananmahasiswas = tblayananmahasiswas::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			
			$tblayananmahasiswas = tblayananmahasiswas::where('id',$id)->where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			
			$tblayananmahasiswas = tblayananmahasiswas::where('id',$id)->get();

		}	 	
		Session::set('tab_lampiran3','layananmhs');
		$menu = "lampiran3"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st3.formlampiranlayananmhs', compact('tblayananmahasiswas','menu','menu2','Akses','level'));

		
		
	}
	
	public function savelampiranlayananmhs(Request $request)
	{
		Session::set('tab_lampiran3','layananmhs');
		$file = $request->file('dokumen_layanan');
		
		$data = new tblayananmahasiswas;
		$input	  = Input::all();
		$validator = Validator::make($input, tblayananmahasiswas::$rules_dok, tblayananmahasiswas::$messages_dok);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id = Input::get('id');
 		$dokumen_layanan			= $file->getClientOriginalName();
 		
 		
 		DB:: table('tblayananmahasiswas')->where('id', $id)->update(array(
		'dokumen_layanan'		=> $dokumen_layanan));
		
		$destinationPath = 'lampiran/layananmhs/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
 		
		return redirect('lampiran3')
			->with('statuslayananmhs', 'Data telah berhasil disimpan');
	}

	public function dellampiranlayananmhs($id)
	{
		Session::set('tab_lampiran3','layananmhs');
		$tblayananmahasiswas = tblayananmahasiswas::where('id',$id)->get();
		foreach($tblayananmahasiswas as $value) {
			$dokumen_layanan = $value->dokumen_layanan;
			unlink ("lampiran/layananmhs/".$dokumen_layanan);
		}
		DB:: table('tblayananmahasiswas')->where('id', $id)->update(array(
		'dokumen_layanan'		=> ""));
		
		//redirect
		return redirect('lampiran3')
			->with('statuslayananmhs', 'Data telah berhasil dihapus');
	}
	
	
	
	// evaluasi_lulusan
	public function addlampiranevaluasilulusan($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			
			$tbevaluasilulusans = tbevaluasilulusans::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			
			$tbevaluasilulusans = tbevaluasilulusans::where('id',$id)->where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			
			$tbevaluasilulusans = tbevaluasilulusans::where('id',$id)->get();

		}	 	
		Session::set('tab_lampiran3','evaluasilulusan');
		$menu = "lampiran3"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st3.formlampiranevaluasi', compact('tbevaluasilulusans','menu','menu2','Akses','level'));

		
		
	}
	
	public function savelampiranevaluasilulusan(Request $request)
	{
		Session::set('tab_lampiran3','evaluasilulusan');
		$file = $request->file('dokumen_evaluasilulusan');
		
		$data = new tbevaluasilulusans;
		$input	  = Input::all();
		$validator = Validator::make($input, tbevaluasilulusans::$rules_dok, tbevaluasilulusans::$messages_dok);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id = Input::get('id');
 		$dokumen_evaluasilulusan			= $file->getClientOriginalName();
 		
 		
 		DB:: table('tbevaluasilulusans')->where('id', $id)->update(array(
		'dokumen_evaluasilulusan'		=> $dokumen_evaluasilulusan));
		
		$destinationPath = 'lampiran/evaluasilulusan/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
 		
		return redirect('lampiran3')
			->with('statusevaluasilulusan', 'Data telah berhasil disimpan');
	}

	public function dellampiranevaluasilulusan($id)
	{
		Session::set('tab_lampiran3','evaluasilulusan');
		$tbevaluasilulusans = tbevaluasilulusans::where('id',$id)->get();
		foreach($tbevaluasilulusans as $value) {
			$dokumen_evaluasilulusan = $value->dokumen_evaluasilulusan;
			unlink ("lampiran/evaluasi_lulusan/".$dokumen_evaluasilulusan);
		}
		DB:: table('tbevaluasilulusans')->where('id', $id)->update(array(
		'dokumen_evaluasilulusan'		=> ""));
		
		//redirect
		return redirect('lampiran3')
			->with('statusevaluasilulusan', 'Data telah berhasil dihapus');
	}
	
	
	
	// laporan_alumni
	public function addlampiranalumni($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			
			$tbalumnis = tbalumnis::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			
			$tbalumnis = tbalumnis::where('id',$id)->where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			
			$tbalumnis = tbalumnis::where('id',$id)->get();

		}	 	
		Session::set('tab_lampiran3','alumni');
		$menu = "lampiran3"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st3.formlampiranalumni', compact('tbalumnis','menu','menu2','Akses','level'));

		
		
	}
	
	public function savelampiranalumni(Request $request)
	{
		Session::set('tab_lampiran3','alumni');
		$file = $request->file('laporan_alumni');
		
		$data = new tbalumnis;
		$input	  = Input::all();
		$validator = Validator::make($input, tbalumnis::$rules_dok, tbalumnis::$messages_dok);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id = Input::get('id');
 		$laporan_alumni			= $file->getClientOriginalName();
 		
 		
 		DB:: table('tbalumnis')->where('id', $id)->update(array(
		'laporan_alumni'		=> $laporan_alumni));
		
		$destinationPath = 'lampiran/laporan_alumni/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
 		
		return redirect('lampiran3')
			->with('statusalumni', 'Data telah berhasil disimpan');
	}

	public function dellampiranalumni($id)
	{
		Session::set('tab_lampiran3','alumni');
		$tbalumnis = tbalumnis::where('id',$id)->get();
		foreach($tbalumnis as $value) {
			$laporan_alumni = $value->laporan_alumni;
			unlink ("lampiran/laporan_alumni/".$laporan_alumni);
		}
		DB:: table('tbalumnis')->where('id', $id)->update(array(
		'laporan_alumni'		=> ""));
		
		//redirect
		return redirect('lampiran3')
			->with('statusalumni', 'Data telah berhasil dihapus');
	}
}