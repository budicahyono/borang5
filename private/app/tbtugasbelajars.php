<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbtugasbelajars extends Model{
	
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
		'Tahun' 				=> 'required|numeric|max:2100|min:1945',
		'nip' 					=> 'required',
		'jenjang' 				=> 'required',
		'bidangStudi' 			=> 'required',
		'perguruanTinggi' 		=> 'required',
		'negara' 				=> 'required',
		'tahunMulai' 			=> 'required|numeric|max:2100|min:1945',
		
    ];

    public static $messages = [
        'idprodi.required'     			=> 'Prodi harus dipilih',	
        'nip.required'    				=> 'NIP harus diisi',
		
        'Tahun.required'    			=> 'Tahun harus diisi',
		'Tahun.max'    					=> 'Penulisan Tahun salah',
		'Tahun.min'    					=> 'Penulisan Tahun salah',
		'Tahun.numeric'    				=> 'Tahun harus angka',
		
        'jenjang.required'     			=> 'Jenjang harus diisi',
        'bidangStudi.required'     		=> 'Bidang Studi harus diisi',
        'perguruanTinggi.required'     	=> 'Perguruan Tinggi harus diisi',
        'negara.required'     			=> 'Negara harus diisi',
		
        'tahunMulai.required'     		=> 'Tahun Mulai harus diisi',
        'tahunMulai.max'     			=> 'Penulisan Tahun Mulai salah',
        'tahunMulai.min'     			=> 'Penulisan Tahun Mulai salah',
        'tahunMulai.numeric'     		=> 'Tahun Mulai harus angka',
        
        
    ];

	
}
?>