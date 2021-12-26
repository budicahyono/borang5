<?php namespace App\Http\Controllers;

use App\tbdokumentatapamongs;
use App\tbtatapamongs;
use App\tbumpanbaliks;
use App\masterprodis;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;


class lampiran2Controller extends Controller {

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
			$tbdokumentatapamongs = DB::table('tbdokumentatapamongs')
									->join('tbtatapamongs', 'tbdokumentatapamongs.idtatapamong', '=', 'tbtatapamongs.id')
									->join('masterprodis', 'tbtatapamongs.idprodi', '=', 'masterprodis.idprodi')
									->where('masterprodis.idprodi','=',$prodi)
									->select('tbdokumentatapamongs.*', 'masterprodis.namaProdi', 'tbtatapamongs.tataPamong')->get(); 
			$tbumpanbaliks = tbumpanbaliks::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			$tbdokumentatapamongs = DB::table('tbdokumentatapamongs')
									->join('tbtatapamongs', 'tbdokumentatapamongs.idtatapamong', '=', 'tbtatapamongs.id')
									->join('masterprodis', 'tbtatapamongs.idprodi', '=', 'masterprodis.idprodi')
									->where('masterprodis.idprodi','like',$prodi.'%')
									->select('tbdokumentatapamongs.*', 'masterprodis.namaProdi', 'tbtatapamongs.tataPamong')->get(); 
			$tbumpanbaliks = tbumpanbaliks::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$tbdokumentatapamongs = DB::table('tbdokumentatapamongs')
									->join('tbtatapamongs', 'tbdokumentatapamongs.idtatapamong', '=', 'tbtatapamongs.id')
									->join('masterprodis', 'tbtatapamongs.idprodi', '=', 'masterprodis.idprodi')	
									->select('tbdokumentatapamongs.*', 'masterprodis.namaProdi', 'tbtatapamongs.tataPamong')->get(); 
			$tbumpanbaliks = tbumpanbaliks::all();

		}	 	
		
		
		$menu = "lampiran2"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st2.lampiran2', compact('tbdokumentatapamongs', 'tbumpanbaliks', 'menu','menu2','Akses'));

			
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function addlampirantatapamong()
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			
			$tbtatapamongs = DB::table('tbtatapamongs')
						->join('masterprodis', 'tbtatapamongs.idprodi', '=', 'masterprodis.idprodi')
						->where('masterprodis.idprodi','=',$prodi)
						->select('masterprodis.namaProdi', 'masterprodis.idprodi')->get();
		} else if ($level == "fakultas") {
			
			$tbtatapamongs = DB::table('tbtatapamongs')
						->join('masterprodis', 'tbtatapamongs.idprodi', '=', 'masterprodis.idprodi')
						->where('masterprodis.idprodi','like',$prodi.'%')
						->select('masterprodis.namaProdi', 'masterprodis.idprodi')->get();
			

		} else if ($level == "admin") {
			
			$tbtatapamongs = DB::table('tbtatapamongs')
							->join('masterprodis', 'tbtatapamongs.idprodi', '=', 'masterprodis.idprodi')
							->select('masterprodis.namaProdi', 'masterprodis.idprodi')->get();
			

		}	 	
		Session::set('tab_lampiran2','tatapamong');
		$menu = "lampiran2"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st2.formlampirantatapamong', compact('tbtatapamongs','menu','menu2','Akses','level'));

		
		
	}
	

	public function savelampirantatapamong(Request $request)
	{
		Session::set('tab_lampiran2','tatapamong');
		$file = $request->file('dokumen_tatapamong');
		
		$data = new tbdokumentatapamongs;
		$input	  = Input::all();
		$validator = Validator::make($input, tbdokumentatapamongs::$rules, tbdokumentatapamongs::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$idprodi			= Input::get('idprodi');
		$tatapamong 		= tbtatapamongs::where('idprodi','=',$idprodi)->get();
		foreach($tatapamong as $value) {
			$idtatapamong = $value->id;
		}
		
		
		$jenis_lampiran		= Input::get('jenis_lampiran');
 		$dokumen_tatapamong	= $file->getClientOriginalName();
 		
 		
 		$data->idtatapamong			= $idtatapamong;
 		$data->jenis_lampiran		= $jenis_lampiran;
 		$data->dokumen_tatapamong  = $dokumen_tatapamong;
		
		$destinationPath = 'lampiran/tatapamong/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
 		$data->save();
		return redirect('lampiran2')
			->with('statuspamong', 'Data telah berhasil disimpan');
	}


	
	public function dellampirantatapamong($id)
	{
		Session::set('tab_lampiran2','tatapamong');
		$tbdokumentatapamongs = tbdokumentatapamongs::where('id',$id)->get();
		foreach($tbdokumentatapamongs as $value) {
			$dokumen_tatapamong = $value->dokumen_tatapamong;
			unlink ("lampiran/tatapamong/".$dokumen_tatapamong);
		}
		$data = tbdokumentatapamongs::find($id);
		$data->delete();
		
		//redirect
		return redirect('lampiran2')
			->with('statuspamong', 'Data telah berhasil dihapus');
	}
	
	
	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function addlampiranumpanbalik($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			
			$tbumpanbaliks = tbumpanbaliks::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			
			$tbumpanbaliks = tbumpanbaliks::where('id',$id)->where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			
			$tbumpanbaliks = tbumpanbaliks::where('id',$id)->get();

		}	 	
		Session::set('tab_lampiran2','umpanbalik');
		$menu = "lampiran2"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st2.formlampiranumpanbalik', compact('tbumpanbaliks','menu','menu2','Akses','level'));

		
		
	}
	

	public function savelampiranumpanbalik(Request $request)
	{
		Session::set('tab_lampiran2','umpanbalik');
		$file = $request->file('dokumen_umpanbalik');
		
		$data = new tbumpanbaliks;
		$input	  = Input::all();
		$validator = Validator::make($input, tbumpanbaliks::$rules, tbumpanbaliks::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$id = Input::get('id');
 		$dokumen_umpanbalik	= $file->getClientOriginalName();
 		
 		
 		DB:: table('tbumpanbaliks')->where('id', $id)->update(array(
		'dokumen_umpanbalik'		=> $dokumen_umpanbalik));
		
		$destinationPath = 'lampiran/umpanbalik/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
		return redirect('lampiran2')
			->with('statusumpan', 'Data telah berhasil disimpan');
	}


	
	public function dellampiranumpanbalik($id)
	{
		Session::set('tab_lampiran2','umpanbalik');
		$tbumpanbaliks = tbumpanbaliks::where('id',$id)->get();
		foreach($tbumpanbaliks as $value) {
			$dokumen_umpanbalik = $value->dokumen_umpanbalik;
			unlink ("lampiran/umpanbalik/".$dokumen_umpanbalik);
		}
		DB:: table('tbumpanbaliks')->where('id', $id)->update(array(
		'dokumen_umpanbalik'		=> ""));
		
		//redirect
		return redirect('lampiran2')
			->with('statusumpan', 'Data telah berhasil dihapus');
	}
	
}