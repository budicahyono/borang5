<?php namespace App\Http\Controllers;

use App\masterprodis;
//st1
use App\tbvises; 
//st2
use App\tbtatapamongs, App\tbumpanbaliks, App\tbkeberlanjutanprodis;
//st3 mhs
use App\tbmhsregulers, App\tbmhsnonregulers, App\tbprestasimahasiswas, App\tbjumlahmahasiswas, App\tblayananmahasiswas;
//st3 lulusan
use App\tbmekanismes, App\tbevaluasilulusans, App\tbalumnis;

use Input;
use Session;

class LaporanAllController extends Controller {

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
		
		$menu = "lap0"; //nama menu
		$menu2 = ""; //nama submenu
		return view('laporan.st0.laporanall', compact('masterprodis', 'menu','menu2','Akses','idprodi'));
		
		
		
	}


	
	public function cetak()
	{
		$title = "Borang Akademik"; 	
		
		$Ynow=date ('Y');
		$Ybefore=$Ynow - 7;
		
		if (Input::get('idprodi') != null) {
			$idprodi 		= Input::get('idprodi');
			//st1
			$tbvises 		= tbvises::where ('idprodi',$idprodi)->get();
			//st2
			$tbtatapamongs 		= tbtatapamongs::where ('idprodi',$idprodi)->get();
			$tbumpanbaliks 		= tbumpanbaliks::where ('idprodi',$idprodi)->get();
			$tbkeberlanjutanprodis 		= tbkeberlanjutanprodis::where ('idprodi',$idprodi)->get();
			//st3 mhs
			$tbmhsregulers 		= tbmhsregulers::where ('idprodi',$idprodi)->get();
			$tbmhsnonregulers 		= tbmhsnonregulers::where ('idprodi',$idprodi)->get();
			$tbprestasimahasiswas 		= tbprestasimahasiswas::where ('idprodi',$idprodi)->get();
			$tbjumlahmahasiswas 		= tbjumlahmahasiswas::where('idprodi',$idprodi)->where('tahunAkademikBerjalan','>=',$Ybefore)->where('tahunAkademikBerjalan','<=',$Ynow)->groupBy('angkatan')->orderBy('tahunAkademikBerjalan','ASC')->get();
			$tblayananmahasiswas 		= tblayananmahasiswas::where ('idprodi',$idprodi)->get();
			//st3 lulusan
			$tbmekanismes 		= tbmekanismes::where ('idprodi',$idprodi)->get();
			$tbevaluasilulusans 		= tbevaluasilulusans::where ('idprodi',$idprodi)->get();
			$tbalumnis 		= tbalumnis::where ('idprodi',$idprodi)->get();
			
			$masterprodis 		= masterprodis::where ('idprodi',$idprodi)->get();
			
			
			$masterprodis 		= masterprodis::where ('idprodi',$idprodi)->get();
			foreach ($masterprodis as $row) {
				$filename = $title." - ".$row->namaProdi; 
			}
		}
			
		
		return view('laporan.st0.cetakall', compact('tbvises','tbtatapamongs','tbumpanbaliks','tbkeberlanjutanprodis','tbmhsregulers','tbmhsnonregulers','tbprestasimahasiswas','tbjumlahmahasiswas','tblayananmahasiswas','tbmekanismes','tbevaluasilulusans','tbalumnis','idprodi','title','prodi','filename'));
		
		
	}
	
	

}
