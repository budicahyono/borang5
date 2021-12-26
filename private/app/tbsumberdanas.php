<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbsumberdanas extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 		=> 'required',
		'sumberDana' 	=> 'required',
		'jenisDana' 	=> 'required',
		'tahun' 		=> 'required|numeric|max:2100|min:1945',
		'jumlahDana' 	=> 'required|numeric',
    ];

    public static $messages = [
        'idprodi.required'     	 	=> 'Prodi harus dipilih',
        'sumberDana.required'    	=> 'sumber Dana harus diisi',
        'jenisDana.required'     	=> 'jenis Dana harus diisi',
		
        'tahun.required'     		=> 'tahun harus diisi',
        'tahun.numeric'     		=> 'Tahun harus angka',
        'tahun.max'     			=> 'Penulisan Tahun salah',
        'tahun.min'     			=> 'Penulisan Tahun salah',
		
        'jumlahDana.required'     	=> 'jumlah Dana harus diisi',
        'jumlahDana.numeric'     	=> 'jumlah Dana harus angka',
        
    ];

}
?>