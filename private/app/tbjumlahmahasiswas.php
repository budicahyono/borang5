<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbjumlahmahasiswas extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 							=> 'required',
		'angkatan' 							=> 'required|numeric|max:2100|min:1945',
		'tahunAkademikBerjalan' 			=> 'required|numeric|max:2100|min:1945',
		'jumlah' 							=> 'required|numeric|max:999',
		'jumlahLulusan' 					=> 'required|numeric|max:999',
    ];

    public static $messages = [
        'idprodi.required'     				=> 'Prodi harus dipilih',
        'angkatan.required'    				=> 'Angkatan harus diisi',
        'tahunAkademikBerjalan.required'    => 'Tahun Akademik Berjalan harus diisi',
        'jumlah.required'     				=> 'Jumlah Mahasiswa harus diisi',
        'jumlahLulusan.required'     		=> 'Jumlah Lulusan harus diisi',
		
		
        'angkatan.numeric'     				=> 'Angkatan harus angka',
        'tahunAkademikBerjalan.numeric'     => 'Tahun Akademik Berjalan harus angka',
        'jumlah.numeric'     				=> 'Jumlah Mahasiswa harus angka',
        'jumlahLulusan.numeric'     		=> 'Jumlah Lulusan harus angka',
		
	
        'tahunAkademikBerjalan.max'     	=> 'Penulisan Tahun Akademik Berjalan salah',
        'tahunAkademikBerjalan.min'     	=> 'Penulisan Tahun Akademik Berjalan salah',
        'angkatan.max'     					=> 'Penulisan Angkatan salah',
        'angkatan.min'     					=> 'Penulisan Angkatan salah',
        'jumlah.max'     					=> 'Jumlah Mahasiswa harus 3 digit',
        'jumlahLulusan.max'     			=> 'Jumlah Lulusan harus 3 digit',
        
    ];
	
	
}
?>