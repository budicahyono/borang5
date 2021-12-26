<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbkeberlanjutanprodis extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 		=> 'required',
		'jenisUpaya' 	=> 'required',
		'upaya' 		=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     	=> 'Prodi harus dipilih',
        'jenisUpaya.required'   => 'Jenis Upaya harus diisi',
        'upaya.required'     	=> 'Upaya harus diisi',
    ];
	
}
?>