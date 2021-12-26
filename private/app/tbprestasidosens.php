<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbprestasidosens extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public function masterdosens() 
	{
		return $this->belongsTo('App\masterdosens','nip');
	}
	
	public static $rules = [
        'idprodi' 		=> 'required',
		'Tahun' 		=> 'required|numeric|max:2100|min:1945',
		'nip' 			=> 'required|numeric',
		'prestasi' 		=> 'required',
		'waktu' 		=> 'required',
		'tingkat' 		=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     	=> 'Prodi harus dipilih',
        
		'Tahun.required'   	 	=> 'Tahun harus diisi',
		'Tahun.max'    			=> 'Penulisan Tahun salah',
		'Tahun.min'    			=> 'Penulisan Tahun salah',
		'Tahun.numeric'    		=> 'Tahun harus angka',
		
        'nip.numeric'     		=> 'Penulisan NIP salah',
        'nip.required'     		=> 'NIP harus diisi',
		
        'prestasi.required'     => 'Prestasi harus diisi',
        'waktu.required'     	=> 'Tanggal Prestasi harus diisi',
        'tingkat.required'     	=> 'Tingkat Prestasi harus diisi',
        
    ];
	
	public static $rules_dok = [
		'bukti_prestasidosen' 	=> 'required',
    ];

    public static $messages_dok = [
        'bukti_prestasidosen.required' => 'Unggah filenya dulu',
        
    ];
	
}
?>