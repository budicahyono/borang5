<?php namespace App\Http\Controllers;

use App\masterprodis;

use App\tbmhsregulers;
use App\tbmhsnonregulers;
use App\tbprestasimahasiswas;
use App\tbjumlahmahasiswas;
use App\tblayananmahasiswas;

use Input;
use Session;

class LaporanmahasiswaController extends Controller {

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
		$menu2 = "laporanmahasiswa"; //nama submenu
		return view('laporan.st3.laporanmahasiswa', compact('masterprodis', 'menu','menu2','Akses','idprodi'));
		
		
		
	}


	
	public function cetakmhsreg()
	{
		$title = "Standar III Mahasiswa Reguler"; 	
		if (Input::get('idprodi') != null) {
			$idprodi 		= Input::get('idprodi');
			$tbmhsregulers 		= tbmhsregulers::where ('idprodi',$idprodi)->get();
			$masterprodis 		= masterprodis::where ('idprodi',$idprodi)->get();
			foreach ($masterprodis as $row) {
				$filename = $title." - ".$row->namaProdi; 
			}
		}
		return view('laporan.st3.cetakmhsreg', compact('tbmhsregulers','idprodi','title','prodi','filename'));
	}
	
	public function cetakmhsnonreg()
	{
		$title = "Standar III Mahasiswa Non Reguler"; 	
		if (Input::get('idprodi') != null) {
			$idprodi 		= Input::get('idprodi');
			$tbmhsnonregulers 		= tbmhsnonregulers::where ('idprodi',$idprodi)->get();
			$masterprodis 		= masterprodis::where ('idprodi',$idprodi)->get();
			foreach ($masterprodis as $row) {
				$filename = $title." - ".$row->namaProdi; 
			}
		}
		return view('laporan.st3.cetakmhsnonreg', compact('tbmhsnonregulers','idprodi','title','prodi','filename'));
	}
	
	public function cetakprestasimhs()
	{
		$title = "Standar III Prestasi Mahasiswa"; 	
		if (Input::get('idprodi') != null) {
			$idprodi 		= Input::get('idprodi');
			$tbprestasimahasiswas 		= tbprestasimahasiswas::where ('idprodi',$idprodi)->get();
			$masterprodis 		= masterprodis::where ('idprodi',$idprodi)->get();
			foreach ($masterprodis as $row) {
				$filename = $title." - ".$row->namaProdi; 
			}
		}
		return view('laporan.st3.cetakprestasimhs', compact('tbprestasimahasiswas','idprodi','title','prodi','filename'));
	}
	
	public function cetakjumlahmhs()
	{
		$title = "Standar III Jumlah Mahasiswa"; 	
		$Ynow=date ('Y');
		$Ybefore=$Ynow - 7;
		if (Input::get('idprodi') != null) {
			$idprodi 		= Input::get('idprodi');
			$tbjumlahmahasiswas 		= tbjumlahmahasiswas::where('idprodi',$idprodi)->where('tahunAkademikBerjalan','>=',$Ybefore)->where('tahunAkademikBerjalan','<=',$Ynow)->groupBy('angkatan')->orderBy('tahunAkademikBerjalan','ASC')->get();
			$masterprodis 		= masterprodis::where ('idprodi',$idprodi)->get();
			foreach ($masterprodis as $row) {
				$filename = $title." - ".$row->namaProdi; 
			}
		}
		return view('laporan.st3.cetakjumlahmhs', compact('tbjumlahmahasiswas','idprodi','title','prodi','filename'));
	}
	
	public function cetaklayananmhs()
	{
		$title = "Standar III Layanan Mahasiswa"; 	
		if (Input::get('idprodi') != null) {
			$idprodi 		= Input::get('idprodi');
			$tblayananmahasiswas 		= tblayananmahasiswas::where ('idprodi',$idprodi)->get();
			$masterprodis 		= masterprodis::where ('idprodi',$idprodi)->get();
			foreach ($masterprodis as $row) {
				$filename = $title." - ".$row->namaProdi; 
			}
		}
		return view('laporan.st3.cetaklayananmhs', compact('tblayananmahasiswas','idprodi','title','prodi','filename'));
	}

}
