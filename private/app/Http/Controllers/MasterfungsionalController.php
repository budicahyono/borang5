<?php namespace App\Http\Controllers;

use App\masterfungsionals;

class MasterfungsionalController extends Controller {

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
		
			$masterfungsional = masterfungsionals::all();	
		
		$menu = "masterfungsional"; //nama menu
		$menu2 = "";
			return view('master.master fungsional.masterfungsional', compact('menu','masterfungsional','Akses','buka','menu2'));
		
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		//
		
			Return View::make('master.master fungsional.formfungsional');	
		
	}

	public function save(){

		$databarufungsional = new masterfungsionals;

 		$namajabatan		= Input::get('namajabatan');

 		$databarufungsional->namaJabatan	= $namajabatan;
 		
 		$databarufungsional->save();

 		return Redirect::to('masterfungsional');
		
	}

	public function delete($idjabatan)
	{
		$databarufungsional = masterfungsionals::find($idjabatan);
		$databarufungsional->delete();

		//redirect
		return Redirect::to('masterfungsional');
	}


	public function editmasterfungsional($idjabatan)
	{
		$databarufungsional = masterfungsionals::findorfail($idjabatan);
		return View::make('master.master fungsional.editmasterfungsional')->with('data',$databarufungsional);
	
	}

	public function updatemasterfungsional()
	{
		$idjabatan = Input::get('idjabatan');

		DB:: table('masterfungsionals')->where('idjabatan', $idjabatan)->update(array('namajabatan'	=> Input::get('namajabatan')));

		return Redirect::to('masterfungsional');

	}
}