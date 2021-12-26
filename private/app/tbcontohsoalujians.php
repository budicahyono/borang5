<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbcontohsoalujians extends Model {
		
	public function tbprosespembelajarans() 
	{
		return $this->belongsTo('App\tbprosespembelajarans','idpembelajaran');
	}
	
	public static $rules = [
        'tahun' 						=> 'required|numeric|max:2100|min:1945',
        'idprodi' 						=> 'required',
		'contoh_soal_ujian' 					=> 'required',
    ];

    public static $messages = [
        'tahun.required'   	 	=> 'Tahun harus diisi',
		'tahun.max'    			=> 'Penulisan Tahun salah',
		'tahun.min'    			=> 'Penulisan Tahun salah',
		'tahun.numeric'    		=> 'Tahun harus angka',
		
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'contoh_soal_ujian.required'   		=> 'Unggah filenya dulu',     
    ];

	
}
?>