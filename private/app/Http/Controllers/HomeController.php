<?php namespace App\Http\Controllers;

use App\Akses;
use App\Login;
//standar 1
use App\tbvises; 
//standar 2
use App\tbumpanbaliks,  App\tbtatapamongs, App\tbkeberlanjutanprodis; 
//standar 3
use App\tbmhsregulers,  App\tbmhsnonregulers, App\tbprestasimahasiswas, App\tbjumlahmahasiswas, App\tblayananmahasiswas, 
	App\tbmekanismes,  App\tbevaluasilulusans, App\tbalumnis; 
//standar 4
use App\tbsdms,  App\tbkegiatandosens, App\tbaktivitasmengajars, App\tbtenagaahlis, App\tbtugasbelajars,
	App\tbprestasidosens,  App\tborganisasiprofesis, App\tbpendidikandosens,  App\tbupayatenagakependidikans,  			
	App\tbaktivitasdosenmengajars; 
//standar 5
use App\tbkompetensis,  App\tbmkpilihans, App\tbpraktikums, App\tbpeninjauankurikulums, App\tbhasilpeninjauankurikulums,
	App\tbprosespembelajarans,  App\tbpembimbingakademiks, App\tbprosespembimbinganakademiks,  App\tbpembimbinganskripsis,	
	App\tbpanduanpembimbinganskripsis, App\tbupayaperbaikanpembelajarans, App\tbpeningkatansuasanaakademiks; 
//standar 6
use App\tbpengelolaandanas,  App\tbsumberdanas, App\tbpenggunaandanas, App\tbdanapenelitians, App\tbruangkerjadosens,
	App\tbprasaranas,  App\tbpustakas, App\tbjurnals,  App\tbsumberpustakas, App\tbperalatanlabs, App\tbsisteminformases, App\tbaksesibilitasdatas; 		
//standar 7
use App\tbpenelitians,  App\tbmahasiswapenelitians, App\tbpenelitiandosens, App\tbhakis, App\tbkerjasamas; 

	
use App\masterdosens;
use App\masterprodis;
use App\mastermahasiswas;

class HomeController extends Controller
{
	
	


