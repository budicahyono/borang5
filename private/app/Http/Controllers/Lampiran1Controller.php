<?php namespace App\Http\Controllers;

use App\tbskprodis;
use App\masterprodis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator ;


class Lampiran1Controller extends Controller {

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
		
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
			$tbskprodis = tbskprodis::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$tbskprodis = tbskprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$tbskprodis = tbskprodis::all();
			$masterprodis = masterprodis::all();

		}	 	
		
		
		$menu = "lampiran1"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st1.lampiran1', compact('tbskprodis','masterprodis', 'menu','menu2','Akses'));

			
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
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		$menu = "lampiran1"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st1.formlampiran1', compact('masterprodis','menu','menu2','Akses','level'));

		
		
	}
	

	public function save(Request $request)
	{
		$file = $request->file('sk_prodi');
		
		$dataskprodi = new tbskprodis;
		$input	  = Input::all();
		$validator = Validator::make($input, tbskprodis::$rules, tbskprodis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$idprodi			= Input::get('idprodi');
		$jenis_lampiran		= Input::get('jenis_lampiran');
 		$sk_prodi			= $file->getClientOriginalName();
 		
 		
 		$dataskprodi->idprodi			= $idprodi;
 		$dataskprodi->jenis_lampiran	= $jenis_lampiran;
 		$dataskprodi->sk_prodi			= $sk_prodi;
		
		$destinationPath = 'lampiran/sk_prodi/';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
 		$dataskprodi->save();
		return redirect('lampiran1')
			->with('status', 'Data telah berhasil disimpan');
	}

	

	public function edit($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$tbskprodis = tbskprodis::where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tbskprodis = tbskprodis::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 	
		} else if ($level == "admin") {
			$tbskprodis = tbskprodis::where('id',$id)->get(); 

		} 	
		$menu = "lampiran1"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st1.editlampiran1', compact('tbskprodis','menu','menu2','Akses','buka', 'level'));


		
	}

	public function update(Request $request)
	{
		$file = $request->file('sk_prodi');
		
		$id = Input::get('id');
		$sk_prodi_hidden = Input::get('sk_prodi_hidden');
		
		if ($file != null) {
			$sk_prodi			= $file->getClientOriginalName();
			$tbskprodis 		= tbskprodis::where('id',$id)->get();
			
			foreach($tbskprodis as $value) {
				$sk_prodi_old = $value->sk_prodi;
				unlink ("lampiran/sk_prodi/".$sk_prodi_old);
			}
			
			$destinationPath = 'lampiran/sk_prodi/';
			$file->move($destinationPath,$file->getClientOriginalName());
		} else {
			$sk_prodi			= $sk_prodi_hidden;
			
		}
		
		DB:: table('tbskprodis')->where('id', $id)->update(array(
		'jenis_lampiran'		=> Input::get('jenis_lampiran'),
 		'sk_prodi'				=> $sk_prodi));

		return redirect('lampiran1')
			->with('status', 'Data telah berhasil diedit');

	}
	
	public function delete ($id)
	{
		$tbskprodis = tbskprodis::where('id',$id)->get();
		foreach($tbskprodis as $value) {
			$sk_prodi = $value->sk_prodi;
			unlink ("lampiran/sk_prodi/".$sk_prodi);
		}
		$dataskprodi = tbskprodis::find($id);
		$dataskprodi->delete();
		
		//redirect
		return redirect('lampiran1')
			->with('status', 'Data telah berhasil dihapus');
	}
	
}