<?php namespace App\Http\Controllers;

use App\tbhakis;
use App\tbpenelitians;
use App\tbpenelitiandosens;
use App\tbkerjasamas;
use App\masterprodis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;


class lampiran7Controller extends Controller {

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
			$tbhakis  = tbhakis::where('idprodi','=',$prodi)->get(); 
			$tbpenelitians = tbpenelitians::where('idprodi','=',$prodi)->get(); 
			$tbpenelitiandosens = tbpenelitiandosens::where('idprodi','=',$prodi)->get(); 
			$tbkerjasamas = tbkerjasamas::where('idprodi','=',$prodi)->get(); 
			
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$tbhakis = tbhakis::where('idprodi','like',$prodi.'%')->get();
			$tbpenelitians = tbpenelitians::where('idprodi','like',$prodi.'%')->get();
			$tbpenelitiandosens = tbpenelitiandosens::where('idprodi','like',$prodi.'%')->get();
			$tbkerjasamas = tbkerjasamas::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();
			$tbhakis = tbhakis::all();
			$tbpenelitians = tbpenelitians::all();
			$tbpenelitiandosens = tbpenelitiandosens::all();
			$tbkerjasamas = tbkerjasamas::all();
			

		}	 	
		
		
		$menu = "lampiran7"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st7.lampiran7', compact('tbhakis','tbpenelitians','tbpenelitiandosens','tbkerjasamas','masterprodis', 'menu','menu2','Akses'));

			
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
		
		$menu = "lampiran7"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st7.formlampiran7', compact('masterprodis','menu','menu2','Akses','level'));

		
		
	}
	

	public function save(Request $request)
	{
		$file = $request->file('sk_prodi');
		
		$data = new tbpenelitians;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpenelitians::$rules, tbpenelitians::$messages);
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
		return redirect('lampiran7')
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
			$tbpenelitians = tbpenelitians::where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tbpenelitians = tbpenelitians::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 	
		} else if ($level == "admin") {
			$tbpenelitians = tbpenelitians::where('id',$id)->get(); 

		} 	
		$menu = "lampiran7"; //nama menu
		$menu2 = ""; //nama submenu
		return view('lampiran.st7.editlampiran7', compact('tbpenelitians','menu','menu2','Akses','buka', 'level'));


		
	}

	public function update(Request $request)
	{
		$file = $request->file('sk_prodi');
		
		$id = Input::get('id');
		$sk_prodi_hidden = Input::get('sk_prodi_hidden');
		
		if ($file != null) {
			$sk_prodi			= $file->getClientOriginalName();
			$tbpenelitians 		= tbpenelitians::where('id',$id)->get();
			
			foreach($tbpenelitians as $value) {
				$sk_prodi_old = $value->sk_prodi;
				unlink ("lampiran/".$sk_prodi_old);
			}
			
			$destinationPath = 'lampiran';
			$file->move($destinationPath,$file->getClientOriginalName());
		} else {
			$sk_prodi			= $sk_prodi_hidden;
			
		}
		
		DB:: table('tbpenelitians')->where('id', $id)->update(array(
		'jenis_lampiran'		=> Input::get('jenis_lampiran'),
 		'sk_prodi'				=> $sk_prodi));

		return redirect('lampiran7')
			->with('status', 'Data telah berhasil diedit');

	}
	
	public function delete ($id)
	{
		$tbpenelitians = tbpenelitians::where('id',$id)->get();
		foreach($tbpenelitians as $value) {
			$sk_prodi = $value->sk_prodi;
			unlink ("lampiran/".$sk_prodi);
		}
		$data = tbpenelitians::find($id);
		$data->delete();
		
		//redirect
		return redirect('lampiran7')
			->with('status', 'Data telah berhasil dihapus');
	}
	
}