<?php namespace App\Http\Controllers;

use App\tbpengelolaandanas;
use App\tbdanapenelitians;
use App\tbpustakas;
use App\tbsisteminformases;
use App\masterprodis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;


class lampiran6Controller extends Controller {

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
			$tbpengelolaandanas = tbpengelolaandanas::where('idprodi','=',$prodi)->get(); 
			$tbdanapenelitians = tbdanapenelitians::where('idprodi','=',$prodi)->get(); 
			$tbpustakas 		= tbpustakas::where('idprodi','=',$prodi)->get(); 
			$tbsisteminformases = tbsisteminformases::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$tbpengelolaandanas = tbpengelolaandanas::where('idprodi','like',$prodi.'%')->get();
			$tbdanapenelitians = tbdanapenelitians::where('idprodi','like',$prodi.'%')->get();
			$tbpustakas = tbpustakas::where('idprodi','like',$prodi.'%')->get();
			$tbsisteminformases = tbsisteminformases::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();
			$tbpengelolaandanas = tbpengelolaandanas::all();
			$tbdanapenelitians = tbdanapenelitians::all();
			$tbpustakas = tbpustakas::all();
			$tbsisteminformases = tbsisteminformases::all();
			

		}	 	
		
		
		$menu = "lampiran6"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st6.lampiran6', compact('tbpengelolaandanas','tbdanapenelitians','tbpustakas','tbsisteminformases','masterprodis', 'menu','menu2','Akses'));

			
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
		
		$menu = "lampiran6"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st6.formlampiran6', compact('masterprodis','menu','menu2','Akses','level'));

		
		
	}
	

	public function save(Request $request)
	{
		$file = $request->file('sk_prodi');
		
		$data = new tbpengelolaandanas;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpengelolaandanas::$rules, tbpengelolaandanas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$idprodi			= Input::get('idprodi');
		$jenis_lampiran		= Input::get('jenis_lampiran');
 		$sk_prodi			= $file->getClientOriginalName();
 		
 		
 		$data->idprodi			= $idprodi;
 		$data->jenis_lampiran	= $jenis_lampiran;
 		$data->sk_prodi			= $sk_prodi;
		
		$destinationPath = 'lampiran';
		$file->move($destinationPath,$file->getClientOriginalName());
 		
 		
 		$data->save();
		return redirect('lampiran6')
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
			$tbpengelolaandanas = tbpengelolaandanas::where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tbpengelolaandanas = tbpengelolaandanas::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 	
		} else if ($level == "admin") {
			$tbpengelolaandanas = tbpengelolaandanas::where('id',$id)->get(); 

		} 	
		$menu = "lampiran6"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st6.editlampiran6', compact('tbpengelolaandanas','menu','menu2','Akses','buka', 'level'));


		
	}

	public function update(Request $request)
	{
		$file = $request->file('sk_prodi');
		
		$id = Input::get('id');
		$sk_prodi_hidden = Input::get('sk_prodi_hidden');
		
		if ($file != null) {
			$sk_prodi			= $file->getClientOriginalName();
			$tbpengelolaandanas 		= tbpengelolaandanas::where('id',$id)->get();
			
			foreach($tbpengelolaandanas as $value) {
				$sk_prodi_old = $value->sk_prodi;
				unlink ("lampiran/".$sk_prodi_old);
			}
			
			$destinationPath = 'lampiran';
			$file->move($destinationPath,$file->getClientOriginalName());
		} else {
			$sk_prodi			= $sk_prodi_hidden;
			
		}
		
		DB:: table('tbpengelolaandanas')->where('id', $id)->update(array(
		'jenis_lampiran'		=> Input::get('jenis_lampiran'),
 		'sk_prodi'				=> $sk_prodi));

		return redirect('lampiran6')
			->with('status', 'Data telah berhasil diedit');

	}
	
	public function delete ($id)
	{
		$tbpengelolaandanas = tbpengelolaandanas::where('id',$id)->get();
		foreach($tbpengelolaandanas as $value) {
			$sk_prodi = $value->sk_prodi;
			unlink ("lampiran/".$sk_prodi);
		}
		$data = tbpengelolaandanas::find($id);
		$data->delete();
		
		//redirect
		return redirect('lampiran6')
			->with('status', 'Data telah berhasil dihapus');
	}
	
}