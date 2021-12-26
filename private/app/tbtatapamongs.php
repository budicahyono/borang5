<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbtatapamongs extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 				=> 'required|unique:tbtatapamongs',
		'tataPamong' 			=> 'required',
		'kepemimpinan' 			=> 'required',
		'sistemPengelolaan' 	=> 'required',
		'penjaminanMutu' 		=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'idprodi.unique'     			=> 'Prodi sudah ada',
        'tataPamong.required'    		=> 'Tatapamong harus diisi',
        'kepemimpinan.required'     	=> 'Kepemimpinan harus diisi',
        'sistemPengelolaan.required'    => 'Pengelolaan harus diisi',
        'penjaminanMutu.required'     	=> 'Penjaminan Mutu harus diisi',        
    ];
	
}
?>