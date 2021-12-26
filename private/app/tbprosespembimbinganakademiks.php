<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbprosespembimbinganakademiks extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 		=> 'required',
		'Hal' 			=> 'required',
		'penjelasan' 	=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     	=> 'Prodi harus dipilih',
        'Hal.required'    		=> 'Hal harus diisi',
        'penjelasan.required'   => 'penjelasan harus diisi',
        
    ];
	
}
?>