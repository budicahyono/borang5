<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbpraktikums extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	public function mastermatakuliahs() 
	{
		return $this->belongsTo('App\mastermatakuliahs','idmatakuliah');
	}
	
	
	public static $rules = [
        'idprodi' 			=> 'required',
		'idmatakuliah' 		=> 'required',
		'namaPraktikum' 	=> 'required',
		'judulModul' 		=> 'required',
		'jamPelaksanaan' 	=> 'required|numeric|max:99',
		'lokasi' 			=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'idmatakuliah.required'    		=> 'Kode Mata Kuliah harus diisi',
        'namaPraktikum.required'     	=> 'nama Praktikum harus diisi',
        'judulModul.required'     		=> 'judul Modul harus diisi',
		
        'jamPelaksanaan.required'     	=> 'jam Pelaksanaan harus diisi',
        'jamPelaksanaan.numeric'     	=> 'jam Pelaksanaan harus angka',
        'jamPelaksanaan.max'     		=> 'jam Pelaksanaan max 2 digit',
		
        'lokasi.required'     			=> 'lokasi harus diisi',
        
    ];
	
	public static $rules_dok = [
		'dokumen_silabusdansap' 	=> 'required',
    ];

    public static $messages_dok = [
        'dokumen_silabusdansap.required' => 'Unggah filenya dulu',
        
    ];
}
?>