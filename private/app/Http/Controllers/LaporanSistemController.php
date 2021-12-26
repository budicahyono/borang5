<?php namespace App\Http\Controllers;

use App\masterprodis;
use App\tbsdms;
use Input;
use Session;

class LaporanSistemController extends Controller {

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
		
		$menu = "lap4"; //nama menu
		$menu2 = "laporansistem"; //nama submenu
		return view('laporan.st4.laporansistem', compact('masterprodis', 'menu','menu2','Akses','idprodi'));
		
		
		
	}


	
	public function cetaksistem()
	{
		$title = "Standar IV Sistem Seleksi dan Pengembangan"; 	
		if (Input::get('idprodi') != null) {
			$idprodi 		= Input::get('idprodi');
			$tbsdms 		= tbsdms::where ('idprodi',$idprodi)->get();
			$masterprodis 		= masterprodis::where ('idprodi',$idprodi)->get();
			foreach ($masterprodis as $row) {
				$filename = $title." - ".$row->namaProdi; 
			}
		}
			
		
		return view('laporan.st4.cetaksistem', compact('tbsdms','idprodi','title','prodi','filename'));
		
	}
	
	public function cetakmonitoring()
	{
		$title = "Standar IV Monitoring dan Evaluasi "; 	
		if (Input::get('idprodi') != null) {
			$idprodi 		= Input::get('idprodi');
			$tbsdms 		= tbsdms::where ('idprodi',$idprodi)->get();
			$masterprodis 		= masterprodis::where ('idprodi',$idprodi)->get();
			foreach ($masterprodis as $row) {
				$filename = $title." - ".$row->namaProdi; 
			}
		}
			
		
		return view('laporan.st4.cetakmonitoring', compact('tbsdms','idprodi','title','prodi','filename'));
		
	}

}
