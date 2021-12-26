<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbmekanismes extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 		=> 'required|unique:tbmekanismes',
		'mekanisme' 	=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     	=> 'Prodi harus dipilih',
		'idprodi.unique'     	=> 'Prodi sudah ada',
        'mekanisme.required'    => 'Mekanisme harus diisi',
    ];
	
}	
?>