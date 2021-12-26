<?php namespace App\Http\Controllers;

use App\tbmekanismes;
use App\tbevaluasilulusans;
use App\tbalumnis;

use App\masterprodis;
use App\masterjeniskemampuans;


use Input;
use Session;

class LaporanlulusanController extends Controller {

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
		
		$menu = "lap3"; //nama menu
		$menu2 = "laporanlulusan"; //nama submenu
		return view('laporan.st3.laporanlulusan', compact('masterprodis', 'menu','menu2','Akses','idprodi'));
		
		
		
	}


	
	public function cetakmekanisme()
	{
	$title = "Standar III Mekanisme"; 	
		if (Input::get('idprodi') != null) {
			$idprodi 		= Input::get('idprodi');
			$tbmekanismes 		= tbmekanismes::where ('idprodi',$idprodi)->get();
			$masterprodis 		= masterprodis::where ('idprodi',$idprodi)->get();
			foreach ($masterprodis as $row) {
				$filename = $title." - ".$row->namaProdi; 
			}
		}
		return view('laporan.st3.cetakmekanisme', compact('tbmekanismes','idprodi','title','prodi','filename'));
		
	}
	
	public function cetakevaluasi()
	{
	$title = "Standar III Evaluasi Lulusan"; 	
		if (Input::get('idprodi') != null) {
			$idprodi 		= Input::get('idprodi');
			$tbevaluasilulusans 		= tbevaluasilulusans::where ('idprodi',$idprodi)->get();
			$masterprodis 		= masterprodis::where ('idprodi',$idprodi)->get();
			foreach ($masterprodis as $row) {
				$filename = $title." - ".$row->namaProdi; 
			}
		}
		return view('laporan.st3.cetakevaluasi', compact('tbevaluasilulusans','idprodi','title','prodi','filename'));
		
	}
	
	public function cetakalumni()
	{
	$title = "Standar III Himpunan Alumni"; 	
		if (Input::get('idprodi') != null) {
			$idprodi 		= Input::get('idprodi');
			$tbalumnis 		= tbalumnis::where ('idprodi',$idprodi)->get();
			$masterprodis 		= masterprodis::where ('idprodi',$idprodi)->get();
			foreach ($masterprodis as $row) {
				$filename = $title." - ".$row->namaProdi; 
			}
		}
		return view('laporan.st3.cetakalumni', compact('tbalumnis','idprodi','title','prodi','filename'));
		
	}
	
	
	

}
