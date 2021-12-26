<?php namespace App\Http\Controllers;

use App\masterkurikulums;

class MasterkurikulumController extends Controller {

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
		
			$masterkurikulum = masterkurikulums::all();	
		
		$menu = "masterkurikulum"; //nama menu
		$menu2 = "";
			return view('master.master kurikulum.masterkurikulum', compact('menu','masterkurikulum','Akses','buka','menu2'));
		
		
		
		
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
			$idprodi = Session::get('idprodi');
			if(Session::get('level')=='admin'){
			$masterprodis = masterprodis::all();
			}

			if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
			}
			Return View::make('master.master kurikulum.formkurikulum')->with('data2',$masterprodis);		
		
	}

	public function save(){

		$databarukurikulum = new masterkurikulums;

		$id				= Input::get('id');
 		$idprodi		= Input::get('idprodi');
 		$idkurikulum	= Input::get('idkurikulum');
 		$deskripsi		= Input::get('deskripsi');

 		$databarukurikulum->id 			= $id;
 		$databarukurikulum->idprodi		= $idprodi;
 		$databarukurikulum->idkurikulum	= $idkurikulum;
 		$databarukurikulum->deskripsi	= $deskripsi;
 		
 		
 		
 		$databarukurikulum->save();
		
		return Redirect::to('masterkurikulum');
	}


	public function delete($id)
	{
		$databarukurikulum = masterkurikulums::find($id);
		$databarukurikulum->delete();
		//redirect
		return Redirect::to('masterkurikulum');
	}

	public function editmasterkurikulum($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$masterprodis = masterprodis::all();
		$databarukurikulum = masterkurikulums::findorfail($id);
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$databarukurikulum = masterkurikulums::findorfail($id);
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		}

		return View::make('master.master kurikulum.editmasterkurikulum')->with('data',$databarukurikulum)->with('data2',$masterprodis);
	
	}

	public function updatemasterkurikulum()
	{
		$id = Input::get('id');

		DB:: table('masterkurikulums')->where('id', $id)->update(array(
			'id'			=> Input::get('id'),
			'idprodi'		=> Input::get('idprodi'),
 			'idkurikulum'	=> Input::get('idkurikulum'),
 			'deskripsi'		=> Input::get('deskripsi')));

		return Redirect::to('masterkurikulum');

	}
}
