<?php namespace App\Http\Controllers;

use App\masterprodis;
use App\tbkeberlanjutanprodis;
use Input;
use Session;

class LaporankeberlanjutanprodiController extends Controller {

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
		
		$idprodi = "";
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();

		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		$menu = "lap2"; //nama menu
		$menu2 = "laporankeberlanjutanprodi"; //nama submenu
		return view('laporan.st2.laporankeberlanjutanprodi', compact('masterprodis', 'menu','menu2','Akses','idprodi'));
		
		
		
	}


	
	public function cetak()
	{
		$title = "Standar II Keberlanjutan Prodi"; 	
		if (Input::get('idprodi') != null) {
			$idprodi 					= Input::get('idprodi');
			$tbkeberlanjutanprodis 		= tbkeberlanjutanprodis::where ('idprodi',$idprodi)->get();
			$masterprodis 				= masterprodis::where ('idprodi',$idprodi)->get();
			foreach ($masterprodis as $row) {
				$filename = $title." - ".$row->namaProdi; 
			}
		}
		return view('laporan.st2.cetakkeberlanjutanprodi', compact('tbkeberlanjutanprodis','idprodi','title','prodi','filename'));
		
	}
	
	

}
