<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Input, DB, Validator, Auth ;
use Redirect;
use App\masterprodis;
use App\masterfakultas;
use App\Login;

class UserController extends Controller {

	public function index()
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		if ($prodi == "000") { // ini super admin
			
			$datalogin = DB::select("SELECT * FROM logins"); 
		} else if ($level == "admin") { // ini admin
			$datalogin = DB::select("SELECT * FROM logins WHERE logins.idprodi != '000'" ); 
		} else if ($level == "fakultas") { // ini fakultas
			$datalogin = DB::select("SELECT * FROM logins, masterprodis WHERE logins.idprodi like '$prodi%' and logins.idprodi = masterprodis.idprodi"); 
		} else if ($level == "prodi") { // ini prodi
			$datalogin = DB::select("SELECT * FROM logins, masterprodis WHERE logins.idprodi = '$prodi' and logins.idprodi = masterprodis.idprodi"); 
		}
			
		$menu = "setting"; //nama menu
		$menu2 = ""; //nama submenu
		if ($level == "admin" or $level == "fakultas") {
			return view('auth.list',compact('level','menu','menu2','Akses','datalogin'));
		} else {
			return redirect('/');
		}

	}
	
	
	
	public function add()
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		if ($level == "admin") {
			$masterfakultas = DB::select("SELECT * FROM masterfakultas, masterprodis WHERE masterfakultas.idfakultas  = masterprodis.idfakultas GROUP BY masterfakultas.idfakultas");
			$masterprodis = masterprodis::all();
		} else if ($level == "fakultas") {
			$masterfakultas = DB::select("SELECT * FROM masterfakultas, masterprodis WHERE masterfakultas.idfakultas  = masterprodis.idfakultas GROUP BY masterfakultas.idfakultas");;
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
		}	
		$menu = "setting"; //nama menu
		$menu2 = ""; //nama submenu
		if ($level == "admin" or $level == "fakultas") {
			return view('auth.register',compact('level','menu','menu2','Akses','masterprodis','masterfakultas'));
		} else {
			return redirect('/');
		}

	}
	
	protected function validator(array $data){
        return Validator::make($data, [
            'firstname' 	=> 'required',
            'lastname' 		=> 'required',
            'username' 		=> 'required',
            'password' 		=> 'required',
            'level' 		=> 'required',
        ]);
	}
	
	public function save()
	{
		
		$datalogin = new Login;
		$input	  = Input::all();
		$validator = Validator::make($input, Login::$rules, Login::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		$idprodi		= Input::get('idprodi');
		$idfakultas		= Input::get('idfakultas');
		if ($idprodi != "" and $idfakultas == "") {
			$jenis_user = $idprodi;
		} else if ($idprodi == "" and $idfakultas!= "") {
			$jenis_user = $idfakultas;
		} else if ($idprodi == "" and $idfakultas == "") {
			$jenis_user = " ";
		}
		$firstname		= Input::get('firstname');
 		$lastname		= Input::get('lastname');
 		$username		= Input::get('username');
 		$password		= bcrypt(Input::get('password'));
 		$level			= Input::get('level');

 		
 		$datalogin->idprodi		= $jenis_user;
 		$datalogin->firstname	= $firstname;
 		$datalogin->lastname	= $lastname;
 		$datalogin->username	= $username;
 		$datalogin->password	= $password;
 		$datalogin->level		= $level;
 		
 		
 		$datalogin->save();
		return redirect('registrasi')
			->with('status', 'Data telah berhasil disimpan');

	}
	
	
	
	public function edit($id)
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		
		if ($level == "admin") {
			$masterfakultas = DB::select("SELECT * FROM masterfakultas, masterprodis WHERE masterfakultas.idfakultas  = masterprodis.idfakultas GROUP BY masterfakultas.idfakultas");
			$masterprodis = masterprodis::all();
		} else if ($level == "fakultas") {
			$masterfakultas = DB::select("SELECT * FROM masterfakultas, masterprodis WHERE masterfakultas.idfakultas  = masterprodis.idfakultas GROUP BY masterfakultas.idfakultas");;
			$masterprodis = masterprodis::where('idprodi','like',$prodi.'%')->get();
		}
		if ($prodi == "000") {
			$Login = Login::where('id',$id)->get(); 
		} else {
			$Login = Login::where('id',$id)->where('idprodi','!=','000')->get();
		}
		$menu = "setting"; //nama menu
		$menu2 = ""; //nama submenu
		if ($level == "admin" or $level == "fakultas") {
			return view('auth.editregister',compact('level','menu','menu2','Akses','masterprodis','masterfakultas','Login'));
		} else {
			return redirect('/');
		}

		
	}

	public function update()
	{
		$input	  = Input::all();
		$validator = Validator::make($input, Login::$rules_edit, Login::$messages_edit);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		$id 			= Input::get('id');
		$idprodi		= Input::get('idprodi');
		$idfakultas		= Input::get('idfakultas');
		if ($idprodi != "" and $idfakultas == "") {
			$jenis_user = $idprodi;
		} else if ($idprodi == "" and $idfakultas!= "") {
			$jenis_user = $idfakultas;
		} else if ($idprodi == "" and $idfakultas == "") {
			$jenis_user = " ";
		}
		$firstname		= Input::get('firstname');
 		$lastname		= Input::get('lastname');
 		$username		= Input::get('username');
 		$password		= bcrypt(Input::get('password'));
 		$level			= Input::get('level');	
			
		DB:: table('logins')->where('id', $id)->update(array(
		'idprodi'		=> $jenis_user,
 		'firstname'		=> $firstname,
 		'lastname'		=> $lastname,
 		'username'		=> $username,
 		'password'		=> $password,
 		'level'			=> $level));

		return redirect('registrasi')
			->with('status', 'Data telah berhasil diedit');

	}

	public function delete($id)
	{
		$datalogin = Login::find($id);
		$datalogin->delete();
		//redirect
		return redirect('registrasi')
			->with('status', 'Data telah berhasil dihapus');
	}
	
	
	// ubah password dirinya sendiri yg lagi login
	public function password()
	{
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
		//cek jika user tersebut admin atau user biasa maka tampilkan data yang bisa dilihat apa saja
		
		$masterfakultas = masterfakultas::all();
		$masterprodis = masterprodis::all();
		$id = Auth::user()->id;
		$Login = Login::where('id',$id)->get(); 
		
		$menu = "setting"; //nama menu
		$menu2 = ""; //nama submenu
		
			return view('auth.editpassword',compact('level','menu','menu2','Akses','masterprodis','masterfakultas','Login'));
		

		
	}
	
	// jalankan perintah ubah password dirinya sendiri yg lagi login
	public function execute()
	{
		$input	  = Input::all();
		$validator = Validator::make($input, Login::$rules_edit, Login::$messages_edit);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		$id 			= Input::get('id');
		$firstname		= Input::get('firstname');
 		$lastname		= Input::get('lastname');
 		$username		= Input::get('username');
 		$password		= bcrypt(Input::get('password'));
		
		DB:: table('logins')->where('id', $id)->update(array(
		
 		'firstname'		=> $firstname,
 		'lastname'		=> $lastname,
 		'username'		=> $username,
 		'password'		=> $password,
 		
		));

		return redirect()->back()
			->with('status', 'Akun Anda telah berhasil diedit');

	}
	
}
