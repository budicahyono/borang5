<?php namespace App\Http\Controllers;

use App\masterbiayapenelitians;

class MasterbiayaController extends Controller {

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
		
			$masterbiaya = masterbiayapenelitians::all();	
		
		$menu = "masterbiaya"; //nama menu
		$menu2 = "";
			return view('master.master biaya.masterbiaya', compact('menu','masterbiaya','Akses','buka','menu2'));
		
		
		
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		//
		
			Return View::make('master.master biaya.formbiaya');	
		
	}

	public function save(){

		$sumberbiaya = new masterbiayapenelitians;

 		$biaya= Input::get('sumberBiaya');
 		
 		$sumberbiaya->sumberBiaya = $biaya;
 		
 		$sumberbiaya->save();
 		
 		return Redirect::to('masterbiaya');
 		
	}


	public function delete($idbiaya)
	{
		$sumberbiaya = masterbiayapenelitians::find($idbiaya);
		$sumberbiaya->delete();

		//redirect
		return Redirect::to('masterbiaya');
	}


	public function editmasterbiaya($idbiaya)
	{
		$sumberbiaya = masterbiayapenelitians::findorfail($idbiaya);
		return View::make('master.master biaya.editmasterbiaya')->with('data',$sumberbiaya);
	
	}

	public function updatemasterbiaya()
	{
		$idbiaya = Input::get('idbiaya');

		DB:: table('masterbiayapenelitians')->where('idbiaya', $idbiaya)->update(array('sumberBiaya'=> Input::get('sumberBiaya')));

		return Redirect::to('masterbiaya');

	}
}

