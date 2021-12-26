<?php namespace App\Http\Controllers;


use Auth;
use App\Akses;
use App\Login;
use App\masterprodis;
use DB, Input, Validator, Session;

class AksesController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
		 
	 
	public function index()
	{

		$login = Auth::user()->id;		
		return Akses::where('id_logins',$login)->get()->sortBy('modul');

	}
	
	public function prodi()
	{

		$login = Auth::user()->idprodi;
		return $login;
	
	}
		
	
	public function level()
	{

		$login = Auth::user()->level;
		return $login;
	
	}
	
	public function hak_akses($id)
	{
		
		// inisiasi hak_akses
		$config_akses 	= new AksesController();
		$Akses 			= $config_akses->index(); 
		$prodi 			= $config_akses->prodi(); 
		$level 			= $config_akses->level(); 
		
			$hak_akses = Akses::where('id_logins',$id)->get()->sortBy('modul');  
			$add_akses = Akses::where('id_logins',$id)->get();  
			
			$datalogin = Login::where('id',$id)->get();  
			foreach($datalogin as $item) {
				$user 	   = $item->firstname." ".$item->lastname;
				$id_user   = $item->id;
				$username   = $item->username;
			}
			
			
		$menu = "setting"; //nama menu
		$menu2 = "hakakses"; //nama submenu
		if ($level == "admin" or $level == "fakultas") {
			return view('auth.hakakses',compact('level','menu','menu2','Akses','hak_akses','add_akses','user','$modul','id_user','username'));
		} else {
			return redirect('/');
		} 

	}
	
	public function savehak_akses()
	{
		
		$input	  = Input::all();
		$validator = Validator::make($input, Akses::$rules, Akses::$messages);
		if($validator->fails())
        {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }
		
		$id_logins	= Input::get('id_logins');
		$modul  	= $_POST['modul'];
		$hitung 	= count($modul);
		
		for( $i=0; $i < $hitung; $i++ )
		{
			$add_akses  = new Akses;
			$add_akses->id_logins	= $id_logins;
			$add_akses->modul		= $modul[$i];
			$add_akses->save();
		}
		
		return redirect()->back()
			->with('status', 'Data telah berhasil disimpan');

	}
	
	public function super_admin($id)
	{
		
		DB:: table('logins')->where('id', $id)->update(array('idprodi'	=> '000'));
		
		return redirect()->back()
			->with('status', 'Admin sudah dijadikan Super Admin');

	}
	
	public function admin_biasa($id)
	{
		
		DB:: table('logins')->where('id', $id)->update(array('idprodi'	=> ''));
		
		return redirect()->back()
			->with('status', 'Admin sudah dijadikan Admin biasa');

	}
	
	public function delhak_akses($id)
	{
		
		$del_akses = Akses::find($id);
		$del_akses->delete();

		//redirect
		return redirect()->back()
			->with('status', 'Data telah berhasil dihapus');

	}
}
	