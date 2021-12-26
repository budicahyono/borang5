<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tborganisasiprofesis extends Model{

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
		'nip' 						=> 'required|numeric',
		'Tahun' 					=> 'required|numeric|max:2100|min:1945',
		'namaOrganisasi' 			=> 'required',
		'waktuMulai' 				=> 'required',
		'waktuSelesai' 				=> 'required',
		'tingkat' 					=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     				 => 'Prodi harus dipilih',

        'nip.required'   					 => 'nip harus diisi',
        'nip.numeric'   					 => 'nip harus angka',

        'Tahun.required'     				 => 'Tahun Akademik harus diisi',
        'Tahun.numeric'     				 => 'Tahun Akademik harus angka',
        'Tahun.max'     		    		 => 'Penulisan Tahun Akademik salah',
        'Tahun.min'     		    		 => 'Penulisan Tahun Akademik salah',
		
        'namaOrganisasi.required'     		 => 'Nama Organisasi harus diisi',
        'waktuMulai.required'     		     => 'Waktu Mulai harus diisi',
        'waktuSelesai.required'   			 => 'Waktu Selesai harus diisi',
        'tingkat.required' 					 => 'Tingkat harus diisi',

    ]; 
	
	public static $rules_dok = [
		'bukti_organisasiprofesi' 	=> 'required',
    ];

    public static $messages_dok = [
        'bukti_organisasiprofesi.required' => 'Unggah filenya dulu',
        
    ];
}
?>