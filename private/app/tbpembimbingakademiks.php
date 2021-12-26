<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbpembimbingakademiks extends Model{
	
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
		'nip' 					=> 'required|numeric|unique:tbpembimbingakademiks',
		'jumlahMahasiswa' 		=> 'required|numeric|max:99',
		'jumlahPertemuan' 		=> 'required|numeric|max:99',
    ];

    public static $messages = [
        'idprodi.required'     	=> 'Prodi harus dipilih',
        
		
        'nip.numeric'     		=> 'Penulisan NIP salah',
        'nip.required'     		=> 'NIP harus diisi',
        'nip.unique'     		=> 'NIP sudah ada',
		
        'jumlahMahasiswa.required'    	=> 'jumlah Mahasiswa harus diisi',
        'jumlahMahasiswa.numeric'     	=> 'jumlah Mahasiswa harus angka',
        'jumlahMahasiswa.max' 		    => 'jumlah Mahasiswa max 2 digit',
		
        'jumlahPertemuan.required'     	=> 'jumlah Pertemuan harus diisi',
        'jumlahPertemuan.numeric'     	=> 'jumlah Pertemuan harus angka',
        'jumlahPertemuan.max'     		=> 'jumlah Pertemuan max 2 digit',
        
    ];
}
?>