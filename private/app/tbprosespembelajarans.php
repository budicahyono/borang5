<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbprosespembelajarans extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 				=> 'required|unique:tbprosespembelajarans',
		'mekanismePenyusunan' 	=> 'required',
		
		'lampiranSoal1' 		=> 'required',
		'lampiranSoal2' 		=> 'required',
		'lampiranSoal3' 		=> 'required',
		'lampiranSoal4' 		=> 'required',
		'lampiranSoal5' 		=> 'required',
		
    ];

    public static $messages = [
        'idprodi.required'     				=> 'Prodi harus dipilih',
        'idprodi.unique'     				=> 'Prodi sudah ada',
        'mekanismePenyusunan.required'    	=> 'mekanisme Penyusunan harus diisi',
        'lampiranSoal1.required'     		=> 'lampiran Soal 1 harus diisi',
        'lampiranSoal2.required'     		=> 'lampiran Soal 2 harus diisi',
        'lampiranSoal3.required'     		=> 'lampiran Soal 3 harus diisi',
        'lampiranSoal4.required'     		=> 'lampiran Soal 4 harus diisi',
        'lampiranSoal5.required'     		=> 'lampiran Soal 5 harus diisi',
      
        
    ];
	
	public static $rules_dok = [
		'dokumen_pembelajaran' 	=> 'required',
    ];

    public static $messages_dok = [
        'dokumen_pembelajaran.required' => 'Unggah filenya dulu',
        
    ];
	
	
}
?>