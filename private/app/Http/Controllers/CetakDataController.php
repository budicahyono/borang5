<?php namespace App\Http\Controllers;


class CetakDataController extends Controller
{
	
	public function index ()
	{
		

		Return View::make('cetakdata');
	}


	public function pdfstandar1() {
	
	$idprodi = Session::get('idprodi');

	

	if(Session::get('level')=='user') {
	$tbvises = tbvises::where ('idprodi',$idprodi)->get();	
	$view = View::make('PDF.cetakpdfstandar1', array('data' => $tbvises, 'i' => 0))->render(); 	
	$pdf = App::make('dompdf');	
	$pdf->loadHTML($view)->setPaper('a4')->setOrientation('potrait');
	
	}


	return $pdf->stream();
	}


	public function pdfstandar2() {
	
	$idprodi = Session::get('idprodi');

	if(Session::get('level')=='user') {
	$tatapamong 			= tbtatapamongs::where ('idprodi',$idprodi)->get();
	$umpanbalik 			= tbumpanbaliks::where ('idprodi',$idprodi)->get();
	$keberlanjutanprodi 	= tbkeberlanjutanprodis::where ('idprodi',$idprodi)->get();		
	$view = View::make('PDF.cetakpdfstandar2', array('data2' => $tatapamong,'data3' => $umpanbalik, 'data4' => $keberlanjutanprodi, 'i' => 0))->render(); 	
	$pdf = App::make('dompdf');	
	$pdf->loadHTML($view)->setPaper('a4')->setOrientation('potrait');
	
	}


	return $pdf->stream();
	}

	public function pdfstandar3() {
		
		$Ynow=date ('Y');
		$Ybefore=$Ynow - 7;

	$idprodi = Session::get('idprodi');

	if(Session::get('level')=='user') {
	$mahasiswareg 			= tbmhsregulers::where('tahunAkademik','>',$Ybefore)->where('tahunAkademik','<=',$Ynow)->orderBy('tahunAkademik','DESC')->where ('idprodi',$idprodi)->get();;
	$mahasiswanonreg		= tbmhsnonregulers::where ('idprodi',$idprodi)->get();
	$prestasimhs 			= tbprestasimahasiswas::where ('idprodi',$idprodi)->get();
	$jumlahmhs 				= $jumlahmhs = tbjumlahmahasiswas::where('tahunAkademikBerjalan','>=',$Ybefore)->where('idprodi','=',$idprodi)->where('tahunAkademikBerjalan','<=',$Ynow)->groupBy('angkatan')->orderBy('tahunAkademikBerjalan','ASC')->get();
	$layananmhs 			= tblayananmahasiswas::where ('idprodi',$idprodi)->get();
	$alumni 				= tbalumnis::where ('idprodi',$idprodi)->get();
	$evaluasilulusan		= tbevaluasilulusans::where ('idprodi',$idprodi)->get();	
	$mekanisme = tbmekanismeevaluasilulusans::where ('idprodi',$idprodi)->get();	
	$view = View::make('PDF.cetakpdfstandar3', array('data5' => $mahasiswareg,'data6' => $mahasiswanonreg, 'data7' => $prestasimhs, 'data8' => $jumlahmhs, 'data9' => $layananmhs, 'data10' => $alumni, 'data11' => $evaluasilulusan, 'data12' => $mekanisme,'i' => 0))->render(); 	
	$pdf = App::make('dompdf');	
	$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape');
	
	}


	return $pdf->stream();
	}






