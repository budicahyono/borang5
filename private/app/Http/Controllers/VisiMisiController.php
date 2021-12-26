<?php namespace App\Http\Controllers;

use App\tbvises;
use App\masterprodis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator ;


class VisiMisiController extends Controller {

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
			$tbvises = tbvises::where('idprodi','=',$prodi)->get();
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$tbvises = tbvises::where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$tbvises = tbvises::all();
			$masterprodis = masterprodis::all();

		}	
		
		$menu = "st1"; //nama menu
		$menu2 = "visimisitujuan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st1.visimisitujuan', compact('tbvises','masterprodis', 'menu','menu2','Akses','buka'));

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
		
		$menu = "st1"; //nama menu
		$menu2 = "visimisitujuan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st1.formvisimisitujuan', compact('masterprodis','menu','menu2','Akses','buka', 'level'));

		}
		
	}
	

	public function save(){

		$datavisi = new tbvises;
		$input	  = Input::all();
		$validator = Validator::make($input, tbvises::$rules, tbvises::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

		$idprodi		= Input::get('idprodi');
		$mekanisme		= Input::get('mekanisme');
 		$visi			= Input::get('visi');
 		$misi			= Input::get('misi');
 		$tujuan			= Input::get('tujuan');
 		$sasaran		= Input::get('sasaran');
 		$strategi		= Input::get('strategi');
 		$sosialisasi	= Input::get('sosialisasi');

 		
 		$datavisi->idprodi		= $idprodi;
 		$datavisi->mekanisme	= $mekanisme;
 		$datavisi->visi			= $visi;
 		$datavisi->misi			= $misi;
 		$datavisi->tujuan		= $tujuan;
 		$datavisi->sasaran		= $sasaran;
 		$datavisi->strategi		= $strategi;
 		$datavisi->sosialisasi	= $sosialisasi;
 		
 		
 		$datavisi->save();
		return redirect('visimisitujuan')
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
			$tbvises = tbvises::where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tbvises = tbvises::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 	
		} else if ($level == "admin") {
			$tbvises = tbvises::where('id',$id)->get(); 

		} 	
		$menu = "st1"; //nama menu
		$menu2 = "visimisitujuan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st1.editvisimisi', compact('tbvises','menu','menu2','Akses','buka', 'level'));

		}

		
	}

	public function update()
	{
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbvises::$rules, tbvises::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		DB:: table('tbvises')->where('id', $id)->update(array(
		
		'mekanisme'		=> Input::get('mekanisme'),
 		'visi'			=> Input::get('visi'),
 		'misi'			=> Input::get('misi'),
 		'tujuan'		=> Input::get('tujuan'),
 		'sasaran'		=> Input::get('sasaran'),
 		'strategi'		=> Input::get('strategi'),
 		'sosialisasi'	=> Input::get('sosialisasi')));

		return redirect('visimisitujuan')
			->with('status', 'Data telah berhasil diedit');

	}
	
	public function delete ($id)
	{
		$datavisi = tbvises::find($id);
		$datavisi->delete();
		//redirect
		return redirect('visimisitujuan')
			->with('status', 'Data telah berhasil dihapus');
	}
	
}