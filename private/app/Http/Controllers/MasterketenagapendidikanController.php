<?php namespace App\Http\Controllers;

use App\masterketenagapendidikans;

class MasterketenagapendidikanController extends Controller {

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
		
			$masterketenagapendidikan = masterketenagapendidikans::all();	
		
		$menu = "masterketenagapendidikan"; //nama menu
		$menu2 = "";
			return view('master.master ketenagapendidikan.masterketenagapendidikan', compact('menu','masterketenagapendidikan','Akses','buka','menu2'));
	
		
		
		
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
			$masterdosen 	= masterdosens::all();
			$masterketenagapendidikans	= masterketenagapendidikans::all();
			$masterfakultas	= masterfakultas::all();
			}
			if(Session::get('level')=='user'){
			$masterdosen 	= masterdosens::where ('idprodi',$idprodi)->get();	
			$masterketenagapendidikans 	= masterketenagapendidikans::where('idprodi',$idprodi)->get();
			$masterfakultas	= masterfakultas::all();
			
			}
			Return View::make('master.master ketenagapendidikan.formketenagapendidikan')->with('data',$masterdosen)->with('data2',$masterketenagapendidikans)->with('data3',$masterfakultas);	
		
	}

	public function save(){

		$databaruketenagapendidikan = new masterketenagapendidikans;

		$id							= Input::get('id');
		$idfakultas					= Input::get('idfakultas');
		$idprodi					= Input::get('idprodi');
 		$nip						= Input::get('nip');
 		$nama						= Input::get('nama');
 		$alamat						= Input::get('alamat');
 		$tempatLahir				= Input::get('tempatLahir');
 		$tanggalLahir				= Input::get('tanggalLahir');
 		$jenisKelamin				= Input::get('jenisKelamin');
 		$jenis 						= Input::get('jenis');
 		$jenjangPendidikanTerakhir	= Input::get('jenjangPendidikanTerakhir');
 		$unitKerja					= Input::get('unitKerja');

 		$databaruketenagapendidikan->id							= $id;
 		$databaruketenagapendidikan->idfakultas					= $idfakultas;
 		$databaruketenagapendidikan->idprodi					= $idprodi;
 		$databaruketenagapendidikan->nip						= $nip;
 		$databaruketenagapendidikan->nama						= $nama;
 		$databaruketenagapendidikan->alamat						= $alamat;
		$databaruketenagapendidikan->tempatLahir				= $tempatLahir;
		$databaruketenagapendidikan->tanggalLahir				= $tanggalLahir;
		$databaruketenagapendidikan->jenisKelamin				= $jenisKelamin;
		$databaruketenagapendidikan->jenis						= $jenis;
		$databaruketenagapendidikan->jenjangPendidikanTerakhir	= $jenjangPendidikanTerakhir;
		$databaruketenagapendidikan->unitKerja					= $unitKerja; 		
 		
 		$databaruketenagapendidikan->save();
		
		return Redirect::to('masterketenagapendidikan');
	}

	public function delete($id)
	{
		$databaruketenagapendidikan = masterketenagapendidikans::find($id);
		$databaruketenagapendidikan->delete();
		//redirect
		return Redirect::to('masterketenagapendidikan');
	}

	public function editmastertenaga($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$masterdosen = masterdosens::all();
		$databaruketenagapendidikan = masterketenagapendidikans::findorfail($id);
		$masterketenagapendidikans = masterketenagapendidikans::all();
		$masterfakultas	= masterfakultas::all();

		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$databaruketenagapendidikan = masterketenagapendidikans::findorfail($id);
		$masterketenagapendidikans = masterketenagapendidikans::where('idprodi',$idprodi)->get();
		$masterdosen = masterdosens::where('idprodi',$idprodi)->get();
		$masterfakultas	= masterfakultas::all();
		}

		
		return View::make('master.master ketenagapendidikan.editmastertenaga')->with('data',$databaruketenagapendidikan)->with('data1',$masterdosen)->with('data2',$masterketenagapendidikans)->with('data3',$masterfakultas);
	
	}

	public function updatemastertenaga()
	{
		$id = Input::get('id');

		DB:: table('masterketenagapendidikans')->where('id', $id)->update(array(
			'id'						=> Input::get('id'),
			'idfakultas'				=> Input::get('idfakultas'),
			'idprodi'					=> Input::get('idprodi'),
			'nip'						=> Input::get('nip'),
	 		'nama'						=> Input::get('nama'),
	 		'alamat'					=> Input::get('alamat'),
	 		'tempatLahir'				=> Input::get('tempatLahir'),
	 		'tanggalLahir'				=> Input::get('tanggalLahir'),
	 		'jenisKelamin'				=> Input::get('jenisKelamin'),
	 		'jenis' 					=> Input::get('jenis'),
	 		'jenjangPendidikanTerakhir'	=> Input::get('jenjangPendidikanTerakhir'),
	 		'unitKerja'					=> Input::get('unitKerja')));

		return Redirect::to('masterketenagapendidikan');

	}

}
