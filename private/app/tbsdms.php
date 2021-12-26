<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbsdms extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 			=> 'required|unique:tbsdms',
		'sistemSeleksi' 	=> 'required',
		'monev' 			=> 'required',
		
    ];

    public static $messages = [
        'idprodi.required'     		=> 'Prodi harus dipilih',
        'idprodi.unique'     		=> 'Prodi sudah ada',
        'sistemSeleksi.required'    => 'sistem seleksi harus diisi',
        'monev.required'     		=> 'monev harus diisi',
        
        
    ];
	
}
?>