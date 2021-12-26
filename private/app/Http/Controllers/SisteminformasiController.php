<?php namespace App\Http\Controllers;

use App\tbsisteminformases;
use App\tbaksesibilitasdatas;

class SisteminformasiController extends Controller {

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
			$sisteminformasi = tbsisteminformases::where('idprodi', 'like', $prodi.'%')->get(); 
			$aksesibilitas = tbaksesibilitasdatas::where('idprodi', 'like', $prodi.'%')->get(); 
		} else if ($level == "admin") {
			$sisteminformasi = tbsisteminformases::all();
			$aksesibilitas = tbaksesibilitasdatas::all();
		}	
		
		$menu = "st6"; //nama menu
		$menu2 = "sisteminformasi"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st6.sisteminformasi', compact('menu', 'menu2','sisteminformasi','aksesibilitas','Akses','buka'));
		}
		
	}

	public function indexaksesibilitasdata()
	{

		{
		$sisteminformasi = tbsisteminformases::all();
		$aksesibilitas = tbaksesibilitasdatas::all();
	}
		$idprodi = Session::get('idprodi');

		if(Session::get('level')=='admin'){
		$sisteminformasi = tbsisteminformases::all();
		$aksesibilitas = tbaksesibilitasdatas::all();
	}
	if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$sisteminformasi = tbsisteminformases::all();
		$aksesibilitas = tbaksesibilitasdatas::where('idprodi',$idprodi)->get();
	}
		$yeah='yeah';

		Return View::make('admin.sisteminformasi')->with('data',$sisteminformasi)->with('data2',$aksesibilitas)->with('yeah',$yeah);
		
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
		
			Return View::make('admin.formsisteminformasi')->with('data',$masterprodis);	
		
	}

	public function addaksesibilitasdata()
	{
		//
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$masterprodis = masterprodis::all();
		
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		
		}
		
			Return View::make('admin.formaksesibilitas')->with('data',$masterprodis);	
		
	}

	public function save(){

		$sisteminformasi = new tbsisteminformases;

 		$idprodi= Input::get('idprodi');
 		$deskripsi= Input::get('deskripsi');
 		

 		$sisteminformasi->idprodi = $idprodi;
 		$sisteminformasi->deskripsi = $deskripsi;
 		$sisteminformasi->save();

 		return Redirect::to('sisteminformasi');
 		
	}

	public function saveaksesibilitasdata(){

		$aksesibilitas = new tbaksesibilitasdatas;

 		$idprodi= Input::get('idprodi');
 		$jenisdata= Input::get('jenisData');
 		$sistemPengelolaanData= Input::get('sistemPengelolaanData');
 		
 		$aksesibilitas->idprodi = $idprodi;
 		$aksesibilitas->jenisData = $jenisdata;
 		$aksesibilitas->sistemPengelolaanData = $sistemPengelolaanData;
 		$aksesibilitas->save();

 		return Redirect::to('aksesibilitasdata');
 		
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
		$sisteminformasi = tbsisteminformases::findorfail($id);
		$masterprodis = masterprodis::all();
		
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$sisteminformasi = tbsisteminformases::findorfail($id);
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		
		}

			
			return View::make('admin.editsisteminformasi')->with('data',$sisteminformasi)->with('data1',$masterprodis);
	}

	public function editaksesibilitasdata($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$aksesibilitas = tbaksesibilitasdatas::findorfail($id);
		$masterprodis = masterprodis::all();
		
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$aksesibilitas = tbaksesibilitasdatas::findorfail($id);
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		
		}

			
			return View::make('admin.editaksesibilitasdata')->with('data2',$aksesibilitas)->with('data3',$masterprodis);
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

 		DB::table('tbsisteminformases')->where('id', $id)->update(array(
                'idprodi' => Input::get('idprodi'),
                'deskripsi' => Input::get('deskripsi')
                
            ));
 		return Redirect::to('sisteminformasi');
	}

	public function updateaksesibilitasdata()
	{
		$id = Input::get('id');

 		DB::table('tbaksesibilitasdatas')->where('id', $id)->update(array(
                'id' => Input::get('id'),
                'idprodi' => Input::get('idprodi'),
                'jenisData' => Input::get('jenisData'),
                'sistemPengelolaanData' => Input::get('sistemPengelolaanData')
                
            ));
 		return Redirect::to('aksesibilitasdata');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$sisteminformasi = tbsisteminformases::find($id);
		$sisteminformasi->delete();
		return Redirect::to('sisteminformasi');
	}

	public function deleteaksesibilitasdata($id)
	{
		$aksesibilitas = tbaksesibilitasdatas::find($id);
		$aksesibilitas->delete();
		return Redirect::to('aksesibilitasdata');
	}


}
