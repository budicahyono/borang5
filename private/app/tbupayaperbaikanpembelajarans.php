<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbupayaperbaikanpembelajarans extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 				=> 'required',
		'item' 					=> 'required',
		'tindakanPerbaikan' 	=> 'required',
		'hasilPerbaikan' 		=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'item.required'    				=> 'item harus diisi',
        'tindakanPerbaikan.required'    => 'tindakan Perbaikan harus diisi',
        'hasilPerbaikan.required'  		=> 'hasil Perbaikan harus diisi',
        
    ];
	
}
?>