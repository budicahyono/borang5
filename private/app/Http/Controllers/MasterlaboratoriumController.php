<?php namespace App\Http\Controllers;

use App\masterlaboratoriums;

class MasterlaboratoriumController extends Controller {

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
		
			$masterlaboratorium = masterlaboratoriums::all();	
		
		$menu = "masterlaboratorium"; //nama menu
		$menu2 = "";
			return view('master.master laboratorium.masterlaboratorium', compact('menu','masterlaboratorium','Akses','buka','menu2'));
		
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		//
			$idprodi = Session::get('idprodi');
			if(Session::get('level')=='admin'){
			$masterprodis = masterprodis::all();
			$masterfakultas	= masterfakultas::all();
			}

			if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
			$masterfakultas	= masterfakultas::all();
			}

			Return View::make('master.master laboratorium.formlaboratorium')->with('data2',$masterprodis)->with('data3',$masterfakultas);	
		
	}

	public function save(){

		$databarulaboratorium = new masterlaboratoriums;

		$id 					= Input::get('id');
		$idfakultas					= Input::get('idfakultas');
 		$idprodi				= Input::get('idprodi');
 		$idlaboratorium			= Input::get('idlaboratorium');
 		$namaLaboratorium		= Input::get('namaLaboratorium');


 		$databarulaboratorium->id 					= $id;
 		$databarulaboratorium->idfakultas			= $idfakultas;
 		$databarulaboratorium->idprodi				= $idprodi;
 		$databarulaboratorium->idlaboratorium		= $idlaboratorium;
 		$databarulaboratorium->namaLaboratorium		= $namaLaboratorium;
 		
 		
 		
 		$databarulaboratorium->save();
		
		return Redirect::to('masterlaboratorium');
	}


	public function delete($id)
	{
		$databarulaboratorium = masterlaboratoriums::find($id);
		$databarulaboratorium->delete();
		//redirect
		return Redirect::to('masterlaboratorium');
	}


	public function editmasterlaboratorium($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$databarulaboratorium = masterlaboratoriums::findorfail($id);
		$masterprodis = masterprodis::all();
		$masterfakultas	= masterfakultas::all();
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$databarulaboratorium = masterlaboratoriums::findorfail($id);
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		$masterfakultas	= masterfakultas::all();
		}
		
		return View::make('master.master laboratorium.editmasterlaboratorium')->with('data',$databarulaboratorium)->with('data2',$masterprodis)->with('data3',$masterfakultas);
	
	}

	public function updatemasterlaboratorium()
	{
		$id = Input::get('id');

		DB:: table('masterlaboratoriums')->where('id', $id)->update(array(
			'id'						=> Input::get('id'),
			'idfakultas'				=> Input::get('idfakultas'),
 			'idprodi'					=> Input::get('idprodi'),
 			'idlaboratorium'			=> Input::get('idlaboratorium'),
 			'namaLaboratorium'			=> Input::get('namaLaboratorium')));

		return Redirect::to('masterlaboratorium');

	}

}
