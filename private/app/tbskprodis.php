<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbskprodis extends Model {
		
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'jenis_lampiran' 	=> 'required',
        'idprodi' 			=> 'required',
		'sk_prodi' 			=> 'required',
    ];

    public static $messages = [
        'jenis_lampiran.required'     	=> 'Jenis Lampiran harus dipilih',
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'sk_prodi.required'     => 'Unggah filenya dulu',     
    ];

	
}
?>