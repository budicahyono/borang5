<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbpengelolaandanas extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 			=> 'required|unique:tbpengelolaandanas',
		'pengelolaanDana' 	=> 'required',
		
    ];

    public static $messages = [
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'idprodi.unique'     			=> 'Prodi sudah ada',
        'pengelolaanDana.required'    	=> 'pengelolaan Dana harus diisi',
        
    ];
	
	
}
?>