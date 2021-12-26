<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbumpanbaliks extends Model {
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 		=> 'required',
		'sumber' 		=> 'required',
		'isi' 			=> 'required',
		'tindakLanjut' 	=> 'required',
		
    ];

    public static $messages = [
        'idprodi.required'     	=> 'Prodi harus dipilih',
        'sumber.required'    	=> 'Sumber harus dipilih',
        'isi.required'     		=> 'Isi harus diisi',
        'tindakLanjut.required' => 'Tindak Lanjut harus diisi',
        
    ];
	
	public static $rules_dok = [
        'dokumen_umpanbalik' 	=> 'required',
    ];

    public static $messages_dok = [
       'dokumen_umpanbalik.required' => 'Unggah filenya dulu',
    ];
	
}
?>