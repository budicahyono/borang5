<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbpeninjauankurikulums extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	public function masterkurikulums() 
	{
		return $this->belongsTo('App\masterkurikulums','idkurikulum');
	}
	
	public static $rules = [
        'idprodi' 		=> 'required|unique:tbpeninjauankurikulums',
		'Tahun' 		=> 'required|numeric|max:2100|min:1945',
		'idkurikulum' 	=> 'required',
		'mekanisme' 	=> 'required',
		
    ];

    public static $messages = [
        'idprodi.required'     	=> 'Prodi harus dipilih',
        'idprodi.unique'     	=> 'Prodi sudah ada',
        
		'Tahun.required'   	 	=> 'Tahun harus diisi',
		'Tahun.max'    			=> 'Penulisan Tahun salah',
		'Tahun.min'    			=> 'Penulisan Tahun salah',
		'Tahun.numeric'    		=> 'Tahun harus angka',
		
        'idkurikulum.required'  => 'Kurikulum harus diisi',
		
        'mekanisme.required'    => 'mekanisme harus diisi',
        
    ];
	
	public static $rules_dok = [
		'dokumen_kurikulum' 	=> 'required',
    ];

    public static $messages_dok = [
        'dokumen_kurikulum.required' => 'Unggah filenya dulu',
        
    ];
}
?>