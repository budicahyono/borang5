<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class tbevaluasilulusans extends Model{
	
	public function masterprodis() 
	{
		return $this->belongsTo('App\masterprodis','idprodi');
	}
	
	public static $rules = [
        'idprodi' 				=> 'required',
		'jenisKemampuan' 		=> 'required',
		'tanggapanSangatBaik' 	=> 'required|numeric|max:99',
		'tanggapanBaik' 		=> 'required|numeric|max:99',
		'tanggapanCukup' 		=> 'required|numeric|max:99',
		'tanggapanKurang' 		=> 'required|numeric|max:99',
		'tindakLanjut' 			=> 'required',
    ];

    public static $messages = [
        'idprodi.required'     			=> 'Prodi harus dipilih',
        'jenisKemampuan.required'    	=> 'Jenis Kemampuan harus diisi',
		
        'tanggapanSangatBaik.required' 	=> 'Tanggapan Sangat Baik harus diisi',
        'tanggapanBaik.required'     	=> 'Tanggapan Baik harus diisi',
        'tanggapanCukup.required'     	=> 'Tanggapan Cukup harus diisi',
        'tanggapanKurang.required'     	=> 'Tanggapan Kurang harus diisi',
		
		'tanggapanSangatBaik.numeric' 	=> 'Tanggapan Sangat Baik harus angka',
        'tanggapanBaik.numeric'     	=> 'Tanggapan Baik harus angka',
        'tanggapanCukup.numeric'     	=> 'Tanggapan Cukup harus angka',
        'tanggapanKurang.numeric'     	=> 'Tanggapan Kurang harus angka',
		
		'tanggapanSangatBaik.max' 		=> 'Tanggapan Sangat Baik harus 2 digit',
        'tanggapanBaik.max'     		=> 'Tanggapan Baik harus 2 digit',
        'tanggapanCukup.max'     		=> 'Tanggapan Cukup harus 2 digit',
        'tanggapanKurang.max'     		=> 'Tanggapan Kurang harus 2 digit',
        
		'tindakLanjut.required'     	=> 'Tindak Lanjut harus diisi',
        
    ];
	
	
	public static $rules_dok = [
        'dokumen_evaluasilulusan' 	=> 'required',
    ];

    public static $messages_dok = [
       'dokumen_evaluasilulusan.required' => 'Unggah filenya dulu',
    ];
	
}	
?>