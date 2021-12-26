<?php namespace App\Http\Controllers;

use App\mastermatakuliahs;

class MastermatakuliahController extends Controller {

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
		
			$mastermatakuliah = mastermatakuliahs::all();	
		
		$menu = "mastermatakuliah"; //nama menu
		$menu2 = "";
			return view('master.master mkuliah.mastermatakuliah', compact('menu','mastermatakuliah','Akses','buka','menu2'));
	
		
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
			$masterkurikulums	= masterkurikulums::all();
			$masterfakultas		= masterfakultas::all();
			
			}

			if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
			$masterkurikulums	= masterkurikulums::where ('idprodi',$idprodi)->get();
			$masterfakultas		= masterfakultas::all();
			
			}
				
			Return View::make('master.master mkuliah.formmatakuliah')->with('data',$masterprodis)->with('data1',$masterkurikulums)->with('data2',$masterfakultas);	
		
	}

	public function save(){

		$databarumatkul = new mastermatakuliahs;

		$id 					= Input::get('id');
		$semester				= Input::get('semester');
 		$idmatakuliah			= Input::get('idmatakuliah');
 		$namaMataKuliah			= Input::get('namaMataKuliah');
 		$jenisMataKuliah		= Input::get('jenisMataKuliah');
 		$jenisMKPilihan			= Input::get('jenisMKPilihan');
 		$sks					= Input::get('sks');
 		$sks_inti				= Input::get('sks_inti');
 		$sks_institusi			= Input::get('sks_institusi');
 		$bobot_tugas			= Input::get('bobot_tugas');
 		$deskripsi				= Input::get('deskripsi');
 		$silabus				= Input::get('silabus');
 		$sap					= Input::get('sap');
 		$statusMataKuliah		= Input::get('statusMataKuliah');
 		$idprodi				= Input::get('idprodi');
 		$idkurikulum			= Input::get('idkurikulum');
 		$idfakultas				= Input::get('idfakultas');

 		$databarumatkul->id 					= $id;
 		$databarumatkul->semester 				= $semester;
 		$databarumatkul->idmatakuliah			= $idmatakuliah;
 		$databarumatkul->namaMataKuliah			= $namaMataKuliah;
 		$databarumatkul->jenisMataKuliah		= $jenisMataKuliah;
 		$databarumatkul->jenisMKPilihan			= $jenisMKPilihan;
 		$databarumatkul->sks					= $sks;
 		$databarumatkul->sks_inti				= $sks_inti;
 		$databarumatkul->sks_institusi			= $sks_institusi;
 		$databarumatkul->bobot_tugas			= $bobot_tugas;
 		$databarumatkul->deskripsi				= $deskripsi;
 		$databarumatkul->silabus				= $silabus;
 		$databarumatkul->sap					= $sap;
		$databarumatkul->statusMataKuliah		= $statusMataKuliah;
		$databarumatkul->idprodi				= $idprodi;
		$databarumatkul->idkurikulum			= $idkurikulum;
		$databarumatkul->idfakultas				= $idfakultas; 		
 		
 		$databarumatkul->save();
		
		return Redirect::to('mastermatakuliah');
	}

	public function delete($id)
	{
		$databarumatkul = mastermatakuliahs::find($id);
		$databarumatkul->delete();
		//redirect
		return Redirect::to('mastermatakuliah');
	}


	public function editmastermatakuliah($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$masterprodis 		= masterprodis::all();
		$masterkurikulums	= masterkurikulums::all();
		$masterfakultas		= masterfakultas::all();
		$databarumatkul 	= mastermatakuliahs::findorfail($id);
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$databarumatkul 	= mastermatakuliahs::findorfail($id);
		$masterprodis 		= masterprodis::where('idprodi',$idprodi)->get();
		$masterkurikulums	= masterkurikulums::where('idprodi',$idprodi)->get();
		$masterfakultas		= masterfakultas::all();
		}
		
	return View::make('master.master mkuliah.editmastermatakuliah')->with('data',$databarumatkul)->with('data1',$masterprodis)->with('data2',$masterkurikulums)->with('data3',$masterfakultas);
	
	}

	public function updatemastermatakuliah()
	{
		$id = Input::get('id');

		DB:: table('mastermatakuliahs')->where('id', $id)->update(array(
			'id'					=> Input::get('id'),
			'semester'				=> Input::get('semester'),
 			'idmatakuliah'			=> Input::get('idmatakuliah'),
	 		'namaMataKuliah'		=> Input::get('namaMataKuliah'),
	 		'jenisMataKuliah'		=> Input::get('jenisMataKuliah'),
	 		'jenisMKPilihan'		=> Input::get('jenisMKPilihan'),
	 		'sks'					=> Input::get('sks'),
	 		'sks_inti'				=> Input::get('sks_inti'),
	 		'sks_institusi'			=> Input::get('sks_institusi'),
	 		'bobot_tugas'			=> Input::get('bobot_tugas'),
	 		'deskripsi'				=> Input::get('deskripsi'),
	 		'silabus'				=> Input::get('silabus'),
	 		'sap'					=> Input::get('sap'),
	 		'statusMataKuliah'		=> Input::get('statusMataKuliah'),
	 		'idprodi'				=> Input::get('idprodi'),
	 		'idkurikulum'			=> Input::get('idkurikulum'),
	 		'idfakultas'			=> Input::get('idfakultas')));


		return Redirect::to('mastermatakuliah');

	}

	public function detail($id) {
		$databarumatkul		= mastermatakuliahs::findorfail($id);
		$disable 			= 'disabled';
		return View::make('master.master mkuliah.detailmastermatakuliah')->with('data',$databarumatkul)->with('disable',$disable);
	}
}
