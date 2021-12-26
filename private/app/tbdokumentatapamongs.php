<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbdokumentatapamongs extends Model {
		
	public function tbtatapamongs() 
	{
		return $this->belongsTo('App\tbtatapamongs','idtatapamong');
	}
	
	public static $rules = [
        'jenis_lampiran' 				=> 'required',
        'idprodi' 						=> 'required',
		'dokumen_tatapamong' 			=> 'required',
    ];

    public static $messages = [
        'jenis_lampiran.required'     	=> 'Jenis Lampiran harus dipilih',
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'dokumen_tatapamong.required'   => 'Unggah filenya dulu',     
    ];

	
}
?>