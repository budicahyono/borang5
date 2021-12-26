<?php namespace App\Http\Controllers;

use App\masterfakultas;

class MasterfakultasController extends Controller {

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
		
			$masterfakultas = masterfakultas::all();	
		
		$menu = "masterfakultas"; //nama menu
		$menu2 = "";
			return view('master.master fakultas.masterfakultas', compact('menu','masterfakultas','Akses','buka','menu2'));
		
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		//
		
			Return View::make('master.master fakultas.formfakultas');	
		
	}

	public function save(){

		$databarufakultas = new masterfakultas;

		$id					= Input::get('id');
 		$idfakultas			= Input::get('idfakultas');
 		$namaFakultas		= Input::get('namaFakultas');
 		$singkatan			= Input::get('singkatan');

 		$databarufakultas->id 			= $id;
 		$databarufakultas->idfakultas	= $idfakultas;
 		$databarufakultas->namaFakultas = $namaFakultas;
 		$databarufakultas->singkatan	= $singkatan;
 		
 		
 		$databarufakultas->save();
		
		return Redirect::to('masterfakultas');
	}

		public function delete($id)
	{
		$databarufakultas = masterfakultas::find($id);
		$databarufakultas->delete();

		//redirect
		return Redirect::to('masterfakultas');

	}
	
	public function editmasterfakultas($id)
	{
		$databarufakultas = masterfakultas::findorfail($id);
		return View::make('master.master fakultas.editmasterfakultas')->with('data',$databarufakultas);
	
	}

	public function updatemasterfakultas()
	{
		$id = Input::get('id');

		DB:: table('masterfakultas')->where('id', $id)->update(array(
			'id'				=> Input::get('id'),
			'idfakultas'		=> Input::get('idfakultas'),
 			'namaFakultas'		=> Input::get('namaFakultas'),
 			'singkatan'			=> Input::get('singkatan')

				));

		return Redirect::to('masterfakultas');

	}
}