<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbpanduanpembimbinganskripsis extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 				=> 'required|unique:tbpanduanpembimbinganskripses',
		'Panduan' 				=> 'required',
		'sosialisasiPanduan' 	=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'idprodi.unique'     			=> 'Prodi sudah ada',
        'Panduan.required'    			=> 'Panduan harus diisi',
        'sosialisasiPanduan.required'   => 'sosialisasi Panduan harus diisi',
        
    ];
	
	public static $rules_dok = [
		'panduan_skripsi' 	=> 'required',
    ];

    public static $messages_dok = [
        'panduan_skripsi.required' => 'Unggah filenya dulu',
        
    ];
	
}
?>