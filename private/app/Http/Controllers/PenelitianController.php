<?php  namespace App\Http\Controllers;

use App\tbpenelitians;
use App\tbmahasiswapenelitians;
use App\tbpenelitiandosens;
use App\tbhakis;

class PenelitianController extends Controller {

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
			$penelitian = tbpenelitians::where('idprodi', 'like', $prodi.'%')->get(); 
			$mhs = tbmahasiswapenelitians::where('idprodi', 'like', $prodi.'%')->get(); 
			$dosen = tbpenelitiandosens::where('idprodi', 'like', $prodi.'%')->get(); 
			$haki = tbhakis::where('idprodi', 'like', $prodi.'%')->get(); 
		} else if ($level == "admin") {
			$penelitian = tbpenelitians::all();
			$mhs = tbmahasiswapenelitians::all();
			$dosen = tbpenelitiandosens::all();
			$haki = tbhakis::all();
		}	
		
		$menu = "st7"; //nama menu
		$menu2 = "penelitian"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st7.penelitian', compact('menu', 'menu2','penelitian','mhs','dosen','haki','Akses','buka'));
		}
	}

	public function indexmhspenelitian()
	{
		{
		$penelitian = tbpenelitians::all();
		$mhs = tbmahasiswapenelitians::all();
		$dosen = tbpenelitiandosens::all();
		$haki = tbhakis::all();
	}
		$idprodi = Session::get('idprodi');

		if(Session::get('level')=='admin'){
		$penelitian = tbpenelitians::all();
		$mhs = tbmahasiswapenelitians::all();
		$dosen = tbpenelitiandosens::all();
		$haki = tbhakis::all();
	}
	if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$penelitian = tbpenelitians::all();
		$mhs = tbmahasiswapenelitians::where('idprodi',$idprodi)->get();
		$dosen = tbpenelitiandosens::all();
		$haki = tbhakis::all();
	}
		$oye='oye';

		Return View::make('admin.penelitian')->with('data',$penelitian)->with('data2',$mhs)->with('data3',$dosen)->with('data4',$haki)->with('oye',$oye);
			
	}

	public function indexpenelitiandosen()
	{

		{
		$penelitian = tbpenelitians::all();
		$mhs = tbmahasiswapenelitians::all();
		$dosen = tbpenelitiandosens::all();
		$haki = tbhakis::all();
	}
		$idprodi = Session::get('idprodi');

		if(Session::get('level')=='admin'){
		$penelitian = tbpenelitians::all();
		$mhs = tbmahasiswapenelitians::all();
		$dosen = tbpenelitiandosens::all();
		$haki = tbhakis::all();
	}
	if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$penelitian = tbpenelitians::all();
		$mhs = tbmahasiswapenelitians::all();
		$dosen = tbpenelitiandosens::where('idprodi',$idprodi)->get();
		$haki = tbhakis::all();
	}
		$yey='yey';

		Return View::make('admin.penelitian')->with('data',$penelitian)->with('data2',$mhs)->with('data3',$dosen)->with('data4',$haki)->with('yey',$yey);
			
	}

	public function indexhaki()
	{

		{
		$penelitian = tbpenelitians::all();
		$mhs = tbmahasiswapenelitians::all();
		$dosen = tbpenelitiandosens::all();
		$haki = tbhakis::all();
	}
		$idprodi = Session::get('idprodi');

		if(Session::get('level')=='admin'){
		$penelitian = tbpenelitians::all();
		$mhs = tbmahasiswapenelitians::all();
		$dosen = tbpenelitiandosens::all();
		$haki = tbhakis::all();
	}
	if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$penelitian = tbpenelitians::all();
		$mhs = tbmahasiswapenelitians::all();
		$dosen = tbpenelitiandosens::all();
		$haki = tbhakis::where('idprodi',$idprodi)->get();
	}
		$yo='yo';

		Return View::make('admin.penelitian')->with('data',$penelitian)->with('data2',$mhs)->with('data3',$dosen)->with('data4',$haki)->with('yo',$yo);
			
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
		$masterprodis	= masterprodis::all();
		$masterbiaya	= masterbiayapenelitians::all();
		
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		$masterbiaya	= masterbiayapenelitians::all();
		
		}
			Return View::make('admin.formpenelitian')->with('data',$masterprodis)->with('data1',$masterbiaya);	
		
	}

	public function addmhspenelitian()
	{
		//
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$masterprodis = masterprodis::all();
		
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		
		}
			Return View::make('admin.formmhspenelitian')->with('data',$masterprodis);	
		
	}

	public function addpenelitiandosen()
	{
		//
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$masterprodis = masterprodis::all();
		$masterdosens = masterdosens::all();
		
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		$masterdosens = masterdosens::all();
		}
			Return View::make('admin.formpenelitiandosen')->with('data',$masterprodis)->with('data1',$masterdosens);	
		
	}

	public function addhaki()
	{
		//
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$masterprodis = masterprodis::all();
		
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		
		}
			Return View::make('admin.formhaki')->with('data',$masterprodis);	
		
	}

	public function save(){

		$penelitian = new tbpenelitians;

 		$idprodi= Input::get('idprodi');
 		$idbiaya= Input::get('idbiaya');
 		$tahun= Input::get('tahun');
 		$jumlah= Input::get('jumlah');
 		$jeniskeg= Input::get('jenisKegiatan');
 		

 		$penelitian->idprodi = $idprodi;
 		$penelitian->idbiaya = $idbiaya;
 		$penelitian->tahun = $tahun;
 		$penelitian->jumlah = $jumlah;
 		$penelitian->jenisKegiatan = $jeniskeg;
 		$penelitian->save();

 		return Redirect::to('penelitian');
 		
	}

	public function savemhspenelitian(){

		$mhs = new tbmahasiswapenelitians;

 		$idprodi= Input::get('idprodi');
 		$jumlahmhs= Input::get('jumlahMahasiswa');
 		$jumlahmhsTA= Input::get('jumlahMahasiswaTA');
 		$jeniskeg= Input::get('jenisKegiatan');
 		
 		$mhs->idprodi = $idprodi;
 		$mhs->jumlahMahasiswa = $jumlahmhs;
 		$mhs->jumlahMahasiswaTA = $jumlahmhsTA;
 		$mhs->jenisKegiatan = $jeniskeg;
 		$mhs->save();

 		return Redirect::to('mhspenelitian');

 	}

	public function savepenelitiandosen(){

		$dosen = new tbpenelitiandosens;

 		$idprodi= Input::get('idprodi');
 		$nip= Input::get('nip');
 		$judul= Input::get('judul');
 		$jurnal= Input::get('jurnal');
 		$tahunpub= Input::get('tahunPublikasi');
 		$tingkat= Input::get('tingkat');

 		$dosen->idprodi = $idprodi;
 		$dosen->nip = $nip;
 		$dosen->judul = $judul;
 		$dosen->jurnal = $jurnal;
 		$dosen->tahunPublikasi = $tahunpub;
 		$dosen->tingkat = $tingkat;
 		$dosen->save();

 		return Redirect::to('penelitiandosen');
 		
	}

	public function savehaki(){

		$haki = new tbhakis;

 		$idkarya= Input::get('idkarya');
 		$idprodi= Input::get('idprodi');
 		$nmkarya= Input::get('namaKarya');
 		$tahun= Input::get('tahun');

 		$haki->idkarya = $idkarya;
 		$haki->idprodi = $idprodi;
 		$haki->namaKarya = $nmkarya;
 		$haki->tahun = $tahun;
 		$haki->save();

 		return Redirect::to('haki');
 		
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
		if(Session::get('level')=='admin'){
		$penelitian = tbpenelitians::findorfail($id);
		$masterprodis = masterprodis::all();
		$masterbiaya	= masterbiayapenelitians::all();
		
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$penelitian = tbpenelitians::findorfail($id);
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		$masterbiaya	= masterbiayapenelitians::all();
		
		}
			
			return View::make('admin.editpenelitian')->with('data',$penelitian)->with('data1',$masterprodis)->with('data2',$masterbiaya);
	}

	public function editmhspenelitian($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$mhs = tbmahasiswapenelitians::findorfail($id);
		$masterprodis = masterprodis::all();
		
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$mhs = tbmahasiswapenelitians::findorfail($id);
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		
		}
			
			return View::make('admin.editmhspenelitian')->with('data2',$mhs)->with('data3',$masterprodis);
	}

	public function editpenelitiandosen($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$dosen = tbpenelitiandosens::findorfail($id);
		$masterprodis = masterprodis::all();
		$masterdosens = masterdosens::all();
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$dosen = tbpenelitiandosens::findorfail($id);
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		$masterdosens = masterdosens::all();
		}
			
			return View::make('admin.editpenelitiandosen')->with('data3',$dosen)->with('data4',$masterprodis)->with('data5',$masterdosens);
	}

	public function edithaki($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$haki = tbhakis::findorfail($id);
		$masterprodis = masterprodis::all();
		
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$haki = tbhakis::findorfail($id);
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		
		}
			
			return View::make('admin.edithaki')->with('data4',$haki)->with('data5',$masterprodis);
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

 		DB::table('tbpenelitians')->where('id', $id)->update(array(
 				'id' => Input::get('id'),
 				'idprodi' => Input::get('idprodi'),
                'idbiaya' => Input::get('idbiaya'),
                'tahun' => Input::get('tahun'),
                'jumlah' => Input::get('jumlah'),
                'jenisKegiatan' => Input::get('jenisKegiatan')
                
            ));
 		return Redirect::to('penelitian');
	}

	public function updatemhspenelitian()
	{
		$id = Input::get('id');

 		DB::table('tbmahasiswapenelitians')->where('id', $id)->update(array(
 				'id' => Input::get('id'),
 				'idprodi' => Input::get('idprodi'),
                'jumlahMahasiswa' => Input::get('jumlahMahasiswa'),
                'jumlahMahasiswaTA' => Input::get('jumlahMahasiswaTA'),
                'jenisKegiatan' => Input::get('jenisKegiatan')
                
            ));
 		return Redirect::to('mhspenelitian');
	}

	public function updatepenelitiandosen()
	{
		$id = Input::get('id');

 		DB::table('tbpenelitiandosens')->where('id', $id)->update(array(
 				'id' => Input::get('id'),
 				'idprodi' => Input::get('idprodi'),
                'nip' => Input::get('nip'),
                'judul' => Input::get('judul'),
                'jurnal' => Input::get('jurnal'),
                'tahunPublikasi' => Input::get('tahunPublikasi'),
                'tingkat' => Input::get('tingkat')
                
            ));
 		return Redirect::to('penelitiandosen');
	}

	public function updatehaki()
	{
		$id = Input::get('id');

 		DB::table('tbhakis')->where('id', $id)->update(array(
 				'id' => Input::get('id'),
 				'idkarya' => Input::get('idkarya'),
                'idprodi' => Input::get('idprodi'),
                'namaKarya' => Input::get('namaKarya'),
                'tahun' => Input::get('tahun')
                
            ));
 		return Redirect::to('haki');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$penelitian = tbpenelitians::find($id);
		$penelitian->delete();
		return Redirect::to('penelitian');
	}

	public function deletemhspenelitian($id)
	{
		$mhs = tbmahasiswapenelitians::find($id);
		$mhs->delete();
		return Redirect::to('mhspenelitian');
	}

	public function deletepenelitiandosen($id)
	{
		$dosen = tbpenelitiandosens::find($id);
		$dosen->delete();
		return Redirect::to('penelitiandosen');
	}

	public function deletehaki($id)
	{
		$haki = tbhakis::find($id);
		$haki->delete();
		return Redirect::to('haki');
	}


}
