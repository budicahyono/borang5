<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbalumnis extends Model{

	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 				=> 'required',
		'waktuTungguLulusan' 	=> 'required|numeric|max:12',
		'kerjaSesuaiBidang' 	=> 'required|numeric|max:99',
		'himpunanAlumni' 		=> 'required',
	
    ];

    public static $messages = [
        'idprodi.required'     			 => 'Prodi harus dipilih',
        
		'waktuTungguLulusan.required'    => 'Waktu Tunggu Lulusan harus diisi',
        'kerjaSesuaiBidang.required'     => 'Kerja Sesuai Bidang harus diisi',
		
		'waktuTungguLulusan.numeric'     => 'Waktu Tunggu Lulusan harus angka',
        'kerjaSesuaiBidang.numeric'      => 'Kerja Sesuai Bidang harus angka',
		
		'waktuTungguLulusan.max'    	 => 'Penulisan Waktu Tunggu Lulusan Salah',
        'kerjaSesuaiBidang.max'     	 => 'Penulisan Kerja Sesuai Bidang salah',
		
        'himpunanAlumni.required'     	 => 'himpunan Alumni harus diisi',
		
		
       
        
    ]; 
	
	
	public static $rules_dok = [
        'laporan_alumni' 	=> 'required',
    ];

    public static $messages_dok = [
       'laporan_alumni.required' => 'Unggah filenya dulu',
    ];
	
}
?>