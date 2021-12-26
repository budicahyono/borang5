<?php namespace App\Http\Controllers;

use App\tbcontohsoalujians;
use App\mastermatakuliahs;
use App\tbpraktikums;
use App\tbpeninjauankurikulums;
use App\tbprosespembelajarans;
use App\tbpanduanpembimbinganskripsis;
use App\masterprodis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;


class lampiran5Controller extends Controller {

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
		
		$tbcontohsoalujians = tbcontohsoalujians::all();
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
			
			$mastermatakuliahs = mastermatakuliahs::where('idprodi','=',$prodi)->get(); 
			$tbpraktikums = tbpraktikums::where('idprodi','=',$prodi)->get(); 
			$tbpeninjauankurikulums = tbpeninjauankurikulums::where('idprodi','=',$prodi)->get(); 
			$tbprosespembelajarans = tbprosespembelajarans::where('idprodi','=',$prodi)->get(); 
			$tbpanduanpembimbinganskripsis = tbpanduanpembimbinganskripsis::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			
			$mastermatakuliahs = mastermatakuliahs::where('idprodi','like',$prodi.'%')->get(); 
			$tbpraktikums = tbpraktikums::where('idprodi','like',$prodi.'%')->get(); 
			$tbpeninjauankurikulums = tbpeninjauankurikulums::where('idprodi','like',$prodi.'%')->get(); 
			$tbprosespembelajarans = tbprosespembelajarans::where('idprodi','like',$prodi.'%')->get(); 
			$tbpanduanpembimbinganskripsis = tbpanduanpembimbinganskripsis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();
		
