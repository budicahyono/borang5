<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Akses extends Model {
	
	protected $table = 'hak_akses';
	protected $fillable = ['modul'];
	
	public function login() 
	{
		return $this->belongsTo('App\Login','id_logins');
	}
	
	public static $rules = [
        'id_logins' 	=> 'required',
		'modul' 		=> 'required',
    ];

    public static $messages = [
        'id_logins.required'    => 'User harus dipilih',
        'modul.required'    	=> 'Minimal 1 modul dipilih',
        
    ]; 
}
?>