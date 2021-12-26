<?php namespace App\Http\Controllers;

use App\masterprodis;
use App\masterfakultas;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator ;

class MasterprodiController extends Controller {

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
		
			$masterprodi = masterprodis::all();	
		
		$menu = "masterprodi"; //nama menu
		$menu2 = "";
			return view('master.master prodi.masterprodi', compact('menu','masterprodi','Akses','buka','menu2'));
		
	
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa
		
			$masterfakultas = masterfakultas::all();	
		
		$menu = "masterprodi"; //nama menu
		$menu2 = "";
			return view('master.master prodi.formprodi', compact('menu','masterfakultas','Akses','level','menu2'));
		
	}

	public function save(){

		$databaruprodi = new masterprodis;
		
		$input	  = Input::all();
		$validator = Validator::make($input, masterprodis::$rules, masterprodis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
 		$idprodi			= Input::get('idprodi');
 		$namaProdi			= Input::get('namaProdi');
 		$idfakultas			= Input::get('idfakultas');
 		$jenjang			= Input::get('jenjang');
 		$kaprodi			= Input::get('kaprodi');
 		$minSksLulus		= Input::get('minSksLulus');
 		

 		$databaruprodi->idprodi			= $idprodi;
 		$databaruprodi->namaProdi		= $namaProdi;
 		$databaruprodi->idfakultas		= $idfakultas;
 		$databaruprodi->jenjang			= $jenjang;
 		$databaruprodi->kaprodi			= $kaprodi;
 		$databaruprodi->minSksLulus		= $minSksLulus;
 		
 		
 		$databaruprodi->save();
		
		return redirect('masterprodi')
			->with('status', 'Data telah berhasil disimpan');
	}

	public function delete($id)
	{
		$databaruprodi = masterprodis::find($id);
		$databaruprodi->delete();
		//redirect
		return redirect('masterprodi')
			->with('status', 'Data telah berhasil dihapus');
	}

	public function edit($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
			
			$masterprodi 		= masterprodis::where('idprodi',$id)->get(); 
			$masterfakultas		= masterfakultas::all();
		
		$menu = "masterprodi"; //nama menu
		$menu2 = ""; //nama submenu
		
			return view('master.master prodi.editmasterprodi', compact('masterprodi','masterfakultas','menu','menu2','Akses', 'level'));

		
	}

	public function update()
	{
		$idprodi = Input::get('id');
		
		$input	  = Input::all();
		$validator = Validator::make($input, masterprodis::$rules, masterprodis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		DB:: table('masterprodis')->where('idprodi', $idprodi)->update(array(
	 		'namaProdi'			=> Input::get('namaProdi'),
	 		'jenjang'			=> Input::get('jenjang'),
	 		'kaprodi'			=> Input::get('kaprodi'),
	 		'minSksLulus'		=> Input::get('minSksLulus')));

		return redirect('masterprodi')
			->with('status', 'Data telah berhasil diedit');

	}

	
}
