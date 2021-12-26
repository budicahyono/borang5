<?php  namespace App\Http\Controllers;

use App\tbkerjasamas;

class KerjasamaController extends Controller {

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
		if ($level == "user") {
			$kerjasama = tbkerjasamas::where('idprodi', 'like', $prodi.'%')->get(); 
		} else if ($level == "admin") {
			$kerjasama = tbkerjasamas::all();
		}	
		
		$menu = "st7"; //nama menu
		$menu2 = "kerjasama"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st7.kerjasama', compact('menu', 'menu2','kerjasama','Akses','buka'));
		}
		
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
		$masterinstituses = masterinstituses::all();
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		$masterinstituses = masterinstituses::all();
		}
			Return View::make('admin.formkerjasama')->with('data',$masterprodis)->with('data1',$masterinstituses);	
		
	}

	public function save(){

		$kerjasama = new tbkerjasamas;

 		$idprodi= Input::get('idprodi');
 		$idinstitusi= Input::get('idinstitusi');
 		$jeniskeg= Input::get('jenisKegiatan');
 		$namakeg= Input::get('namaKegiatan');
 		$tahunmulai= Input::get('tahunMulai');
 		$tahunselesai= Input::get('tahunSelesai');
 		$manfaat= Input::get('manfaat');
 		

 		$kerjasama->idprodi = $idprodi;
 		$kerjasama->idinstitusi = $idinstitusi;
 		$kerjasama->jenisKegiatan = $jeniskeg;
 		$kerjasama->namaKegiatan = $namakeg;
 		$kerjasama->tahunMulai = $tahunmulai;
 		$kerjasama->tahunSelesai = $tahunselesai;
 		$kerjasama->manfaat = $manfaat;
 		$kerjasama->save();

 		return Redirect::to('kerjasama');
 		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$kerjasama = tbkerjasamas::findorfail($id);
		$masterprodis = masterprodis::all();
		$masterinstituses = masterinstituses::all();
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$kerjasama = tbkerjasamas::findorfail($id);
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		$masterinstituses = masterinstituses::all();
		}
			
			return View::make('admin.editkerjasama')->with('data',$kerjasama)->with('data1',$masterprodis)->with('data2',$masterinstituses);
	}


	/**
 	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$id = Input::get('id');

 		DB::table('tbkerjasamas')->where('id', $id)->update(array(
 				'id' => Input::get('id'),
 				'idprodi' => Input::get('idprodi'),
                'idinstitusi' => Input::get('idinstitusi'),
                'jenisKegiatan' => Input::get('jenisKegiatan'),
                'namaKegiatan' => Input::get('namaKegiatan'),
                'tahunMulai' => Input::get('tahunMulai'),
                'tahunSelesai' => Input::get('tahunSelesai'),
                'manfaat' => Input::get('manfaat')
            ));
 		return Redirect::to('kerjasama');
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$kerjasama = tbkerjasamas::find($id);
		$kerjasama->delete();
		return Redirect::to('kerjasama');
	}


}
