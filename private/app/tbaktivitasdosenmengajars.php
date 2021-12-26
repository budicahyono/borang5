<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbaktivitasdosenmengajars extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public function masterdosens() 
	{
		return $this->belongsTo('App\masterdosens','nip');
	}
	
	
	public static $rules = [
        'idprodi' 					=> 'required',
		'nip' 						=> 'required|numeric|unique:tbaktivitasdosenmengajars',
		'tahunAkademik' 			=> 'required|numeric|max:2100|min:1945',
		'sks_PSsendiri' 			=> 'required|numeric|max:99',
		'sks_PSLainPTsendiri' 		=> 'required|numeric|max:99',
		'sks_PTLain' 				=> 'required|numeric|max:99',
		'sks_penelitian' 			=> 'required|numeric|max:99',
		'sks_Pengabdian' 			=> 'required|numeric|max:99',
		'sks_man_PSsendiri' 		=> 'required|numeric|max:99',
		'sks_man_PTlain' 			=> 'required|numeric|max:99',
    ];

    public static $messages = [
        'idprodi.required'     				 => 'Prodi harus dipilih',

        'nip.required'   					 => 'nip harus diisi',
        'nip.numeric'   					 => 'nip harus angka',
        'nip.unique'	   					 => 'nip sudah ada',

        'tahunAkademik.required'     		 => 'Tahun Akademik harus diisi',
        'tahunAkademik.numeric'     		 => 'Tahun Akademik harus angka',
        'tahunAkademik.max'     		     => 'Penulisan Tahun Akademik salah',
        'tahunAkademik.min'     		     => 'Penulisan Tahun Akademik salah',

        'sks_PSsendiri.required'     		 => 'SKS PS Sendiri harus diisi',
        'sks_PSsendiri.numeric'     		 => 'SKS PS Sendiri harus angka',
        'sks_PSsendiri.max'     		 	 => 'SKS PS Sendiri max 2 digit',

        'sks_PSLainPTsendiri.required'       => 'SKS PS Lain PT Sendiri harus diisi',
        'sks_PSLainPTsendiri.numeric'        => 'SKS PS Lain PT Sendiri harus angka',
        'sks_PSLainPTsendiri.max'       	 => 'SKS PS Lain PT Sendiri max 2 digit',
		
        'sks_PTLain.required'    			 => 'SKS PT Lain harus diisi',
        'sks_PTLain.numeric'    			 => 'SKS PT Lain harus angka',
        'sks_PTLain.max'    			 	 => 'SKS PT Lain harus max 2 digit',
		
        'sks_penelitian.required'  			 => 'SKS Penelitian harus diisi',
        'sks_penelitian.numeric'  			 => 'SKS Penelitian harus angka',
        'sks_penelitian.max'  			   	 => 'SKS Penelitian max 2 digit',
		
		'sks_Pengabdian.required'  			 => 'SKS Pengabdian harus diisi',
        'sks_Pengabdian.numeric'  			 => 'SKS Pengabdian harus angka',
        'sks_Pengabdian.max'  			   	 => 'SKS Pengabdian max 2 digit',

		'sks_man_PSsendiri.required'  		 => 'SKS Manajemen PS Sendiri harus diisi',
        'sks_man_PSsendiri.numeric'  		 => 'SKS Manajemen PS Sendiri harus angka',
        'sks_man_PSsendiri.max'  			 => 'SKS Manajemen PS Sendiri max 2 digit',

		'sks_man_PTlain.required'  			 => 'SKS Manajemen PT Lain harus diisi',
        'sks_man_PTlain.numeric'  			 => 'SKS Manajemen PT Lain harus angka',
        'sks_man_PTlain.max'  			   	 => 'SKS Manajemen PT Lain max 2 digit',		
		
		
        
    ]; 
	
}
?>