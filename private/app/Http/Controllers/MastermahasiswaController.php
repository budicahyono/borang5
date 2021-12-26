<?php namespace App\Http\Controllers;

use App\mastermahasiswas;

class MastermahasiswaController extends Controller {

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
		
			$mastermahasiswa = mastermahasiswas::all();	
		
		$menu = "mastermahasiswa"; //nama menu
		$menu2 = "";
			return view('master.master mahasiswa.mastermahasiswa', compact('menu','mastermahasiswa','Akses','buka','menu2'));
		
		
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
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		}
		Return View::make('master.master mahasiswa.formmahasiswa')->with('data2',$masterprodis);	
		
	}

	public function save(){

		$rules = array(
			'nim' => 'required|unique:mastermahasiswas');

		$validator = Validator::make(Input::all(), $rules);

		if ($validator->fails()) {
			$messages = $validator->messages();

			return Redirect::back()->with('message', 'NIM sudah ada');
		} 
		else {

			$databarumahasiswa = new mastermahasiswas;

			$id						= Input::get('id');
			$nim					= Input::get('nim');
			$namaMahasiswa			= Input::get('namaMahasiswa');
			$jenisKelamin			= Input::get('jenisKelamin');
			$alamat					= Input::get('alamat');
			$angkatan				= Input::get('angkatan');
			$status					= Input::get('status');
			$statusReguler			= Input::get('statusReguler');
			$idprodi				= Input::get('idprodi');

			$databarumahasiswa->id						= $id;
			$databarumahasiswa->nim						= $nim;
			$databarumahasiswa->namaMahasiswa			= $namaMahasiswa;
			$databarumahasiswa->jenisKelamin			= $jenisKelamin;
			$databarumahasiswa->alamat					= $alamat;
			$databarumahasiswa->angkatan				= $angkatan;
			$databarumahasiswa->status					= $status;
			$databarumahasiswa->statusReguler			= $statusReguler;
			$databarumahasiswa->idprodi					= $idprodi;


			$databarumahasiswa->save();

			return Redirect::to('mastermahasiswa');
		}
	}


	public function delete($id)
	{
		$databarumahasiswa = mastermahasiswas::find($id);
		$databarumahasiswa->delete();
		//redirect
		return Redirect::to('mastermahasiswa');
	}

	public function editmastermahasiswa($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
			$databarumahasiswa= mastermahasiswas::findorfail($id);
			$masterprodis = masterprodis::all();
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$databarumahasiswa= mastermahasiswas::findorfail($id);
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		}


		return View::make('master.master mahasiswa.editmastermahasiswa')->with('data',$databarumahasiswa)->with('data2',$masterprodis);

	}

	public function updatemastermahasiswa()
	{
		$id = Input::get('id');

		DB:: table('mastermahasiswas')->where('id', $id)->update(array(
			'id'					=> Input::get('id'),
			'nim'					=> Input::get('nim'),
			'namaMahasiswa'			=> Input::get('namaMahasiswa'),
			'jenisKelamin'			=> Input::get('jenisKelamin'),
			'alamat'				=> Input::get('alamat'),
			'angkatan'				=> Input::get('angkatan'),
			'status'				=> Input::get('status'),
			'statusReguler'			=> Input::get('statusReguler'),
			'idprodi'				=> Input::get('idprodi')));


		return Redirect::to('mastermahasiswa');

	}
}
