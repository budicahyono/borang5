<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tblayananmahasiswas extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 		=> 'required',
		'jenisKegiatan' => 'required',
		'isiKegiatan' 	=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     		=> 'Prodi harus dipilih',
        'jenisKegiatan.required'    => 'Jenis Kegiatan harus diisi',
        'isiKegiatan.required'     	=> 'Isi Kegiatan harus diisi',
    ];
	
	public static $rules_dok = [
        'dokumen_layanan' 	=> 'required',
    ];

    public static $messages_dok = [
       'dokumen_layanan.required' => 'Unggah filenya dulu',
    ];
}	
?>