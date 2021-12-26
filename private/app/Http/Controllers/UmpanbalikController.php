<?php namespace App\Http\Controllers;


use App\tbumpanbaliks;
use App\masterprodis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator ;

class UmpanbalikController extends Controller {

	
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
			$umpanbalik = tbumpanbaliks::where('idprodi','=',$prodi)->get();
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$umpanbalik = tbumpanbaliks::where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$umpanbalik = tbumpanbaliks::all();
			$masterprodis = masterprodis::all();
		} 
		
		$menu = "st2"; //nama menu
		$menu2 = "umpanbalik"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st2.umpanbalik', compact('menu', 'menu2','umpanbalik','masterprodis','Akses','buka','level'));
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
		
		$menu = "st2"; //nama menu
		$menu2 = "umpanbalik"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st2.formumpanbalik', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
		
	}
	
	public function save()
	{

		$umpanbalik = new tbumpanbaliks;
		$input	  = Input::all();
		$validator = Validator::make($input, tbumpanbaliks::$rules, tbumpanbaliks::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
 		$idprodi			= Input::get('idprodi');
 		$sumber				= Input::get('sumber');
 		$isi				= Input::get('isi');
 		$tindakLanjut 		= Input::get('tindakLanjut');
 		

 		$umpanbalik->idprodi				= $idprodi;
 		$umpanbalik->sumber					= $sumber;
 		$umpanbalik->isi					= $isi;
 		$umpanbalik->tindakLanjut			= $tindakLanjut;
 		
		$umpanbalik->save();
		return redirect('umpanbalik')
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
			$umpanbalik = tbumpanbaliks::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$umpanbalik = tbumpanbaliks::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$umpanbalik = tbumpanbaliks::where('id',$id)->get(); 

		}	
		$menu = "st2"; //nama menu
		$menu2 = "umpanbalik"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st2.editumpanbalik', compact('umpanbalik','menu','menu2','Akses','buka', 'level'));

		}
	
	}

	public function update()
	{
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbumpanbaliks::$rules, tbumpanbaliks::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		DB:: table('tbumpanbaliks')->where('id', $id)->update(array(
	 		'sumber'		=> Input::get('sumber'),
	 		'isi'			=> Input::get('isi'),
	 		'tindakLanjut' 	=> Input::get('tindakLanjut')));

		return redirect('umpanbalik')
			->with('status', 'Data telah berhasil diedit');

	}
	
	public function delete($id)
	{
		$umpanbalik = tbumpanbaliks::find($id);
		$umpanbalik->delete();
		return redirect('umpanbalik')
			->with('status', 'Data telah berhasil dihapus');
	}



}