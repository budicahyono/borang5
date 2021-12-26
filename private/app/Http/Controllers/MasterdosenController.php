<?php namespace App\Http\Controllers;

use App\masterdosens;
use App\masterprodis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator ;
 
class MasterdosenController extends Controller {

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
		
			$masterdosen = masterdosens::all();	
		
		$menu = "masterdosen"; //nama menu
		$menu2 = "";
			return view('master.master dosen.masterdosen', compact('menu','masterdosen','Akses','buka','menu2'));
		

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
			// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa
		
			$masterprodis = masterprodis::all();	
		
		$menu = "masterdosen"; //nama menu
		$menu2 = "";
			return view('master.master dosen.formdosen', compact('menu','masterprodis','Akses','level','menu2'));

			
		
	}

	public function save(){

		$databarudosen = new masterdosens;

		$id					= Input::get('id');
 		$idprodi			= Input::get('idprodi');
 		$nip				= Input::get('nip');
 		$nama				= Input::get('nama');
 		$nidn				= Input::get('nidn');
 		$alamat				= Input::get('alamat');
 		$tempatLahir		= Input::get('tempatLahir');
 		$tanggalLahir		= Input::get('tanggalLahir');
 		$jenisKelamin		= Input::get('jenisKelamin');
 		$statusKerja		= Input::get('statusKerja');
 		$pendidikanTerakhir	= Input::get('pendidikanTerakhir');
 		$pangkatTerakhir	= Input::get('pangkatTerakhir');
 		$fungsionalTerakhir	= Input::get('fungsionalTerakhir');
 		$sesuaiBidangPS		= Input::get('sesuaiBidangPS');
 		$bidangKeahlian		= Input::get('bidangKeahlian');
 		$sertifikatDosen	= Input::get('sertifikatDosen');

 		$databarudosen->id						= $id;
 		$databarudosen->idprodi					= $idprodi;
 		$databarudosen->nip 					= $nip;
 		$databarudosen->nama					= $nama;
 		$databarudosen->nidn 					= $nidn;
 		$databarudosen->alamat 					= $alamat;
 		$databarudosen->tempatLahir 			= $tempatLahir;
 		$databarudosen->tanggalLahir 			= $tanggalLahir;
 		$databarudosen->jenisKelamin 			= $jenisKelamin;
 		$databarudosen->statusKerja 			= $statusKerja;
 		$databarudosen->pendidikanTerakhir 		= $pendidikanTerakhir;
 		$databarudosen->pangkatTerakhir 		= $pangkatTerakhir;
 		$databarudosen->fungsionalTerakhir 		= $fungsionalTerakhir;
 		$databarudosen->sesuaiBidangPS 			= $sesuaiBidangPS;
 		$databarudosen->bidangKeahlian 			= $bidangKeahlian;
 		$databarudosen->sertifikatDosen 		= $sertifikatDosen;
 		
 		$databarudosen->save();
		
		return Redirect::to('masterdosen');
	}

public function delete($id)
	{
		$databarudosen = masterdosens::find($id);
		$masterprodis = masterprodis::all();
		$databarudosen->delete();

		//redirect
		return Redirect::to('masterdosen');
	}


public function editmasterdosen($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$databarudosen = masterdosens::findorfail($id);
		$masterprodis = masterprodis::all();
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$databarudosen = masterdosens::findorfail($id);
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		}
		return View::make('master.master dosen.editmasterdosen')->with('data',$databarudosen)->with('data2',$masterprodis);
	
	}

	public function updatemasterdosen()
	{
		$id = Input::get('id');

		DB:: table('masterdosens')->where('id', $id)->update(array(
			'id'				=> Input::get('id'),
			'idprodi'			=> Input::get('idprodi'),
	 		'nip'				=> Input::get('nip'),
	 		'nama'				=> Input::get('nama'),
	 		'nidn'				=> Input::get('nidn'),
	 		'alamat'			=> Input::get('alamat'),
	 		'tempatLahir'		=> Input::get('tempatLahir'),
	 		'tanggalLahir'		=> Input::get('tanggalLahir'),
	 		'jenisKelamin'		=> Input::get('jenisKelamin'),
	 		'statusKerja'		=> Input::get('statusKerja'),
	 		'pendidikanTerakhir'=> Input::get('pendidikanTerakhir'),
	 		'pangkatTerakhir'	=> Input::get('pangkatTerakhir'),
	 		'fungsionalTerakhir'=> Input::get('fungsionalTerakhir'),
	 		'sesuaiBidangPS'	=> Input::get('sesuaiBidangPS'),
	 		'bidangKeahlian'	=> Input::get('bidangKeahlian'),
	 		'sertifikatDosen'	=> Input::get('sertifikatDosen')

	 		));

		return Redirect::to('masterdosen');

	}

	public function detail($id) {
		$databarudosen = masterdosens::findorfail($id);
		$disable	   ='disable';
		return View::make('master.master dosen.detailmasterdosen')->with('data',$databarudosen)->with('disable',$disable);
	}
}
