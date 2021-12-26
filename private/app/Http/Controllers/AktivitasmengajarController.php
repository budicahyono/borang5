<?php namespace App\Http\Controllers;


class AktivitasmengajarController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$aktivitasmengajar = tbaktivitasmengajars::all();

		Return View::make('admin.aktivitasmengajar')->with('data',$aktivitasmengajar);
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		//
		
			Return View::make('admin.formdatadosen');	
		
	}

	public function save(){

		$kegiatan = new tbkegiatandosens;

 		$nip= Input::get('nip');
 		$jeniskeg= Input::get('jenisKegiatan');
 		$namaKegiatan= Input::get('namaKegiatan');
 		$tempat= Input::get('tempat');
 		$waktu= Input::get('waktu');
 		$sebagai= Input::get('sebagai');

 		$kegiatan->nip = $nip;
 		$kegiatan->jenisKegiatan = $jeniskeg;
 		$kegiatan->namaKegiatan = $namaKegiatan;
 		$kegiatan->tempat = $tempat;
 		$kegiatan->waktu = $waktu;
 		$kegiatan->sebagai = $sebagai;
 		$kegiatan->save();

 		return Redirect::to('datadosen');
 		
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
