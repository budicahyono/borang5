<?php namespace App\Http\Controllers;


use App\tbkeberlanjutanprodis;
use App\masterprodis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator ;

class KeberlanjutanprodiController extends Controller {

	
	public function index()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$keberlanjutanprodi = tbkeberlanjutanprodis::where('idprodi','=',$prodi)->get();
		} else if ($level == "fakultas") {
			$keberlanjutanprodi = tbkeberlanjutanprodis::where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$keberlanjutanprodi = tbkeberlanjutanprodis::all();
		} 
		
		$menu = "st2"; //nama menu
		$menu2 = "keberlanjutanprodi"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st2.keberlanjutanprodi', compact('menu', 'menu2','keberlanjutanprodi','Akses','buka','level'));
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
		$menu2 = "keberlanjutanprodi"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st2.formkeberlanjutanprodi', compact('masterprodis','menu','menu2','keberlanjutanprodi','Akses','buka','level'));
		}
	}
	
	
	public function save(){

		$keberlanjutanprodi = new tbkeberlanjutanprodis;
		$input	  = Input::all();
		$validator = Validator::make($input, tbkeberlanjutanprodis::$rules, tbkeberlanjutanprodis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
 		$idprodi			= Input::get('idprodi');
 		$jenisUpaya			= Input::get('jenisUpaya');
 		$upaya				= Input::get('upaya');
 		

 		$keberlanjutanprodi->idprodi				= $idprodi;
 		$keberlanjutanprodi->jenisUpaya				= $jenisUpaya;
 		$keberlanjutanprodi->upaya					= $upaya;
 		
		$keberlanjutanprodi->save();
		return redirect('keberlanjutanprodi')
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
			$keberlanjutanprodi = tbkeberlanjutanprodis::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$keberlanjutanprodi = tbkeberlanjutanprodis::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$keberlanjutanprodi = tbkeberlanjutanprodis::where('id',$id)->get(); 

		}	
		$menu = "st2"; //nama menu
		$menu2 = "keberlanjutanprodi"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level != "admin") {	
			return redirect('/');
		} else {
			return view('st2.editkeberlanjutanprodi', compact('keberlanjutanprodi','menu','menu2','Akses','buka', 'level'));

		}
	
	}

	public function update()
	{
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbkeberlanjutanprodis::$rules, tbkeberlanjutanprodis::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		DB:: table('tbkeberlanjutanprodis')->where('id', $id)->update(array(
	 		'jenisUpaya'	=> Input::get('jenisUpaya'),
	 		'upaya'			=> Input::get('upaya')));
	 		

		return redirect('keberlanjutanprodi')
			->with('status', 'Data telah berhasil diedit');

	}
	
	public function delete($id)
	{
		$keberlanjutanprodi = tbkeberlanjutanprodis::find($id);
		$keberlanjutanprodi->delete();
		
		return redirect('keberlanjutanprodi')
			->with('status', 'Data telah berhasil dihapus');
	}
}


