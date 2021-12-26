<?php namespace App\Http\Controllers;

use App\tbruangkerjadosens;
use App\tbprasaranas;
use App\tbpustakas;
use App\tbjurnals;
use App\tbsumberpustakas;
use App\tbperalatanlabs;


class SaranaprasaranaController extends Controller {

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
		if ($level == "user") {
			$ruangkerjadosen = tbruangkerjadosens::where('idprodi', 'like', $prodi.'%')->get(); 
			$prasarana = tbprasaranas::where('idprodi', 'like', $prodi.'%')->get(); 
			$pustaka = tbpustakas::where('idprodi', 'like', $prodi.'%')->get(); 
			$jurnal = tbjurnals::where('idprodi', 'like', $prodi.'%')->get(); 
			$sumber = tbsumberpustakas::where('idprodi', 'like', $prodi.'%')->get(); 
			$lab = tbperalatanlabs::where('idprodi', 'like', $prodi.'%')->get(); 
		} else if ($level == "admin") {
			$ruangkerjadosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}	
		
		$menu = "st6"; //nama menu
		$menu2 = "saranaprasarana"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st6.saranaprasarana', compact('menu', 'menu2','ruangkerjadosen','prasarana','pustaka','jurnal','sumber','lab','Akses','buka'));
		}
		
	}

	public function indexprasarana()
	{

		{
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		$idprodi = Session::get('idprodi');

		if(Session::get('level')=='admin'){
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::where('idprodi',$idprodi)->get();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		$bangke='bangke';

		Return View::make('admin.saranaprasarana')->with('data',$rkdosen)->with('data2',$prasarana)->with('data3',$pustaka)->with('data4',$jurnal)->with('data5',$sumber)->with('data6',$lab)->with('bangke',$bangke);
		
	}

	public function indexpustaka()
	{
		{
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = DB::table('tbpustakas')->join('masterjenispustakas','tbpustakas.idjenispustaka','=','masterjenispustakas.idjenispustaka')->get();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		$idprodi = Session::get('idprodi');

		if(Session::get('level')=='admin'){
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = DB::table('tbpustakas')->join('masterjenispustakas','tbpustakas.idjenispustaka','=','masterjenispustakas.idjenispustaka')->get();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = DB::table('tbpustakas')->join('masterjenispustakas','tbpustakas.idjenispustaka','=','masterjenispustakas.idjenispustaka')->where('idprodi',$idprodi)->get();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		$no='no';

		Return View::make('admin.saranaprasarana')->with('data',$rkdosen)->with('data2',$prasarana)->with('data3',$pustaka)->with('data4',$jurnal)->with('data5',$sumber)->with('data6',$lab)->with('no',$no);
		
	}

	public function indexjurnal()
	{

		{
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		$idprodi = Session::get('idprodi');

		if(Session::get('level')=='admin'){
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::where('idprodi',$idprodi)->get();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		$oyi='oyi';

		Return View::make('admin.saranaprasarana')->with('data',$rkdosen)->with('data2',$prasarana)->with('data3',$pustaka)->with('data4',$jurnal)->with('data5',$sumber)->with('data6',$lab)->with('oyi',$oyi);
		
	}

	public function indexsumberpustaka()
	{

		{
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		$idprodi = Session::get('idprodi');

		if(Session::get('level')=='admin'){
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::where('idprodi',$idprodi)->get();
			$lab = tbperalatanlabs::all();
		}
		$oo='oo';

		Return View::make('admin.saranaprasarana')->with('data',$rkdosen)->with('data2',$prasarana)->with('data3',$pustaka)->with('data4',$jurnal)->with('data5',$sumber)->with('data6',$lab)->with('oo',$oo);
		
	}

	public function indexperalatanLAB()
	{

		{
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		$idprodi = Session::get('idprodi');

		if(Session::get('level')=='admin'){
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::all();
		}
		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$rkdosen = tbruangkerjadosens::all();
			$prasarana = tbprasaranas::all();
			$pustaka = tbpustakas::all();
			$jurnal = tbjurnals::all();
			$sumber = tbsumberpustakas::all();
			$lab = tbperalatanlabs::where('idprodi',$idprodi)->get();
		}
		$noge='noge';

		Return View::make('admin.saranaprasarana')->with('data',$rkdosen)->with('data2',$prasarana)->with('data3',$pustaka)->with('data4',$jurnal)->with('data5',$sumber)->with('data6',$lab)->with('noge',$noge);
		
	}



	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function add()
	{
		//
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
			$masterprodis = masterprodis::all();

		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();

		}
		Return View::make('admin.formruangkerjadosen')->with('data',$masterprodis);	
		
	}

	public function addprasarana()
	{
		//
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
			$masterprodis = masterprodis::all();

		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();

		}
		Return View::make('admin.formprasarana')->with('data',$masterprodis);	
		
	}

	public function addpustaka()
	{
		//
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
			$masterprodis = masterprodis::all();
			$masterjenispustakas = masterjenispustakas::all();
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
			$masterjenispustakas = masterjenispustakas::all();
		}
		
		Return View::make('admin.formpustaka')->with('data',$masterprodis)->with('data1',$masterjenispustakas);	
		
	}

	public function addjurnal()
	{
		//
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
			$masterprodis = masterprodis::all();

		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();

		}
		
		Return View::make('admin.formjurnal')->with('data',$masterprodis);	
		
	}

	public function addsumberpustaka()
	{
		//
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
			$masterprodis = masterprodis::all();

		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();

		}
		
		Return View::make('admin.formsumberpustaka')->with('data',$masterprodis);	
		
	}

	public function addperalatanLAB()
	{
		//
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
			$masterprodis = masterprodis::all();
			$masterlaboratoriums = masterlaboratoriums::all();

		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
			$masterlaboratoriums = masterlaboratoriums::all();

		}
		
		Return View::make('admin.formperalatanlab')->with('data',$masterprodis)->with('data1',$masterlaboratoriums);	
		
	}

	public function save(){

		$rkdosen = new tbruangkerjadosens;

		$idprodi= Input::get('idprodi');
		$jenisruang= Input::get('jenisRuang');
		$jumlahruang= Input::get('jumlahRuang');
		$jumlahluas= Input::get('jumlahLuas');

		$rkdosen->idprodi = $idprodi;
		$rkdosen->jenisRuang= $jenisruang;
		$rkdosen->jumlahRuang = $jumlahruang;
		$rkdosen->jumlahLuas = $jumlahluas;
		$rkdosen->save();

		return Redirect::to('saranaprasarana');

	}

	public function saveprasarana(){

		$prasarana = new tbprasaranas;

		$idprodi= Input::get('idprodi');
		$nama= Input::get('nama');
		$jenisprasarana= Input::get('jenisPrasarana');
		$jumlahunit= Input::get('jumlahUnit');
		$luas= Input::get('luas');
		$kepemilikan= Input::get('kepemilikan');
		$kondisi= Input::get('kondisi');
		$utilisasi= Input::get('utilisasi');
		$pengelola= Input::get('pengelola');

		$prasarana->idprodi = $idprodi;
		$prasarana->nama= $nama;
		$prasarana->jenisPrasarana = $jenisprasarana;
		$prasarana->jumlahUnit = $jumlahunit;
		$prasarana->luas = $luas;
		$prasarana->kepemilikan = $kepemilikan;
		$prasarana->kondisi = $kondisi;
		$prasarana->utilisasi = $utilisasi;
		$prasarana->pengelola = $pengelola;
		$prasarana->save();

		return Redirect::to('prasarana');

	}

	public function savepustaka(){

		$pustaka = new tbpustakas;

		$idprodi= Input::get('idprodi');
		$idjnsptk= Input::get('idjenispustaka');
		$jumlahjudul= Input::get('jumlahJudul');
		$jumlahcopy= Input::get('jumlahCopy');

		$pustaka->idprodi = $idprodi;
		$pustaka->idjenispustaka= $idjnsptk;
		$pustaka->jumlahJudul = $jumlahjudul;
		$pustaka->jumlahCopy = $jumlahcopy;
		$pustaka->save();

		return Redirect::to('pustaka');

	}

	public function savejurnal(){

		$jurnal = new tbjurnals;

		$idprodi= Session::get('idprodi');
		$nmjrnl= Input::get('namaJurnal');
		$tahun= Input::get('tahun');
		$nomor= Input::get('nomor');
		$jumlah= Input::get('jumlah');
		$akreditasi= Input::get('akreditasi');

		$jurnal->idprodi = $idprodi;
		$jurnal->namaJurnal= $nmjrnl;
		$jurnal->tahun = $tahun;
		$jurnal->nomor = $nomor;
		$jurnal->jumlah = $jumlah;
		$jurnal->akreditasi = $akreditasi;
		$jurnal->save();

		return Redirect::to('jurnal');

	}

	public function savesumberpustaka(){

		$sumber = new tbsumberpustakas;

		$idprodi= Input::get('idprodi');
		$sumberpustaka= Input::get('sumberpustaka');

		$sumber->idprodi = $idprodi;
		$sumber->sumberpustaka= $sumberpustaka;
		$sumber->save();

		return Redirect::to('sumberpustaka');

	}

	public function saveperalatanLAB(){

		$lab = new tbperalatanlabs;

		$idprodi= Input::get('idprodi');
		$idlab= Input::get('idlaboratorium');
		$idprltn= Input::get('idperalatan');
		$nmprltn= Input::get('namaPeralatan');
		$jmlhunit= Input::get('jumlahUnit');
		$kepemilikan= Input::get('kepemilikan');
		$kondisi= Input::get('kondisi');
		$utilisasi= Input::get('utilisasi');

		$lab->idprodi = $idprodi;
		$lab->idlaboratorium = $idlab;
		$lab->idperalatan= $idprltn;
		$lab->namaPeralatan = $nmprltn;
		$lab->jumlahUnit = $jmlhunit;
		$lab->kepemilikan = $kepemilikan;
		$lab->kondisi = $kondisi;
		$lab->utilisasi = $utilisasi;
		$lab->save();

		return Redirect::to('peralatanLAB');

	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin')
		{
			$rkdosen = tbruangkerjadosens::findorfail($id);
			$masterprodis = masterprodis::all();
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user')
		{
			$rkdosen = tbruangkerjadosens::findorfail($id);
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		}


		return View::make('admin.editruangkerjadosen')->with('data',$rkdosen)->with('data1',$masterprodis);
	}

	public function editprasarana($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
			$prasarana = tbprasaranas::findorfail($id);
			$masterprodis = masterprodis::all();

		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$prasarana = tbprasaranas::findorfail($id);
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();

		}


		return View::make('admin.editprasarana')->with('data2',$prasarana)->with('data3',$masterprodis);
	}

	public function editpustaka($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
			$pustaka = tbpustakas::findorfail($id);
			$masterprodis = masterprodis::all();
			$masterjenispustakas = masterjenispustakas::all();
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$pustaka = tbpustakas::findorfail($id);
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
			$masterjenispustakas = masterjenispustakas::all();
		}

		return View::make('admin.editpustaka')->with('data3',$pustaka)->with('data4',$masterprodis)->with('data5',$masterjenispustakas);
	}

	public function editjurnal($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
			$jurnal = tbjurnals::findorfail($id);
			$masterprodis = masterprodis::all();

		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$jurnal = tbjurnals::findorfail($id);
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();

		}


		return View::make('admin.editjurnal')->with('data4',$jurnal)->with('data5',$masterprodis);
	}

	public function editsumberpustaka($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
			$sumber = tbsumberpustakas::findorfail($id);
			$masterprodis = masterprodis::all();

		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$sumber = tbsumberpustakas::findorfail($id);
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();

		}

		return View::make('admin.editsumberpustaka')->with('data5',$sumber)->with('data6',$masterprodis);
	}

	public function editperalatanLAB($id)
	{

		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
			$lab = tbperalatanlabs::findorfail($id);
			$masterprodis = masterprodis::all();
			$masterlaboratoriums = masterlaboratoriums::all();

		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
			$lab = tbperalatanlabs::findorfail($id);
			$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
			$masterlaboratoriums = masterlaboratoriums::all();

		}
		
		$lab = tbperalatanlabs::findorfail($id);
		return View::make('admin.editperalatanlab')->with('data6',$lab)->with('data7',$masterprodis)->with('data8',$masterlaboratoriums);
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update()
	{
		$id = Input::get('id');

		DB::table('tbruangkerjadosens')->where('id', $id)->update(array(
			'id' => Input::get('id'),
			'idprodi' => Input::get('idprodi'),
			'jenisRuang' => Input::get('jenisRuang'),
			'jumlahRuang' => Input::get('jumlahRuang'),
			'jumlahLuas' => Input::get('jumlahLuas')

			));
		return Redirect::to('saranaprasarana');
	}

	public function updateprasarana()
	{
		$id = Input::get('id');

		DB::table('tbprasaranas')->where('id', $id)->update(array(
			'id' => Input::get('id'),
			'idprodi' => Input::get('idprodi'),
			'nama' => Input::get('nama'),
			'jenisPrasarana' => Input::get('jenisPrasarana'),
			'jumlahUnit' => Input::get('jumlahUnit'),
			'luas' => Input::get('luas'),
			'kepemilikan' => Input::get('kepemilikan'),
			'kondisi' => Input::get('kondisi'),
			'utilisasi' => Input::get('utilisasi'),
			'pengelola' => Input::get('pengelola')

			));
		return Redirect::to('prasarana');
	}

	public function updatepustaka()
	{
		$id = Input::get('id');

		DB::table('tbpustakas')->where('id', $id)->update(array(
			'id' => Input::get('id'),
			'idprodi' => Input::get('idprodi'),
			'idjenispustaka' => Input::get('idjenispustaka'),
			'jumlahJudul' => Input::get('jumlahJudul'),
			'jumlahCopy' => Input::get('jumlahCopy')

			));
		return Redirect::to('pustaka');
	}

	public function updatejurnal()
	{
		$id = Input::get('id');

		DB::table('tbjurnals')->where('id', $id)->update(array(
			'id' => Input::get('id'),
			'idprodi' => Input::get('idprodi'),
			'namaJurnal' => Input::get('namaJurnal'),
			'tahun' => Input::get('tahun'),
			'nomor' => Input::get('nomor'),
			'jumlah' => Input::get('jumlah'),
			'akreditasi' => Input::get('akreditasi')

			));
		return Redirect::to('jurnal');
	}

	public function updatesumberpustaka()
	{
		$id = Input::get('id');

		DB::table('tbsumberpustakas')->where('id', $id)->update(array(
			'id' => Input::get('id'),
			'idprodi' => Input::get('idprodi'),
			'sumberpustaka' => Input::get('sumberpustaka')

			));
		return Redirect::to('sumberpustaka');
	}

	public function updateperalatanLAB()
	{
		$id = Input::get('id');

		DB::table('tbperalatanlabs')->where('id', $id)->update(array(
			'id' => Input::get('id'),
			'idprodi' => Input::get('idprodi'),
			'idlaboratorium' => Input::get('idlaboratorium'),
			'idperalatan' => Input::get('idperalatan'),
			'namaPeralatan' => Input::get('namaPeralatan'),
			'jumlahUnit' => Input::get('jumlahUnit'),
			'kepemilikan' => Input::get('kepemilikan'),
			'kondisi' => Input::get('kondisi'),
			'utilisasi' => Input::get('utilisasi')

			));
		return Redirect::to('peralatanLAB');
	}
	
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$rkdosen = tbruangkerjadosens::find($id);
		$rkdosen->delete();
		return Redirect::to('saranaprasarana');
	}

	public function deleteprasarana($id)
	{
		$prasarana = tbprasaranas::find($id);
		$prasarana->delete();
		return Redirect::to('prasarana');
	}

	public function deletepustaka($id)
	{
		$pustaka = tbpustakas::find($id);
		$pustaka->delete();
		return Redirect::to('pustaka');
	}

	public function deletejurnal($id)
	{
		$jurnal = tbjurnals::find($id);
		$jurnal->delete();
		return Redirect::to('jurnal');
	}

	public function deletesumberpustaka($id)
	{
		$sumber = tbsumberpustakas::find($id);
		$sumber->delete();
		return Redirect::to('sumberpustaka');
	}

	public function deleteperalatanLAB($id)
	{
		$lab = tbperalatanlabs::find($id);
		$lab->delete();
		return Redirect::to('peralatanLAB');
	}

}
