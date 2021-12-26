<?php namespace App\Http\Controllers;


class SumberdanaController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		/**
		 * contoh menarik 2 table secara terpisah bukan relasi dalam satu controller
		 * $data['kegiatandosen'] = tbkegiatandosens::all();
		 * $data['kegiatan2'] = table2::all();
		 * Return View::make('admin.datadosen')->with('data',$data);
		 * kemudian di view nya mengambil datanya sama saja foreach($data as $key => $value)
		 */
		$sumberdana = tbsumberdanas::all();
		
		Return View::make('admin.sumberdana')->with('data',$sumberdana);

		
		
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		//
		
			Return View::make('admin.formsumberdana');	
		
	}

	public function save(){

		$sumber = new tbsumberdanas;

 		$idprodi= Input::get('idprodi');
 		$sumberdana= Input::get('sumberDana');
 		$jenisdana= Input::get('jenisDana');
 		$tahun= Input::get('tahun');
 		$jumlahdana= Input::get('jumlahDana');
 		
 		$sumber->idprodi= $idprodi;
 		$sumber->sumberdana = $sumberdana;
 		$sumber->jenisdana = $jenisdana;
 		$sumber->tahun = $tahun;
 		$sumber->jumlahdana = $jumlahdana;
 		$sumber->save();

 		return Redirect::to('sumberdana');
 		
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
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