	/**
	 * Show the application dashboard to the user.
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
		
		$menu = "home";	
		$menu2 = "home";	
		
		// hitung data biasa
		$hitung_login = Login::all()->count();
		$hitung_prodi = masterprodis::all()->count();
		$hitung_dosen = masterdosens::all()->count();
		$hitung_mhs   = mastermahasiswas::all()->count();
		
		//cek jika user tersebut admin atau user biasa
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get()->count(); 
			
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get()->count();
			
		} else if ($level == "admin") {
			$masterprodis = masterprodis::all()->count();
			
		}
		
		// hitung standar 1
		if ($level == "prodi") {
			$tbvises = tbvises::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
		} else if ($level == "fakultas") {
			$tbvises = tbvises::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
		} else if ($level == "admin") {
			$tbvises = tbvises::all()->groupBy('idprodi')->count();
		}
		if ($tbvises > 0) {
			$standar1 = ($tbvises / $masterprodis) * 100;  
			$max1 = $masterprodis * 1;  
		} else {
			$standar1 = 0; 
			$max1 = 0;
		}
		
		
		// hitung standar 2
		if ($level == "prodi") {
			$tbumpanbaliks = tbumpanbaliks::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbtatapamongs = tbtatapamongs::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbkeberlanjutanprodis = tbkeberlanjutanprodis::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
		} else if ($level == "fakultas") {
			$tbumpanbaliks = tbumpanbaliks::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbtatapamongs = tbtatapamongs::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbkeberlanjutanprodis = tbkeberlanjutanprodis::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
		} else if ($level == "admin") {
			$tbumpanbaliks = tbumpanbaliks::all()->groupBy('idprodi')->count();
			$tbtatapamongs = tbtatapamongs::all()->groupBy('idprodi')->count();
			$tbkeberlanjutanprodis = tbkeberlanjutanprodis::all()->groupBy('idprodi')->count();
		}
		$jumlah2 = $tbumpanbaliks + $tbtatapamongs + $tbkeberlanjutanprodis;
		if ($jumlah2 > 0) {
			$standar2 = round(($jumlah2 / ($masterprodis*3)) * 100);  
			$max2 = $masterprodis * 3;  
		} else {
			$standar2 = 0; 
			$max2 = 0;
		}
		
		
		
		
		// hitung standar 3
		if ($level == "prodi") {
			$tbmhsregulers = tbmhsregulers::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbmhsnonregulers = tbmhsnonregulers::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbprestasimahasiswas = tbprestasimahasiswas::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbjumlahmahasiswas = tbjumlahmahasiswas::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tblayananmahasiswas = tblayananmahasiswas::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
			$tbmekanismes = tbmekanismes::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbevaluasilulusans = tbevaluasilulusans::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbalumnis = tbalumnis::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
		} else if ($level == "fakultas") {
			$tbmhsregulers = tbmhsregulers::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbmhsnonregulers = tbmhsnonregulers::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbprestasimahasiswas = tbprestasimahasiswas::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbjumlahmahasiswas = tbjumlahmahasiswas::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tblayananmahasiswas = tblayananmahasiswas::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
			$tbmekanismes = tbmekanismes::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbevaluasilulusans = tbevaluasilulusans::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbalumnis = tbalumnis::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
		} else if ($level == "admin") {
			$tbmhsregulers = tbmhsregulers::all()->groupBy('idprodi')->count();
			$tbmhsnonregulers = tbmhsnonregulers::all()->groupBy('idprodi')->count();
			$tbprestasimahasiswas = tbprestasimahasiswas::all()->groupBy('idprodi')->count();
			$tbjumlahmahasiswas = tbjumlahmahasiswas::all()->groupBy('idprodi')->count();
			$tblayananmahasiswas = tblayananmahasiswas::all()->groupBy('idprodi')->count();
			
			$tbmekanismes = tbmekanismes::all()->groupBy('idprodi')->count();
			$tbevaluasilulusans = tbevaluasilulusans::all()->groupBy('idprodi')->count();
			$tbalumnis = tbalumnis::all()->groupBy('idprodi')->count();
		}
		$jumlah3 = $tbmhsregulers + $tbmhsnonregulers + $tbprestasimahasiswas + $tbjumlahmahasiswas + $tblayananmahasiswas + $tbmekanismes + $tbevaluasilulusans + $tbalumnis;
		if ($jumlah3 > 0) {
			$standar3 = round(($jumlah3 / ($masterprodis*8)) * 100);  
			$max3 = $masterprodis * 8; 		
		} else {
			$standar3 = 0; 
			$max3 = 0;
		}
		
		
		
		// hitung standar 4
		if ($level == "prodi") {
			$tbsdms = tbsdms::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
			$tbkegiatandosens = tbkegiatandosens::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbaktivitasmengajars = tbaktivitasmengajars::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbtenagaahlis = tbtenagaahlis::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbtugasbelajars = tbtugasbelajars::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbprestasidosens = tbprestasidosens::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tborganisasiprofesis = tborganisasiprofesis::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbpendidikandosens = tbpendidikandosens::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbupayatenagakependidikans = tbupayatenagakependidikans::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbaktivitasdosenmengajars = tbaktivitasdosenmengajars::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
		} else if ($level == "fakultas") {
			$tbsdms = tbsdms::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
			$tbkegiatandosens = tbkegiatandosens::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbaktivitasmengajars = tbaktivitasmengajars::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbtenagaahlis = tbtenagaahlis::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbtugasbelajars = tbtugasbelajars::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbprestasidosens = tbprestasidosens::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tborganisasiprofesis = tborganisasiprofesis::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbpendidikandosens = tbpendidikandosens::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbupayatenagakependidikans = tbupayatenagakependidikans::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbaktivitasdosenmengajars = tbaktivitasdosenmengajars::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
			
		} else if ($level == "admin") {
			$tbsdms = tbsdms::all()->groupBy('idprodi')->count();
			
			$tbkegiatandosens = tbkegiatandosens::all()->groupBy('idprodi')->count();
			$tbaktivitasmengajars = tbaktivitasmengajars::all()->groupBy('idprodi')->count();
			$tbtenagaahlis = tbtenagaahlis::all()->groupBy('idprodi')->count();
			$tbtugasbelajars = tbtugasbelajars::all()->groupBy('idprodi')->count();
			$tbprestasidosens = tbprestasidosens::all()->groupBy('idprodi')->count();
			$tborganisasiprofesis = tborganisasiprofesis::all()->groupBy('idprodi')->count();
			$tbpendidikandosens = tbpendidikandosens::all()->groupBy('idprodi')->count();
			$tbupayatenagakependidikans = tbupayatenagakependidikans::all()->groupBy('idprodi')->count();
			$tbaktivitasdosenmengajars = tbaktivitasdosenmengajars::all()->groupBy('idprodi')->count();
		}
		$jumlah4 = $tbsdms + $tbkegiatandosens + $tbaktivitasmengajars + $tbtenagaahlis + $tbtugasbelajars + $tbprestasidosens + $tborganisasiprofesis + $tbpendidikandosens + $tbupayatenagakependidikans + $tbaktivitasdosenmengajars;
		if ($jumlah4 > 0) {
			$standar4 = round(($jumlah4 / ($masterprodis*10)) * 100);  
			$max4 = $masterprodis * 10; 		
		} else {
			$standar4 = 0; 
			$max4 = 0;
		}
		
		
		// hitung standar 5
		if ($level == "prodi") {
			$tbkompetensis = tbkompetensis::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbmkpilihans = tbmkpilihans::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbpraktikums = tbpraktikums::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbpeninjauankurikulums = tbpeninjauankurikulums::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbhasilpeninjauankurikulums = tbhasilpeninjauankurikulums::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
			$tbprosespembelajarans = tbprosespembelajarans::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbpembimbingakademiks = tbpembimbingakademiks::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbprosespembimbinganakademiks = tbprosespembimbinganakademiks::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbpembimbinganskripsis = tbpembimbinganskripsis::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbpanduanpembimbinganskripsis = tbpanduanpembimbinganskripsis::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbupayaperbaikanpembelajarans = tbupayaperbaikanpembelajarans::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
			$tbpeningkatansuasanaakademiks = tbpeningkatansuasanaakademiks::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
		} else if ($level == "fakultas") {
			$tbkompetensis = tbkompetensis::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbmkpilihans = tbmkpilihans::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbpraktikums = tbpraktikums::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbpeninjauankurikulums = tbpeninjauankurikulums::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbhasilpeninjauankurikulums = tbhasilpeninjauankurikulums::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
			$tbprosespembelajarans = tbprosespembelajarans::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbpembimbingakademiks = tbpembimbingakademiks::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbprosespembimbinganakademiks = tbprosespembimbinganakademiks::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbpembimbinganskripsis = tbpembimbinganskripsis::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbpanduanpembimbinganskripsis = tbpanduanpembimbinganskripsis::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbupayaperbaikanpembelajarans = tbupayaperbaikanpembelajarans::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
			$tbpeningkatansuasanaakademiks = tbpeningkatansuasanaakademiks::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
			
		} else if ($level == "admin") {
			$tbkompetensis = tbkompetensis::all()->groupBy('idprodi')->count();
			$tbmkpilihans = tbmkpilihans::all()->groupBy('idprodi')->count();
			$tbpraktikums = tbpraktikums::all()->groupBy('idprodi')->count();
			$tbpeninjauankurikulums = tbpeninjauankurikulums::all()->groupBy('idprodi')->count();
			$tbhasilpeninjauankurikulums = tbhasilpeninjauankurikulums::all()->groupBy('idprodi')->count();
			
			$tbprosespembelajarans = tbprosespembelajarans::all()->groupBy('idprodi')->count();
			$tbpembimbingakademiks = tbpembimbingakademiks::all()->groupBy('idprodi')->count();
			$tbprosespembimbinganakademiks = tbprosespembimbinganakademiks::all()->groupBy('idprodi')->count();
			$tbpembimbinganskripsis = tbpembimbinganskripsis::all()->groupBy('idprodi')->count();
			$tbpanduanpembimbinganskripsis = tbpanduanpembimbinganskripsis::all()->groupBy('idprodi')->count();
			$tbupayaperbaikanpembelajarans = tbupayaperbaikanpembelajarans::all()->groupBy('idprodi')->count();
			
			$tbpeningkatansuasanaakademiks = tbpeningkatansuasanaakademiks::all()->groupBy('idprodi')->count();
		}
		$jumlah5 = $tbkompetensis + $tbmkpilihans + $tbpraktikums + $tbpeninjauankurikulums + $tbhasilpeninjauankurikulums + $tbprosespembelajarans + $tbpembimbingakademiks + $tbprosespembimbinganakademiks + $tbpembimbinganskripsis + $tbpanduanpembimbinganskripsis + $tbupayaperbaikanpembelajarans + $tbpeningkatansuasanaakademiks;
		if ($jumlah5 > 0) {
			$standar5 = round(($jumlah5 / ($masterprodis*12)) * 100);  
			$max5 = $masterprodis * 12; 		
		} else {
			$standar5 = 0; 
			$max5 = 0;
		}
		
		
		// hitung standar 6
		if ($level == "prodi") {
			$tbpengelolaandanas = tbpengelolaandanas::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbsumberdanas = tbsumberdanas::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbpenggunaandanas = tbpenggunaandanas::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbdanapenelitians = tbdanapenelitians::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
			$tbruangkerjadosens = tbruangkerjadosens::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbprasaranas = tbprasaranas::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbpustakas = tbpustakas::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbjurnals = tbjurnals::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbsumberpustakas = tbsumberpustakas::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbperalatanlabs = tbperalatanlabs::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
			$tbsisteminformases = tbsisteminformases::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbaksesibilitasdatas = tbaksesibilitasdatas::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
		} else if ($level == "fakultas") {
			$tbpengelolaandanas = tbpengelolaandanas::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbsumberdanas = tbsumberdanas::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbpenggunaandanas = tbpenggunaandanas::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbdanapenelitians = tbdanapenelitians::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
			$tbruangkerjadosens = tbruangkerjadosens::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbprasaranas = tbprasaranas::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbpustakas = tbpustakas::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbjurnals = tbjurnals::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbsumberpustakas = tbsumberpustakas::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbperalatanlabs = tbperalatanlabs::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
			$tbsisteminformases = tbsisteminformases::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbaksesibilitasdatas = tbaksesibilitasdatas::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
			
		} else if ($level == "admin") {
			$tbpengelolaandanas = tbpengelolaandanas::all()->groupBy('idprodi')->count();
			$tbsumberdanas = tbsumberdanas::all()->groupBy('idprodi')->count();
			$tbpenggunaandanas = tbpenggunaandanas::all()->groupBy('idprodi')->count();
			$tbdanapenelitians = tbdanapenelitians::all()->groupBy('idprodi')->count();
			
			$tbruangkerjadosens = tbruangkerjadosens::all()->groupBy('idprodi')->count();
			$tbprasaranas = tbprasaranas::all()->groupBy('idprodi')->count();
			$tbpustakas = tbpustakas::all()->groupBy('idprodi')->count();
			$tbjurnals = tbjurnals::all()->groupBy('idprodi')->count();
			$tbsumberpustakas = tbsumberpustakas::all()->groupBy('idprodi')->count();
			$tbperalatanlabs = tbperalatanlabs::all()->groupBy('idprodi')->count();
			
			$tbsisteminformases = tbsisteminformases::all()->groupBy('idprodi')->count();
			$tbaksesibilitasdatas = tbaksesibilitasdatas::all()->groupBy('idprodi')->count();
		}
		$jumlah6 = $tbpengelolaandanas + $tbsumberdanas + $tbpenggunaandanas + $tbdanapenelitians + $tbruangkerjadosens + $tbprasaranas + $tbpustakas + $tbjurnals + $tbsumberpustakas + $tbperalatanlabs + $tbsisteminformases + $tbaksesibilitasdatas;
		if ($jumlah6 > 0) {
			$standar6 = round(($jumlah6 / ($masterprodis*12)) * 100);  
			$max6 = $masterprodis * 12; 		
		} else {
			$standar6 = 0; 
			$max6 = 0;
		}
		
		
		// hitung standar 7
		if ($level == "prodi") {
			$tbpenelitians = tbpenelitians::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbmahasiswapenelitians = tbmahasiswapenelitians::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbpenelitiandosens = tbpenelitiandosens::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
			$tbhakis = tbhakis::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			$tbkerjasamas = tbkerjasamas::where('idprodi','=',$prodi)->get()->groupBy('idprodi')->count();
			
		} else if ($level == "fakultas") {
			$tbpenelitians = tbpenelitians::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbmahasiswapenelitians = tbmahasiswapenelitians::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbpenelitiandosens = tbpenelitiandosens::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
			$tbhakis = tbhakis::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			$tbkerjasamas = tbkerjasamas::where('idprodi','like',$prodi.'%')->get()->groupBy('idprodi')->count();
			
			
		} else if ($level == "admin") {
			$tbpenelitians = tbpenelitians::all()->groupBy('idprodi')->count();
			$tbmahasiswapenelitians = tbmahasiswapenelitians::all()->groupBy('idprodi')->count();
			$tbpenelitiandosens = tbpenelitiandosens::all()->groupBy('idprodi')->count();
			
			$tbhakis = tbhakis::all()->groupBy('idprodi')->count();
			$tbkerjasamas = tbkerjasamas::all()->groupBy('idprodi')->count();
		}
		$jumlah7 = $tbpenelitians + $tbmahasiswapenelitians + $tbpenelitiandosens + $tbhakis  + $tbkerjasamas ;
		if ($jumlah7 > 0) {
			$standar7 = round(($jumlah7 / ($masterprodis*5)) * 100);  
			$max7 = $masterprodis * 5; 		
		} else {
			$standar7 = 0; 
			$max7 = 0;
		}
	
		return view('home', compact('level','menu','menu2','Akses','user','hitung_login','hitung_prodi','hitung_dosen','hitung_mhs','tbvises','standar1','max1','jumlah2','standar2','max2','jumlah3','standar3','max3','jumlah4','standar4','max4','jumlah5','standar5','max5','jumlah6','standar6','max6','jumlah7','standar7','max7'));
	}
}
