<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbpedomansdms extends Model {
		
	public function tbsdms() 
	{
		return $this->belongsTo('App\tbsdms','idsdm');
	}
	
	public static $rules = [
        'jenis_lampiran' 				=> 'required',
        'idprodi' 						=> 'required',
		'pedoman_sdm' 					=> 'required',
    ];

    public static $messages = [
        'jenis_lampiran.required'     	=> 'Jenis Lampiran harus dipilih',
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'pedoman_sdm.required'   		=> 'Unggah filenya dulu',     
    ];


	
}
?>