	public function pdfstandar4() {

	$year=date('Y');
	$Ynow=date('Y');
	$Ybefore=$Ynow - 3;
	$idprodi = Session::get('idprodi');
	if(Session::get('idprodi')!='' and Session::get('level')=='user'){
	// ambil semua data
	$sdm = DB::table('tbsdms')->where('idprodi','=',$idprodi)->get();
	$monev = $monev = tbsdms::where('idprodi','=',$idprodi)->get();
	$kegiatandosen = DB::table('tbpendidikandosens')->join('masterdosens','tbpendidikandosens.nip','=','masterdosens.nip')->where('statusKerja','=','Tetap')->where('sesuaiBidangPS','=','Ya')->where('tbpendidikandosens.idprodi','=',$idprodi)->get();
	$kegiatan = DB::table('tbpendidikandosens')->join('masterdosens','tbpendidikandosens.nip','=','masterdosens.nip')->where('statusKerja','=','Tetap')->where('sesuaiBidangPS','=','Tidak')->where('tbpendidikandosens.idprodi','=',$idprodi)->get();
	$aktivitas1 = DB::table('tbaktivitasdosenmengajars')->join('masterdosens','tbaktivitasdosenmengajars.nip','=','masterdosens.nip')->where('statusKerja','=','Tetap')->where('sesuaiBidangPS','=','Ya')->where('tahunAkademik','=',$year)->where('tbaktivitasdosenmengajars.idprodi','=',$idprodi)->get();
	$aktivitas = DB::table('tbaktivitasmengajars')->join('masterdosens','tbaktivitasmengajars.nip','=','masterdosens.nip')->where('statusKerja','=','Tetap')->where('sesuaiBidangPS','=','Ya')->where('tbaktivitasmengajars.idprodi','=',$idprodi)->get();
	$aktivitas2 = DB::table('tbaktivitasmengajars')->join('masterdosens','tbaktivitasmengajars.nip','=','masterdosens.nip')->where('statusKerja','=','Tetap')->where('sesuaiBidangPS','=','Tidak')->where('tahunAkademik','=',$year)->where('tbaktivitasmengajars.idprodi','=',$idprodi)->get();
	$datados = DB::table('tbpendidikandosens')->join('masterdosens','tbpendidikandosens.nip','=','masterdosens.nip')->where('statusKerja','=','Tidak Tetap')->where('tbpendidikandosens.idprodi','=',$idprodi)->get();
	$aktivitas3 = DB::table('tbaktivitasmengajars')->join('masterdosens','tbaktivitasmengajars.nip','=','masterdosens.nip')->where('statusKerja','=','Tidak Tetap')->where('tahunAkademik','=',$year)->where('tbaktivitasmengajars.idprodi','=',$idprodi)->get();
	$tenaga = DB::table('tbtenagaahlis')->where('idprodi',$idprodi)->where('Tahun','>=',$Ybefore)->where('Tahun','<=',$Ynow)->get();
	$tugas = DB::table('tbtugasbelajars')->join('masterdosens','tbtugasbelajars.nip','=','masterdosens.nip')->where('statusKerja','=','Tetap')->where('sesuaiBidangPS','=','Ya')->where('tbtugasbelajars.idprodi','=',$idprodi)->where('Tahun','>=',$Ybefore)->where('Tahun','<=',$Ynow)->get();
	$kegiatan2 = DB::table('tbkegiatandosens')->join('masterdosens','tbkegiatandosens.nip','=','masterdosens.nip')->where('statusKerja','=','Tetap')->where('sesuaiBidangPS','=','Ya')->where('Tahun','>=',$Ybefore)->where('Tahun','<=',$Ynow)->where('tbkegiatandosens.idprodi','=',$idprodi)->get();
	$prestasi = DB::table('tbprestasidosens')->join('masterdosens','tbprestasidosens.nip','=','masterdosens.nip')->where('tbprestasidosens.idprodi','=',$idprodi)->where('Tahun','>=',$Ybefore)->where('Tahun','<=',$Ynow)->get();
	$profesi = DB::table('tborganisasiprofeses')->join('masterdosens','tborganisasiprofeses.nip','=','masterdosens.nip')->where('statusKerja','=','Tetap')->where('tborganisasiprofeses.idprodi','=',$idprodi)->where('Tahun','>=',$Ybefore)->where('Tahun','<=',$Ynow)->get();
	$kependidikan = DB::table('masterketenagapendidikans')->where('idprodi','=',$idprodi)->select('*',DB::raw('count(jenjangPendidikanTerakhir) as jenjang'))->groupBy('jenis','jenjangPendidikanTerakhir')->get();
	$upaya = DB::table('tbupayatenagakependidikans')->where('idprodi',$idprodi)->get();
	
	$view = View::make('PDF.pdfstandar4', array('data' => $sdm,'data' => $monev,'data1' => $kegiatandosen,'data2' => $kegiatan,'data3' => $aktivitas1,'data4' => $aktivitas,'data5' => $aktivitas2,'data6' => $datados,'data7' => $aktivitas3,'data8' => $tenaga,'data9' => $tugas,'data10' => $kegiatan2,'data11' => $prestasi,'data12' => $profesi,'data13' => $kependidikan,'data14' => $upaya,'i' => 0))->render(); 
	// panggil fungsi dompdf
	$pdf = App::make('dompdf');
	// set ukuran kertas dan orientasi
	$pdf->loadHTML($view)->setPaper('a4')->setOrientation('potrait');
	// cetak


	}
	return $pdf->stream();

	
	
}


public function pdfstandar5() {
	$idprodi = Session::get('idprodi');
	if(Session::get('idprodi')!='' and Session::get('level')=='user'){
	// ambil semua data
	$kompetensi = DB::table('tbkompetenses')->where('idprodi','=',$idprodi)->get();
	$kurikulum = DB::table('mastermatakuliahs')->select('*',DB::raw('sum(sks) as total'))->groupBy('jenisMataKuliah')->where('idprodi','=',$idprodi)->get();
	$struktur = DB::table('mastermatakuliahs')->get();
	$mk = DB::table('tbmkpilihans')->where('idprodi','=',$idprodi)->get();
	$praktikum = DB::table('tbpraktikums')->where('idprodi','=',$idprodi)->get();
	$peninjauan = DB::table('tbpeninjauankurikulums')->where('idprodi','=',$idprodi)->get();
	$hasil = DB::table('tbhasilpeninjauankurikulums')->where('idprodi','=',$idprodi)->get();
	$proses = DB::table('tbprosespembelajarans')->where('idprodi','=',$idprodi)->get();
	$pemb = DB::table('tbpembimbingakademiks')->join('masterdosens','tbpembimbingakademiks.nip','=','masterdosens.nip')->where('tbpembimbingakademiks.idprodi','=',$idprodi)->get();
	$propem = DB::table('tbprosespembimbinganakademiks')->where('idprodi','=',$idprodi)->get();
	$pemb1 = DB::table('tbpembimbinganskripses')->join('masterdosens','tbpembimbinganskripses.nip','=','masterdosens.nip')->where('tbpembimbinganskripses.idprodi','=',$idprodi)->get();
	$panduan = DB::table('tbpanduanpembimbinganskripses')->where('idprodi','=',$idprodi)->get();
	$upaya = DB::table('tbupayaperbaikanpembelajarans')->where('idprodi','=',$idprodi)->get();
	$suasana = DB::table('tbpeningkatansuasanaakademiks')->where('idprodi','=',$idprodi)->get();
	// mengarahkan view pada file pdf.blade.php di views/provinsi/
	$view = View::make('PDF.pdfstandar5', array('data' => $kompetensi,'data1' => $kurikulum,'data2' => $struktur,'data3' => $mk,'data4' => $praktikum,'data5' => $peninjauan,'data6' => $hasil,'data7' => $proses,'data8' => $pemb,'data9' => $propem,'data10' => $pemb1,'data11' => $panduan,'data12' => $upaya,'data13' => $suasana, 'i' => 0))->render(); 
	// panggil fungsi dompdf
	$pdf = App::make('dompdf');
	// set ukuran kertas dan orientasi
	$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape');
	// cetak
	}
	return $pdf->stream();
}


public function pdfstandar6() {
	$Ynow=date('Y');
		$Ybefore=$Ynow - 3;
	$idprodi = Session::get('idprodi');
	if(Session::get('idprodi')!='' and Session::get('level')=='user'){
	// ambil semua data
	$pengelolaandana = tbpengelolaandanas::where('idprodi',$idprodi)->get(); 
	$sumberdana = tbsumberdanas::where('tahun','>=',$Ybefore)->where('tahun','<=',$Ynow)->where('idprodi',$idprodi)->groupBy('sumberDana')->get();
	$penggunaandana = tbpenggunaandanas::where('tahun','>=',$Ybefore)->where('tahun','<=',$Ynow)->where('idprodi',$idprodi)->orderBy('jumlahDana')->get();
	$penelitian = DB::table('tbdanapenelitians')->where('jenisKegiatan','=','Penelitian')->where('idprodi',$idprodi)->get();
	$pkm =DB::table('tbdanapenelitians')->where('jenisKegiatan','=','pengabdian Kepada Masyarakat')->where('idprodi',$idprodi)->get();
	$rkdosen = tbruangkerjadosens::where('idprodi',$idprodi)->get();
	$prasarana1 =DB::table('tbprasaranas')->where('idprodi',$idprodi)->where('jenisPrasarana','=','Utama')->get();
	$prasarana =DB::table('tbprasaranas')->where('idprodi',$idprodi)->where('jenisPrasarana','=','penunjang')->get();
	$pustaka = DB::table('tbpustakas')->join('masterjenispustakas','tbpustakas.idjenispustaka','=','masterjenispustakas.idjenispustaka')->where('idprodi',$idprodi)->get();
	$jurnal = tbjurnals::where('idprodi',$idprodi)->get();
	$sumber = tbsumberpustakas::where('idprodi',$idprodi)->get();
	$lab = DB::table('tbperalatanlabs')->join('masterlaboratoriums','tbperalatanlabs.namaLaboratorium','=','masterlaboratoriums.namaLaboratorium')->where('tbperalatanlabs.idprodi',$idprodi)->get();
	$sisteminformasi = tbsisteminformases::where('idprodi',$idprodi)->get();
	$aksesibilitas = tbaksesibilitasdatas::where('idprodi',$idprodi)->get();
	// mengarahkan view pada file pdf.blade.php di views/provinsi/
	$view = View::make('PDF.pdfstandar6', array('data' => $pengelolaandana,'data1' => $sumberdana,'data2' => $penggunaandana,'data3' => $penelitian,'data4' => $pkm,'data5' => $rkdosen,'data6' => $prasarana1,'data7' => $prasarana,'data8' => $pustaka,'data9' => $jurnal,'data10' => $sumber,'data11' => $lab,'data12' => $sisteminformasi,'data13' => $aksesibilitas, 'i' => 0))->render(); 
	// panggil fungsi dompdf
	$pdf = App::make('dompdf');
	// set ukuran kertas dan orientasi
	$pdf->loadHTML($view)->setPaper('a4')->setOrientation('potrait');
	// cetak

}
	return $pdf->stream();
}


public function pdfstandar7() {

		$Ynow=date('Y');
		$Ybefore=$Ynow - 3;
		$idprodi = Session::get('idprodi');
		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
	// ambil semua data
			$penelitian = tbpenelitians::join('masterbiayapenelitians','tbpenelitians.idbiaya','=','masterbiayapenelitians.idbiaya')->where('tahun','>=',$Ybefore)->where('tahun','<=',$Ynow)->where('idprodi',$idprodi)->where('jenisKegiatan','=','Penelitian')->get();
			$kolompenelitian = tbpenelitians::where('tahun','>=',$Ybefore)->where('tahun','<=',$Ynow)->orderBy('jenisKegiatan')->get();
			$mhs = DB::table('tbmahasiswapenelitians')->where('idprodi',$idprodi)->where('jenisKegiatan','=','Penelitian')->get();
			$dosen = tbpenelitiandosens::join('masterdosens','tbpenelitiandosens.nip','=','masterdosens.nip')->where('tbpenelitiandosens.idprodi',$idprodi)->get();
			$haki = tbhakis::where('idprodi',$idprodi)->get();
			$pkm = tbpenelitians::join('masterbiayapenelitians','tbpenelitians.idbiaya','=','masterbiayapenelitians.idbiaya')->where('idprodi',$idprodi)->where('jenisKegiatan','=','Pengabdian Kepada Masyarakat')->get();
			$pkmmhs = DB::table('tbmahasiswapenelitians')->where('idprodi',$idprodi)->where('jenisKegiatan','=','Pengabdian Kepada Masyarakat')->get();
			$kerjasama = DB::table('tbkerjasamas')->join('masterinstituses','tbkerjasamas.idinstitusi','=','masterinstituses.idinstitusi')->where('jenis','=','Dalam Negeri')->where('idprodi',$idprodi)->get();
			$luarnegeri= DB::table('tbkerjasamas')->join('masterinstituses','tbkerjasamas.idinstitusi','=','masterinstituses.idinstitusi')->where('jenis','=','Luar Negeri')->where('idprodi',$idprodi)->get();

	// mengarahkan view pada file pdf.blade.php di views/provinsi/
	$view = View::make('PDF.pdfstandar7', array('data' => $penelitian,'data1' => $mhs,'data2' => $dosen,'data3' => $haki,'data4' => $pkm,'data5' => $pkmmhs,'data6' => $kerjasama,'data7' => $luarnegeri, 'i' => 0))->render(); 
	// panggil fungsi dompdf
	$pdf = App::make('dompdf');
	// set ukuran kertas dan orientasi
	$pdf->loadHTML($view)->setPaper('a4')->setOrientation('landscape');
}
	// cetak
	return $pdf->stream();
}

}
