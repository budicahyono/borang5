<?php namespace App\Http\Controllers;

use App\tbijazahdosens;
use App\masterdosens;
use App\tbpedomansdms;
use App\tbsdms;
use App\tbkegiatandosens;
use App\tbprestasidosens;
use App\tborganisasiprofesis;
use App\masterketenagapendidikans;
use App\masterprodis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;


class lampiran4Controller extends Controller {

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
		
		$tbijazahdosens = tbijazahdosens::all();
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
			
			$masterdosens = masterdosens::where('idprodi','=',$prodi)->get(); 
			$tbpedomansdms = 	DB::table('tbpedomansdms')
								->join('tbsdms', 'tbpedomansdms.idsdm', '=', 'tbsdms.id')	
								->join('masterprodis', 'tbsdms.idprodi', '=', 'masterprodis.idprodi')
								->where('masterprodis.idprodi','=',$prodi)
								->select('tbpedomansdms.*', 'masterprodis.namaProdi', 'tbsdms.sistemSeleksi')->get();
			
			
			$tbkegiatandosens = tbkegiatandosens::where('idprodi','=',$prodi)->get(); 
			$tbprestasidosens = tbprestasidosens::where('idprodi','=',$prodi)->get(); 
			$tborganisasiprofesis = tborganisasiprofesis::where('idprodi','=',$prodi)->get(); 
			$masterketenagapendidikans = masterketenagapendidikans::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			
			$masterdosens = masterdosens::where('idprodi','like',$prodi.'%')->get(); 
			$tbpedomansdms = 	DB::table('tbpedomansdms')
								->join('tbsdms', 'tbpedomansdms.idsdm', '=', 'tbsdms.id')	
								->join('masterprodis', 'tbsdms.idprodi', '=', 'masterprodis.idprodi')
								->where('masterprodis.idprodi','like',$prodi.'%')
								->select('tbpedomansdms.*', 'masterprodis.namaProdi', 'tbsdms.sistemSeleksi')->get();
								
			$tbkegiatandosens = tbkegiatandosens::where('idprodi','like',$prodi.'%')->get(); 
			$tbprestasidosens = tbprestasidosens::where('idprodi','like',$prodi.'%')->get(); 
			$tborganisasiprofesis = tborganisasiprofesis::where('idprodi','like',$prodi.'%')->get(); 
			$masterketenagapendidikans = masterketenagapendidikans::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();
		
			$masterdosens = masterdosens::all(); 
			$tbpedomansdms = 	DB::table('tbpedomansdms')
								->join('tbsdms', 'tbpedomansdms.idsdm', '=', 'tbsdms.id')	
								->join('masterprodis', 'tbsdms.idprodi', '=', 'masterprodis.idprodi')
								->select('tbpedomansdms.*', 'masterprodis.namaProdi', 'tbsdms.sistemSeleksi')->get();
								
