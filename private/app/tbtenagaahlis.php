<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbtenagaahlis extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 				=> 'required',
		'Tahun' 				=> 'required|numeric|max:2100|min:1945',
		'namaTenagaAhli' 		=> 'required',
		'namaKegiatan' 			=> 'required',
		'waktu' 				=> 'required',
		
    ];

    public static $messages = [
        'idprodi.required'     			=> 'Prodi harus dipilih',
		
        'Tahun.required'    			=> 'Tahun harus diisi',
		'Tahun.max'    					=> 'Penulisan Tahun salah',
		'Tahun.min'    					=> 'Penulisan Tahun salah',
		'Tahun.numeric'    				=> 'Tahun harus angka',
		
        'namaTenagaAhli.required'     	=> 'Nama Tenaga Ahli harus diisi',
        'namaKegiatan.required'     	=> 'Nama Kegiatan harus diisi',
        'waktu.required'     			=> 'Waktu harus diisi',
        
        
    ];

	
	
}
?>