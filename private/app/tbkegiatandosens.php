<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbkegiatandosens extends Model{
	
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
		'nip' 					=> 'required|numeric',
		
		'jenisKegiatan' 		=> 'required',
		'namaKegiatan' 			=> 'required',
		'tempat' 				=> 'required',
		'waktu' 				=> 'required',
		'sebagai' 				=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'Tahun.required'    			=> 'Tahun harus diisi',
        'nip.required'     				=> 'nip dan nama dosen harus diisi',
        'jenisKegiatan.required'     	=> 'jenis Kegiatan harus diisi',
        'namaKegiatan.required'     	=> 'nama Kegiatan harus diisi',
        'tempat.required'     			=> 'tempat harus diisi',
        'waktu.required'  				=> 'Tanggal kegiatan harus diisi',
        'sebagai.required'  			=> 'Peran Dosen harus diisi',
        
		'Tahun.max'    					=> 'Penulisan Tahun salah',
		'Tahun.min'    					=> 'Penulisan Tahun salah',
		'Tahun.numeric'    				=> 'Tahun harus angka',
        'nip.numeric'     				=> 'Penulisan NIP salah',
    ];
	
	public static $rules_dok = [
		'bukti_kegiatandosen' 	=> 'required',
    ];

    public static $messages_dok = [
        'bukti_kegiatandosen.required' => 'Unggah filenya dulu',
        
    ];
	
}
?>