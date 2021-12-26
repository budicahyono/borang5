<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbupayatenagakependidikans extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 					=> 'required|unique:tbupayatenagakependidikans',
		'upayaTenagaKependidikan' 	=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     	=> 'Prodi harus dipilih',
        'idprodi.unique'     	=> 'Prodi sudah ada',
        'upayaTenagaKependidikan.required'    => 'upaya Tenaga Kependidikan harus diisi',
    
    ];
	
}
?>