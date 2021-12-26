<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbkompetensis extends Model{

	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 					=> 'required|unique:tbkompetenses',
		'kompetensiUtama' 			=> 'required',
		'kompetensiPendukung' 		=> 'required',
		'kompetensiLain' 			=> 'required',
		
    ];

    public static $messages = [
        'idprodi.required'     	=> 'Prodi harus dipilih',
        'idprodi.unique'     	=> 'Prodi sudah ada',
        'kompetensiUtama.required'    => 'kompetensi Utama harus diisi',
        'kompetensiPendukung.required'     	=> 'kompetensi Pendukung harus diisi',
        'kompetensiLain.required'     	=> 'kompetensi Lain harus diisi',
        
    ];
	
}
?>