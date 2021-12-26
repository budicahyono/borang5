<?php namespace App\Http\Controllers;

use App\masterjeniskemampuans;

class MasterjeniskemampuanController extends Controller {

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
		
			$masterjeniskemampuan = masterjeniskemampuans::all();	
		
		$menu = "masterjeniskemampuan"; //nama menu
		$menu2 = "";
			return view('master.master jkemampuan.masterjeniskemampuan', compact('menu','masterjeniskemampuan','Akses','buka','menu2'));

		

		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		//
		
			Return View::make('master.master jkemampuan.formjeniskemampuan');	
		
	}

	public function save(){

		$databarukemampuan = new masterjeniskemampuans;

		$id 				= Input::get('id');
 		$jenisKemampuan		= Input::get('jenisKemampuan');

 		$databarukemampuan->id				= $id;
 		$databarukemampuan->jenisKemampuan	= $jenisKemampuan;
 		
 		
 		
 		$databarukemampuan->save();
		
		return Redirect::to('masterjeniskemampuan');
	}

		public function delete($id)
	{
		$databarukemampuan = masterjeniskemampuans::find($id);
		$databarukemampuan->delete();
		//redirect
		return Redirect::to('masterjeniskemampuan');
	}

		public function editmasterjeniskemampuan ($id)
	{
		$databarukemampuan= masterjeniskemampuans::findorfail($id);
		return View::make('master.master jkemampuan.editmasterjeniskemampuan')->with('data',$databarukemampuan);
	
	}

	public function updatemasterjeniskemampuan()
	{
		$id = Input::get('id');

		DB:: table('masterjeniskemampuans')->where('id', $id)->update(array(
			'jenisKemampuan'		=> Input::get('jenisKemampuan')));
 			

		return Redirect::to('masterjeniskemampuan');

	}


}
