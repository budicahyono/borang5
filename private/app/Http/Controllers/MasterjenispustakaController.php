<?php namespace App\Http\Controllers;

use App\masterjenispustakas;

class MasterjenispustakaController extends Controller {

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
		
			$masterjenispustaka = masterjenispustakas::all();	
		
		$menu = "masterjenispustaka"; //nama menu
		$menu2 = "";
			return view('master.master jpustaka.masterjenispustaka', compact('menu','masterjenispustaka','Akses','buka','menu2'));
		
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		//
		
			Return View::make('master.master jpustaka.formjenispustaka');	
		
	}

	public function save(){

		$databarupustaka = new masterjenispustakas;

 		$jenisPustaka		= Input::get('jenisPustaka');

 		$databarupustaka->jenisPustaka	= $jenisPustaka;
 		
 		
 		
 		$databarupustaka->save();
		
		return Redirect::to('masterjenispustaka');
	}

		public function delete($idjenispustaka)
	{
		$databarupustaka = masterjenispustakas::find($idjenispustaka);
		$databarupustaka->delete();
		//redirect
		return Redirect::to('masterjenispustaka');
	}

		public function editmasterjenispustaka($idjenispustaka)
	{
		$databarupustaka = masterjenispustakas::findorfail($idjenispustaka);
		return View::make('master.master jpustaka.editmasterjenispustaka')->with('data',$databarupustaka);
	
	}

	public function updatemasterjenispustaka()
	{
		$idjenispustaka = Input::get('idjenispustaka');

		DB:: table('masterjenispustakas')->where('idjenispustaka', $idjenispustaka)->update(array(
			'jenispustaka'		=> Input::get('jenisPustaka')));
 			

		return Redirect::to('masterjenispustaka');

	}


}
