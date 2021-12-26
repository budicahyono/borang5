<?php namespace App\Http\Controllers;

use App\masterinstituses;

class MasterinstitusiController extends Controller {

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
		
			$masterinstitut = masterinstituses::all();	
		
		$menu = "masterinstitusi"; //nama menu
		$menu2 = "";
			return view('master.master institusi.masterinstitusi', compact('menu','masterinstitut','Akses','buka','menu2'));
		

		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		//
		
			Return View::make('master.master institusi.forminstitusi');	
		
	}

	public function save(){

		$databaruinstitusi = new masterinstituses;

 		$namaInstitusi		= Input::get('namaInstitusi');
 		$tingkat			= Input::get('tingkat');
 		$jenis				= Input::get('jenis');

 		$databaruinstitusi->namaInstitusi	= $namaInstitusi;
 		$databaruinstitusi->tingkat			= $tingkat;
 		$databaruinstitusi->jenis			= $jenis;
 		
 		
 		$databaruinstitusi->save();
		
		return Redirect::to('masterinstitusi');
	}


	public function delete($idinstitusi)
	{
		$databaruinstitusi = masterinstituses::find($idinstitusi);
		$databaruinstitusi->delete();
		//redirect
		return Redirect::to('masterinstitusi');

	}


	public function editmasterinstitusi($idinstitusi)
	{
		$databaruinstitusi = masterinstituses::findorfail($idinstitusi);
		return View::make('master.master institusi.editmasterinstitusi')->with('data',$databaruinstitusi);
	
	}

	public function updatemasterinstitusi()
	{
		$idinstitusi = Input::get('idinstitusi');

		DB:: table('masterinstituses')->where('idinstitusi', $idinstitusi)->update(array(
			'namaInstitusi'		=> Input::get('namaInstitusi'),
 			'tingkat'			=> Input::get('tingkat'),
 			'jenis'				=> Input::get('jenis')));

		return Redirect::to('masterinstitusi');

	}


}
