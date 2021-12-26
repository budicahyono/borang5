<?php namespace App\Http\Controllers;

use App\tbtatapamongs;
use App\masterprodis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator ;
class TatapamongController extends Controller {

	
	public function index()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
			
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$tatapamong = tbtatapamongs::where('idprodi','=',$prodi)->get();
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tatapamong = tbtatapamongs::where('idprodi','like',$prodi.'%')->get(); 		
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
		} else if ($level == "admin") {
			$tatapamong = tbtatapamongs::all();
			$masterprodis = masterprodis::all();
		}	
		
		$menu = "st2"; //nama menu
		$menu2 = "tatapamong"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st2.tatapamong', compact('menu','menu2','masterprodis','tatapamong','Akses','buka'));
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
		$menu2 = "tatapamong"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st2.formtatapamong', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
		
	}
	
	
	public function save(){

		$tatapamong = new tbtatapamongs;
		$input	  = Input::all();
		$validator = Validator::make($input, tbtatapamongs::$rules, tbtatapamongs::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
 		$idprodi			= Input::get('idprodi');
 		$tataPamong			= Input::get('tataPamong');
 		$kepemimpinan		= Input::get('kepemimpinan');
 		$sistemPengelolaan 	= Input::get('sistemPengelolaan');
 		$penjaminanMutu		= Input::get('penjaminanMutu');
 		

 		$tatapamong->idprodi				= $idprodi;
 		$tatapamong->tataPamong				= $tataPamong;
 		$tatapamong->kepemimpinan			= $kepemimpinan;
 		$tatapamong->sistemPengelolaan		= $sistemPengelolaan;
 		$tatapamong->penjaminanMutu			= $penjaminanMutu;
 		
		$tatapamong->save();
		return redirect('tatapamong')
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
			$tatapamong = tbtatapamongs::where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$tatapamong = tbtatapamongs::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$tatapamong = tbtatapamongs::where('id',$id)->get(); 

		}	
		$menu = "st2"; //nama menu
		$menu2 = "tatapamong"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st2.edittatapamong', compact('tatapamong','menu','menu2','Akses','buka', 'level'));

		}
	
	}

	public function update()
	{
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbtatapamongs::$rules, tbtatapamongs::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		DB::table('tbtatapamongs')->where('id', $id)->update(array(

 		'tataPamong'		=> Input::get('tataPamong'),
 		'kepemimpinan'		=> Input::get('kepemimpinan'),
 		'sistemPengelolaan'	=> Input::get('sistemPengelolaan'),
 		'penjaminanMutu'	=> Input::get('penjaminanMutu')));

		return redirect('tatapamong')
			->with('status', 'Data telah berhasil diedit');
	}
	
	
	public function delete ($id)
	{
		$tatapamong = tbtatapamongs::find($id);
		$tatapamong->delete();
		return redirect('tatapamong')
			->with('status', 'Data telah berhasil dihapus');
	}
}


