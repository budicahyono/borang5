<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbpendidikandosens extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public function masterdosens() 
	{
		return $this->belongsTo('App\masterdosens','nip');
	}
	
	public static $rules = [
        'idprodi' 				=> 'required',
		'nip' 					=> 'required|numeric|unique:tbpendidikandosens',
		'jenjang' 				=> 'required',
		'namaSekolah' 			=> 'required',
		'bidangKeahlian' 		=> 'required',
		'gelar' 				=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'nip.required'     				=> 'nip dan nama dosen harus diisi',
        'jenjang.required'     			=> 'jenjang harus diisi',
        'namaSekolah.required'     		=> 'nama sekolah harus diisi',
        'bidangKeahlian.required'     	=> 'bidang keahlian harus diisi',
        'gelar.required'  				=> 'gelar harus diisi',
        
		
        'nip.numeric'     				=> 'Penulisan NIP salah',
        'nip.unique'     				=> 'NIP sudah Ada',
    ];
	
}
?>