			$mastermatakuliahs = mastermatakuliahs::all();
			$tbpraktikums = tbpraktikums::all();
			$tbpeninjauankurikulums = tbpeninjauankurikulums::all();
			$tbprosespembelajarans = tbprosespembelajarans::all();
			$tbpanduanpembimbinganskripsis = tbpanduanpembimbinganskripsis::all();
			

		}	 	
		
		
		$menu = "lampiran5"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st5.lampiran5', compact('tbcontohsoalujians','mastermatakuliahs','tbpraktikums','tbpeninjauankurikulums','tbprosespembelajarans','tbpanduanpembimbinganskripsis','masterprodis', 'menu','menu2','Akses'));

			
	}


	//contoah_soal
	public function addcontohsoal()
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = 	DB::table('tbprosespembelajarans')
								->join('masterprodis', 'tbprosespembelajarans.idprodi', '=', 'masterprodis.idprodi')
								->where('masterprodis.idprodi','=',$prodi)
								->select('masterprodis.namaProdi', 'masterprodis.idprodi')->get();
		} else if ($level == "fakultas") {
			$masterprodis = 	DB::table('tbprosespembelajarans')
								->join('masterprodis', 'tbprosespembelajarans.idprodi', '=', 'masterprodis.idprodi')
								->where('idprodi','like',$prodi.'%')
								->select('masterprodis.namaProdi', 'masterprodis.idprodi')->get();
		

		} else if ($level == "admin") {
			$masterprodis = 	DB::table('tbprosespembelajarans')
								->join('masterprodis', 'tbprosespembelajarans.idprodi', '=', 'masterprodis.idprodi')
								->select('masterprodis.namaProdi', 'masterprodis.idprodi')->get();

		}	 	
		Session::set('tab_lampiran5','cthsoalujian');
		$menu = "lampiran5"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st5.formcontohsoal', compact('masterprodis','menu','menu2','Akses','level'));

		
		
	}
	

	public function savecontohsoal(Request $request)
	{
		Session::set('tab_lampiran5','cthsoalujian');
		$file = $request->file('contoh_soal_ujian');
		
		$data = new tbcontohsoalujians;
		$input	  = Input::all();
		$validator = Validator::make($input, tbcontohsoalujians::$rules, tbcontohsoalujians::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$idprodi			= Input::get('idprodi');
		$tbprosespembelajarans 		= tbprosespembelajarans::where('idprodi','=',$idprodi)->get();
		foreach($tbprosespembelajarans as $value) {
			$idpembelajaran = $value->id;
		}
		
		$tahun				= Input::get('tahun');
 		$contoh_soal_ujian	= $file->getClientOriginalName();
 		
 		
 		$data->idpembelajaran				= $idpembelajaran;
 		$data->tahun						= $tahun;
 		$data->contoh_soal_ujian			= $contoh_soal_ujian;
		
		$destinationPath = 'lampiran/contoh_soal/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
 		$data->save();
		return redirect('lampiran5')
			->with('statuscontohsoal', 'Data telah berhasil disimpan');
	}

	public function delcontohsoal($id)
	{
		Session::set('tab_lampiran5','cthsoalujian');
		$tbcontohsoalujians = tbcontohsoalujians::where('id',$id)->get();
		foreach($tbcontohsoalujians as $value) {
			$contoh_soal_ujian = $value->contoh_soal_ujian;
			unlink ("lampiran/contoh_soal/".$contoh_soal_ujian);
		}
		$data = tbcontohsoalujians::find($id);
		$data->delete();
		
		//redirect
		return redirect('lampiran5')
			->with('statuscontohsoal', 'Data telah berhasil dihapus');
	}
	
	
	
	//silabus_dan_sap
	public function addsilabusdansap($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			
			$mastermatakuliahs = mastermatakuliahs::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			
			$mastermatakuliahs = mastermatakuliahs::where('id',$id)->where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			
			$mastermatakuliahs = mastermatakuliahs::where('id',$id)->get();

		}	  	
		Session::set('tab_lampiran5','silabusdansap');
		$menu = "lampiran5"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st5.formsilabusdansap', compact('mastermatakuliahs','menu','menu2','Akses','level'));

		
		
	}
	

	public function savesilabusdansap(Request $request)
	{
		Session::set('tab_lampiran5','silabusdansap');
		$file = $request->file('dokumen_silabusdansap');
		
		$data = new mastermatakuliahs;
		$input	  = Input::all();
		$validator = Validator::make($input, mastermatakuliahs::$rules_dok, mastermatakuliahs::$messages_dok);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id = Input::get('id');
 		$dokumen_silabusdansap			= $file->getClientOriginalName();
 		
 		
 		DB:: table('mastermatakuliahs')->where('id', $id)->update(array(
		'dokumen_silabusdansap'		=> $dokumen_silabusdansap));
		
		$destinationPath = 'lampiran/silabusdansap/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
		return redirect('lampiran5')
			->with('statussilabus', 'Data telah berhasil disimpan');
	}

	public function delsilabusdansap($id)
	{
		Session::set('tab_lampiran5','silabusdansap');
		$mastermatakuliahs = mastermatakuliahs::where('id',$id)->get();
		foreach($mastermatakuliahs as $value) {
			$dokumen_silabusdansap = $value->dokumen_silabusdansap;
			unlink ("lampiran/silabusdansap/".$dokumen_silabusdansap);
		}
		DB:: table('mastermatakuliahs')->where('id', $id)->update(array(
		'dokumen_silabusdansap'		=> ""));
		
		//redirect
		return redirect('lampiran5')
			->with('statussilabus', 'Data telah berhasil dihapus');
	}
	
	
	
	//praktikum
	public function addlampiranpraktikum($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$tbpraktikums = tbpraktikums::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tbpraktikums = tbpraktikums::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$tbpraktikums = tbpraktikums::all();

		}	 	
		Session::set('tab_lampiran5','modulpraktikum');
		$menu = "lampiran5"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st5.formlampiranpraktikum', compact('tbpraktikums','menu','menu2','Akses','level'));

		
		
	}
	

	public function savelampiranpraktikum(Request $request)
	{
		Session::set('tab_lampiran5','modulpraktikum');
		$file = $request->file('modul_praktikum');
		
		$data = new tbpraktikums;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpraktikums::$rules_dok, tbpraktikums::$messages_dok );
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id = Input::get('id');
 		$modul_praktikum			= $file->getClientOriginalName();
 		
 		DB:: table('tbpraktikums')->where('id', $id)->update(array(
		'modul_praktikum'		=> $modul_praktikum));
		
		$destinationPath = 'lampiran/praktikum/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
		return redirect('lampiran5')
			->with('statuspraktikum', 'Data telah berhasil disimpan');
	}

	public function dellampiranpraktikum($id)
	{
		Session::set('tab_lampiran5','modulpraktikum');
		$tbpraktikums = tbpraktikums::where('id',$id)->get();
		foreach($tbpraktikums as $value) {
			$modul_praktikum = $value->modul_praktikum;
			unlink ("lampiran/praktikum/".$modul_praktikum);
		}
		DB:: table('tbpraktikums')->where('id', $id)->update(array(
		'modul_praktikum'		=> ""));
		
		//redirect
		return redirect('lampiran5')
			->with('statuspraktikum', 'Data telah berhasil dihapus');
	}
	
	
	
	//kurikulum
	public function addlampirankurikulum($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$tbpeninjauankurikulums = tbpeninjauankurikulums::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tbpeninjauankurikulums = tbpeninjauankurikulums::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$tbpeninjauankurikulums = tbpeninjauankurikulums::all();

		}	 	
		Session::set('tab_lampiran5','kurikulum');
		$menu = "lampiran5"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st5.formlampirankurikulum', compact('tbpeninjauankurikulums','menu','menu2','Akses','level'));

		
		
	}
	

	public function savelampirankurikulum(Request $request)
	{
		Session::set('tab_lampiran5','kurikulum');
		$file = $request->file('dokumen_kurikulum');
		
		$data = new tbpeninjauankurikulums;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpeninjauankurikulums::$rules_dok, tbpeninjauankurikulums::$messages_dok);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id = Input::get('id');
 		$dokumen_kurikulum			= $file->getClientOriginalName();
 		
 		
 		DB:: table('tbpeninjauankurikulums')->where('id', $id)->update(array(
		'dokumen_kurikulum'		=> $dokumen_kurikulum));
		
		$destinationPath = 'lampiran/kurikulum/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
		return redirect('lampiran5')
			->with('statuskurikulum', 'Data telah berhasil disimpan');
	}

	public function dellampirankurikulum($id)
	{
		Session::set('tab_lampiran5','kurikulum');
		$tbpeninjauankurikulums = tbpeninjauankurikulums::where('id',$id)->get();
		foreach($tbpeninjauankurikulums as $value) {
			$dokumen_kurikulum = $value->dokumen_kurikulum;
			unlink ("lampiran/kurikulum/".$dokumen_kurikulum);
		}
		
		DB:: table('tbpeninjauankurikulums')->where('id', $id)->update(array(
		'dokumen_kurikulum'		=> ""));
		
		//redirect
		return redirect('lampiran5')
			->with('statuskurikulum', 'Data telah berhasil dihapus');
	}
	
	
	//pembelajaran
	public function addlampiranpembelajaran($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$tbprosespembelajarans = tbprosespembelajarans::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tbprosespembelajarans = tbprosespembelajarans::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$tbprosespembelajarans = tbprosespembelajarans::all();

		}	 	
		Session::set('tab_lampiran5','pembelajaran');
		$menu = "lampiran5"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st5.formlampiranpembelajaran', compact('tbprosespembelajarans','menu','menu2','Akses','level'));

		
		
	}
	

	public function savelampiranpembelajaran(Request $request)
	{
		Session::set('tab_lampiran5','pembelajaran');
		$file = $request->file('dokumen_pembelajaran');
		
		$data = new tbprosespembelajarans;
		$input	  = Input::all();
		$validator = Validator::make($input, tbprosespembelajarans::$rules_dok, tbprosespembelajarans::$messages_dok);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id = Input::get('id');
 		$dokumen_pembelajaran			= $file->getClientOriginalName();
 		
 		
 		DB:: table('tbprosespembelajarans')->where('id', $id)->update(array(
		'dokumen_pembelajaran'		=> $dokumen_pembelajaran));
		
		$destinationPath = 'lampiran/pembelajaran/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
		return redirect('lampiran5')
			->with('statuspembelajaran', 'Data telah berhasil disimpan');
	}

	public function dellampiranpembelajaran($id)
	{
		Session::set('tab_lampiran5','pembelajaran');
		$tbprosespembelajarans = tbprosespembelajarans::where('id',$id)->get();
		foreach($tbprosespembelajarans as $value) {
			$dokumen_pembelajaran = $value->dokumen_pembelajaran;
			unlink ("lampiran/pembelajaran/".$dokumen_pembelajaran);
		}
		DB:: table('tbprosespembelajarans')->where('id', $id)->update(array(
		'dokumen_pembelajaran'		=> ""));
		
		//redirect
		return redirect('lampiran5')
			->with('statuspembelajaran', 'Data telah berhasil dihapus');
	}
	
	
	
	//panduan skripsi
	public function addpanduanskripsi($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$tbpanduanpembimbinganskripsis = tbpanduanpembimbinganskripsis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tbpanduanpembimbinganskripsis = tbpanduanpembimbinganskripsis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$tbpanduanpembimbinganskripsis = tbpanduanpembimbinganskripsis::all();

		}	 	
		Session::set('tab_lampiran5','skripsi');
		$menu = "lampiran5"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st5.formpanduanskripsi', compact('tbpanduanpembimbinganskripsis','menu','menu2','Akses','level'));

		
		
	}
	

	public function savepanduanskripsi(Request $request)
	{
		Session::set('tab_lampiran5','skripsi');
		$file = $request->file('panduan_skripsi');
		
		$data = new tbpanduanpembimbinganskripsis;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpanduanpembimbinganskripsis::$rules_dok, tbpanduanpembimbinganskripsis::$messages_dok);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id			= Input::get('id');
 		$panduan_skripsi			= $file->getClientOriginalName();
 		
 		
 		DB:: table('tbpanduanpembimbinganskripses')->where('id', $id)->update(array(
		'panduan_skripsi'		=> $panduan_skripsi));
		
		$destinationPath = 'lampiran/panduan_skripsi/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
 		$data->save();
		return redirect('lampiran5')
			->with('statusskripsi', 'Data telah berhasil disimpan');
	}

	public function delpanduanskripsi($id)
	{
		Session::set('tab_lampiran5','skripsi');
		$tbpanduanpembimbinganskripsis = tbpanduanpembimbinganskripsis::where('id',$id)->get();
		foreach($tbpanduanpembimbinganskripsis as $value) {
			$panduan_skripsi = $value->panduan_skripsi;
			unlink ("lampiran/panduan_skripsi/".$panduan_skripsi);
		}
		DB:: table('tbpanduanpembimbinganskripses')->where('id', $id)->update(array(
		'panduan_skripsi'		=> ""));
		
		//redirect
		return redirect('lampiran5')
			->with('statusskripsi', 'Data telah berhasil dihapus');
	}
}