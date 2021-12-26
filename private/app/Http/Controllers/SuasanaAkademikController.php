<?php namespace App\Http\Controllers;

use App\tbpeningkatansuasanaakademiks;

use App\masterprodis;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;

class SuasanaAkademikController extends Controller {

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
		
		//cek jika user tersebut admin atau user biasa
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
			$suasanaakademik = tbpeningkatansuasanaakademiks::where('idprodi', '=', $prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$suasanaakademik = tbpeningkatansuasanaakademiks::where('idprodi', 'like', $prodi.'%')->get(); 	
		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();
			$suasanaakademik = tbpeningkatansuasanaakademiks::all();
		}	
		
		$menu = "st5"; //nama menu
		$menu2 = "suasanaakademik"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st5.suasanaakademik', compact('menu','masterprodis', 'menu2','suasanaakademik','Akses','buka'));
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
		
		$menu = "st5"; //nama menu
		$menu2 = "suasanaakademik"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st5.formsuasanaakademik', compact('masterprodis','menu','menu2','Akses','buka', 'level'));

		}
		
		
		
	}

	public function save()
	{
		$suasana = new tbpeningkatansuasanaakademiks;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpeningkatansuasanaakademiks::$rules, tbpeningkatansuasanaakademiks::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$kebijakan= Input::get('kebijakanSuasanaAkademik');
 		$ketersediaan= Input::get('ketersediaanSaranaPrasarana');
 		$kegiatan= Input::get('kegiatanLuarPembelajaran');
 		$interaksi= Input::get('interaksiAkademik');
 		$pengembangan= Input::get('pengembanganPerilakuKecendekiawan');

 		$suasana->idprodi = $idprodi;
 		$suasana->kebijakanSuasanaAkademik = $kebijakan;
 		$suasana->ketersediaanSaranaPrasarana = $ketersediaan;
 		$suasana->kegiatanLuarPembelajaran = $kegiatan;
 		$suasana->interaksiAkademik = $interaksi;
 		$suasana->pengembanganPerilakuKecendekiawan = $pengembangan;
 		$suasana->save();

 		return redirect('suasanaakademik')
			->with('status', 'Data telah berhasil disimpan');
 		
	}


	public function delete($id)
	{
		$suasana = tbpeningkatansuasanaakademiks::find($id);
		$suasana->delete();

		//redirect
		return redirect('suasanaakademik')
			->with('status', 'Data telah berhasil dihapus');
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
			$suasana = tbpeningkatansuasanaakademiks::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$suasana = tbpeningkatansuasanaakademiks::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$suasana = tbpeningkatansuasanaakademiks::where('id',$id)->get(); 
		}	
		
		$menu = "st5"; //nama menu
		$menu2 = "suasanaakademik"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st5.editsuasanaakademik', compact('suasana','menu','menu2','Akses','buka', 'level'));

		}	
		

	}



	public function update()
	{
 		
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbpeningkatansuasanaakademiks::$rules, tbpeningkatansuasanaakademiks::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
		
		DB::table('tbpeningkatansuasanaakademiks')->where('id', $id)->update(array(
                  'kebijakanSuasanaAkademik' => Input::get('kebijakanSuasanaAkademik'),
                  'ketersediaanSaranaPrasarana' => Input::get('ketersediaanSaranaPrasarana'),
                  'kegiatanLuarPembelajaran' => Input::get('kegiatanLuarPembelajaran'),
                  'interaksiAkademik' => Input::get('interaksiAkademik'),
                  'pengembanganPerilakuKecendekiawan' => Input::get('pengembanganPerilakuKecendekiawan')    
                          
            ));
 		return redirect('suasanaakademik')
			->with('status', 'Data telah berhasil diedit');
 	}


	

}
