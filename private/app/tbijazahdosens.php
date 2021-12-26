<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbijazahdosens extends Model {
		
	public function masterdosens() 
	{
		return $this->belongsTo('App\masterdosens','nip');
	}
	
	public static $rules = [
        'jenis_lampiran' 	=> 'required',
        'nip' 				=> 'required|numeric',
		'ijazah_dosen' 		=> 'required',
    ];

    public static $messages = [
        'jenis_lampiran.required'     	=> 'Jenis Lampiran harus dipilih',
        'nip.numeric'     				=> 'Penulisan NIP salah',
        'nip.required'     				=> 'NIP harus diisi',
        'ijazah_dosen.required'     	=> 'Unggah filenya dulu',     
    ];

	
}
?>