<?php namespace App\Http\Controllers;

use App\tbpengelolaandanas;
use App\tbsumberdanas;
use App\tbpenggunaandanas;
use App\tbdanapenelitians;

use App\masterprodis;
use App\masterbiayapenelitians;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, DB, Validator, Session ;

class PembiayaanController extends Controller {

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
			$pengelolaandana = tbpengelolaandanas::where('idprodi', 'like', $prodi.'%')->get(); 
			$sumberdana = tbsumberdanas::where('idprodi', 'like', $prodi.'%')->get(); 
			$penggunaandana = tbpenggunaandanas::where('idprodi', 'like', $prodi.'%')->get(); 
			$danapenelitian = tbdanapenelitians::where('idprodi', 'like', $prodi.'%')->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
			$pengelolaandana = tbpengelolaandanas::where('idprodi', 'like', $prodi.'%')->get(); 
			$sumberdana = tbsumberdanas::where('idprodi', 'like', $prodi.'%')->get(); 
			$penggunaandana = tbpenggunaandanas::where('idprodi', 'like', $prodi.'%')->get(); 
			$danapenelitian = tbdanapenelitians::where('idprodi', 'like', $prodi.'%')->get(); 	
		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();
			$pengelolaandana = tbpengelolaandanas::all();
			$sumberdana = tbsumberdanas::all();
			$penggunaandana = tbpenggunaandanas::all();
			$danapenelitian = tbdanapenelitians::all();
		}	
		
		$menu = "st6"; //nama menu
		$menu2 = "pembiayaan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st6.pembiayaan', compact('menu','masterprodis', 'menu2','pengelolaandana','sumberdana','penggunaandana','danapenelitian','Akses','buka'));
		}
	}


	// pengelolaanDana =======================================================================
	
	public function addpengelolaan()
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
		
		Session::set('tab_pembiayaan','pengelolaan');
		$menu = "st6"; //nama menu
		$menu2 = "pembiayaan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st6.formpengelolaandana', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
		
		
	}
	
	public function savepengelolaan()
	{
		Session::set('tab_pembiayaan','pengelolaan');
		$pengelolaandana = new tbpengelolaandanas;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpengelolaandanas::$rules, tbpengelolaandanas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$pengelolaanDana= Input::get('pengelolaanDana');

 		$pengelolaandana->idprodi = $idprodi;
 		$pengelolaandana->pengelolaanDana = $pengelolaanDana;
 		$pengelolaandana->save();

 		return redirect('pembiayaan')
			->with('status-pengelolaan', 'Data telah berhasil disimpan');
 		
	}
	
	public function editpengelolaan($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$pengelolaan = tbpengelolaandanas::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$pengelolaan = tbpengelolaandanas::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$pengelolaan = tbpengelolaandanas::where('id',$id)->get(); 
		}	
		
		Session::set('tab_pembiayaan','pengelolaan');
		$menu = "st6"; //nama menu
		$menu2 = "pembiayaan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st6.editpengelolaandana', compact('pengelolaan','menu','menu2','Akses','buka', 'level'));

		}	
	}
	
	public function updatepengelolaan()
	{
		Session::set('tab_pembiayaan','pengelolaan');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbpengelolaandanas::$rules, tbpengelolaandanas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }	
		
 		DB::table('tbpengelolaandanas')->where('id', $id)->update(array(
                'pengelolaanDana' => Input::get('pengelolaanDana')      
            ));
			
 		return redirect('pembiayaan')
			->with('status-pengelolaan', 'Data telah berhasil diedit');
	}
	
	public function delpengelolaan($id)
	{
		Session::set('tab_pembiayaan','pengelolaan');
		$dana = tbpengelolaandanas::find($id);
		$dana->delete();
		return redirect('pembiayaan')
			->with('status-pengelolaan', 'Data telah berhasil dihapus');
	}
	
	
	
	
	
	
	
	
	
	
	
	
	// sumberDana =================================================================

	public function addsumberdana()
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
		
		Session::set('tab_pembiayaan','sumber');
		$menu = "st6"; //nama menu
		$menu2 = "pembiayaan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st6.formsumberdana', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
		
	}
	
	public function savesumberdana()
	{
		Session::set('tab_pembiayaan','sumber');
		$sumber = new tbsumberdanas;
		$input	  = Input::all();
		$validator = Validator::make($input, tbsumberdanas::$rules, tbsumberdanas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		

 		$idprodi= Input::get('idprodi');
 		$sumberdana= Input::get('sumberDana');
 		$jenisdana= Input::get('jenisDana');
 		$tahun= Input::get('tahun');
 		$jumlahdana= Input::get('jumlahDana');
 		
 		$sumber->idprodi= $idprodi;
 		$sumber->sumberDana = $sumberdana;
 		$sumber->jenisDana = $jenisdana;
 		$sumber->tahun = $tahun;
 		$sumber->jumlahDana = $jumlahdana;
 		$sumber->save();

 		return redirect('pembiayaan')
			->with('status-sumber', 'Data telah berhasil disimpan');
 		
	}
	
	public function editsumberdana($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$sumber = tbsumberdanas::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$sumber = tbsumberdanas::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$sumber = tbsumberdanas::where('id',$id)->get(); 
		}	
		
		Session::set('tab_pembiayaan','sumber');
		$menu = "st6"; //nama menu
		$menu2 = "pembiayaan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st6.editsumberdana', compact('sumber','menu','menu2','Akses','buka', 'level'));

		}
			
	}
	
	public function updatesumberdana()
	{
		Session::set('tab_pembiayaan','sumber');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbsumberdanas::$rules, tbsumberdanas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

 		DB::table('tbsumberdanas')->where('id', $id)->update(array(
                'sumberDana' => Input::get('sumberDana'),
                'jenisDana' => Input::get('jenisDana'),
                'tahun' => Input::get('tahun'),
                'jumlahDana' => Input::get('jumlahDana')      
            ));
			
 		return redirect('pembiayaan')
			->with('status-sumber', 'Data telah berhasil diedit');
	}
	
	public function delsumberdana($id)
	{
		Session::set('tab_pembiayaan','sumber');
		$sumber = tbsumberdanas::find($id);
		$sumber->delete();
		
		return redirect('pembiayaan')
			->with('status-sumber', 'Data telah berhasil dihapus');
	}
	
	
	
	
	
	
	
	// penggunaandana ===================================================================

	public function addpenggunaandana()
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
		
		Session::set('tab_pembiayaan','penggunaan');
		$menu = "st6"; //nama menu
		$menu2 = "pembiayaan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st6.formpenggunaandana', compact('masterprodis','menu','menu2','Akses','buka','level'));
		}
		
	}

	public function savepenggunaandana()
	{
		Session::set('tab_pembiayaan','penggunaan');
		$penggunaan = new tbpenggunaandanas;
		$input	  = Input::all();
		$validator = Validator::make($input, tbpenggunaandanas::$rules, tbpenggunaandanas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

 		$idprodi= Input::get('idprodi');
 		$jenispenggunaan= Input::get('jenisPenggunaan');
 		$tahun= Input::get('tahun');
 		$jumlahdana= Input::get('jumlahDana');
 		
 		$penggunaan->idprodi= $idprodi;
 		$penggunaan->jenispenggunaan = $jenispenggunaan;
 		$penggunaan->tahun = $tahun;
 		$penggunaan->jumlahdana = $jumlahdana;
 		$penggunaan->save();

 		return redirect('pembiayaan')
			->with('status-penggunaan', 'Data telah berhasil disimpan');
 		
 	}
	
	public function editpenggunaandana($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$penggunaan = tbpenggunaandanas::where('id',$id)->where('idprodi',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$penggunaan = tbpenggunaandanas::where('id',$id)->where('idprodi','like',$prodi.'%')->get(); 		
		} else if ($level == "admin") {
			$penggunaan = tbpenggunaandanas::where('id',$id)->get(); 
		}	
		
		Session::set('tab_pembiayaan','penggunaan');
		$menu = "st6"; //nama menu
		$menu2 = "pembiayaan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 	
		$buka = $Akses->where('modul',$menu);
		if ($buka == "[]" and $level == "prodi") {	
			return redirect('/');
		} else {
			return view('st6.editpenggunaandana', compact('penggunaan','menu','menu2','Akses','buka', 'level'));

		}
	}
	
	public function updatepenggunaandana()
	{
		Session::set('tab_pembiayaan','penggunaan');
		$id = Input::get('id');
		$input	  = Input::all();
		$validator = Validator::make($input, tbpenggunaandanas::$rules, tbpenggunaandanas::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

 		DB::table('tbpenggunaandanas')->where('id', $id)->update(array(
                'jenisPenggunaan' => Input::get('jenisPenggunaan'),
                'tahun' => Input::get('tahun'),
                'jumlahDana' => Input::get('jumlahDana')      
            ));
 		return redirect('pembiayaan')
			->with('status-penggunaan', 'Data telah berhasil diedit');
	}
	
	public function delpenggunaandana($id)
	{
		Session::set('tab_pembiayaan','penggunaan');
		$penggunaan = tbpenggunaandanas::find($id);
		$penggunaan->delete();

		return redirect('pembiayaan')
			->with('status-penggunaan', 'Data telah berhasil dihapus');
	}
	
	
	
	
	
	
	
	
	
	
	// penelitian ==================================================================
	
	public function adddanapenelitian()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		
		$idbiaya = masterbiayapenelitians::all();
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		if ($level == "prodi") {
			$masterprodis = masterprodis::where('idprodi','=',$prodi)->get(); 
		} else if ($level == "fakultas") {
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
		} else if ($level == "admin") {
			$masterprodis = masterprodis::all();

		}	 	
		
		Session::set('tab_pembiayaan','penggunaan');
		$menu = "st6"; //nama menu
		$menu2 = "pembiayaan"; //nama submenu
		//cek jika user tersebut memiliki hak akses pada modul ini 		
		$buka = $Akses->where('modul',$menu);
		if ($buka == '[]' and $level == 'prodi') {	
			return redirect('/');
		} else {
			return view('st6.formdanapenelitian', compact('masterprodis','idbiaya','menu','menu2','Akses','buka','level'));
		}
			
		
	}

	public function detaildanapenelitian($id){
		$dana = tbdanapenelitians::findorfail($id);

		return View::make('admin.detaildanapenelitian')->with('data4',$dana);
	}

	

	

	

 	public function savedanapenelitian(){

		$danapenelitian = new tbdanapenelitians;

		$idprodi= Input::get('idprodi');
 		$nip= Input::get('nip');
 		$jeniskeg= Input::get('jenisKegiatan');
 		$judul= Input::get('judul');
 		$tahun= Input::get('tahun');
 		$penulislainnya= Input::get('penulisLainnya');
 		$idbiaya= Input::get('idbiaya');
 		$jenisdana= Input::get('jenisDana');
 		$jumlahdana= Input::get('jumlahDana');
 		$jumlahmhs= Input::get('jumlahMahasiswa');
 		$jumlahmhsta= Input::get('jumlahMahasiswaTA');
 		$deskpartisipasimhs= Input::get('deskripsiPartisipasiMahasiswa');

 		$danapenelitian->idprodi= $idprodi;
 		$danapenelitian->nip= $nip;
 		$danapenelitian->jenisKegiatan = $jeniskeg;
 		$danapenelitian->judul = $judul;
 		$danapenelitian->tahun = $tahun;
 		$danapenelitian->penulisLainnya = $penulislainnya;
 		$danapenelitian->idbiaya = $idbiaya;
 		$danapenelitian->jenisDana = $jenisdana;
 		$danapenelitian->jumlahDana = $jumlahdana;
 		$danapenelitian->jumlahMahasiswa = $jumlahmhs;
 		$danapenelitian->jumlahMahasiswaTA = $jumlahmhsta;
 		$danapenelitian->deskripsiPartisipasiMahasiswa = $deskpartisipasimhs;
 		$danapenelitian->save();

 		return Redirect::to('danapenelitian');
 		
	}

	

	

	public function editdanapenelitian($id)
	{
		$idprodi = Session::get('idprodi');
		if(Session::get('level')=='admin'){
		$danapenelitian = tbdanapenelitians::findorfail($id);
		$masterprodis = masterprodis::all();
		$masterdosens = masterdosens::all();
		$masterbiayapenelitians = masterbiayapenelitians::all();
		}

		if(Session::get('idprodi')!='' and Session::get('level')=='user'){
		$danapenelitian = tbdanapenelitians::findorfail($id);
		$masterprodis = masterprodis::where('idprodi',$idprodi)->get();
		$masterdosens = masterdosens::all();
		$masterbiayapenelitians = masterbiayapenelitians::all();
		}
			
			return View::make('admin.editdanapenelitian')->with('data4',$danapenelitian)->with('data5',$masterprodis)->with('data6',$masterdosens)->with('data7',$masterbiayapenelitians);
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	

	

	
	
	public function updatedanapenelitian()
	{
		$id = Input::get('id');

 		DB::table('tbdanapenelitians')->where('id', $id)->update(array(
                'id' => Input::get('id'),
                'nip' => Input::get('nip'),
                'jenisKegiatan' => Input::get('jenisKegiatan'),
                'judul' => Input::get('judul'),
                'tahun' => Input::get('tahun'),
                'penulisLainnya' => Input::get('penulisLainnya'),
                'idbiaya' => Input::get('idbiaya'),
                'jenisDana' => Input::get('jenisDana'),
                'jumlahDana' => Input::get('jumlahDana'),
                'jumlahMahasiswa' => Input::get('jumlahMahasiswa'),
                'jumlahMahasiswaTA' => Input::get('jumlahMahasiswaTA'),
                'deskripsiPartisipasiMahasiswa' => Input::get('deskripsiPartisipasiMahasiswa')      
            ));
 		return Redirect::to('danapenelitian');
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	

	

	

	public function deletedanapenelitian($id)
	{
		$danapenelitian = tbdanapenelitians::find($id);
		$danapenelitian->delete();
		return Redirect::to('danapenelitian');
	}



}
