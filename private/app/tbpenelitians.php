<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbpenelitians extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	public function masterbiayapenelitians() 
	{
		return $this->belongsTo('App\masterbiayapenelitians','idbiaya');
	}
	
	
	public static $rules = [
        'idprodi' 		=> 'required',
		'mekanisme' 	=> 'required',
		'visi' 			=> 'required',
		'misi' 			=> 'required',
		'tujuan' 		=> 'required',
		'sasaran' 		=> 'required',
		'strategi' 		=> 'required',
		'sosialisasi' 	=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     	=> 'Prodi harus dipilih',
        'mekanisme.required'    => 'Mekanisme harus diisi',
        'visi.required'     	=> 'Visi harus diisi',
        'misi.required'     	=> 'Misi harus diisi',
        'tujuan.required'     	=> 'Tujuan harus diisi',
        'sasaran.required'     	=> 'Sasaran harus diisi',
        'strategi.required'     => 'Strategi harus diisi',
        'sosialisasi.required'  => 'Sosialisasi harus diisi',
        
    ]; 
	
}
?>