			$tbkegiatandosens = tbkegiatandosens::all(); 
			$tbprestasidosens = tbprestasidosens::all(); 
			$tborganisasiprofesis = tborganisasiprofesis::all(); 
			$masterketenagapendidikans = masterketenagapendidikans::all();

		}	 	
		
		
		$menu = "lampiran4"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st4.lampiran4', compact('tbijazahdosens','masterdosens','tbpedomansdms','tbsdms','tbkegiatandosens','tbprestasidosens','tborganisasiprofesis','masterketenagapendidikans','masterprodis', 'menu','menu2','Akses'));

			
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function addijazahdosen()
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
		Session::set('tab_lampiran4','ijazahdosen');
		$menu = "lampiran4"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st4.formijazahdosen', compact('masterprodis','menu','menu2','Akses','level'));

		
		
	}
	

	public function saveijazahdosen(Request $request)
	{
		Session::set('tab_lampiran4','ijazahdosen');
		$file = $request->file('ijazah_dosen');
		
		$data = new tbijazahdosens;
		$input	  = Input::all();
		$validator = Validator::make($input, tbijazahdosens::$rules, tbijazahdosens::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$nip			= Input::get('nip');
		$jenis_lampiran		= Input::get('jenis_lampiran');
 		$ijazah_dosen			= $file->getClientOriginalName();
 		
 		
 		$data->nip				= $nip;
 		$data->jenis_lampiran	= $jenis_lampiran;
 		$data->ijazah_dosen		= $ijazah_dosen;
		
		$destinationPath = 'lampiran/ijazah_dosen/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
 		$data->save();
		return redirect('lampiran4')
			->with('statusijazah', 'Data telah berhasil disimpan');
	}

	
	public function delijazahdosen($id)
	{
		Session::set('tab_lampiran4','ijazahdosen');
		$tbijazahdosens = tbijazahdosens::where('id',$id)->get();
		foreach($tbijazahdosens as $value) {
			$ijazah_dosen = $value->ijazah_dosen;
			unlink ("lampiran/ijazah_dosen/".$ijazah_dosen);
		}
		$data = tbijazahdosens::find($id);
		$data->delete();
		
		//redirect
		return redirect('lampiran4')
			->with('statusijazah', 'Data telah berhasil dihapus');
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function addpedomansdm()
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$tbsdms = 	DB::table('tbsdms')
						->join('masterprodis', 'tbsdms.idprodi', '=', 'masterprodis.idprodi')
						->where('masterprodis.idprodi','=',$prodi)
						->select('masterprodis.namaProdi', 'masterprodis.idprodi')->get();
			
		} else if ($level == "fakultas") {
			$tbsdms = 	DB::table('tbsdms')
						->join('masterprodis', 'tbsdms.idprodi', '=', 'masterprodis.idprodi')
						->where('masterprodis.idprodi','like',$prodi.'%')
						->select('masterprodis.namaProdi', 'masterprodis.idprodi')->get();

		} else if ($level == "admin") {
			$tbsdms = 	DB::table('tbsdms')
						->join('masterprodis', 'tbsdms.idprodi', '=', 'masterprodis.idprodi')
						->select('masterprodis.namaProdi', 'masterprodis.idprodi')->get();

		}	 	
		Session::set('tab_lampiran4','pedomansdm');
		$menu = "lampiran4"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st4.formpedomansdm', compact('tbsdms','menu','menu2','Akses','level'));

		
		
	}
	

	public function savepedomansdm(Request $request)
	{
		Session::set('tab_lampiran4','pedomansdm');
		$file = $request->file('pedoman_sdm');
		
		$data = new tbpedomansdms;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpedomansdms::$rules, tbpedomansdms::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$idprodi			= Input::get('idprodi');
		$tbsdms 		= tbsdms::where('idprodi','=',$idprodi)->get();
		foreach($tbsdms as $value) {
			$idsdm = $value->id;
		}
		
		
		$jenis_lampiran		= Input::get('jenis_lampiran');
 		$pedoman_sdm		= $file->getClientOriginalName();
 		
 		
 		$data->idsdm				= $idsdm;
 		$data->jenis_lampiran		= $jenis_lampiran;
 		$data->pedoman_sdm  		= $pedoman_sdm;
		
		$destinationPath = 'lampiran/pedoman_sdm/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
 		$data->save();
		return redirect('lampiran4')
			->with('statuspedoman', 'Data telah berhasil disimpan');
	}

	
	public function delpedomansdm($id)
	{
		Session::set('tab_lampiran4','pedomansdm');
		$tbpedomansdms = tbpedomansdms::where('id',$id)->get();
		foreach($tbpedomansdms as $value) {
			$pedoman_sdm = $value->pedoman_sdm;
			unlink ("lampiran/pedoman_sdm/".$pedoman_sdm);
		}
		$data = tbpedomansdms::find($id);
		$data->delete();
		
		//redirect
		return redirect('lampiran4')
			->with('statuspedoman', 'Data telah berhasil dihapus');
	}
	
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function addlampirankegiatandosen($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			
			$tbkegiatandosens = tbkegiatandosens::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			
			$tbkegiatandosens = tbkegiatandosens::where('id',$id)->where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			
			$tbkegiatandosens = tbkegiatandosens::where('id',$id)->get();

		}	 
		Session::set('tab_lampiran4','kegiatandosen');
		$menu = "lampiran4"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st4.formlampirankegiatandosen', compact('tbkegiatandosens','menu','menu2','Akses','level'));

		
		
	}
	

	public function savelampirankegiatandosen(Request $request)
	{
		Session::set('tab_lampiran4','kegiatandosen');
		$file = $request->file('bukti_kegiatandosen');
		
		$data = new tbkegiatandosens;
		$input	  = Input::all();
		$validator = Validator::make($input, tbkegiatandosens::$rules_dok, tbkegiatandosens::$messages_dok);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id = Input::get('id');
 		$bukti_kegiatandosen			= $file->getClientOriginalName();
 		
 		
 		DB:: table('tbkegiatandosens')->where('id', $id)->update(array(
		'bukti_kegiatandosen'		=> $bukti_kegiatandosen));
		
		$destinationPath = 'lampiran/kegiatandosen/';
		$file->move($destinationPath,$file->getClientOriginalName());
		
		return redirect('lampiran4')
			->with('statuskegiatan', 'Data telah berhasil disimpan');
	}

	
	public function dellampirankegiatandosen($id)
	{
		Session::set('tab_lampiran4','kegiatandosen');
		$tbkegiatandosens = tbkegiatandosens::where('id',$id)->get();
		foreach($tbkegiatandosens as $value) {
			$bukti_kegiatandosen = $value->bukti_kegiatandosen;
			unlink ("lampiran/kegiatandosen/".$bukti_kegiatandosen);
		}
		DB:: table('tbkegiatandosens')->where('id', $id)->update(array(
		'bukti_kegiatandosen'		=> ""));
		
		//redirect
		return redirect('lampiran4')
			->with('statuskegiatan', 'Data telah berhasil dihapus');
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function addlampiranprestasidosen($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			
			$tbprestasidosens = tbprestasidosens::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			
			$tbprestasidosens = tbprestasidosens::where('id',$id)->where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			
			$tbprestasidosens = tbprestasidosens::where('id',$id)->get();

		}	 
		Session::set('tab_lampiran4','prestasidosen');
		$menu = "lampiran4"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st4.formlampiranprestasidosen', compact('tbprestasidosens','menu','menu2','Akses','level'));

		
		
	}
	

	public function savelampiranprestasidosen(Request $request)
	{
		Session::set('tab_lampiran4','prestasidosen');
		$file = $request->file('bukti_prestasidosen');
		
		$data = new tbprestasidosens;
		$input	  = Input::all();
		$validator = Validator::make($input, tbprestasidosens::$rules_dok, tbprestasidosens::$messages_dok);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id = Input::get('id');
 		$bukti_prestasidosen			= $file->getClientOriginalName();
 		
 		
 		DB:: table('tbprestasidosens')->where('id', $id)->update(array(
		'bukti_prestasidosen'		=> $bukti_prestasidosen));
		
		$destinationPath = 'lampiran/prestasidosen/';
		$file->move($destinationPath,$file->getClientOriginalName());
		
		return redirect('lampiran4')
			->with('statusprestasi', 'Data telah berhasil disimpan');
	}

	
	public function dellampiranprestasidosen($id)
	{
		Session::set('tab_lampiran4','prestasidosen');
		$tbprestasidosens = tbprestasidosens::where('id',$id)->get();
		foreach($tbprestasidosens as $value) {
			$bukti_prestasidosen = $value->bukti_prestasidosen;
			unlink ("lampiran/prestasidosen/".$bukti_prestasidosen);
		}
		DB:: table('tbprestasidosens')->where('id', $id)->update(array(
		'bukti_prestasidosen'		=> ""));
		
		//redirect
		return redirect('lampiran4')
			->with('statusprestasi', 'Data telah berhasil dihapus');
	}
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function addlampiranorgdosen($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			
			$tborganisasiprofesis = tborganisasiprofesis::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			
			$tborganisasiprofesis = tborganisasiprofesis::where('id',$id)->where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			
			$tborganisasiprofesis = tborganisasiprofesis::where('id',$id)->get();

		}	 
		Session::set('tab_lampiran4','organisasi');
		$menu = "lampiran4"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st4.formlampiranorgdosen', compact('tborganisasiprofesis','menu','menu2','Akses','level'));

		
		
	}
	

	public function savelampiranorgdosen(Request $request)
	{
		Session::set('tab_lampiran4','organisasi');
		$file = $request->file('bukti_organisasiprofesi');
		
		$data = new tborganisasiprofesis;
		$input	  = Input::all();
		$validator = Validator::make($input, tborganisasiprofesis::$rules_dok, tborganisasiprofesis::$messages_dok);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id = Input::get('id');
 		$bukti_organisasiprofesi			= $file->getClientOriginalName();
 		
 		
 		DB:: table('tborganisasiprofeses')->where('id', $id)->update(array(
		'bukti_organisasiprofesi'		=> $bukti_organisasiprofesi));
		
		$destinationPath = 'lampiran/organisasi/';
		$file->move($destinationPath,$file->getClientOriginalName());
		
		return redirect('lampiran4')
			->with('statusorg', 'Data telah berhasil disimpan');
	}

	
	public function dellampiranorgdosen($id)
	{
		Session::set('tab_lampiran4','organisasi');
		$tborganisasiprofesis = tborganisasiprofesis::where('id',$id)->get();
		foreach($tborganisasiprofesis as $value) {
			$bukti_organisasiprofesi = $value->bukti_organisasiprofesi;
			unlink ("lampiran/organisasi/".$bukti_organisasiprofesi);
		}
		DB:: table('tborganisasiprofeses')->where('id', $id)->update(array(
		'bukti_organisasiprofesi'		=> ""));
		
		//redirect
		return redirect('lampiran4')
			->with('statusorg', 'Data telah berhasil dihapus');
	}
	
}