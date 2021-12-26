<?php namespace App\Http\Controllers;

use App\tbsdms;

use App\masterprodis;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator ;

class SdmController extends Controller {

	
	public function index()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
			$sdm = tbsdms::where('idprodi', '=', $prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$sdm = tbsdms::where('idprodi', 'like', $prodi.'%')->get(); 
		} else if ($level == "admin") {
			$sdm = tbsdms::all();
			$masterprodis = masterprodis::all();
		}	
		
		$menu = "st4"; //nama menu
		$menu2 = "sdm"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st4.sdm', compact('menu','masterprodis', 'menu2','sdm','Akses','buka'));
		}
		
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
		
		$menu = "st4"; //nama menu
		$menu2 = "sdm"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st4.formsdm', compact('masterprodis','menu','menu2','Akses','buka', 'level'));

		}
			
		
		
	}

	public function save()
	{
	
		$sdm = new tbsdms;
		$input	  = Input::all();
		$validator = Validator::make($input, tbsdms::$rules, tbsdms::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$idprodi	= Input::get('idprodi');
 		$sistem		= Input::get('sistemSeleksi');
 		$sistem1	= Input::get('monev');
 		
 		$sdm->idprodi		=$idprodi;
 		$sdm->sistemSeleksi	= $sistem;
 		$sdm->monev			= $sistem1;

 		$sdm->save();
 		return redirect('sdm')
			->with('status', 'Data telah berhasil disimpan');
 		
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function delete($id)
	{
		$sdm = tbsdms::find($id);
		$sdm->delete();
		
		//redirect
		return redirect('sdm')
			->with('status', 'Data telah berhasil dihapus');
		
		
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$tbsdms = tbsdms::where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tbsdms = tbsdms::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 	
		} else if ($level == "admin") {
			$tbsdms = tbsdms::where('id',$id)->get(); 

		} 	
		$menu = "st4"; //nama menu
		$menu2 = "sdm"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st4.editsdm', compact('tbsdms','menu','menu2','Akses','buka', 'level'));

		}

	
		return View::make('admin.editsdm')->with('data',$sdm)->with('data2',$masterprodi);
	}

	public function update()
	{
		$id = Input::get('id');
		
		$input	  = Input::all();
		$validator = Validator::make($input, tbsdms::$rules, tbsdms::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		DB::table('tbsdms')->where('id', $id)->update(array(
				  
                  'sistemSeleksi' 	=> Input::get('sistemSeleksi'),
                  'monev' 			=> Input::get('monev')
       ));
	   
 		return redirect('sdm')
			->with('status', 'Data telah berhasil diedit');
	}



}


