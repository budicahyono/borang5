<?php namespace App;

use Illuminate\Database\Eloquent\Model;
 
class tbprestasimahasiswas extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 			=> 'required',
		'namaKegiatan' 		=> 'required',
		'waktu' 			=> 'required',
		'tingkat' 			=> 'required',
		'prestasi' 			=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     		=> 'Prodi harus dipilih',
        'namaKegiatan.required'    	=> 'Nama Kegiatan harus diisi',
        'waktu.required'     		=> 'Tanggal Kegiatan harus diisi',
        'tingkat.required'     		=> 'Tingkat harus diisi',
        'prestasi.required'     	=> 'Prestasi harus diisi',
    ];
}
?>